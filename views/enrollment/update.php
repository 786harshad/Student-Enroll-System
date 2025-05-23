<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Enrollments $model */

$this->title = 'Update Enrollments: ' . $model->student_id;
$this->params['breadcrumbs'][] = ['label' => 'Enrollments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->student_id, 'url' => ['view', 'student_id' => $model->student_id, 'course_id' => $model->course_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enrollments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
