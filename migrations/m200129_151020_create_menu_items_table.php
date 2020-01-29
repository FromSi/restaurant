<?php

use yii\db\Migration;

/**
 * Handles the creation of table `menu_items`.
 */
class m200129_151020_create_menu_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('menu_items', [
            'id' => $this->primaryKey(),
            'menu_type_id' => $this->integer()->comment('Тип меню'),
            'name' => $this->string()->comment('Название'),
            'description' => $this->string(1000)->comment('Описание'),
            'image' => $this->string()->comment('Изображение'),
            'price' => $this->integer()->comment('Стоимость'),
            'is_active' => $this->boolean()->notNull()->defaultValue(0)->comment('Активность')
        ]);

        $this->createIndex(
            'idx-menu_items-menu_type_id',
            'menu_items',
            'menu_type_id'
        );

        $this->addForeignKey(
            'fk-menu_items-menu_type_id',
            'menu_items',
            'menu_type_id',
            'menu_types',
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
            'fk-menu_items-menu_type_id',
            'menu_items'
        );

        $this->dropIndex(
            'idx-menu_items-menu_type_id',
            'menu_items'
        );

        $this->dropTable('menu_items');
    }
}
