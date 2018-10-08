<?php

use yii\db\Migration;

/**
 * Class m181008_130016_subscribe_table
 */
class m181008_130016_subscribe_table extends Migration
{
    public function safeUp()
    {

        $tableOptions = null;
        //Опции для mysql
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%subscribe}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string(255)->notNull()->defaultValue(''),
            'date' => $this->date()
        ], $tableOptions);

    }


    public function safeDown()
    {
        $this->dropTable('{{%subscribe}}');
    }
}
