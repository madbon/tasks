<?php

namespace common\modules\task\models;

use Yii;

/**
 * This is the model class for table "task_record".
 *
 * @property int $id
 * @property int $category_id
 * @property string $task_name
 * @property string $task_description
 * @property string $date_raised
 * @property string $time_raised
 * @property string $date_done
 * @property string $time_done
 * @property int $status_id
 */
class TaskRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $project_title,$status_title;

    public static function tableName()
    {
        return 'task_record';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'status_id'], 'integer'],
            [['task_description','date_target','is_active','is_read'], 'safe'],
            [['date_raised', 'date_done'], 'safe'],
            [['task_name'], 'string', 'max' => 250],
            [['time_raised', 'time_done'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Project',
            'task_name' => 'Task Name',
            'task_description' => 'Description',
            'date_raised' => 'Date Raised',
            'time_raised' => 'Time Raised',
            'date_done' => 'Action Date',
            'time_done' => 'Time Done',
            'status_id' => 'Status',
            'status_title' => 'Status',
            'project_title' => 'Project',
            'date_target' => 'Target Date',
        ];
    }
}
