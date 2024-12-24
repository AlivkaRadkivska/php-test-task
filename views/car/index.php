<?php

use app\models\Car;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CarSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-index">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
    <?= Html::a('Create Car', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <?php // echo $this->render('_search', ['model' => $searchModel]); 
  ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      'car_id',
      'car_model_id',
      // 'car_serie_id',
      // 'car_body_id',
      'company_id',
      'city_id',
      //'sales_tax_id',
      //'holiday_calculator_id',
      //'range_calculator_id',
      //'registration_number',
      //'photo',
      //'price_type',
      //'price_1',
      //'price_2',
      //'price_3_6',
      //'price_7_13',
      //'price_14_20',
      //'price_21_29',
      //'price_30_more',
      //'currency',
      //'price_partner_1',
      //'price_partner_2',
      //'price_partner_3_6',
      //'price_partner_7_13',
      //'price_partner_14_20',
      //'price_partner_21_29',
      //'price_partner_30_more',
      //'deposit',
      //'overlimit_charge',
      //'salik',
      //'age_restriction',
      //'driving_licence_restriction',
      //'free_delivery_dubai',
      //'km_included_per_day',
      //'km_included_per_month',
      //'youtube_video_link',
      //'min_day_reservation',
      //'attribute_year',
      //'attribute_tinted',
      //'attribute_max_speed',
      //'attribute_0_100',
      //'attribute_number_of_seats',
      //'attribute_horsepower',
      //'attribute_engine',
      //'attribute_transmission',
      //'attribute_mileage',
      //'attribute_sm_bag',
      //'attribute_lg_bag',
      //'attribute_doors',
      //'features:ntext',
      //'exterior_condition',
      //'interior_condition',
      //'engine_suspention_condition',
      //'insurance',
      //'insurance_amount',
      //'insurance_default:ntext',
      //'insurance_cdw:ntext',
      //'insurance_default_desc:ntext',
      //'insurance_cdw_desc:ntext',
      //'aiport_charge',
      //'complete',
      //'status',
      //'is_deleted',
      //'message_color',
      //'message_title',
      //'message_text',
      //'created_at',
      //'updated_at',
      //'deleted_at',
      //'sort_time',
      //'longitude',
      //'latitude',
      //'was_migrated',
      //'was_migrated_at',
      //'from_carsss',
      //'no_deposit_needed',
      //'attribute_engine_type',
      //'with_owner',
      //'in_abu_dhabi',
      [
        'class' => ActionColumn::className(),
        'urlCreator' => function ($action, Car $model, $key, $index, $column) {
          return Url::toRoute([$action, 'car_id' => $model->car_id]);
        }
      ],
    ],
  ]); ?>


</div>