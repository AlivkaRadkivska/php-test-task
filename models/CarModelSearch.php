<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CarModel;

/**
 * CarModelSearch represents the model behind the search form of `app\models\CarModel`.
 */
class CarModelSearch extends CarModel
{
  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['car_model_id', 'car_brand_id', 'car_body_id', 'attribute_doors', 'status', 'is_deleted', 'attribute_engine_type'], 'integer'],
      [['slug', 'type', 'attribute_0_100', 'attribute_max_speed', 'attribute_number_of_seats', 'attribute_horsepower', 'attribute_engine', 'attribute_transmission', 'attribute_interior_color', 'features', 'youtube_video_link', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
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
    $query = CarModel::find();

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
      'car_model_id' => $this->car_model_id,
      'car_brand_id' => $this->car_brand_id,
      'car_body_id' => $this->car_body_id,
      'attribute_doors' => $this->attribute_doors,
      'status' => $this->status,
      'is_deleted' => $this->is_deleted,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
      'deleted_at' => $this->deleted_at,
      'attribute_engine_type' => $this->attribute_engine_type,
    ]);

    $query->andFilterWhere(['like', 'slug', $this->slug])
      ->andFilterWhere(['like', 'type', $this->type])
      ->andFilterWhere(['like', 'attribute_0_100', $this->attribute_0_100])
      ->andFilterWhere(['like', 'attribute_max_speed', $this->attribute_max_speed])
      ->andFilterWhere(['like', 'attribute_number_of_seats', $this->attribute_number_of_seats])
      ->andFilterWhere(['like', 'attribute_horsepower', $this->attribute_horsepower])
      ->andFilterWhere(['like', 'attribute_engine', $this->attribute_engine])
      ->andFilterWhere(['like', 'attribute_transmission', $this->attribute_transmission])
      ->andFilterWhere(['like', 'attribute_interior_color', $this->attribute_interior_color])
      ->andFilterWhere(['like', 'features', $this->features])
      ->andFilterWhere(['like', 'youtube_video_link', $this->youtube_video_link]);

    return $dataProvider;
  }
}
