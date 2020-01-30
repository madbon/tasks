<?php

namespace common\modules\task\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\task\models\TaskRecord;
use yii\db\Query;
use Yii;
/**
 * TaskRecordSearch represents the model behind the search form of `common\modules\task\models\TaskRecord`.
 */
class TaskRecordSearch extends TaskRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'status_id'], 'integer'],
            [['task_name', 'task_description', 'date_raised', 'time_raised', 'date_done', 'time_done','project_title','status_title','date_target'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        // print_r(Yii::$app->controller->action->id); exit;
        $this->load($params);

        $query = (new Query())
        ->select([
            'TR.task_name',
            'TR.task_description',
            'TR.date_raised',
            'TR.date_done',
            'S.title as status_title',
            'P.title as project_title',
            'TR.date_done',
            'TR.id',
            'TR.date_target',
        ])
        ->from('task_record TR')
        ->leftJoin(['S' => 'task_status'], 'S.code = TR.status_id')
        ->leftJoin(['P' => 'task_project'], 'P.code = TR.category_id')
        // ->where(['TR.is_active' => Yii::$app->controller->action->id == "index" ? 0 : 1])
        // ->andFilterWhere(['=','TR.category_id', $this->category_id])
        // ->andFilterWhere(['=','TR.status_id', $this->status_id])
        // ->andFilterWhere(['LIKE','TR.task_name',$this->task_name])

        ->groupBy(['TR.id'])
        ->orderBy(['TR.id' => SORT_DESC]);
        // print_r($query->createCommand()->rawSql); exit;
        // ->andFilterWhere('LIKE','P.title',$this->project_title);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            // 'pagination' => [
            //         'pageSize' => Yii::$app->controller->action->id == "index" || Yii::$app->controller->action->id == "target-task-today" ? 0 : 50,
            //     ],
        ]);

        // $this->load($params);

        // if (!$this->validate()) {
        //     // uncomment the following line if you do not want to return any records when validation fails
        //     // $query->where('0=1');
        //     return $dataProvider;
        // }

        // // grid filtering conditions
        // $query->andFilterWhere([
        //     'id' => $this->id,
        //     'category_id' => $this->category_id,
        //     'date_raised' => $this->date_raised,
        //     'date_done' => $this->date_done,
        //     'status_id' => $this->status_id,
        // ]);

        // $query->andFilterWhere(['like', 'task_name', $this->task_name])
        //     ->andFilterWhere(['like', 'task_description', $this->task_description])
        //     ->andFilterWhere(['like', 'time_raised', $this->time_raised])
        //     ->andFilterWhere(['like', 'time_done', $this->time_done]);

        return $dataProvider;
    }
}
