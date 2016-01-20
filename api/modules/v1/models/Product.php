<?php

namespace app\api\modules\v1\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // 'category_id', 'title' are required
            [['category_id', 'title'], 'required'],
            // checks if "title" is a string whose length is between 4 and 255
            ['title', 'string', 'length' => [4, 255]],
            // title must be unique
            ['title', 'unique'],
            // check if category_id exists
            ['category_id', 'exist', 'targetClass' => Category::className(), 'targetAttribute' => 'id']
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}