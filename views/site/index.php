<?php

use yii\grid\GridView;

$this->title = 'Booking statistic';
?>
<div class="site-index">
  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'options' => [
      'tag' => 'div',
      'class' => 'list-wrapper',
    ],
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],
      'car_id',
      [
        'attribute' => 'registration_number',
        'value' => 'car.registration_number',
      ],
      [
        'attribute' => 'car_name',
        'value' => function ($model) {
          return $model->car->carTranslation ? $model->car->carTranslation->title : 'N/A';
        },
      ],
      [
        'attribute' => 'car_model',
        'value' => function ($model) {
          return $model->car->carModelTranslation ? $model->car->carModelTranslation->name : 'N/A';
        },
      ],
      [
        'attribute' => 'busy_days',
        'value' => function ($model) {
          return $model->busy_days;
        },
      ]
    ],

    'layout' => "\n{items}\n{pager}",
  ]); ?>
</div>