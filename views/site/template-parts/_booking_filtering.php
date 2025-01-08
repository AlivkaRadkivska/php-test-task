<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<p class="lead">Filtration and Searching</p>
<?php $form = ActiveForm::begin([
  'method' => 'get',
  'action' => ['index'],
  'options' => ['class' => 'form-group row align-items-center']
]); ?>

<div class="col-md-4">
  <?= $form->field($model, 'year')->dropDownList(
    range(date('Y') - 10, date('Y') + 10),
    ['value' => $model->year, 'class' => 'form-control']
  ) ?>
</div>

<div class="col-md-4">
  <?= $form->field($model, 'month')->dropDownList($months, [
    'value' => $model->month,
    'class' => 'form-control'
  ]) ?>
</div>

<div class="col-md-4">
  <?= $form->field($model, 'registration_number')->textInput([
    'value' => $model->registration_number,
    'placeholder' => 'Search by registration number',
    'class' => 'form-control'
  ]) ?>
</div>

<div class="col-md-3">
  <?= $form->field($model, 'active_booking')->checkbox([
    'checked' => $model->active_booking ? true : null,
  ]) ?>
</div>

<div class="col-md-3">
  <?= $form->field($model, 'active_car')->checkbox([
    'checked' => $model->active_car ? true : null,
  ]) ?>
</div>

<div class="col-md-3">
  <?= $form->field($model, 'existing_car')->checkbox([
    'checked' => $model->existing_car ? true : null,
  ]) ?>
</div>

<div class="col-md-3">
  <?= Html::submitButton('Filter', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>