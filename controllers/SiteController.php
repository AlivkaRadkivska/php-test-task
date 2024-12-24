<?php

namespace app\controllers;

use Yii;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Booking;
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
    $monthStart = '2023-02-01';
    $monthEnd = '2023-02-28';

    $query = Booking::find()
      ->select([
        'rc_bookings.car_id',
        new Expression('SUM(DATEDIFF(end_date, start_date)) AS busy_days'),
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
      ->where(['>=', 'start_date', $monthStart])
      ->andWhere(['<=', 'end_date', $monthEnd])
      ->andWhere(new Expression('TIMESTAMPDIFF(HOUR, start_date, end_date) >= 9'))
      ->groupBy('rc_bookings.car_id')
      ->orderBy(['rc_bookings.car_id' => SORT_ASC]);

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => []
    ]);

    return $this->render('index', [
      'dataProvider' => $dataProvider,
    ]);
  }
}
