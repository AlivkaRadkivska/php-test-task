<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BookingSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="booking-search">

  <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
  ]); ?>

  <?= $form->field($model, 'booking_id') ?>

  <?= $form->field($model, 'uid') ?>

  <?= $form->field($model, 'car_id') ?>

  <?= $form->field($model, 'user_id') ?>

  <?= $form->field($model, 'added_by') ?>

  <?php // echo $form->field($model, 'company_id') 
  ?>

  <?php // echo $form->field($model, 'source') 
  ?>

  <?php // echo $form->field($model, 'agent_id') 
  ?>

  <?php // echo $form->field($model, 'sales') 
  ?>

  <?php // echo $form->field($model, 'other') 
  ?>

  <?php // echo $form->field($model, 'direct') 
  ?>

  <?php // echo $form->field($model, 'start_date') 
  ?>

  <?php // echo $form->field($model, 'pickup_location') 
  ?>

  <?php // echo $form->field($model, 'pickup_place_id') 
  ?>

  <?php // echo $form->field($model, 'pickup_latitude') 
  ?>

  <?php // echo $form->field($model, 'pickup_longitude') 
  ?>

  <?php // echo $form->field($model, 'pickup_driver') 
  ?>

  <?php // echo $form->field($model, 'pickup_driver_note') 
  ?>

  <?php // echo $form->field($model, 'end_date') 
  ?>

  <?php // echo $form->field($model, 'drop_location') 
  ?>

  <?php // echo $form->field($model, 'drop_place_id') 
  ?>

  <?php // echo $form->field($model, 'drop_latitude') 
  ?>

  <?php // echo $form->field($model, 'drop_longitude') 
  ?>

  <?php // echo $form->field($model, 'drop_driver') 
  ?>

  <?php // echo $form->field($model, 'drop_driver_note') 
  ?>

  <?php // echo $form->field($model, 'send_sms_to_drivers') 
  ?>

  <?php // echo $form->field($model, 'send_sms_to_me') 
  ?>

  <?php // echo $form->field($model, 'total_amount') 
  ?>

  <?php // echo $form->field($model, 'currency_id') 
  ?>

  <?php // echo $form->field($model, 'city_id') 
  ?>

  <?php // echo $form->field($model, 'client_full_name') 
  ?>

  <?php // echo $form->field($model, 'special_request') 
  ?>

  <?php // echo $form->field($model, 'cancellation_answer_id') 
  ?>

  <?php // echo $form->field($model, 'cancellation_reason') 
  ?>

  <?php // echo $form->field($model, 'open_date') 
  ?>

  <?php // echo $form->field($model, 'paid_at') 
  ?>

  <?php // echo $form->field($model, 'status') 
  ?>

  <?php // echo $form->field($model, 'payment_status') 
  ?>

  <?php // echo $form->field($model, 'is_reserved') 
  ?>

  <?php // echo $form->field($model, 'is_deleted') 
  ?>

  <?php // echo $form->field($model, 'cancelled_by') 
  ?>

  <?php // echo $form->field($model, 'cancelled_at') 
  ?>

  <?php // echo $form->field($model, 'created_at') 
  ?>

  <?php // echo $form->field($model, 'updated_at') 
  ?>

  <?php // echo $form->field($model, 'deleted_at') 
  ?>

  <?php // echo $form->field($model, 'replacement') 
  ?>

  <?php // echo $form->field($model, 'is_agent') 
  ?>

  <div class="form-group">
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>