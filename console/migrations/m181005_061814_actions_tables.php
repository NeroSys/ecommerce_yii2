<?php

use yii\db\Migration;

/**
 * Class m181005_061814_actions_tables
 */
class m181005_061814_actions_tables extends Migration
{
    public function safeUp()
    {

        $tableOptions = null;
        //Опции для mysql
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }


        $this->createTable('{{%action_lang}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer(11),
            'lang_id' => $this->integer(11),
            'lang' => $this->string(50),
            'title' => $this->string()->notNull()->defaultValue(''),
            'text' => $this->string()->notNull()->defaultValue(''),

        ], $tableOptions);


        $this->createTable('{{%action}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->defaultValue(''),
            'image' => $this->string(255)->notNull()->defaultValue(''),
            'start' => $this->date()->notNull()->defaultValue(null),
            'finish' => $this->date()->notNull()->defaultValue(null),
            'slug' => $this->string(255)->notNull()->defaultValue(null),
            'visible' => $this->smallInteger(1)->notNull()->defaultValue('1'),
            'sort' => $this->integer(11)->defaultValue(null),

        ], $tableOptions);


        $this->createIndex('FK_action_lang', '{{%action_lang}}', 'item_id');


        $this->addForeignKey(
            'FK_action_lang', '{{%action_lang}}', 'item_id', '{{%action}}', 'id', 'CASCADE', 'CASCADE'
        );





    }


    public function safeDown()
    {

        $this->dropTable('{{%action_lang}}');
        $this->dropTable('{{%action}}');
    }
}
