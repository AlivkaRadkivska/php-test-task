<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rc_cars_models_translations".
 *
 * @property int $id
 * @property int $car_model_id
 * @property string $lang
 * @property string|null $name
 * @property string|null $page_title
 * @property string|null $page_meta_keywords
 * @property string|null $page_meta_description
 * @property string|null $description
 * @property string|null $footer_title
 * @property string|null $footer_description
 * @property string|null $footer_subtitle
 * @property string|null $footer_subdescription
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class CarModelTranslation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rc_cars_models_translations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'car_model_id'], 'required'],
            [['id', 'car_model_id'], 'integer'],
            [['description', 'footer_description', 'footer_subdescription'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['lang', 'name', 'page_title', 'page_meta_keywords', 'page_meta_description', 'footer_title', 'footer_subtitle'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_model_id' => 'Car Model ID',
            'lang' => 'Lang',
            'name' => 'Name',
            'page_title' => 'Page Title',
            'page_meta_keywords' => 'Page Meta Keywords',
            'page_meta_description' => 'Page Meta Description',
            'description' => 'Description',
            'footer_title' => 'Footer Title',
            'footer_description' => 'Footer Description',
            'footer_subtitle' => 'Footer Subtitle',
            'footer_subdescription' => 'Footer Subdescription',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
