<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tables`.
 */
class m200129_150804_create_tables_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tables', [
            'id' => $this->primaryKey(),
            'restaurant_id' => $this->integer()->comment('Ресторан'),
            'name' => $this->string()->comment('Название'),
            'image' => $this->string()->comment('Изображение'),
            'chair' => $this->string()->comment('Всего мест'),
        ]);

        $this->createIndex(
            'idx-tables-restaurant_id',
            'tables',
            'restaurant_id'
        );

        $this->addForeignKey(
            'fk-tables-restaurant_id',
            'tables',
            'restaurant_id',
            'restaurants',
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
            'fk-tables-restaurant_id',
            'tables'
        );

        $this->dropIndex(
            'idx-tables-restaurant_id',
            'tables'
        );

        $this->dropTable('tables');
    }
}
