<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contactdata}}`.
 */
class m200110_085609_create_contactdata_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contactdata}}', [
            'id' => $this->primaryKey(),
            'quiz_id' => $this->integer(10),
            'name' => $this->string(150),
            'phone' => $this->string(25),
            'email' => $this->string(150),
            'consent' => $this->integer(2),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contactdata}}');
    }
}
