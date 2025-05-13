<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property string $name
 */
class Student extends \yii\db\ActiveRecord
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
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone_number'], 'required'],
            [['email'], 'email'],
            [['phone_number'], 'string', 'max' => 20],
            [['created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getEnrollments()
    {
        return $this->hasMany(Enrollments::class, ['student_id' => 'id']);
    }

    public function getCourses()
    {
        return $this->hasMany(Courses::class, ['id' => 'course_id'])
                    ->via('enrollments');
    }


}
