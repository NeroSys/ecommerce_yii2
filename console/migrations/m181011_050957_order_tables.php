<?php

use yii\db\Migration;

/**
 * Class m181011_050957_order_tables
 */
class m181011_050957_order_tables extends Migration
{
    public function safeUp()
    {

        $tableOptions = null;
        //Опции для mysql
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }


        $this->createTable('{{%order_items}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer(11),
            'product_id' => $this->integer(11),
            'lang' => $this->string(50),
            'name' => $this->string()->notNull()->defaultValue(''),
            'price' => $this->float(),
            'qty_item' => $this->integer(11),
            'sum_item' => $this->float(),


        ], $tableOptions);


        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'qty' => $this->integer(10),
            'sum' => $this->float(),
            'currency' => $this->string(255),
            'status' => $this->smallInteger(1)->notNull()->defaultValue('0'),
            'name' => $this->string(255),
            'email' => $this->string(255),
            'phone' => $this->string(255)->notNull()->defaultValue(null),
            'viewed' => $this->smallInteger(1)->notNull()->defaultValue('0'),
        ], $tableOptions);


        $this->createIndex('FK_order_items', '{{%order_items}}', 'item_id');

        $this->createIndex('FK_order_product', '{{%order_items}}', 'product_id');

        $this->addForeignKey(
            'FK_order_items', '{{%order_items}}', 'item_id', '{{%order}}', 'id', 'CASCADE', 'CASCADE'
        );

        $this->addForeignKey(
            'FK_order_products', '{{%order_items}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE'
        );
    }


    public function safeDown()
    {

        $this->dropTable('{{%order_items}}');
        $this->dropTable('{{%order}}');
    }
}

