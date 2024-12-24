<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CarBrandSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="car-brand-search">

  <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
  ]); ?>

  <?= $form->field($model, 'car_brand_id') ?>

  <?= $form->field($model, 'icon') ?>

  <?= $form->field($model, 'slug') ?>

  <?= $form->field($model, 'youtube_video_link') ?>

  <?= $form->field($model, 'status') ?>

  <?php // echo $form->field($model, 'is_deleted') 
  ?>

  <?php // echo $form->field($model, 'created_at') 
  ?>

  <?php // echo $form->field($model, 'updated_at') 
  ?>

  <?php // echo $form->field($model, 'deleted_at') 
  ?>

  <div class="form-group">
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>