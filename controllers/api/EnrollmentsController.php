<?php

namespace app\controllers\api;

use yii\rest\Controller;
use app\models\Enrollments;
use yii\web\Response;
use Yii;

class EnrollmentsController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        // Set response format to JSON
        $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;

        return $behaviors;
    }

    public function actionCreate()
    {
        $request = Yii::$app->request;
        $student_id = $request->post('student_id');
        $course_ids = $request->post('course_ids');

        if (!$student_id || !is_array($course_ids) || empty($course_ids)) {
            return [
                'success' => false,
                'message' => 'Student ID and an array of Course IDs are required.',
            ];
        }

        $enrolled = [];
        $errors = [];

        foreach ($course_ids as $course_id) {
            $enrollment = new Enrollments();
            $enrollment->student_id = $student_id;
            $enrollment->course_id = $course_id;

            if ($enrollment->save()) {
                $enrolled[] = $course_id;
            } else {
                $errors[$course_id] = $enrollment->getErrors();
            }
        }

        if (empty($errors)) {
            return [
                'success' => true,
                'message' => 'Enrollment successful for all courses.',
                'enrolled_courses' => $enrolled,
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Enrollment completed with some errors.',
                'enrolled_courses' => $enrolled,
                'errors' => $errors,
            ];
        }
    }
}
