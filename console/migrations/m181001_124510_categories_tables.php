<?php

use yii\db\Migration;

/**
 * Class m181001_124510_categories_tables
 */
class m181001_124510_categories_tables extends Migration
{
    public function safeUp()
    {

        $tableOptions = null;
        //Опции для mysql
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }


        $this->createTable('{{%category_lang}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer(11),
            'lang_id' => $this->integer(11),
            'lang' => $this->string(50),
            'title' => $this->string()->notNull()->defaultValue(''),

        ], $tableOptions);


        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->defaultValue(''),
            'slug' => $this->string(255)->notNull()->defaultValue(null),
            'visible' => $this->smallInteger(1)->notNull()->defaultValue('1'),
            'sort' => $this->integer(11)->defaultValue(null),

        ], $tableOptions);


        $this->createIndex('FK_category_lang', '{{%category_lang}}', 'item_id');


        $this->addForeignKey(
            'FK_category_lang', '{{%category_lang}}', 'item_id', '{{%category}}', 'id', 'CASCADE', 'CASCADE'
        );





    }


    public function safeDown()
    {

        $this->dropTable('{{%category_lang}}');
        $this->dropTable('{{%category}}');
    }
}
