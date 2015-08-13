<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "carrequest".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $dealer_id
 * @property string $car_model
 */
class Carrequest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carrequest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'dealer_id', 'car_model'], 'required'],
            [['user_id', 'dealer_id'], 'integer'],
            [['car_model'], 'string', 'max' => 255]
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
            'dealer_id' => 'Dealer ID',
            'car_model' => 'Car Model',
        ];
    }
}
