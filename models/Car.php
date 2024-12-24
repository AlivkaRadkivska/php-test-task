<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rc_cars".
 *
 * @property int $car_id
 * @property int|null $car_model_id
 * @property int|null $car_serie_id
 * @property int|null $car_body_id
 * @property int|null $company_id
 * @property int $city_id
 * @property int|null $sales_tax_id
 * @property int|null $holiday_calculator_id
 * @property int|null $range_calculator_id
 * @property string|null $registration_number
 * @property string|null $photo
 * @property string $price_type
 * @property float|null $price_1
 * @property float $price_2
 * @property float $price_3_6
 * @property float|null $price_7_13
 * @property float $price_14_20
 * @property float $price_21_29
 * @property float|null $price_30_more
 * @property string|null $currency
 * @property float $price_partner_1
 * @property float $price_partner_2
 * @property float $price_partner_3_6
 * @property float $price_partner_7_13
 * @property float $price_partner_14_20
 * @property float $price_partner_21_29
 * @property float $price_partner_30_more
 * @property int|null $deposit
 * @property float|null $overlimit_charge
 * @property int|null $salik
 * @property int|null $age_restriction
 * @property int|null $driving_licence_restriction
 * @property int $free_delivery_dubai
 * @property string|null $km_included_per_day
 * @property string|null $km_included_per_month
 * @property string|null $youtube_video_link
 * @property int|null $min_day_reservation
 * @property string|null $attribute_year
 * @property string|null $attribute_tinted
 * @property string|null $attribute_max_speed
 * @property string|null $attribute_0_100
 * @property string|null $attribute_number_of_seats
 * @property string|null $attribute_horsepower
 * @property string|null $attribute_engine
 * @property string|null $attribute_transmission
 * @property string|null $attribute_mileage
 * @property int $attribute_sm_bag
 * @property int $attribute_lg_bag
 * @property int|null $attribute_doors
 * @property string|null $features
 * @property int $exterior_condition
 * @property int $interior_condition
 * @property int $engine_suspention_condition
 * @property string $insurance
 * @property int $insurance_amount
 * @property string|null $insurance_default
 * @property string|null $insurance_cdw
 * @property string|null $insurance_default_desc
 * @property string|null $insurance_cdw_desc
 * @property string|null $aiport_charge
 * @property int $complete
 * @property int $status
 * @property int $is_deleted
 * @property string|null $message_color
 * @property string|null $message_title
 * @property string|null $message_text
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $sort_time
 * @property string|null $longitude
 * @property string|null $latitude
 * @property int $was_migrated
 * @property string $was_migrated_at
 * @property int $from_carsss
 * @property int $no_deposit_needed
 * @property int $attribute_engine_type
 * @property int $with_owner
 * @property int $in_abu_dhabi
 */
