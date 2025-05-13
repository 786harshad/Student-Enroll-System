<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%students}}`.
 */
class m250513_112010_create_students_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%students}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string(191)->notNull()->unique(),
            'phone_number' => $this->string(20)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%students}}');
    }
}
