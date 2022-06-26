<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%questionnaire}}`.
 */
class m200110_083050_create_questionnaire_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%questionnaire}}', [
            'id' => $this->primaryKey(10),
            'rate' => $this->integer(2),
            'comment' => $this->text(),
            'date' => $this->dateTime(),
            'image' => $this->string(150),
            'audio' => $this->string(150),
            'isnew' => $this->integer(2),
            'inwork' => $this->integer(2),
            'isclosed' => $this->integer(2),
            'close_date' => $this->dateTime(),
            'branch_id' => $this->integer(10),
            'feedback' => $this->integer(10),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%questionnaire}}');
    }
}
