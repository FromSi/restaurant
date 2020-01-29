<?php

use yii\db\Migration;

/**
 * Handles the creation of table `request_items`.
 */
class m200129_151929_create_request_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('request_items', [
            'id' => $this->primaryKey(),
            'request_id' => $this->integer()->comment('Заявка'),
            'menu_item_id' => $this->integer()->comment('Меню'),
        ]);

        $this->createIndex(
            'idx-request_items-request_id',
            'request_items',
            'request_id'
        );

        $this->addForeignKey(
            'fk-request_items-request_id',
            'request_items',
            'request_id',
            'requests',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-request_items-menu_item_id',
            'request_items',
            'menu_item_id'
        );

        $this->addForeignKey(
            'fk-request_items-menu_item_id',
            'request_items',
            'menu_item_id',
            'menu_items',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-request_items-request_id',
            'request_items'
        );

        $this->dropIndex(
            'idx-request_items-request_id',
            'request_items'
        );

        $this->dropForeignKey(
            'fk-request_items-menu_item_id',
            'request_items'
        );

        $this->dropIndex(
            'idx-request_items-menu_item_id',
            'request_items'
        );

        $this->dropTable('request_items');
    }
}
