<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\modules\task\models\TaskRecordSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use common\modules\report\controllers\DefaultController as Tools;
AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<style>
.select2-container--krajee .select2-selection--single .select2-selection__rendered
{
    width: 100%;
}

</style>
<body>
<?php $this->beginBody() ?>
    
<div style="width: 80%; margin-left:10%; margin-right: auto;">
    <?= Alert::widget() ?>
    <div class="btn-group">
    <?= Html::a('<span class="glyphicon glyphicon-briefcase"></span> Tasks',['/task/task'], Yii::$app->controller->action->id == "index" && Yii::$app->controller->id == "task" ? ['class' => 'btn btn-lg btn-primary'] : ['class' => 'btn btn-lg btn-default']);  ?>

    <?php  
        $searchModelMain = new TaskRecordSearch();
        $dataProviderMain = $searchModelMain->search(Yii::$app->request->queryParams);
        $data = $dataProviderMain->query->where(['TR.is_active' => 0, 'date_target' => date('Y-m-d')]);

        $dataProviderMain2 = new ActiveDataProvider([
            'query' => $data,
        ]);
        $count_today = $dataProviderMain2->getTotalCount();
    ?>
    <?= Html::a("<span class='glyphicon glyphicon-calendar'></span> Today's Target <span class='label label-danger' style='font-weight:normal;'>".($count_today)."</span>",['/task/task/target-task-today'], Yii::$app->controller->action->id == "target-task-today" ? ['class' => 'btn btn-lg btn-primary'] : ['class' => 'btn btn-lg btn-default']);  ?>

    <?= Html::a('<span class="glyphicon glyphicon-flag"></span> Past Due',['/task/task/past-due'], Yii::$app->controller->action->id == "past-due" ? ['class' => 'btn btn-lg btn-primary'] : ['class' => 'btn btn-lg btn-default']);  ?>

    <?= Html::a('<span class="glyphicon glyphicon-screenshot"></span> Target Task',['/task/task/target-task'], Yii::$app->controller->action->id == "target-task" ? ['class' => 'btn btn-lg btn-primary'] : ['class' => 'btn btn-lg btn-default']);  ?>

    <?= Html::a('<span class="glyphicon glyphicon-check"></span> Finished Tasks',['/task/task/finished-task'], Yii::$app->controller->action->id == "finished-task" ? ['class' => 'btn btn-lg btn-primary'] : ['class' => 'btn btn-lg btn-default']);  ?>
</div>
<div class="btn-group pull-right">
    <?= Html::a('<span class="glyphicon glyphicon-cog"></span> List of Projects',['/task/task-project'], Yii::$app->controller->id == "task-project" ? ['class' => 'btn btn-sm btn-primary'] : ['class' => 'btn btn-sm btn-default']);  ?>

    <?= Html::a('<span class="glyphicon glyphicon-cog"></span> List of Status',['/task/status'], Yii::$app->controller->id == "status" ? ['class' => 'btn btn-sm btn-primary'] : ['class' => 'btn btn-sm btn-default']);  ?>
</div>

    <?= $content; ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
