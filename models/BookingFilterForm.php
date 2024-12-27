<?php

namespace app\models;

use yii\base\Model;

class BookingFilterForm extends Model
{
  public $year;
  public $month;
  public $registration_number;
  public $active_booking;
  public $active_car;
  public $existing_car;

  public function rules()
  {
    return [
      [['year', 'month'], 'required'],
      ['year', 'integer'],
      ['month', 'integer'],
      ['registration_number', 'string'],
      ['active_booking', 'boolean'],
      ['active_car', 'boolean'],
      ['existing_car', 'boolean'],
    ];
  }

  public function attributeLabels()
  {
    return [
      'year' => 'Select Year',
      'month' => 'Select Month',
    ];
  }
}
