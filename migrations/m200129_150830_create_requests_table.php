<?php

use yii\db\Migration;

/**
 * Handles the creation of table `requests`.
 */
class m200129_150830_create_requests_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('requests', [
            'id' => $this->primaryKey(),
            'request_status_id' => $this->integer()->comment('Статус'),
            'table_id' => $this->integer()->comment('Стол'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('requests');
    }
}
