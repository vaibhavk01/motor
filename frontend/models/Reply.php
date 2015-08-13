<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "reply".
 *
 * @property integer $id
 * @property integer $request_id
 * @property string $feature
 * @property string $price
 * @property string $access
 * @property string $other
 * @property string $sname
 * @property string $scontact
 */
class Reply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['request_id', 'feature', 'price'], 'required'],
            [['request_id'], 'integer'],
            [['feature', 'price'], 'string'],
            [['access'], 'string', 'max' => 2555],
            [['other', 'sname', 'scontact'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_id' => 'Request ID',
            'feature' => 'Feature',
            'price' => 'Price',
            'access' => 'Access',
            'other' => 'Other',
            'sname' => 'Sname',
            'scontact' => 'Scontact',
        ];
    }
}
