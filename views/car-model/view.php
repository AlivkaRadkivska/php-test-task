<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\CarModel $model */

$this->title = $model->car_model_id;
$this->params['breadcrumbs'][] = ['label' => 'Car Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="car-model-view">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
    <?= Html::a('Update', ['update', 'car_model_id' => $model->car_model_id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'car_model_id' => $model->car_model_id], [
      'class' => 'btn btn-danger',
      'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
      ],
    ]) ?>
  </p>

  <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
      'car_model_id',
      'car_brand_id',
      'car_body_id',
      'slug',
      'type',
      'attribute_0_100',
      'attribute_max_speed',
      'attribute_number_of_seats',
      'attribute_horsepower',
      'attribute_engine',
      'attribute_transmission',
      'attribute_interior_color',
      'attribute_doors',
      'features:ntext',
      'youtube_video_link',
      'status',
      'is_deleted',
      'created_at',
      'updated_at',
      'deleted_at',
      'attribute_engine_type',
    ],
  ]) ?>

</div>