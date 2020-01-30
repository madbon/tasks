<?php

namespace common\models;
use niksko12\auditlogs\classes\ModelAudit;
use Yii;

/**
 * This is the model class for table "gad_file_folder_type".
 *
 * @property int $id
 * @property string $title
 */
class GadFileFolderType extends ModelAudit
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gad_file_folder_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }
}