class Car extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'rc_cars';
  }

  /**
   * getCarTranslation
   *
   * @return void
   */
  public function getCarTranslation()
  {
    return $this->hasOne(CarTranslation::class, ['car_id' => 'car_id']);
  }

  /**
   * getCarModelTranslation
   *
   * @return void
   */
  public function getCarModelTranslation()
  {
    return $this->hasOne(CarModelTranslation::class, ['car_model_id' => 'car_model_id']);
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['car_id', 'was_migrated', 'from_carsss', 'no_deposit_needed', 'with_owner', 'in_abu_dhabi'], 'required'],
      [['car_id', 'car_model_id', 'car_serie_id', 'car_body_id', 'company_id', 'city_id', 'sales_tax_id', 'holiday_calculator_id', 'range_calculator_id', 'deposit', 'salik', 'age_restriction', 'driving_licence_restriction', 'free_delivery_dubai', 'min_day_reservation', 'attribute_sm_bag', 'attribute_lg_bag', 'attribute_doors', 'exterior_condition', 'interior_condition', 'engine_suspention_condition', 'insurance_amount', 'complete', 'status', 'is_deleted', 'was_migrated', 'from_carsss', 'no_deposit_needed', 'attribute_engine_type', 'with_owner', 'in_abu_dhabi'], 'integer'],
      [['price_1', 'price_2', 'price_3_6', 'price_7_13', 'price_14_20', 'price_21_29', 'price_30_more', 'price_partner_1', 'price_partner_2', 'price_partner_3_6', 'price_partner_7_13', 'price_partner_14_20', 'price_partner_21_29', 'price_partner_30_more', 'overlimit_charge'], 'number'],
      [['features', 'insurance_default', 'insurance_cdw', 'insurance_default_desc', 'insurance_cdw_desc'], 'string'],
      [['created_at', 'updated_at', 'deleted_at', 'sort_time', 'was_migrated_at'], 'safe'],
      [['registration_number', 'photo', 'price_type', 'km_included_per_day', 'km_included_per_month', 'youtube_video_link', 'attribute_year', 'attribute_tinted', 'attribute_max_speed', 'attribute_0_100', 'attribute_number_of_seats', 'attribute_horsepower', 'attribute_engine', 'attribute_transmission', 'attribute_mileage', 'insurance', 'aiport_charge', 'message_color', 'message_title', 'message_text'], 'string', 'max' => 255],
      [['currency'], 'string', 'max' => 3],
      [['longitude', 'latitude'], 'string', 'max' => 100],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'car_id' => 'Car ID',
      'car_model_id' => 'Car Model ID',
      'car_serie_id' => 'Car Serie ID',
      'car_body_id' => 'Car Body ID',
      'company_id' => 'Company ID',
      'city_id' => 'City ID',
      'sales_tax_id' => 'Sales Tax ID',
      'holiday_calculator_id' => 'Holiday Calculator ID',
      'range_calculator_id' => 'Range Calculator ID',
      'registration_number' => 'Registration Number',
      'photo' => 'Photo',
      'price_type' => 'Price Type',
      'price_1' => 'Price 1',
      'price_2' => 'Price 2',
      'price_3_6' => 'Price 3 6',
      'price_7_13' => 'Price 7 13',
      'price_14_20' => 'Price 14 20',
      'price_21_29' => 'Price 21 29',
      'price_30_more' => 'Price 30 More',
      'currency' => 'Currency',
      'price_partner_1' => 'Price Partner 1',
      'price_partner_2' => 'Price Partner 2',
      'price_partner_3_6' => 'Price Partner 3 6',
      'price_partner_7_13' => 'Price Partner 7 13',
      'price_partner_14_20' => 'Price Partner 14 20',
      'price_partner_21_29' => 'Price Partner 21 29',
      'price_partner_30_more' => 'Price Partner 30 More',
      'deposit' => 'Deposit',
      'overlimit_charge' => 'Overlimit Charge',
      'salik' => 'Salik',
      'age_restriction' => 'Age Restriction',
      'driving_licence_restriction' => 'Driving Licence Restriction',
      'free_delivery_dubai' => 'Free Delivery Dubai',
      'km_included_per_day' => 'Km Included Per Day',
      'km_included_per_month' => 'Km Included Per Month',
      'youtube_video_link' => 'Youtube Video Link',
      'min_day_reservation' => 'Min Day Reservation',
      'attribute_year' => 'Attribute Year',
      'attribute_tinted' => 'Attribute Tinted',
      'attribute_max_speed' => 'Attribute Max Speed',
      'attribute_0_100' => 'Attribute 0 100',
      'attribute_number_of_seats' => 'Attribute Number Of Seats',
      'attribute_horsepower' => 'Attribute Horsepower',
      'attribute_engine' => 'Attribute Engine',
      'attribute_transmission' => 'Attribute Transmission',
      'attribute_mileage' => 'Attribute Mileage',
      'attribute_sm_bag' => 'Attribute Sm Bag',
      'attribute_lg_bag' => 'Attribute Lg Bag',
      'attribute_doors' => 'Attribute Doors',
      'features' => 'Features',
      'exterior_condition' => 'Exterior Condition',
      'interior_condition' => 'Interior Condition',
      'engine_suspention_condition' => 'Engine Suspention Condition',
      'insurance' => 'Insurance',
      'insurance_amount' => 'Insurance Amount',
      'insurance_default' => 'Insurance Default',
      'insurance_cdw' => 'Insurance Cdw',
      'insurance_default_desc' => 'Insurance Default Desc',
      'insurance_cdw_desc' => 'Insurance Cdw Desc',
      'aiport_charge' => 'Aiport Charge',
      'complete' => 'Complete',
      'status' => 'Status',
      'is_deleted' => 'Is Deleted',
      'message_color' => 'Message Color',
      'message_title' => 'Message Title',
      'message_text' => 'Message Text',
      'created_at' => 'Created At',
      'updated_at' => 'Updated At',
      'deleted_at' => 'Deleted At',
      'sort_time' => 'Sort Time',
      'longitude' => 'Longitude',
      'latitude' => 'Latitude',
      'was_migrated' => 'Was Migrated',
      'was_migrated_at' => 'Was Migrated At',
      'from_carsss' => 'From Carsss',
      'no_deposit_needed' => 'No Deposit Needed',
      'attribute_engine_type' => 'Attribute Engine Type',
      'with_owner' => 'With Owner',
      'in_abu_dhabi' => 'In Abu Dhabi',
    ];
  }
}
