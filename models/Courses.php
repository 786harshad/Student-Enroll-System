<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "courses".
 *
 * @property int $id
 * @property string $title
 */
class Courses extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'course_code'], 'required'],
            [['slug', 'course_code'], 'unique'],
            [['created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'slug' => 'Slug',
            'course_code' => 'Course Code',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getEnrollments()
    {
        return $this->hasMany(Enrollments::class, ['course_id' => 'id']);
    }

    public function getStudents()
    {
    return $this->hasMany(Student::class, ['id' => 'student_id'])
                ->via('enrollments');
    }


}
