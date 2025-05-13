<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enrollments".
 *
 * @property int $student_id
 * @property int $course_id
 */
class Enrollments extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enrollments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'course_id'], 'required'],
            [['student_id', 'course_id'], 'integer'],
            [['student_id', 'course_id'], 'unique', 'targetAttribute' => ['student_id', 'course_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Student ID',
            'course_id' => 'Course ID',
        ];
    }

    public function getStudent()
    {
        return $this->hasOne(Student::class, ['id' => 'student_id']);
    }

    public function getCourse()
    {
        return $this->hasOne(Courses::class, ['id' => 'course_id']);
    }


}
