<?php

use yii\db\Migration;

/**
 * Handles the creation of table `request_statuses`.
 */
class m200129_150829_create_request_statuses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('request_statuses', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('Название')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('request_statuses');
    }
}
