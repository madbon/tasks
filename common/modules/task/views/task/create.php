<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\task\models\TaskRecord */

$this->title = 'Add Task';
$this->params['breadcrumbs'][] = ['label' => 'Task Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'status' => $status,
        'project' => $project,
    ]) ?>

</div>
