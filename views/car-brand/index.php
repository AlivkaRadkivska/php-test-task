<?php

use app\models\CarBrand;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CarBrandSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Car Brands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-brand-index">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
    <?= Html::a('Create Car Brand', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <?php // echo $this->render('_search', ['model' => $searchModel]); 
  ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      'car_brand_id',
      'icon',
      'slug',
      'youtube_video_link',
      'status',
      //'is_deleted',
      //'created_at',
      //'updated_at',
      //'deleted_at',
      [
        'class' => ActionColumn::className(),
        'urlCreator' => function ($action, CarBrand $model, $key, $index, $column) {
          return Url::toRoute([$action, 'car_brand_id' => $model->car_brand_id]);
        }
      ],
    ],
  ]); ?>


</div>