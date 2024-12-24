<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CarBrand $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="car-brand-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'car_brand_id')->textInput() ?>

  <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'youtube_video_link')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'status')->textInput() ?>

  <?= $form->field($model, 'is_deleted')->textInput() ?>

  <?= $form->field($model, 'created_at')->textInput() ?>

  <?= $form->field($model, 'updated_at')->textInput() ?>

  <?= $form->field($model, 'deleted_at')->textInput() ?>

  <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>