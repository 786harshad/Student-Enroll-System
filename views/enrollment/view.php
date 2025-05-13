<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Enrollments $model */

$this->title = $model->student_id;
$this->params['breadcrumbs'][] = ['label' => 'Enrollments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="enrollments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'student_id' => $model->student_id, 'course_id' => $model->course_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'student_id' => $model->student_id, 'course_id' => $model->course_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'student_id',
            'course_id',
        ],
    ]) ?>

</div>
