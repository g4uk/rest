<?php

use yii\db\Schema;
use yii\db\Migration;

class m160120_085037_category extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%category}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' not null'
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
