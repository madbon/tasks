<?php

namespace common\models;
use niksko12\auditlogs\classes\ModelAudit;
use Yii;

/**
 * This is the model class for table "gad_score_type".
 *
 * @property int $id
 * @property int $code
 * @property string $title
 */
class GadScoreType extends ModelAudit
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gad_score_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'integer'],
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
            'code' => 'Code',
            'title' => 'Title',
        ];
    }
}
