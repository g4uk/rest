<?php

use yii\db\Schema;
use yii\db\Migration;

class m160120_080739_user extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' null',
            'password' => Schema::TYPE_STRING . ' null',
            'auth_key' => Schema::TYPE_STRING . ' null',
            'access_token' => Schema::TYPE_STRING . ' null',
            'created_at' => Schema::TYPE_TIMESTAMP . ' null',
            'updated_at' => Schema::TYPE_TIMESTAMP . ' null'
        ], $tableOptions);

        $this->createIndex('{{%user_username}}', '{{%user}}', 'username', true);
        $this->createIndex('{{%user_access_token}}', '{{%user}}', 'access_token', true);

        $security = Yii::$app->security;
        $columns = ['username', 'password', 'created_at', 'access_token', 'auth_key'];
        $this->batchInsert('{{%user}}', $columns, [
            [
                'tester',
                $security->generatePasswordHash('tester'),
                gmdate('Y-m-d H:i:s'),
                $security->generateRandomString(),
                $security->generateRandomString()
            ],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
