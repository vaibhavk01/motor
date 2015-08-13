<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "dealerreply".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $dealer_id
 * @property integer $request_id
 * @property integer $status
 */
class Dealerreply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dealerreply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'dealer_id', 'request_id', 'status'], 'required'],
            [['user_id', 'dealer_id', 'request_id', 'status'], 'integer']
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
            'request_id' => 'Request ID',
            'status' => 'Status',
        ];
    }
}
