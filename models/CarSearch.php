<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Car;

/**
 * CarSearch represents the model behind the search form of `app\models\Car`.
 */
class CarSearch extends Car
{
  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['car_id', 'car_model_id', 'car_serie_id', 'car_body_id', 'company_id', 'city_id', 'sales_tax_id', 'holiday_calculator_id', 'range_calculator_id', 'deposit', 'salik', 'age_restriction', 'driving_licence_restriction', 'free_delivery_dubai', 'min_day_reservation', 'attribute_sm_bag', 'attribute_lg_bag', 'attribute_doors', 'exterior_condition', 'interior_condition', 'engine_suspention_condition', 'insurance_amount', 'complete', 'status', 'is_deleted', 'was_migrated', 'from_carsss', 'no_deposit_needed', 'attribute_engine_type', 'with_owner', 'in_abu_dhabi'], 'integer'],
      [['registration_number', 'photo', 'price_type', 'currency', 'km_included_per_day', 'km_included_per_month', 'youtube_video_link', 'attribute_year', 'attribute_tinted', 'attribute_max_speed', 'attribute_0_100', 'attribute_number_of_seats', 'attribute_horsepower', 'attribute_engine', 'attribute_transmission', 'attribute_mileage', 'features', 'insurance', 'insurance_default', 'insurance_cdw', 'insurance_default_desc', 'insurance_cdw_desc', 'aiport_charge', 'message_color', 'message_title', 'message_text', 'created_at', 'updated_at', 'deleted_at', 'sort_time', 'longitude', 'latitude', 'was_migrated_at'], 'safe'],
      [['price_1', 'price_2', 'price_3_6', 'price_7_13', 'price_14_20', 'price_21_29', 'price_30_more', 'price_partner_1', 'price_partner_2', 'price_partner_3_6', 'price_partner_7_13', 'price_partner_14_20', 'price_partner_21_29', 'price_partner_30_more', 'overlimit_charge'], 'number'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function scenarios()
  {
    // bypass scenarios() implementation in the parent class
    return Model::scenarios();
  }

  /**
   * Creates data provider instance with search query applied
   *
   * @param array $params
   *
   * @return ActiveDataProvider
   */
  public function search($params)
  {
    $query = Car::find();

    // add conditions that should always apply here

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    $this->load($params);

    if (!$this->validate()) {
      // uncomment the following line if you do not want to return any records when validation fails
      // $query->where('0=1');
      return $dataProvider;
    }

    // grid filtering conditions
    $query->andFilterWhere([
      'car_id' => $this->car_id,
      'car_model_id' => $this->car_model_id,
      'car_serie_id' => $this->car_serie_id,
      'car_body_id' => $this->car_body_id,
      'company_id' => $this->company_id,
      'city_id' => $this->city_id,
      'sales_tax_id' => $this->sales_tax_id,
      'holiday_calculator_id' => $this->holiday_calculator_id,
      'range_calculator_id' => $this->range_calculator_id,
      'price_1' => $this->price_1,
      'price_2' => $this->price_2,
      'price_3_6' => $this->price_3_6,
      'price_7_13' => $this->price_7_13,
      'price_14_20' => $this->price_14_20,
      'price_21_29' => $this->price_21_29,
      'price_30_more' => $this->price_30_more,
      'price_partner_1' => $this->price_partner_1,
      'price_partner_2' => $this->price_partner_2,
      'price_partner_3_6' => $this->price_partner_3_6,
      'price_partner_7_13' => $this->price_partner_7_13,
      'price_partner_14_20' => $this->price_partner_14_20,
      'price_partner_21_29' => $this->price_partner_21_29,
      'price_partner_30_more' => $this->price_partner_30_more,
      'deposit' => $this->deposit,
      'overlimit_charge' => $this->overlimit_charge,
      'salik' => $this->salik,
      'age_restriction' => $this->age_restriction,
      'driving_licence_restriction' => $this->driving_licence_restriction,
      'free_delivery_dubai' => $this->free_delivery_dubai,
      'min_day_reservation' => $this->min_day_reservation,
      'attribute_sm_bag' => $this->attribute_sm_bag,
      'attribute_lg_bag' => $this->attribute_lg_bag,
      'attribute_doors' => $this->attribute_doors,
      'exterior_condition' => $this->exterior_condition,
      'interior_condition' => $this->interior_condition,
      'engine_suspention_condition' => $this->engine_suspention_condition,
      'insurance_amount' => $this->insurance_amount,
      'complete' => $this->complete,
      'status' => $this->status,
      'is_deleted' => $this->is_deleted,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
      'deleted_at' => $this->deleted_at,
      'sort_time' => $this->sort_time,
      'was_migrated' => $this->was_migrated,
      'was_migrated_at' => $this->was_migrated_at,
      'from_carsss' => $this->from_carsss,
      'no_deposit_needed' => $this->no_deposit_needed,
      'attribute_engine_type' => $this->attribute_engine_type,
      'with_owner' => $this->with_owner,
      'in_abu_dhabi' => $this->in_abu_dhabi,
    ]);

    $query->andFilterWhere(['like', 'registration_number', $this->registration_number])
      ->andFilterWhere(['like', 'photo', $this->photo])
      ->andFilterWhere(['like', 'price_type', $this->price_type])
      ->andFilterWhere(['like', 'currency', $this->currency])
      ->andFilterWhere(['like', 'km_included_per_day', $this->km_included_per_day])
      ->andFilterWhere(['like', 'km_included_per_month', $this->km_included_per_month])
      ->andFilterWhere(['like', 'youtube_video_link', $this->youtube_video_link])
      ->andFilterWhere(['like', 'attribute_year', $this->attribute_year])
      ->andFilterWhere(['like', 'attribute_tinted', $this->attribute_tinted])
      ->andFilterWhere(['like', 'attribute_max_speed', $this->attribute_max_speed])
      ->andFilterWhere(['like', 'attribute_0_100', $this->attribute_0_100])
      ->andFilterWhere(['like', 'attribute_number_of_seats', $this->attribute_number_of_seats])
      ->andFilterWhere(['like', 'attribute_horsepower', $this->attribute_horsepower])
      ->andFilterWhere(['like', 'attribute_engine', $this->attribute_engine])
      ->andFilterWhere(['like', 'attribute_transmission', $this->attribute_transmission])
      ->andFilterWhere(['like', 'attribute_mileage', $this->attribute_mileage])
      ->andFilterWhere(['like', 'features', $this->features])
      ->andFilterWhere(['like', 'insurance', $this->insurance])
      ->andFilterWhere(['like', 'insurance_default', $this->insurance_default])
      ->andFilterWhere(['like', 'insurance_cdw', $this->insurance_cdw])
      ->andFilterWhere(['like', 'insurance_default_desc', $this->insurance_default_desc])
      ->andFilterWhere(['like', 'insurance_cdw_desc', $this->insurance_cdw_desc])
      ->andFilterWhere(['like', 'aiport_charge', $this->aiport_charge])
      ->andFilterWhere(['like', 'message_color', $this->message_color])
      ->andFilterWhere(['like', 'message_title', $this->message_title])
      ->andFilterWhere(['like', 'message_text', $this->message_text])
      ->andFilterWhere(['like', 'longitude', $this->longitude])
      ->andFilterWhere(['like', 'latitude', $this->latitude]);

    return $dataProvider;
  }
}
