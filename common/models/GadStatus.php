<?php

namespace common\models;
use niksko12\auditlogs\classes\ModelAudit;
use Yii;

/**
 * This is the model class for table "gad_status".
 *
 * @property int $id
 * @property int $code
 * @property string $title
 */
class GadStatus extends ModelAudit
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gad_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code','title'], 'required'],
            [['code'], 'integer'],
            [['future_tense','class'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'title' => 'Title',
        ];
    }
}
