<?php

use yii\widgets\LinkPager;

$this->title = "Car $carDetails->car_id bookings";
?>


<div class="container">
  <div>
    <h1>Car #<?= $carDetails->car_id ?></h1>
    <div class="row">
      <p class="col-md-3">Register number: <?= $carDetails->registration_number ?></p>
      <p class="col-md-3">Name: <?= $carDetails->carTranslation ? $carDetails->carTranslation->title : 'N/A' ?></p>
      <p class="col-md-3">Car model: <?= $carDetails->carModelTranslation ? $carDetails->carModelTranslation->name : 'N/A' ?></p>
      <p class="col-md-3">Year: <?= $carDetails->attribute_year ?></p>
    </div>
    <div class="row">
      <p class="col-md-3">Price type: <?= $carDetails->price_type ?></p>
      <p class="col-md-3">Engine: <?= $carDetails->attribute_engine ?></p>
      <p class="col-md-3">Max speed: <?= $carDetails->attribute_max_speed ?></p>
      <p class="col-md-3">Horsepower: <?= $carDetails->attribute_horsepower ?></p>
    </div>
  </div>


  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Booking id</th>
        <th>Start date</th>
        <th>End date</th>
        <th>Has been rent for</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dataProvider->models as $index => $model): ?>
        <tr>
          <td><?= $dataProvider->pagination->page * $dataProvider->pagination->pageSize + $index + 1 ?></td>
          <td><?= $model->booking_id ?></td>
          <td><?= $model->start_date ?></td>
          <td><?= $model->end_date ?></td>
          <td><?= $model->hours_in_rent ?> h</td>
          <td><?= $model->status ? 'active' : '-' ?></td>
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