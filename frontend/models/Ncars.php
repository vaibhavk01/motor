<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ncars".
 *
 * @property string $model
 * @property string $model_name
 * @property string $variant
 * @property string $fuel
 * @property string $color
 * @property string $modebrand
 */
class Ncars extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ncars';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model', 'model_name', 'variant', 'fuel', 'color', 'modebrand'], 'required'],
            [['model', 'model_name', 'variant', 'fuel', 'color', 'modebrand'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'model' => 'Model',
            'model_name' => 'Model Name',
            'variant' => 'Variant',
            'fuel' => 'Fuel',
            'color' => 'Color',
            'modebrand' => 'Modebrand',
        ];
    }
}
