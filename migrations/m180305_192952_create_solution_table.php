<?php

use yii\db\Migration;

/**
 * Handles the creation of table `solution`.
 */
class m180305_192952_create_solution_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('solution', [
            'id' => $this->primaryKey(),
            'user_id' => $this->bigInteger(),
            'number' => $this->integer(),
            'array' => $this->string(),
            'solution' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('solution');
    }
}
