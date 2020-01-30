<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\modules\task\models\TaskRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-record-form">

    <?php $form = ActiveForm::begin(); ?>

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

    <?= $form->field($model, 'task_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'task_description')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'date_raised')->textInput()->label('Date Raised (YYYY-MM-DD)') ?>

    <?= $form->field($model,'date_raised')->widget(
        DatePicker::className(),[
        'name' => '', 
        'value' => date('Y-M-d', strtotime('+2 days')),
        'options' => ['placeholder' => 'Select date'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'autoclose' => true,
            // 'endDate' => "-6574d",
    ]]);?>

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

    <?php  
        if(Yii::$app->controller->action->id == "update")
        {
            echo $form->field($model,'date_done')->widget(
                DatePicker::className(),[
                'name' => '', 
                'value' => date('Y-M-d', strtotime('+2 days')),
                'options' => ['placeholder' => 'Select date'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                    'autoclose' => true,
                    // 'endDate' => "-6574d",
            ]]); 
        }
    ?>

    <?= $form->field($model,'date_target')->widget(
        DatePicker::className(),[
        'name' => '', 
        'value' => date('Y-M-d', strtotime('+2 days')),
        'options' => ['placeholder' => 'Select date'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'autoclose' => true,
            // 'endDate' => "-6574d",
    ]]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
