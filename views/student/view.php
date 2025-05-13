<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Student $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="student-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'name',
            'email',
            'phone_number',
            [
                'attribute' => 'created_at',
                'format' => ['datetime', 'php:Y-m-d H:i:s'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['datetime', 'php:Y-m-d H:i:s'],
            ],
        ],
    ]) ?>

    <h2>Enrolled Courses</h2>
    <ul>
        <?php foreach ($model->courses as $course): ?>
            <li><?= Html::encode($course->title) ?></li>
        <?php endforeach; ?>
    </ul>

    <?= Html::a('Enroll in Courses', ['enroll', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

</div>
