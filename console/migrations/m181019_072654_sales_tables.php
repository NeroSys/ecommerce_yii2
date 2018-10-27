<?php

use yii\db\Migration;

/**
 * Class m181019_072654_sales_tables
 */
class m181019_072654_sales_tables extends Migration
{
    public function safeUp()
    {

        $tableOptions = null;
        //Опции для mysql
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }


        $this->createTable('{{%sales}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(11),
            'manager_discount' => $this->string(20),
            'sum' => $this->float(),
            'currency' => $this->string(20),
            'payed' => $this->boolean()->defaultValue(0),
            'send' => $this->boolean()->defaultValue(0),
            'date' => $this->dateTime(),

        ], $tableOptions);


        $this->createTable('{{%manager}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'email' => $this->string(255),
            'phone' => $this->string(255)->notNull()->defaultValue(null),
            'skype' => $this->string(255)->notNull()->defaultValue(null),
            'discount' => $this->string(255)->defaultValue(null),
        ], $tableOptions);


        $this->createIndex('FK_sales', '{{%sales}}', 'manager_discount');


        $this->addForeignKey(
            'FK_order_sales', '{{%sales}}', 'order_id', '{{%order}}', 'id', 'CASCADE', 'CASCADE'
        );

    }


    public function safeDown()
    {

        $this->dropTable('{{%sales}}');
        $this->dropTable('{{%manager}}');
    }
}
