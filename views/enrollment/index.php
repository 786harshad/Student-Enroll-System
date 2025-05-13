<?php

use app\models\Enrollments;
use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\EnrollmentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Enrollments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enrollments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'student_id',
                'label' => 'Student Name',
                'value' => function ($model) {
                    return $model->student->name ?? null;
                },
            ],
            [
                'attribute' => 'course_id',
                'label' => 'Course Title',
                'value' => function ($model) {
                    return $model->course->title ?? null;
                },
            ],
        ],
    ]); ?>
</div>
