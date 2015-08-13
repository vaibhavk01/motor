<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "servicecenter".
 *
 * @property integer $id
 * @property string $address
 * @property integer $c1
 * @property integer $c2
 * @property string $city
 * @property integer $dealer_id
 * @property string $email
 * @property integer $gcell
 * @property string $gfname
 * @property string $glname
 * @property integer $gt1
 * @property string $landmark
 * @property integer $pcode
 * @property integer $t1
 * @property integer $t2
 */
class Servicecenter extends \yii\db\ActiveRecord
{
public $t1code;
public $t2code;
public $gt1code;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servicecenter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['address', 'c1', 'c2', 'city', 'dealer_id', 'email', 'gcell', 'gfname', 'glname', 'gt1', 'landmark', 'pcode', 't1', 't2'], 'required'],
            //[['address'], 'string'],
            //[['c1', 'c2', 'dealer_id', 'gcell', 'gt1', 'pcode', 't1', 't2'], 'integer'],
            //[['city', 'email', 'gfname', 'glname', 'landmark'], 'string', 'max' => 255]
            
            [[ 'address', 't1', 't2', 'c1', 'c2', 'gfname', 'glname', 'gcell'], 'required'],
             [[ 't1', 't2', 'c1', 'c2', 'gcell', 'gt1', 'pcode'], 'integer'],
             [['address'], 'string'],
              [['email'], 'email'],
             
            [['address'], 'required'],
             [['gfname', 'glname', 'landmark', 'city'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'c1' => 'C1',
            'c2' => 'C2',
            'city' => 'City',
            'dealer_id' => 'Dealer ID',
            'email' => 'Email',
            'gcell' => 'Gcell',
            'gfname' => 'Gfname',
            'glname' => 'Glname',
            'gt1' => 'Gt1',
            'landmark' => 'Landmark',
            'pcode' => 'Pcode',
            't1' => 'T1',
            't2' => 'T2',
        ];
    }
}
