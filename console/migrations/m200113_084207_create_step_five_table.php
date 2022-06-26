<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%step_five}}`.
 */
class m200113_084207_create_step_five_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%step_five}}', [
            'id' => $this->primaryKey(),
            'quiz_id' => $this->integer(10),
            'gender' => $this->integer(1),
            'age' => $this->integer(1),
            'employment' => $this->integer(1),
            'date' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%step_five}}');
    }
}
