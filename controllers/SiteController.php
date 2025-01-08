<?php

namespace app\controllers;

use Yii;
use DateTime;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Booking;
use app\models\BookingFilterForm;
use app\models\Car;
use yii\data\ActiveDataProvider;

class SiteController extends BaseController
{
  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::class,
        'only' => ['logout'],
        'rules' => [
          [
            'actions' => ['logout'],
            'allow' => true,
            'roles' => ['@'],
          ],
        ],
      ],
      'verbs' => [
        'class' => VerbFilter::class,
        'actions' => [
          'logout' => ['post'],
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function actions()
  {
    return [
      'error' => [
        'class' => 'yii\web\ErrorAction',
      ],
      'captcha' => [
        'class' => 'yii\captcha\CaptchaAction',
        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
      ],
    ];
  }

  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionIndex()
  {
    $bookingFilterModel = new BookingFilterForm();

    if (!$bookingFilterModel->load(Yii::$app->request->get())) {
      $bookingFilterModel->year = date('Y');
      $bookingFilterModel->month = date('m');
      $bookingFilterModel->active_booking = true;
      $bookingFilterModel->active_car = true;
      $bookingFilterModel->existing_car = true;
    }

    $startOfMonth = new DateTime("$bookingFilterModel->year-$bookingFilterModel->month-01");
    $endOfMonth = (clone $startOfMonth)->modify('first day of next month');

    $query = Booking::find()
      ->select([
        'rc_bookings.car_id',
        "CONCAT('[', GROUP_CONCAT(CONCAT('{\"start_date\":\"', start_date, '\",\"end_date\":\"', end_date, '\",\"source\":\"', source, '\"}') ORDER BY start_date SEPARATOR ','), ']') as rental_dates"
      ])
      ->joinWith([
        'car',
        'car.carTranslation' => function ($query) {
          $query->andWhere(['rc_cars_translations.lang' => Yii::$app->language]);
        },
        'car.carModelTranslation' => function ($query) {
          $query->andWhere(['rc_cars_models_translations.lang' => Yii::$app->language]);
        },
      ])
      ->where(['<', 'start_date', $endOfMonth->format('Y:m:d H:i:s')])
      ->andWhere(['>', 'end_date', $startOfMonth->format('Y:m:d H:i:s')])
      ->groupBy('rc_bookings.car_id')
      ->orderBy(['rc_bookings.car_id' => SORT_ASC]);


    if (!empty($bookingFilterModel->registration_number)) {
      $query->andWhere(['like', 'rc_cars.registration_number', $bookingFilterModel->registration_number]);
    }

    if (!empty($bookingFilterModel->active_booking)) {
      $query->andWhere(['=', 'rc_bookings.status', $bookingFilterModel->active_booking]);
    }

    if (!empty($bookingFilterModel->active_car)) {
      $query->andWhere(['=', 'rc_cars.status', $bookingFilterModel->active_car]);
    }

    if (!empty($bookingFilterModel->existing_car)) {
      $query->andWhere(['!=', 'rc_cars.is_deleted', $bookingFilterModel->existing_car]);
    }

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 20
      ],
    ]);

    return $this->render('index', [
      'dataProvider' => $dataProvider,
      'bookingFilterModel' => $bookingFilterModel
    ]);
  }

  /**
   * actionView
   *
   * @param  mixed $car_id
   * @return void
   */
  public function actionView($car_id)
  {
    $carQuery = Car::find()
      ->select([])
      ->joinWith([
        'carTranslation' => function ($query) {
          $query->andWhere(['rc_cars_translations.lang' => Yii::$app->language]);
        },
        'carModelTranslation' => function ($query) {
          $query->andWhere(['rc_cars_models_translations.lang' => Yii::$app->language]);
        },
      ])
      ->where(['=', 'rc_cars.car_id', $car_id])
      ->one();

    $bookingQuery = Booking::find()
      ->select(['booking_id', 'start_date', 'end_date', 'source', 'status', 'TIMESTAMPDIFF(HOUR, start_date, end_date) AS hours_in_rent'])
      ->where(['=', 'car_id', $car_id])
      ->orderBy(['start_date' => SORT_ASC]);

    $dataProvider = new ActiveDataProvider([
      'query' => $bookingQuery,
      'pagination' => [
        'pageSize' => 20
      ],
    ]);

    return $this->render('view', [
      'carDetails' => $carQuery,
      'dataProvider' => $dataProvider,
    ]);
  }
}
