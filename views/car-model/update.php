<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CarModel $model */

$this->title = 'Update Car Model: ' . $model->car_model_id;
$this->params['breadcrumbs'][] = ['label' => 'Car Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->car_model_id, 'url' => ['view', 'car_model_id' => $model->car_model_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car-model-update">

  <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>