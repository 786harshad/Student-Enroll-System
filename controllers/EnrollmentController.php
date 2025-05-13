<?php

namespace app\controllers;

use app\models\Enrollments;
use app\models\EnrollmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EnrollmentController implements the CRUD actions for Enrollments model.
 */
class EnrollmentController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Enrollments models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EnrollmentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Enrollments model.
     * @param int $student_id Student ID
     * @param int $course_id Course ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($student_id, $course_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($student_id, $course_id),
        ]);
    }

    /**
     * Creates a new Enrollments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Enrollments();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'student_id' => $model->student_id, 'course_id' => $model->course_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Enrollments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $student_id Student ID
     * @param int $course_id Course ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($student_id, $course_id)
    {
        $model = $this->findModel($student_id, $course_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'student_id' => $model->student_id, 'course_id' => $model->course_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Enrollments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $student_id Student ID
     * @param int $course_id Course ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($student_id, $course_id)
    {
        $this->findModel($student_id, $course_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Enrollments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $student_id Student ID
     * @param int $course_id Course ID
     * @return Enrollments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($student_id, $course_id)
    {
        if (($model = Enrollments::findOne(['student_id' => $student_id, 'course_id' => $course_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
