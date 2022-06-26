<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%step_four}}`.
 */
class m200113_083905_create_step_four_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%step_four}}', [
            'id' => $this->primaryKey(),
            'quiz_id' => $this->integer(10),
            'rate1' => $this->integer(2),
            'comment1' => $this->text(),
            'rate2' => $this->integer(2),
            'comment2' => $this->text(),
            'consent2' => $this->integer(2),
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
        $this->dropTable('{{%step_four}}');
    }
}
