<?php

use yii\db\Schema;
use yii\db\Migration;

class m160120_085046_product extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product}}', [
            'id' => Schema::TYPE_PK,
            'category_id' => Schema::TYPE_INTEGER . ' not null',
            'title' => Schema::TYPE_STRING . ' not null'
        ], $tableOptions);

        $this->addForeignKey('{{%product_category_id}}', '{{%product}}', 'category_id', '{{%category}}', 'id');
    }

    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
