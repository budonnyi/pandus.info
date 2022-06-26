<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%step_three}}`.
 */
class m200113_083714_create_step_three_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%step_three}}', [
            'id' => $this->primaryKey(),
            'quiz_id' => $this->integer(10),
            'rate1' => $this->integer(2),
            'comment1' => $this->text(),
            'rate2' => $this->integer(2),
            'comment2' => $this->text(),
            'rate3' => $this->integer(2),
            'comment3' => $this->text(),
            'rate4' => $this->integer(2),
            'comment4' => $this->text(),
            'date' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%step_three}}');
    }
}
