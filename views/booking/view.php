<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Booking $model */

$this->title = $model->booking_id;
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="booking-view">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
    <?= Html::a('Update', ['update', 'booking_id' => $model->booking_id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'booking_id' => $model->booking_id], [
      'class' => 'btn btn-danger',
      'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
      ],
    ]) ?>
  </p>

  <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
      'booking_id',
      'uid',
      'car_id',
      'user_id',
      'added_by',
      'company_id',
      'source',
      'agent_id',
      'sales',
      'other',
      'direct',
      'start_date',
      'pickup_location',
      'pickup_place_id',
      'pickup_latitude',
      'pickup_longitude',
      'pickup_driver',
      'pickup_driver_note',
      'end_date',
      'drop_location',
      'drop_place_id',
      'drop_latitude',
      'drop_longitude',
      'drop_driver',
      'drop_driver_note',
      'send_sms_to_drivers',
      'send_sms_to_me',
      'total_amount',
      'currency_id',
      'city_id',
      'client_full_name',
      'special_request',
      'cancellation_answer_id',
      'cancellation_reason:ntext',
      'open_date',
      'paid_at',
      'status',
      'payment_status',
      'is_reserved',
      'is_deleted',
      'cancelled_by',
      'cancelled_at',
      'created_at',
      'updated_at',
      'deleted_at',
      'replacement',
      'is_agent',
    ],
  ]) ?>

</div>