<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rc_cars_brands".
 *
 * @property int $car_brand_id
 * @property string|null $icon
 * @property string|null $slug
 * @property string|null $youtube_video_link
 * @property int $status
 * @property int $is_deleted
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 */
class CarBrand extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'rc_cars_brands';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['car_brand_id', 'status'], 'required'],
      [['car_brand_id', 'status', 'is_deleted'], 'integer'],
      [['created_at', 'updated_at', 'deleted_at'], 'safe'],
      [['icon', 'slug', 'youtube_video_link'], 'string', 'max' => 255],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'car_brand_id' => 'Car Brand ID',
      'icon' => 'Icon',
      'slug' => 'Slug',
      'youtube_video_link' => 'Youtube Video Link',
      'status' => 'Status',
      'is_deleted' => 'Is Deleted',
      'created_at' => 'Created At',
      'updated_at' => 'Updated At',
      'deleted_at' => 'Deleted At',
    ];
  }
}
