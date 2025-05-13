<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%enrollment}}`.
 */
class m250513_115509_create_enrollment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%enrollments}}', [
            'student_id' => $this->integer()->notNull(),
            'course_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `student_id`
        $this->createIndex(
            '{{%idx-enrollments-student_id}}',
            '{{%enrollments}}',
            'student_id'
        );

        // add foreign key for table `{{%students}}`
        $this->addForeignKey(
            '{{%fk-enrollments-student_id}}',
            '{{%enrollments}}',
            'student_id',
            '{{%students}}',
            'id',
            'CASCADE'
        );

        // creates index for column `course_id`
        $this->createIndex(
            '{{%idx-enrollments-course_id}}',
            '{{%enrollments}}',
            'course_id'
        );

        // add foreign key for table `{{%courses}}`
        $this->addForeignKey(
            '{{%fk-enrollments-course_id}}',
            '{{%enrollments}}',
            'course_id',
            '{{%courses}}',
            'id',
            'CASCADE'
        );

        // add composite primary key
        $this->addPrimaryKey(
            '{{%pk-enrollments}}',
            '{{%enrollments}}',
            ['student_id', 'course_id']
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%students}}`
        $this->dropForeignKey(
            '{{%fk-enrollments-student_id}}',
            '{{%enrollments}}'
        );

        // drops index for column `student_id`
        $this->dropIndex(
            '{{%idx-enrollments-student_id}}',
            '{{%enrollments}}'
        );

        // drops foreign key for table `{{%courses}}`
        $this->dropForeignKey(
            '{{%fk-enrollments-course_id}}',
            '{{%enrollments}}'
        );

        // drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-enrollments-course_id}}',
            '{{%enrollments}}'
        );

        // drops primary key
        $this->dropPrimaryKey(
            '{{%pk-enrollments}}',
            '{{%enrollments}}'
        );

        $this->dropTable('{{%enrollments}}');
    }
}
