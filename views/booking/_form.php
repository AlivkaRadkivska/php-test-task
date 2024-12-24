<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Booking $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="booking-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'booking_id')->textInput() ?>

  <?= $form->field($model, 'uid')->textInput() ?>

  <?= $form->field($model, 'car_id')->textInput() ?>

  <?= $form->field($model, 'user_id')->textInput() ?>

  <?= $form->field($model, 'added_by')->textInput() ?>

  <?= $form->field($model, 'company_id')->textInput() ?>

  <?= $form->field($model, 'source')->dropDownList(['agent' => 'Agent', 'website' => 'Website', 'instagram' => 'Instagram', 'other' => 'Other', 'direct' => 'Direct', 'carsss' => 'Carsss', 'sales' => 'Sales', 'dwm' => 'Dwm', 'hourly' => 'Hourly', 'chauffeur' => 'Chauffeur', 'lpo' => 'Lpo', 'car-service' => 'Car-service',], ['prompt' => '']) ?>

  <?= $form->field($model, 'agent_id')->textInput() ?>

  <?= $form->field($model, 'sales')->textInput() ?>

  <?= $form->field($model, 'other')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'direct')->dropDownList(['whatsapp' => 'Whatsapp', 'website' => 'Website', 'instagram' => 'Instagram', 'facebook' => 'Facebook', 'referral' => 'Referral',], ['prompt' => '']) ?>

  <?= $form->field($model, 'start_date')->textInput() ?>

  <?= $form->field($model, 'pickup_location')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'pickup_place_id')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'pickup_latitude')->textInput() ?>

  <?= $form->field($model, 'pickup_longitude')->textInput() ?>

  <?= $form->field($model, 'pickup_driver')->textInput() ?>

  <?= $form->field($model, 'pickup_driver_note')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'end_date')->textInput() ?>

  <?= $form->field($model, 'drop_location')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'drop_place_id')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'drop_latitude')->textInput() ?>

  <?= $form->field($model, 'drop_longitude')->textInput() ?>

  <?= $form->field($model, 'drop_driver')->textInput() ?>

  <?= $form->field($model, 'drop_driver_note')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'send_sms_to_drivers')->textInput() ?>

  <?= $form->field($model, 'send_sms_to_me')->textInput() ?>

  <?= $form->field($model, 'total_amount')->textInput() ?>

  <?= $form->field($model, 'currency_id')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'city_id')->textInput() ?>

  <?= $form->field($model, 'client_full_name')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'special_request')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'cancellation_answer_id')->textInput() ?>

  <?= $form->field($model, 'cancellation_reason')->textarea(['rows' => 6]) ?>

  <?= $form->field($model, 'open_date')->textInput() ?>

  <?= $form->field($model, 'paid_at')->textInput() ?>

  <?= $form->field($model, 'status')->textInput() ?>

  <?= $form->field($model, 'payment_status')->textInput() ?>

  <?= $form->field($model, 'is_reserved')->textInput() ?>

  <?= $form->field($model, 'is_deleted')->textInput() ?>

  <?= $form->field($model, 'cancelled_by')->textInput() ?>

  <?= $form->field($model, 'cancelled_at')->textInput() ?>

  <?= $form->field($model, 'created_at')->textInput() ?>

  <?= $form->field($model, 'updated_at')->textInput() ?>

  <?= $form->field($model, 'deleted_at')->textInput() ?>

  <?= $form->field($model, 'replacement')->textInput() ?>

  <?= $form->field($model, 'is_agent')->textInput() ?>

  <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>