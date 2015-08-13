<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "dealership".
 *
 * @property integer $id
 * @property string $dealership_name
 * @property string $brand
 * @property integer $mcode
 * @property integer $month
 * @property integer $year
 * @property string $ownfirstname
 * @property string $ownlastname
 */
class Dealership extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dealership';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dealership_name', 'brand'], 'required'],
           [['dealership_name'], 'string'],
           [['mcode', 'month', 'year'], 'string'],
           [['brand', 'ownfirstname', 'ownlastname'], 'string', 'max' => 255]
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dealership_name' => 'Dealership Name',
            'brand' => 'Brand',
            'mcode' => 'Mcode',
            'month' => 'Month',
            'year' => 'Year',
            'ownfirstname' => 'Ownfirstname',
            'ownlastname' => 'Ownlastname',
        ];
    }
    
     public static function createMultiple($modelClass, $multipleModels = [])
        {
            $model    = new $modelClass;
            $formName = $model->formName();
            $post     = Yii::$app->request->post($formName);
            $models   = [];
    
            if (! empty($multipleModels)) {
                $keys = array_keys(ArrayHelper::map($multipleModels, 'id', 'id'));
                $multipleModels = array_combine($keys, $multipleModels);
            }
    
            if ($post && is_array($post)) {
                foreach ($post as $i => $item) {
                    if (isset($item['id']) && !empty($item['id']) && isset($multipleModels[$item['id']])) {
                        $models[] = $multipleModels[$item['id']];
                    } else {
                        $models[] = new $modelClass;
                    }
                }
            }
    
            unset($model, $formName, $post);
    
            return $models;
        }
}
