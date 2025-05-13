<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $student app\models\Student */
/* @var $courses app\models\Course[] */
/* @var $selectedCourses array */

$this->title = 'Enroll ' . $student->name . ' in Courses';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $student->name, 'url' => ['view', 'id' => $student->id]];
$this->params['breadcrumbs'][] = 'Enroll';
?>
<div class="student-enroll">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::checkboxList('courses', $selectedCourses, ArrayHelper::map($courses, 'id', 'title')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
