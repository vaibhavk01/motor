<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "showroom".
 *
 * @property integer $id
 * @property integer $dealer_id
 * @property string $address
 * @property integer $t1
 * @property integer $t2
 * @property integer $c1
 * @property integer $c2
 * @property string $gfname
 * @property string $glname
 * @property integer $gcell
 * @property integer $gt1
 * @property string $landmark
 * @property string $city
 * @property integer $pcode
 * @property integer $emal
 */
class Showroom extends \yii\db\ActiveRecord
{
public $t1code;
public $t2code;
public $gt1code;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'showroom';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'address', 't1', 't2', 'c1', 'c2', 'gfname', 'glname', 'gcell'], 'required'],
            [[ 't1', 't2', 'c1', 'c2', 'gcell', 'gt1', 'pcode'], 'integer'],
            [['address'], 'string'],
             [['email'], 'email'],
            
           [['address'], 'required'],
            [['gfname', 'glname', 'landmark', 'city'], 'string', 'max' => 255]
            //[['address','t1','c1','gcell','gfname','glname'],'required'],
            //[['gfname', 'glname'], 'string', 'max' => 255]
            
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dealer_id' => 'Dealer ID',
            'address' => 'Address',
            't1' => 'T1',
            't2' => 'T2',
            'c1' => 'C1',
            'c2' => 'C2',
            'gfname' => 'Gfname',
            'glname' => 'Glname',
            'gcell' => 'Gcell',
            'gt1' => 'Gt1',
            'landmark' => 'Landmark',
            'city' => 'City',
            'pcode' => 'Pcode',
            'email' => 'Emal',
        ];
    }
}
