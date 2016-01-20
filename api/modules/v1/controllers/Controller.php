<?php
 
namespace app\api\modules\v1\controllers;
 
use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;
 
class Controller extends ActiveController
{
	public $modelClass = false;

	public function behaviors() {
	    $behaviors = parent::behaviors();
	    
	    // enabled HttpBearerAuth
	    $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
        ];

	    return $behaviors;
	}
}