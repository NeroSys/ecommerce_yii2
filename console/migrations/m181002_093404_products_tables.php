<?php

use yii\db\Migration;

/**
 * Class m181002_093404_products_tables
 */
class m181002_093404_products_tables extends Migration
{
    public function safeUp()
    {

        $tableOptions = null;
        //Опции для mysql
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }


        $this->createTable('{{%product_lang}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer(11),
            'lang_id' => $this->integer(11),
            'lang' => $this->string(50),
            'title' => $this->string()->notNull()->defaultValue(''),
            'description' => $this->string()->notNull()->defaultValue(''),
            'text' => $this->string()->notNull()->defaultValue(''),
            'price' => $this->float()->defaultValue(null),
            'old_price' => $this->float()->defaultValue(null),
            'currency' => $this->string()

        ], $tableOptions);


        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(11),
            'name' => $this->string(255)->notNull()->defaultValue(''),
            'slug' => $this->string(255)->notNull()->defaultValue(null),
            'image' => $this->string(255)->notNull()->defaultValue(null),
            'preview' => $this->string(255)->notNull()->defaultValue(null),
            'visible' => $this->smallInteger(1)->notNull()->defaultValue('1'),
            'sort' => $this->integer(11)->defaultValue(null),
            'viewed' => $this->integer(11)->defaultValue(0),
            'hit' => $this->boolean()->defaultValue(0),
            'new' => $this->boolean()->defaultValue(0),
            'sale' => $this->boolean()->defaultValue(0),
            'created_at' => $this->date(),

        ], $tableOptions);


        $this->createIndex('FK_product_lang', '{{%product_lang}}', 'item_id');


        $this->addForeignKey(
            'FK_product_lang', '{{%product_lang}}', 'item_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE'
        );





    }


    public function safeDown()
    {

        $this->dropTable('{{%product_lang}}');
        $this->dropTable('{{%product}}');
    }
}
