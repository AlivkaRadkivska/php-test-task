<?php

use yii\helpers\Html;
use yii\helpers\Url;

$calculationResult = $model->getDaysCalculations($year, $month, json_decode($model->rental_dates, true));
?>

<tr>
  <td><?= $index ?></td>
  <td><?= $model->car_id ?></td>
  <td><?= $model->car->registration_number ?></td>
  <td><?= $model->car->carTranslation ? $model->car->carTranslation->title : 'N/A' ?></td>
  <td><?= $model->car->carModelTranslation ? $model->car->carModelTranslation->name : 'N/A' ?></td>
  <td><?= $calculationResult['free_days'] ?></td>
  <td><?= $calculationResult['service_days'] ?></td>
  <td><?= $calculationResult['busy_days'] ?></td>
  <td><?= $calculationResult['all_days'] ?></td>
  <td>
    <?= Html::a('Go', [
      Url::toRoute(['site/view', 'car_id' => $model->car_id])
    ]) ?>
  </td>
</tr>