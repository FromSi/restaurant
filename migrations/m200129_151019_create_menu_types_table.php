<?php

use yii\db\Migration;

/**
 * Handles the creation of table `menu_types`.
 */
class m200129_151019_create_menu_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('menu_types', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('Название')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('menu_types');
    }
}
