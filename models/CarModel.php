<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rc_cars_models".
 *
 * @property int $car_model_id
 * @property int|null $car_brand_id
 * @property int $car_body_id
 * @property string|null $slug
 * @property string $type
 * @property string|null $attribute_0_100
 * @property string|null $attribute_max_speed
 * @property string|null $attribute_number_of_seats
 * @property string|null $attribute_horsepower
 * @property string|null $attribute_engine
 * @property string|null $attribute_transmission
 * @property string|null $attribute_interior_color
 * @property int|null $attribute_doors
 * @property string|null $features
 * @property string|null $youtube_video_link
 * @property int $status
 * @property int $is_deleted
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 * @property int $attribute_engine_type
 */
class CarModel extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'rc_cars_models';
  }

  /**
   * getCarBrand
   *
   * @return void
   */
  public function getCarBrand()
  {
    return $this->hasOne(CarBrand::class, ['id' => 'car_brand_id']);
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['car_model_id', 'car_body_id'], 'required'],
      [['car_model_id', 'car_brand_id', 'car_body_id', 'attribute_doors', 'status', 'is_deleted', 'attribute_engine_type'], 'integer'],
      [['features'], 'string'],
      [['created_at', 'updated_at', 'deleted_at'], 'safe'],
      [['slug', 'type', 'attribute_0_100', 'attribute_max_speed', 'attribute_number_of_seats', 'attribute_horsepower', 'attribute_engine', 'attribute_transmission', 'attribute_interior_color', 'youtube_video_link'], 'string', 'max' => 255],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'car_model_id' => 'Car Model ID',
      'car_brand_id' => 'Car Brand ID',
      'car_body_id' => 'Car Body ID',
      'slug' => 'Slug',
      'type' => 'Type',
      'attribute_0_100' => 'Attribute 0 100',
      'attribute_max_speed' => 'Attribute Max Speed',
      'attribute_number_of_seats' => 'Attribute Number Of Seats',
      'attribute_horsepower' => 'Attribute Horsepower',
      'attribute_engine' => 'Attribute Engine',
      'attribute_transmission' => 'Attribute Transmission',
      'attribute_interior_color' => 'Attribute Interior Color',
      'attribute_doors' => 'Attribute Doors',
      'features' => 'Features',
      'youtube_video_link' => 'Youtube Video Link',
      'status' => 'Status',
      'is_deleted' => 'Is Deleted',
      'created_at' => 'Created At',
      'updated_at' => 'Updated At',
      'deleted_at' => 'Deleted At',
      'attribute_engine_type' => 'Attribute Engine Type',
    ];
  }
}
