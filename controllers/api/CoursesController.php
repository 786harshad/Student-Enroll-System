<?php

namespace app\controllers\api;

use yii\rest\Controller;
use app\models\Courses;
use yii\web\Response;

class CoursesController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        // Set response format to JSON
        $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;

        return $behaviors;
    }

    public function actionIndex()
    {
        // Retrieve all courses
        $courses = Courses::find()->all();

        // Return the list of courses
        return $courses;
    }
}
