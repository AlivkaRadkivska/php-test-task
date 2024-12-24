<?php

use app\models\Booking;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BookingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bookings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
    <?= Html::a('Create Booking', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <?php // echo $this->render('_search', ['model' => $searchModel]); 
  ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      'booking_id',
      'uid',
      'car_id',
      'user_id',
      'added_by',
      //'company_id',
      //'source',
      //'agent_id',
      //'sales',
      //'other',
      //'direct',
      //'start_date',
      //'pickup_location',
      //'pickup_place_id',
      //'pickup_latitude',
      //'pickup_longitude',
      //'pickup_driver',
      //'pickup_driver_note',
      //'end_date',
      //'drop_location',
      //'drop_place_id',
      //'drop_latitude',
      //'drop_longitude',
      //'drop_driver',
      //'drop_driver_note',
      //'send_sms_to_drivers',
      //'send_sms_to_me',
      //'total_amount',
      //'currency_id',
      //'city_id',
      //'client_full_name',
      //'special_request',
      //'cancellation_answer_id',
      //'cancellation_reason:ntext',
      //'open_date',
      //'paid_at',
      //'status',
      //'payment_status',
      //'is_reserved',
      //'is_deleted',
      //'cancelled_by',
      //'cancelled_at',
      //'created_at',
      //'updated_at',
      //'deleted_at',
      //'replacement',
      //'is_agent',
      [
        'class' => ActionColumn::className(),
        'urlCreator' => function ($action, Booking $model, $key, $index, $column) {
          return Url::toRoute([$action, 'booking_id' => $model->booking_id]);
        }
      ],
    ],
  ]); ?>


</div>