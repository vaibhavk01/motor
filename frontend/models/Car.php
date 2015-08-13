<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cars".
 *
 * @property string $model_no
 * @property string $model_name
 * @property string $model
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_no', 'model_name', 'model'], 'required'],
            [['model_no', 'model_name', 'model'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'model_no' => 'Model No',
            'model_name' => 'Model Name',
            'model' => 'Model',
        ];
    }
}
