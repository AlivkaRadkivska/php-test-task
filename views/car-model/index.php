<?php

use app\models\CarModel;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CarModelSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Car Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-model-index">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
    <?= Html::a('Create Car Model', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <?php // echo $this->render('_search', ['model' => $searchModel]); 
  ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      'car_model_id',
      'car_brand_id',
      'car_body_id',
      'slug',
      'type',
      //'attribute_0_100',
      //'attribute_max_speed',
      //'attribute_number_of_seats',
      //'attribute_horsepower',
      //'attribute_engine',
      //'attribute_transmission',
      //'attribute_interior_color',
      //'attribute_doors',
      //'features:ntext',
      //'youtube_video_link',
      //'status',
      //'is_deleted',
      //'created_at',
      //'updated_at',
      //'deleted_at',
      //'attribute_engine_type',
      [
        'class' => ActionColumn::className(),
        'urlCreator' => function ($action, CarModel $model, $key, $index, $column) {
          return Url::toRoute([$action, 'car_model_id' => $model->car_model_id]);
        }
      ],
    ],
  ]); ?>


</div>