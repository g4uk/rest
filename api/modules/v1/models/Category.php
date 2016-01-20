<?php

namespace app\api\modules\v1\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // title is required
            ['title', 'required'],
            // checks if "title" is a string whose length is between 4 and 255
            ['title', 'string', 'length' => [4, 255]],
            // title must be unique
            ['title', 'unique']
        ];
    }

    public function getProducts() 
    {
	    return $this->hasMany(Product::className(), ['category_id' => 'id']);
	}
}