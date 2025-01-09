<?php

use yii\widgets\LinkPager;

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
  <?= $this->render('template-parts/_booking_filtering', [
    'model' => $bookingFilterModel,
    'months' => $months,
  ]) ?>

  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th colspan="5">Car Details</th>
        <th colspan="5"><?= $months[$bookingFilterModel->month] . " " . $bookingFilterModel->year ?></th>
      </tr>
      <tr>
        <th>#</th>
        <th>Car ID</th>
        <th>Registration Number</th>
        <th>Car Name</th>
        <th>Car Model</th>
        <th>Free</th>
        <th>Service</th>
        <th>Busy</th>
        <th>All</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dataProvider->models as $index => $bookingModel): ?>
        <?= $this->render('template-parts/_booking_row', [
          'index' => $dataProvider->pagination->page * $dataProvider->pagination->pageSize + $index + 1,
          'year' => $bookingFilterModel->year,
          'month' => $bookingFilterModel->month,
          'model' => $bookingModel,
        ]) ?>
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