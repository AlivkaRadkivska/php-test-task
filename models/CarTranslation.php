<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rc_cars_translations".
 *
 * @property int $id
 * @property int $car_id
 * @property string $lang
 * @property string|null $title
 * @property string|null $page_title
 * @property string|null $page_meta_keywords
 * @property string|null $page_meta_description
 * @property string|null $description
 * @property string|null $footer_title
 * @property string|null $footer_description
 * @property string|null $footer_subtitle
 * @property string|null $footer_subdescription
 * @property string|null $attribute_color
 * @property string|null $attribute_interior_color
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $was_migrated
 */
class CarTranslation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rc_cars_translations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'car_id', 'was_migrated'], 'required'],
            [['id', 'car_id', 'was_migrated'], 'integer'],
            [['description', 'footer_description', 'footer_subdescription'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['lang', 'title', 'page_title', 'page_meta_keywords', 'page_meta_description', 'footer_title', 'footer_subtitle', 'attribute_color', 'attribute_interior_color'], 'string', 'max' => 255],
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
            'car_id' => 'Car ID',
            'lang' => 'Lang',
            'title' => 'Title',
            'page_title' => 'Page Title',
            'page_meta_keywords' => 'Page Meta Keywords',
            'page_meta_description' => 'Page Meta Description',
            'description' => 'Description',
            'footer_title' => 'Footer Title',
            'footer_description' => 'Footer Description',
            'footer_subtitle' => 'Footer Subtitle',
            'footer_subdescription' => 'Footer Subdescription',
            'attribute_color' => 'Attribute Color',
            'attribute_interior_color' => 'Attribute Interior Color',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'was_migrated' => 'Was Migrated',
        ];
    }
}
