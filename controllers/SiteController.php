<?php

namespace app\controllers;

use Yii;
use yii\db\Expression;
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
    $model = new BookingFilterForm();

    if (!$model->load(Yii::$app->request->get())) {
      $model->year = date('Y');
      $model->month = date('m');
    }

    $startDate = $model->year . '-' . $model->month . '-01';
    $endDate = date('Y-m-t', strtotime($startDate));

    $daysInMonth = date('t', strtotime($startDate));

    $query = Booking::find()
      ->select([
        'rc_bookings.car_id',
        new Expression('SUM(CASE WHEN TIMESTAMPDIFF(HOUR, start_date, end_date) >= 9 THEN DATEDIFF(end_date, start_date) ELSE 0 END) AS busy_days'),
        new Expression('SUM(CASE WHEN TIMESTAMPDIFF(HOUR, start_date, end_date) < 9 THEN 1 ELSE 0 END) AS service_days'),
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
      ->where(['>=', 'start_date', $startDate])
      ->andWhere(['<=', 'end_date', $endDate])
      ->groupBy('rc_bookings.car_id')
      ->orderBy(['rc_bookings.car_id' => SORT_ASC]);

    if (!empty($model->registration_number)) {
      $query->andWhere(['like', 'rc_cars.registration_number', $model->registration_number]);
    }

    if (!empty($model->active_booking)) {
      $query->andWhere(['=', 'rc_bookings.status', $model->active_booking]);
    }

    if (!empty($model->active_car)) {
      $query->andWhere(['=', 'rc_cars.status', $model->active_car]);
    }

    if (!empty($model->existing_car)) {
      $query->andWhere(['!=', 'rc_cars.is_deleted', $model->existing_car]);
    }

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 20
      ],
    ]);

    return $this->render('index', [
      'dataProvider' => $dataProvider,
      'daysInMonth' => $daysInMonth,
      'model' => $model
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
      ->select(['booking_id', 'start_date', 'end_date', 'status', 'TIMESTAMPDIFF(HOUR, start_date, end_date) AS hours_in_rent'])
      ->where(['=', 'car_id', $car_id])
      ->orderBy(['start_date' => SORT_DESC]);

    $dataProvider = new ActiveDataProvider([
      'query' => $bookingQuery,
      'pagination' => [
        'pageSize' => 10
      ],
    ]);

    return $this->render('view', [
      'carDetails' => $carQuery,
      'dataProvider' => $dataProvider,
    ]);
  }
}
