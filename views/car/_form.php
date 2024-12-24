<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Car $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="car-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'car_id')->textInput() ?>

  <?= $form->field($model, 'car_model_id')->textInput() ?>

  <?= $form->field($model, 'car_serie_id')->textInput() ?>

  <?= $form->field($model, 'car_body_id')->textInput() ?>

  <?= $form->field($model, 'company_id')->textInput() ?>

  <?= $form->field($model, 'city_id')->textInput() ?>

  <?= $form->field($model, 'sales_tax_id')->textInput() ?>

  <?= $form->field($model, 'holiday_calculator_id')->textInput() ?>

  <?= $form->field($model, 'range_calculator_id')->textInput() ?>

  <?= $form->field($model, 'registration_number')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'price_type')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'price_1')->textInput() ?>

  <?= $form->field($model, 'price_2')->textInput() ?>

  <?= $form->field($model, 'price_3_6')->textInput() ?>

  <?= $form->field($model, 'price_7_13')->textInput() ?>

  <?= $form->field($model, 'price_14_20')->textInput() ?>

  <?= $form->field($model, 'price_21_29')->textInput() ?>

  <?= $form->field($model, 'price_30_more')->textInput() ?>

  <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'price_partner_1')->textInput() ?>

  <?= $form->field($model, 'price_partner_2')->textInput() ?>

  <?= $form->field($model, 'price_partner_3_6')->textInput() ?>

  <?= $form->field($model, 'price_partner_7_13')->textInput() ?>

  <?= $form->field($model, 'price_partner_14_20')->textInput() ?>

  <?= $form->field($model, 'price_partner_21_29')->textInput() ?>

  <?= $form->field($model, 'price_partner_30_more')->textInput() ?>

  <?= $form->field($model, 'deposit')->textInput() ?>

  <?= $form->field($model, 'overlimit_charge')->textInput() ?>

  <?= $form->field($model, 'salik')->textInput() ?>

  <?= $form->field($model, 'age_restriction')->textInput() ?>

  <?= $form->field($model, 'driving_licence_restriction')->textInput() ?>

  <?= $form->field($model, 'free_delivery_dubai')->textInput() ?>

  <?= $form->field($model, 'km_included_per_day')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'km_included_per_month')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'youtube_video_link')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'min_day_reservation')->textInput() ?>

  <?= $form->field($model, 'attribute_year')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'attribute_tinted')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'attribute_max_speed')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'attribute_0_100')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'attribute_number_of_seats')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'attribute_horsepower')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'attribute_engine')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'attribute_transmission')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'attribute_mileage')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'attribute_sm_bag')->textInput() ?>

  <?= $form->field($model, 'attribute_lg_bag')->textInput() ?>

  <?= $form->field($model, 'attribute_doors')->textInput() ?>

  <?= $form->field($model, 'features')->textarea(['rows' => 6]) ?>

  <?= $form->field($model, 'exterior_condition')->textInput() ?>

  <?= $form->field($model, 'interior_condition')->textInput() ?>

  <?= $form->field($model, 'engine_suspention_condition')->textInput() ?>

  <?= $form->field($model, 'insurance')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'insurance_amount')->textInput() ?>

  <?= $form->field($model, 'insurance_default')->textarea(['rows' => 6]) ?>

  <?= $form->field($model, 'insurance_cdw')->textarea(['rows' => 6]) ?>

  <?= $form->field($model, 'insurance_default_desc')->textarea(['rows' => 6]) ?>

  <?= $form->field($model, 'insurance_cdw_desc')->textarea(['rows' => 6]) ?>

  <?= $form->field($model, 'aiport_charge')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'complete')->textInput() ?>

  <?= $form->field($model, 'status')->textInput() ?>

  <?= $form->field($model, 'is_deleted')->textInput() ?>

  <?= $form->field($model, 'message_color')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'message_title')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'message_text')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'created_at')->textInput() ?>

  <?= $form->field($model, 'updated_at')->textInput() ?>

  <?= $form->field($model, 'deleted_at')->textInput() ?>

  <?= $form->field($model, 'sort_time')->textInput() ?>

  <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'was_migrated')->textInput() ?>

  <?= $form->field($model, 'was_migrated_at')->textInput() ?>

  <?= $form->field($model, 'from_carsss')->textInput() ?>

  <?= $form->field($model, 'no_deposit_needed')->textInput() ?>

  <?= $form->field($model, 'attribute_engine_type')->textInput() ?>

  <?= $form->field($model, 'with_owner')->textInput() ?>

  <?= $form->field($model, 'in_abu_dhabi')->textInput() ?>

  <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>