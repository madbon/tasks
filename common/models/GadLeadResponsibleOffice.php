<?php

namespace common\models;
use niksko12\auditlogs\classes\ModelAudit;
use Yii;

/**
 * This is the model class for table "gad_lead_responsible_office".
 *
 * @property int $id
 * @property string $title
 */
class GadLeadResponsibleOffice extends ModelAudit
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gad_lead_responsible_office';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 50],
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
