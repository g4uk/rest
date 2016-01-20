<?php
 
namespace app\api\modules\v1\controllers;

use app\api\modules\v1\models\LoginApiForm;

class UserController extends Controller
{
    public $modelClass = 'app\api\modules\v1\models\User';

    public function behaviors() 
    {
	    $behaviors = parent::behaviors();
	    $behaviors['authenticator']['except'] = ['login'];
	    return $behaviors;
	}

    public function actionLogin() 
    {
	    $model = new LoginApiForm();

	    if ($model->load(\Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
	        return ['access_token' => \Yii::$app->user->identity->getAccessToken()];
	    } else {
	        $model->validate();
	        return $model;
	    }
	}
}