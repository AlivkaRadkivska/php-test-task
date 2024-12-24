<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\CarBrand $model */

$this->title = $model->car_brand_id;
$this->params['breadcrumbs'][] = ['label' => 'Car Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="car-brand-view">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
    <?= Html::a('Update', ['update', 'car_brand_id' => $model->car_brand_id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'car_brand_id' => $model->car_brand_id], [
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
      'car_brand_id',
      'icon',
      'slug',
      'youtube_video_link',
      'status',
      'is_deleted',
      'created_at',
      'updated_at',
      'deleted_at',
    ],
  ]) ?>

</div>