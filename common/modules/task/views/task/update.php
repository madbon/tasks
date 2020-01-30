<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\task\models\TaskRecord */

$this->title = 'Update Task: ' . $model->task_name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-record-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <br/>
    <?= $this->render('_form', [
        'model' => $model,
        'status' => $status,
            'project' => $project,
    ]) ?>

</div>
