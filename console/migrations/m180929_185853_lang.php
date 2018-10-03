<?php

use yii\db\Migration;

/**
 * Class m180929_185853_lang
 */
class m180929_185853_lang extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%lang}}', [
            'id' => $this->primaryKey(),
            'url' => $this->string(255)->notNull(),
            'local' => $this->string(255)->notNull(),
            'name' => $this->string(255)->notNull(),
            'default' => $this->smallInteger(6)->notNull()->defaultValue(0),
            'date_update' => $this->integer(11),
            'date_create' => $this->integer(11),

        ], $tableOptions);

        $this->batchInsert('lang', ['url', 'local', 'name', 'default', 'date_update', 'date_create'], [
            ['en', 'en', 'English', 0, time(), time()],
            ['bg', 'bg', 'Блгарска', 0, time(), time()],
            ['ru', 'ru', 'Русский', 0, time(), time()],
            ['ru', 'uk', 'Українська', 1, time(), time()],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%lang}}');
    }
}
