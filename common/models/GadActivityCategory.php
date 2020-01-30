<?php

namespace common\models;
use niksko12\auditlogs\classes\ModelAudit;
use Yii;

/**
 * This is the model class for table "gad_activity_category".
 *
 * @property int $id
 * @property string $title
 */
class GadActivityCategory extends ModelAudit
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gad_activity_category';
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
