<?php

namespace common\modules\task\controllers;

use Yii;
use common\modules\task\models\TaskRecord;
use common\modules\task\models\TaskStatus;
use common\modules\task\models\TaskProject;
use common\modules\task\models\TaskRecordSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;

/**
 * TaskController implements the CRUD actions for TaskRecord model.
 */
class TaskController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIsRead($id)
    {
        TaskRecord::updateAll(['is_read' => 1]);

        \Yii::$app->getSession()->setFlash('success', 'Marked as Read');
        return $this->redirect(['index']);
    }

    public function actionIsActive($id,$action_id)
    {
        TaskRecord::updateAll(['is_active' => $action_id == 'index' || $action_id == 'target-task' || $action_id == 'target-task-today'  || $action_id == 'past-due' ? 1 : 0],['id' => $id]);

        \Yii::$app->getSession()->setFlash('success', $action_id == "index" || $action_id == 'target-task' ||  $action_id == 'past-due' || $action_id == "target-task-today"  ? 'Task has been finished.' : 'Task has been restored to Task Page');
        return $this->redirect([$action_id]);
    }

    /**
     * Lists all TaskRecord models.
     * @return mixed
     */
    public function actionTargetTask()
    {
        $searchModel = new TaskRecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $status = ArrayHelper::map(TaskStatus::find()->all(), 'code', 'title');
        $project = ArrayHelper::map(TaskProject::find()->all(), 'code', 'title');
        $data = $dataProvider->query->where(['TR.is_active' => 0])
        ->andWhere(['not', ['TR.date_target' => null]])
        ->andFilterWhere(['TR.category_id' => $searchModel->category_id])
        ->andFilterWhere(['TR.status_id' => $searchModel->status_id])
        ->andFilterWhere(['LIKE','TR.task_name', $searchModel->task_name])
        ->andFilterWhere(['LIKE','TR.date_raised', $searchModel->date_raised])
        ->andFilterWhere(['LIKE','TR.date_done', $searchModel->date_done])
        ->andFilterWhere(['LIKE','TR.date_target', $searchModel->date_target]);

        $dataProvider2 = new ActiveDataProvider([
            'query' => $data,
            'pagination' => [
                'pageSize' => 0,
            ],
        ]);

        return $this->render('target_task', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider2,
            'status' => $status,
            'project' => $project,
        ]);
    }

    /**
     * Lists all TaskRecord models.
     * @return mixed
     */
    public function actionPastDue()
    {
        $searchModel = new TaskRecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $status = ArrayHelper::map(TaskStatus::find()->all(), 'code', 'title');
        $project = ArrayHelper::map(TaskProject::find()->all(), 'code', 'title');
        $data = $dataProvider->query->where(['TR.is_active' => 0])
        ->andFilterWhere(['<','TR.date_target',date('Y-m-d')])
        ->andFilterWhere(['TR.category_id' => $searchModel->category_id])
        ->andFilterWhere(['TR.status_id' => $searchModel->status_id])
        ->andFilterWhere(['LIKE','TR.task_name', $searchModel->task_name])
        ->andFilterWhere(['LIKE','TR.date_raised', $searchModel->date_raised])
        ->andFilterWhere(['LIKE','TR.date_done', $searchModel->date_done])
        ->andFilterWhere(['LIKE','TR.date_target', $searchModel->date_target]);

        $dataProvider2 = new ActiveDataProvider([
            'query' => $data,
            'pagination' => [
                'pageSize' => 0,
            ],
        ]);

        return $this->render('past_due', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider2,
            'status' => $status,
            'project' => $project,
        ]);
    }

    /**
     * Lists all TaskRecord models.
     * @return mixed
     */
    public function actionTargetTaskToday()
    {
        $searchModel = new TaskRecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $status = ArrayHelper::map(TaskStatus::find()->all(), 'code', 'title');
        $project = ArrayHelper::map(TaskProject::find()->all(), 'code', 'title');
        $data = $dataProvider->query->where(['TR.is_active' => 0, 'date_target' => date('Y-m-d')])
        ->andFilterWhere(['TR.category_id' => $searchModel->category_id])
        ->andFilterWhere(['TR.status_id' => $searchModel->status_id])
        ->andFilterWhere(['LIKE','TR.task_name', $searchModel->task_name])
        ->andFilterWhere(['LIKE','TR.date_raised', $searchModel->date_raised])
        ->andFilterWhere(['LIKE','TR.date_done', $searchModel->date_done])
        ->andFilterWhere(['LIKE','TR.date_target', $searchModel->date_target]);

        $dataProvider2 = new ActiveDataProvider([
            'query' => $data,
            'pagination' => [
                'pageSize' => 0,
            ],
        ]);

        return $this->render('target_task_today', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider2,
            'status' => $status,
            'project' => $project,
        ]);
    }
    /**
     * Lists all TaskRecord models.
     * @return mixed
     */
    public function actionFinishedTask()
    {
        $searchModel = new TaskRecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $status = ArrayHelper::map(TaskStatus::find()->all(), 'code', 'title');
        $project = ArrayHelper::map(TaskProject::find()->all(), 'code', 'title');
        $data = $dataProvider->query->where(['TR.is_active' => 1])
        ->andFilterWhere(['TR.category_id' => $searchModel->category_id])
        ->andFilterWhere(['TR.status_id' => $searchModel->status_id])
        ->andFilterWhere(['LIKE','TR.task_name', $searchModel->task_name])
        ->andFilterWhere(['LIKE','TR.date_raised', $searchModel->date_raised])
        ->andFilterWhere(['LIKE','TR.date_done', $searchModel->date_done])
        ->andFilterWhere(['LIKE','TR.date_target', $searchModel->date_target]);

        $dataProvider2 = new ActiveDataProvider([
            'query' => $data,
            'pagination' => [
                    'pageSize' => 50,
                ],
        ]);

        return $this->render('finished_task', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider2,
            'status' => $status,
            'project' => $project,
        ]);
    }

     /**
     * Lists all TaskRecord models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TaskRecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $status = ArrayHelper::map(TaskStatus::find()->all(), 'code', 'title');
        $project = ArrayHelper::map(TaskProject::find()->all(), 'code', 'title');

        $data = $dataProvider->query->where(['TR.is_active' => 0])
        ->andFilterWhere(['TR.category_id' => $searchModel->category_id])
        ->andFilterWhere(['TR.status_id' => $searchModel->status_id])
        ->andFilterWhere(['LIKE','TR.task_name', $searchModel->task_name])
        ->andFilterWhere(['LIKE','TR.date_raised', $searchModel->date_raised])
        ->andFilterWhere(['LIKE','TR.date_done', $searchModel->date_done])
        ->andFilterWhere(['LIKE','TR.date_target', $searchModel->date_target]);

        $dataProvider2 = new ActiveDataProvider([
            'query' => $data,
            'pagination' => [
                'pageSize' => 0,
            ],
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider2,
            'status' => $status,
            'project' => $project,
        ]);
    }

    /**
     * Displays a single TaskRecord model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TaskRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TaskRecord();
        $status = ArrayHelper::map(TaskStatus::find()->all(), 'code', 'title');
        $project = ArrayHelper::map(TaskProject::find()->all(), 'code', 'title');

        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success', 'Task has been created');
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'status' => $status,
            'project' => $project,
        ]);
    }

    /**
     * Updates an existing TaskRecord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,$action_id)
    {
        $model = $this->findModel($id);
        $status = ArrayHelper::map(TaskStatus::find()->all(), 'code', 'title');
        $project = ArrayHelper::map(TaskProject::find()->all(), 'code', 'title');

        if ($model->load(Yii::$app->request->post())) {
            // print_r($model->status_id); exit;
            if($model->status_id == 5)
            {
                $model->is_active = 1;
            }
            $model->save();
            \Yii::$app->getSession()->setFlash('success', 'Task has been updated');
            return $this->redirect([$action_id, 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'status' => $status,
            'project' => $project,
        ]);
    }

    /**
     * Deletes an existing TaskRecord model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TaskRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TaskRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TaskRecord::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
