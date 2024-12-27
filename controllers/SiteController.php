<?php

namespace app\controllers;

use Yii;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Booking;
use app\models\BookingFilterForm;
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
    if ($model->load(Yii::$app->request->get())) {
      $selectedYear = $model->year;
      $selectedMonth = $model->month;
      $registrationNumber = $model->registration_number;
      $activeBooking = $model->active_booking;
      $activeCar = $model->active_car;
      $existingCar = $model->existing_car;
    } else {
      $selectedYear = date('Y');
      $selectedMonth = date('m');
    }

    $startDate = $selectedYear . '-' . $selectedMonth . '-01';
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

    if (!empty($registrationNumber)) {
      $query->andWhere(['like', 'rc_cars.registration_number', $registrationNumber]);
    }

    if (!empty($activeBooking)) {
      $query->andWhere(['=', 'rc_bookings.status', $activeBooking]);
    }

    if (!empty($activeCar)) {
      $query->andWhere(['=', 'rc_cars.status', $activeCar]);
    }

    if (!empty($existingCar)) {
      $query->andWhere(['!=', 'rc_cars.is_deleted', $existingCar]);
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
}
