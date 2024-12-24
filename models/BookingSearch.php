<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Booking;

/**
 * BookingSearch represents the model behind the search form of `app\models\Booking`.
 */
class BookingSearch extends Booking
{
  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['booking_id', 'uid', 'car_id', 'user_id', 'added_by', 'company_id', 'agent_id', 'sales', 'pickup_driver', 'drop_driver', 'send_sms_to_drivers', 'send_sms_to_me', 'city_id', 'cancellation_answer_id', 'open_date', 'status', 'payment_status', 'is_reserved', 'is_deleted', 'cancelled_by', 'replacement', 'is_agent'], 'integer'],
      [['source', 'other', 'direct', 'start_date', 'pickup_location', 'pickup_place_id', 'pickup_driver_note', 'end_date', 'drop_location', 'drop_place_id', 'drop_driver_note', 'currency_id', 'client_full_name', 'special_request', 'cancellation_reason', 'paid_at', 'cancelled_at', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
      [['pickup_latitude', 'pickup_longitude', 'drop_latitude', 'drop_longitude', 'total_amount'], 'number'],
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
    $query = Booking::find();

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
      'booking_id' => $this->booking_id,
      'uid' => $this->uid,
      'car_id' => $this->car_id,
      'user_id' => $this->user_id,
      'added_by' => $this->added_by,
      'company_id' => $this->company_id,
      'agent_id' => $this->agent_id,
      'sales' => $this->sales,
      'start_date' => $this->start_date,
      'pickup_latitude' => $this->pickup_latitude,
      'pickup_longitude' => $this->pickup_longitude,
      'pickup_driver' => $this->pickup_driver,
      'end_date' => $this->end_date,
      'drop_latitude' => $this->drop_latitude,
      'drop_longitude' => $this->drop_longitude,
      'drop_driver' => $this->drop_driver,
      'send_sms_to_drivers' => $this->send_sms_to_drivers,
      'send_sms_to_me' => $this->send_sms_to_me,
      'total_amount' => $this->total_amount,
      'city_id' => $this->city_id,
      'cancellation_answer_id' => $this->cancellation_answer_id,
      'open_date' => $this->open_date,
      'paid_at' => $this->paid_at,
      'status' => $this->status,
      'payment_status' => $this->payment_status,
      'is_reserved' => $this->is_reserved,
      'is_deleted' => $this->is_deleted,
      'cancelled_by' => $this->cancelled_by,
      'cancelled_at' => $this->cancelled_at,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
      'deleted_at' => $this->deleted_at,
      'replacement' => $this->replacement,
      'is_agent' => $this->is_agent,
    ]);

    $query->andFilterWhere(['like', 'source', $this->source])
      ->andFilterWhere(['like', 'other', $this->other])
      ->andFilterWhere(['like', 'direct', $this->direct])
      ->andFilterWhere(['like', 'pickup_location', $this->pickup_location])
      ->andFilterWhere(['like', 'pickup_place_id', $this->pickup_place_id])
      ->andFilterWhere(['like', 'pickup_driver_note', $this->pickup_driver_note])
      ->andFilterWhere(['like', 'drop_location', $this->drop_location])
      ->andFilterWhere(['like', 'drop_place_id', $this->drop_place_id])
      ->andFilterWhere(['like', 'drop_driver_note', $this->drop_driver_note])
      ->andFilterWhere(['like', 'currency_id', $this->currency_id])
      ->andFilterWhere(['like', 'client_full_name', $this->client_full_name])
      ->andFilterWhere(['like', 'special_request', $this->special_request])
      ->andFilterWhere(['like', 'cancellation_reason', $this->cancellation_reason]);

    return $dataProvider;
  }
}
