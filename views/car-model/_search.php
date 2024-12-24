<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CarModelSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="car-model-search">

  <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
  ]); ?>

  <?= $form->field($model, 'car_model_id') ?>

  <?= $form->field($model, 'car_brand_id') ?>

  <?= $form->field($model, 'car_body_id') ?>

  <?= $form->field($model, 'slug') ?>

  <?= $form->field($model, 'type') ?>

  <?php // echo $form->field($model, 'attribute_0_100') 
  ?>

  <?php // echo $form->field($model, 'attribute_max_speed') 
  ?>

  <?php // echo $form->field($model, 'attribute_number_of_seats') 
  ?>

  <?php // echo $form->field($model, 'attribute_horsepower') 
  ?>

  <?php // echo $form->field($model, 'attribute_engine') 
  ?>

  <?php // echo $form->field($model, 'attribute_transmission') 
  ?>

  <?php // echo $form->field($model, 'attribute_interior_color') 
  ?>

  <?php // echo $form->field($model, 'attribute_doors') 
  ?>

  <?php // echo $form->field($model, 'features') 
  ?>

  <?php // echo $form->field($model, 'youtube_video_link') 
  ?>

  <?php // echo $form->field($model, 'status') 
  ?>

  <?php // echo $form->field($model, 'is_deleted') 
  ?>

  <?php // echo $form->field($model, 'created_at') 
  ?>

  <?php // echo $form->field($model, 'updated_at') 
  ?>

  <?php // echo $form->field($model, 'deleted_at') 
  ?>

  <?php // echo $form->field($model, 'attribute_engine_type') 
  ?>

  <div class="form-group">
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>