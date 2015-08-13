<?php
namespace frontend\models;


use common\models\User;
use frontend\models\Dealer;
use frontend\models\Carrequest;
use frontend\models\Userrequest;
use yii\base\Model;
use Yii;

use yii\db\Query;

use yii\data\ActiveDataProvider;
use common\models\LoginForm;

use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\RequestForm;
use frontend\models\ReplyForm;
use frontend\models\ContactForm;
use frontend\models\Car;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Signup form
 */
class Accessform extends Model
{
    public $access;
    public $price;
    public $comp;
 

    
    

    /**
     * @inheritdoc
     */
     
     public function attributeLabels()
     {
         return [
             'comp' => 'Complimentary',
             
         ];
     }
    public function rules()
    {
        return [
        
        ['access', 'string'],
        ['price', 'string']

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
     


}
