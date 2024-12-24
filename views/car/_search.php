<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CarSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="car-search">

  <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
  ]); ?>

  <?= $form->field($model, 'car_id') ?>

  <?= $form->field($model, 'car_model_id') ?>

  <?= $form->field($model, 'car_serie_id') ?>

  <?= $form->field($model, 'car_body_id') ?>

  <?= $form->field($model, 'company_id') ?>

  <?php // echo $form->field($model, 'city_id') 
  ?>

  <?php // echo $form->field($model, 'sales_tax_id') 
  ?>

  <?php // echo $form->field($model, 'holiday_calculator_id') 
  ?>

  <?php // echo $form->field($model, 'range_calculator_id') 
  ?>

  <?php // echo $form->field($model, 'registration_number') 
  ?>

  <?php // echo $form->field($model, 'photo') 
  ?>

  <?php // echo $form->field($model, 'price_type') 
  ?>

  <?php // echo $form->field($model, 'price_1') 
  ?>

  <?php // echo $form->field($model, 'price_2') 
  ?>

  <?php // echo $form->field($model, 'price_3_6') 
  ?>

  <?php // echo $form->field($model, 'price_7_13') 
  ?>

  <?php // echo $form->field($model, 'price_14_20') 
  ?>

  <?php // echo $form->field($model, 'price_21_29') 
  ?>

  <?php // echo $form->field($model, 'price_30_more') 
  ?>

  <?php // echo $form->field($model, 'currency') 
  ?>

  <?php // echo $form->field($model, 'price_partner_1') 
  ?>

  <?php // echo $form->field($model, 'price_partner_2') 
  ?>

  <?php // echo $form->field($model, 'price_partner_3_6') 
  ?>

  <?php // echo $form->field($model, 'price_partner_7_13') 
  ?>

  <?php // echo $form->field($model, 'price_partner_14_20') 
  ?>

  <?php // echo $form->field($model, 'price_partner_21_29') 
  ?>

  <?php // echo $form->field($model, 'price_partner_30_more') 
  ?>

  <?php // echo $form->field($model, 'deposit') 
  ?>

  <?php // echo $form->field($model, 'overlimit_charge') 
  ?>

  <?php // echo $form->field($model, 'salik') 
  ?>

  <?php // echo $form->field($model, 'age_restriction') 
  ?>

  <?php // echo $form->field($model, 'driving_licence_restriction') 
  ?>

  <?php // echo $form->field($model, 'free_delivery_dubai') 
  ?>

  <?php // echo $form->field($model, 'km_included_per_day') 
  ?>

  <?php // echo $form->field($model, 'km_included_per_month') 
  ?>

  <?php // echo $form->field($model, 'youtube_video_link') 
  ?>

  <?php // echo $form->field($model, 'min_day_reservation') 
  ?>

  <?php // echo $form->field($model, 'attribute_year') 
  ?>

  <?php // echo $form->field($model, 'attribute_tinted') 
  ?>

  <?php // echo $form->field($model, 'attribute_max_speed') 
  ?>

  <?php // echo $form->field($model, 'attribute_0_100') 
  ?>

  <?php // echo $form->field($model, 'attribute_number_of_seats') 
  ?>

  <?php // echo $form->field($model, 'attribute_horsepower') 
  ?>

  <?php // echo $form->field($model, 'attribute_engine') 
  ?>

  <?php // echo $form->field($model, 'attribute_transmission') 
  ?>

  <?php // echo $form->field($model, 'attribute_mileage') 
  ?>

  <?php // echo $form->field($model, 'attribute_sm_bag') 
  ?>

  <?php // echo $form->field($model, 'attribute_lg_bag') 
  ?>

  <?php // echo $form->field($model, 'attribute_doors') 
  ?>

  <?php // echo $form->field($model, 'features') 
  ?>

  <?php // echo $form->field($model, 'exterior_condition') 
  ?>

  <?php // echo $form->field($model, 'interior_condition') 
  ?>

  <?php // echo $form->field($model, 'engine_suspention_condition') 
  ?>

  <?php // echo $form->field($model, 'insurance') 
  ?>

  <?php // echo $form->field($model, 'insurance_amount') 
  ?>

  <?php // echo $form->field($model, 'insurance_default') 
  ?>

  <?php // echo $form->field($model, 'insurance_cdw') 
  ?>

  <?php // echo $form->field($model, 'insurance_default_desc') 
  ?>

  <?php // echo $form->field($model, 'insurance_cdw_desc') 
  ?>

  <?php // echo $form->field($model, 'aiport_charge') 
  ?>

  <?php // echo $form->field($model, 'complete') 
  ?>

  <?php // echo $form->field($model, 'status') 
  ?>

  <?php // echo $form->field($model, 'is_deleted') 
  ?>

  <?php // echo $form->field($model, 'message_color') 
  ?>

  <?php // echo $form->field($model, 'message_title') 
  ?>

  <?php // echo $form->field($model, 'message_text') 
  ?>

  <?php // echo $form->field($model, 'created_at') 
  ?>

  <?php // echo $form->field($model, 'updated_at') 
  ?>

  <?php // echo $form->field($model, 'deleted_at') 
  ?>

  <?php // echo $form->field($model, 'sort_time') 
  ?>

  <?php // echo $form->field($model, 'longitude') 
  ?>

  <?php // echo $form->field($model, 'latitude') 
  ?>

  <?php // echo $form->field($model, 'was_migrated') 
  ?>

  <?php // echo $form->field($model, 'was_migrated_at') 
  ?>

  <?php // echo $form->field($model, 'from_carsss') 
  ?>

  <?php // echo $form->field($model, 'no_deposit_needed') 
  ?>

  <?php // echo $form->field($model, 'attribute_engine_type') 
  ?>

  <?php // echo $form->field($model, 'with_owner') 
  ?>

  <?php // echo $form->field($model, 'in_abu_dhabi') 
  ?>

  <div class="form-group">
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>