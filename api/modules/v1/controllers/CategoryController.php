<?php
 
namespace app\api\modules\v1\controllers;

use app\api\modules\v1\models\Category;
 
class CategoryController extends Controller
{
    public $modelClass = 'app\api\modules\v1\models\Category';

    public function actionProducts($id) 
    {
    	$category = Category::findOne($id);
    	return $category ? $category->getProducts()->all() : array();
    }
}