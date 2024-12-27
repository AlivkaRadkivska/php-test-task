<?php

use yii\helpers\Html;
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


<p class="lead">Filtration and Searching</p>
<?php
$form = ActiveForm::begin([
  'method' => 'get',
  'action' => ['index'],
  'options' => ['class' => 'row']
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
    'placeholder' => 'Search by Registration Number',
    'class' => 'form-control'
  ]) ?>
</div>

<div class="col-md-4">
  <?= $form->field($model, 'active_booking')->checkbox([
    'label' => 'Only active bookings',
    'checked' => $model->active_booking,
  ]) ?>
</div>

<div class="col-md-4">
  <?= $form->field($model, 'active_car')->checkbox([
    'label' => 'Only active cars',
    'checked' => $model->active_car,
  ]) ?>
</div>

<div class="col-md-4">
  <?= $form->field($model, 'existing_car')->checkbox([
    'label' => 'Only existing cars',
    'checked' => $model->existing_car,
  ]) ?>
</div>

<div class="form-group flex-auto justify-content-end">
  <?= Html::submitButton('Filter', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>



<div class="site-index">
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
        <th>Service</th>
        <th>Free</th>
        <th>All</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dataProvider->models as $index => $model): ?>
        <tr>
          <td><?= $dataProvider->pagination->page * 20 + $index + 1 ?></td>
          <td><?= $model->car_id ?></td>
          <td><?= $model->car->registration_number ?></td>
          <td><?= $model->car->carTranslation ? $model->car->carTranslation->title : 'N/A' ?></td>
          <td><?= $model->car->carModelTranslation ? $model->car->carModelTranslation->name : 'N/A' ?></td>
          <td><?= $model->busy_days ?></td>
          <td><?= $model->service_days ?></td>
          <td><?= $daysInMonth - $model->busy_days - $model->service_days ?></td>
          <td><?= $daysInMonth ?></td>
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