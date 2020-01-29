<?php

use yii\db\Migration;

/**
 * Handles the creation of table `restaurants`.
 */
class m200129_150744_create_restaurants_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('restaurants', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('Название'),
            'description' => $this->string(1000)->comment('Описание'),
            'image' => $this->string()->comment('Изображение'),
            'address' => $this->string()->comment('Адрес'),
            'is_active' => $this->boolean()->notNull()->defaultValue(0)->comment('Активность')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('restaurants');
    }
}
