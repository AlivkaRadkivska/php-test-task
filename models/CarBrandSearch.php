<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CarBrand;

/**
 * CarBrandSearch represents the model behind the search form of `app\models\CarBrand`.
 */
class CarBrandSearch extends CarBrand
{
  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['car_brand_id', 'status', 'is_deleted'], 'integer'],
      [['icon', 'slug', 'youtube_video_link', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
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
    $query = CarBrand::find();

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
      'car_brand_id' => $this->car_brand_id,
      'status' => $this->status,
      'is_deleted' => $this->is_deleted,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
      'deleted_at' => $this->deleted_at,
    ]);

    $query->andFilterWhere(['like', 'icon', $this->icon])
      ->andFilterWhere(['like', 'slug', $this->slug])
      ->andFilterWhere(['like', 'youtube_video_link', $this->youtube_video_link]);

    return $dataProvider;
  }
}
