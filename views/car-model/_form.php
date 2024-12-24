<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CarModel $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="car-model-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'car_model_id')->textInput() ?>

  <?= $form->field($model, 'car_brand_id')->textInput() ?>

  <?= $form->field($model, 'car_body_id')->textInput() ?>

  <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'attribute_0_100')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'attribute_max_speed')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'attribute_number_of_seats')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'attribute_horsepower')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'attribute_engine')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'attribute_transmission')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'attribute_interior_color')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'attribute_doors')->textInput() ?>

  <?= $form->field($model, 'features')->textarea(['rows' => 6]) ?>

  <?= $form->field($model, 'youtube_video_link')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'status')->textInput() ?>

  <?= $form->field($model, 'is_deleted')->textInput() ?>

  <?= $form->field($model, 'created_at')->textInput() ?>

  <?= $form->field($model, 'updated_at')->textInput() ?>

  <?= $form->field($model, 'deleted_at')->textInput() ?>

  <?= $form->field($model, 'attribute_engine_type')->textInput() ?>

  <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>