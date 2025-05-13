<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%courses}}`.
 */
class m250513_113252_create_courses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%courses}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'slug' => $this->string(191)->notNull()->unique(),
            'course_code' => $this->string(50)->notNull()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%courses}}');
    }
}
