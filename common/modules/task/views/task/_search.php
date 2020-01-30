<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\modules\task\models\TaskRecordSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-record-search">

    <?php $form = ActiveForm::begin([
        'action' => [Yii::$app->controller->action->id],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'task_name') ?>
        </div>
        <div class="col-sm-3">
            <?php
                echo $form->field($model, 'category_id')->widget(Select2::classname(), [
                    'data' => $project,
                    'options' => ['placeholder' => 'Project'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    'pluginEvents'=>[
                            'select2:select'=>'
                                function(){
                                    
                                }',
                    ]
                ]);
            ?>
        </div>
        <div class="col-sm-3">
            <?php
                echo $form->field($model, 'status_id')->widget(Select2::classname(), [
                    'data' => $status,
                    'options' => ['placeholder' => 'Status'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    'pluginEvents'=>[
                            'select2:select'=>'
                                function(){
                                    
                                }',
                    ]
                ]);
            ?>
        </div>
         <div class="col-sm-3">
            <?= $form->field($model, 'date_raised')->textInput(['placeholder' => 'YYYY-MM-DD']) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'date_done')->textInput(['placeholder' => 'YYYY-MM-DD']) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'date_target')->textInput(['placeholder' => 'YYYY-MM-DD']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span>', ['class' => 'btn btn-default']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-refresh"></span>', [Yii::$app->controller->action->id],['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
