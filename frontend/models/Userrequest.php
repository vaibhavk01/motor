<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "userrequest".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $car_id
 * @property string $color
 * @property string $city
 * @property string $delivery
 * @property string $other
 * @property integer $status
 * @property string $time
 */
class Userrequest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userrequest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'car_id', 'color', 'city', 'delivery', 'status', 'time'], 'required'],
            [['user_id', 'car_id', 'status'], 'integer'],
            [['other'], 'string'],
            [['time'], 'safe'],
            [['color', 'city', 'delivery'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'car_id' => 'Car ID',
            'color' => 'Color',
            'city' => 'City',
            'delivery' => 'Delivery',
            'other' => 'Other',
            'status' => 'Status',
            'time' => 'Time',
        ];
    }
}
