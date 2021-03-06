<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\task\models\TaskRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Today's Target";
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
table.table tbody tr td:nth-child(1)
{
    background: #f6d2d7;
    font-size: 18px;

}
table.table thead tr th:nth-child(1)
{
    background: #e75f72;
    text-align: center;
    color:white;
    font-size: 25px;

}
table.table thead tr th
{
    text-align: center;

}
table.table tbody tr td:nth-child(1)
{
    border-bottom: 1px solid #e7adbd;
}
table.table tbody tr td
{
    border:none;
}
</style>
<div class="task-record-index">

    <h1><?php // Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel,'project' => $project,'status' => $status]); ?>
    <br/>

    <div style="max-height: 500px; overflow-y: scroll;">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'options' => ['class' => 'table table-responsive table-hover'],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            
            [
                'label' => "Today's Task(s)",
                'attribute' => 'task_name',
                'format' => 'raw',
                'value' => function($model)
                {
                    return "<span style='font-size:15px; color:orange;' class='glyphicon glyphicon-certificate'></span> ".$model['task_name'];
                }
            ],
            [
                'label' => 'Description',
                'attribute' => 'task_description',
                'format' => 'raw',
                'value' => function($model)
                {
                    return "<p style='white-space:pre-wrap;'>".($model['task_description'])."</p>";
                }
            ],
            [
                'label' => 'Project',
                'attribute' => 'project_title',
            ],
            [
                'label' => 'Status',
                'attribute' => 'status_title',
                'format' => 'raw',
                'value' => function($model)
                {
                    return "<span class='label label-success'>".$model['status_title']."</span>";
                }
            ],
            [
                'label' => 'Date Raised',
                'attribute' => 'date_raised',
                'value' => function($model)
                {
                    return !empty($model['date_raised']) ? date("F j, Y", strtotime($model['date_raised'])) : "";
                }
            ],
            [
                'label' => 'Days After Task Raised',
                'format' => 'raw',
                'value' => function($model)
                {
                    $now = time(); // or your date as well
                    $your_date = strtotime($model['date_raised']);
                    $datediff = $now - $your_date;

                    return !empty($model['date_raised']) ? round($datediff / (60 * 60 * 24))." d" : "";
                }
            ],
            [
                'label' => 'Date Done',
                'attribute' => 'date_done',
                'value' => function($model)
                {
                    return empty($model['date_done']) ? '' : date("F j, Y", strtotime($model['date_done']));
                }
            ],
            [
                'label' => 'Days After Task Done',
                'format' => 'raw',
                'value' => function($model)
                {
                    $now = time(); // or your date as well
                    $your_date = strtotime($model['date_done']);
                    $datediff = $now - $your_date;

                    return !empty($model['date_done']) ? round($datediff / (60 * 60 * 24))." d" : '';
                }
            ],
            [
                'label' => 'Target Date',
                'attribute' => 'date_target',
                'value' => function($model)
                {
                    return empty($model['date_target']) ? '' : date("F j, Y", strtotime($model['date_target']));
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',                            
                'template' => '{update} {finished}',   
                    'buttons'=>[  
                        'update'=>function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-edit"></span>', ['update', 'id'=>$model['id'],'action_id' => 'target-task-today'], ['class' => 'btn btn-link','title' => 'Edit']);
                        },
                         'finished'=>function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-ok"></span>', ['is-active', 'id'=>$model['id'], 'action_id' => 'target-task-today'], ['class' => 'btn btn-link','title' => 'Mark as Finished']);
                        },
                    ],
            ],
        ],
    ]); ?>
</div>
    <?php
        $this->registerJs("
            $('table.table').addClass('table-hover');
        ");
    ?>
</div>
