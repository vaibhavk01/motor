<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "dealeraccount".
 *
 * @property integer $id
 * @property integer $dealership_id
 * @property string $afname
 * @property string $alname
 * @property integer $c1
 * @property integer $c2
 * @property integer $t1
 * @property integer $t2
 * @property integer $email
 * @property integer $pass
 * @property string $desig
 
 */
 
 
class Dealeraccount extends \yii\db\ActiveRecord
{
 public $password_repeat;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dealeraccount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dealership_id', 'afname', 'alname', 'c1', 'c2', 't1', 't2', 'email', 'pass', 'desig'], 'required'],
            [['dealership_id', 'c1', 'c2', 't1', 't2'], 'integer'],
            [['email'],'email'],
            ['password_repeat', 'required'],
            
             ['password_repeat', 'compare','compareAttribute'=>'pass','message'=>'Passwords do not match'],
            
            [['afname', 'alname', 'desig'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dealership_id' => 'Dealership ID',
            'afname' => 'Afname',
            'alname' => 'Alname',
            'c1' => 'C1',
            'c2' => 'C2',
            't1' => 'T1',
            't2' => 'T2',
            'email' => 'Email',
            'pass' => 'Pass',
            'desig' => 'Desig',
        ];
    }
}
