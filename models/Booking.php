<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rc_bookings".
 *
 * @property int $booking_id
 * @property int|null $uid
 * @property int|null $car_id
 * @property int|null $user_id
 * @property int|null $added_by
 * @property int|null $company_id
 * @property string $source
 * @property int|null $agent_id
 * @property int|null $sales
 * @property string|null $other
 * @property string|null $direct
 * @property string|null $start_date
 * @property string|null $pickup_location
 * @property string|null $pickup_place_id
 * @property float|null $pickup_latitude
 * @property float|null $pickup_longitude
 * @property int|null $pickup_driver
 * @property string|null $pickup_driver_note
 * @property string|null $end_date
 * @property string|null $drop_location
 * @property string|null $drop_place_id
 * @property float|null $drop_latitude
 * @property float|null $drop_longitude
 * @property int|null $drop_driver
 * @property string|null $drop_driver_note
 * @property int|null $send_sms_to_drivers
 * @property int|null $send_sms_to_me
 * @property float|null $total_amount
 * @property string|null $currency_id
 * @property int $city_id
 * @property string|null $client_full_name
 * @property string|null $special_request
 * @property int|null $cancellation_answer_id
 * @property string|null $cancellation_reason
 * @property int $open_date
 * @property string|null $paid_at
 * @property int $status
 * @property int $payment_status
 * @property int $is_reserved
 * @property int $is_deleted
 * @property int|null $cancelled_by
 * @property string|null $cancelled_at
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 * @property int $replacement
 * @property int|null $is_agent
 */
class Booking extends \yii\db\ActiveRecord
{
  /**
   * Virtual variable $busy_days
   *
   * @var int
   */
  public $busy_days = 0;

  /**
   * Virtual variable $free_days
   *
   * @var int
   */
  public $free_days = 0;

  /**
   * Virtual variable $service_days
   *
   * @var int
   */
  public $service_days = 0;

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'rc_bookings';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['booking_id', 'source', 'replacement'], 'required'],
      [['booking_id', 'uid', 'car_id', 'user_id', 'added_by', 'company_id', 'agent_id', 'sales', 'pickup_driver', 'drop_driver', 'send_sms_to_drivers', 'send_sms_to_me', 'city_id', 'cancellation_answer_id', 'open_date', 'status', 'payment_status', 'is_reserved', 'is_deleted', 'cancelled_by', 'replacement', 'is_agent'], 'integer'],
      [['source', 'direct', 'cancellation_reason'], 'string'],
      [['start_date', 'end_date', 'paid_at', 'cancelled_at', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
      [['pickup_latitude', 'pickup_longitude', 'drop_latitude', 'drop_longitude', 'total_amount'], 'number'],
      [['other', 'pickup_location', 'pickup_place_id', 'pickup_driver_note', 'drop_location', 'drop_place_id', 'drop_driver_note', 'client_full_name'], 'string', 'max' => 255],
      [['currency_id'], 'string', 'max' => 3],
      [['special_request'], 'string', 'max' => 500],
    ];
  }

  /**
   * getCar
   *
   * @return void
   */
  public function getCar()
  {
    return $this->hasOne(Car::class, ['car_id' => 'car_id']);
  }

  public function getTotalBookedHours()
  {
    if ($this->start_date && $this->end_date) {
      return (int) (strtotime($this->end_date) - strtotime($this->start_date)) / 3600;
    }

    return 0;
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'booking_id' => 'Booking ID',
      'uid' => 'Uid',
      'car_id' => 'Car ID',
      'user_id' => 'User ID',
      'added_by' => 'Added By',
      'company_id' => 'Company ID',
      'source' => 'Source',
      'agent_id' => 'Agent ID',
      'sales' => 'Sales',
      'other' => 'Other',
      'direct' => 'Direct',
      'start_date' => 'Start Date',
      'pickup_location' => 'Pickup Location',
      'pickup_place_id' => 'Pickup Place ID',
      'pickup_latitude' => 'Pickup Latitude',
      'pickup_longitude' => 'Pickup Longitude',
      'pickup_driver' => 'Pickup Driver',
      'pickup_driver_note' => 'Pickup Driver Note',
      'end_date' => 'End Date',
      'drop_location' => 'Drop Location',
      'drop_place_id' => 'Drop Place ID',
      'drop_latitude' => 'Drop Latitude',
      'drop_longitude' => 'Drop Longitude',
      'drop_driver' => 'Drop Driver',
      'drop_driver_note' => 'Drop Driver Note',
      'send_sms_to_drivers' => 'Send Sms To Drivers',
      'send_sms_to_me' => 'Send Sms To Me',
      'total_amount' => 'Total Amount',
      'currency_id' => 'Currency ID',
      'city_id' => 'City ID',
      'client_full_name' => 'Client Full Name',
      'special_request' => 'Special Request',
      'cancellation_answer_id' => 'Cancellation Answer ID',
      'cancellation_reason' => 'Cancellation Reason',
      'open_date' => 'Open Date',
      'paid_at' => 'Paid At',
      'status' => 'Status',
      'payment_status' => 'Payment Status',
      'is_reserved' => 'Is Reserved',
      'is_deleted' => 'Is Deleted',
      'cancelled_by' => 'Cancelled By',
      'cancelled_at' => 'Cancelled At',
      'created_at' => 'Created At',
      'updated_at' => 'Updated At',
      'deleted_at' => 'Deleted At',
      'replacement' => 'Replacement',
      'is_agent' => 'Is Agent',
    ];
  }
}
