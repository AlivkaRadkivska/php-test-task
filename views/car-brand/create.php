<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CarBrand $model */

$this->title = 'Create Car Brand';
$this->params['breadcrumbs'][] = ['label' => 'Car Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-brand-create">

  <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>