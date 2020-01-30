<?php

namespace common\models;
use niksko12\auditlogs\classes\ModelAudit;
use Yii;

/**
 * This is the model class for table "gad_file_attached".
 *
 * @property int $id
 * @property string $file_name
 * @property int $model_id
 * @property string $model_name
 * @property string $hash
 * @property string $extension
 * @property int $file_folder_type_id
 */
class GadFileAttached extends ModelAudit
{
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'gad_file_attached';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model_name'], 'required'],
            [['model_id', 'file_folder_type_id','user_id'], 'integer'],
            // [['file_name'], 'string', 'max' => 250],
            [['model_name', 'hash'], 'string', 'max' => 150],
            [['remarks'], 'string', 'max' => 250],
            [['extension'], 'string', 'max' => 10],
            [['file_name'], 'file', 'extensions' => ['jpg','jpeg','png','pdf','xlsx','xlsm','xlsb','xls','xlt','xltx','xltm','csv','doc','docx'],'maxFiles'=>0,'skipOnEmpty'=>false],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_name' => 'File Name',
            'model_id' => 'Model ID',
            'model_name' => 'Model Name',
            'hash' => 'Hash',
            'extension' => 'Extension',
            'file_folder_type_id' => 'Attachement(s) Category',
            'remarks' => 'Remarks'
        ];
    }
}
