<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;

$this->title = 'Booking statistic';

$months = [
  '01' => 'January',
  '02' => 'February',
  '03' => 'March',
  '04' => 'April',
  '05' => 'May',
  '06' => 'June',
  '07' => 'July',
  '08' => 'August',
  '09' => 'September',
  '10' => 'October',
  '11' => 'November',
  '12' => 'December',
]
?>


<div class="container">
  <p class="lead">Filtration and Searching</p>
  <?php
  $form = ActiveForm::begin([
    'method' => 'get',
    'action' => ['index'],
    'options' => ['class' => 'form-group row align-items-center']
  ]); ?>

  <div class="col-md-4">
    <?= $form->field($model, 'year')->dropDownList(
      array_combine(range(date('Y') - 10, date('Y') + 10), range(date('Y') - 10, date('Y') + 10)),
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



  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th colspan="5">Car Details</th>
        <th colspan="4"><?= $months[$model->month] . " " . $model->year ?></th>
      </tr>
      <tr>
        <th>#</th>
        <th>Car ID</th>
        <th>Registration Number</th>
        <th>Car Name</th>
        <th>Car Model</th>
        <th>Busy</th>
        <th>Free</th>
        <th>All</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dataProvider->models as $index => $bookingModel): ?>
        <tr>
          <td><?= $dataProvider->pagination->page * $dataProvider->pagination->pageSize + $index + 1 ?></td>
          <td><?= $bookingModel->car_id ?></td>
          <td><?= $bookingModel->car->registration_number ?></td>
          <td><?= $bookingModel->car->carTranslation ? $bookingModel->car->carTranslation->title : 'N/A' ?></td>
          <td><?= $bookingModel->car->carModelTranslation ? $bookingModel->car->carModelTranslation->name : 'N/A' ?></td>
          <td><?= $busyDays = $bookingModel->getBusyDaysWithinMonth($model->year, $model->month, json_decode($bookingModel->rental_dates, true)) ?></td>
          <td><?= $daysInMonth - $busyDays ?></td>
          <td><?= $daysInMonth ?></td>
          <td>
            <?= HTML::a('Go', [
              Url::toRoute(['site/view', 'car_id' => $bookingModel->car_id])
            ]) ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <div class="row">
    <?= LinkPager::widget([
      'pagination' => $dataProvider->pagination,
      'options' => ['class' => 'pagination gap-1 flex-auto justify-content-center align-items-center'],
      'linkOptions' => ['class' => 'page-link'],
    ]) ?>
  </div>
</div>