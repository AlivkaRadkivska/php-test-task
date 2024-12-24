<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CarBrand $model */

$this->title = 'Update Car Brand: ' . $model->car_brand_id;
$this->params['breadcrumbs'][] = ['label' => 'Car Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->car_brand_id, 'url' => ['view', 'car_brand_id' => $model->car_brand_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car-brand-update">

  <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>