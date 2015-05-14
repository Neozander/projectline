<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "communication".
 *
 * @property integer $idcommunication
 * @property integer $communication_date
 * @property string $subject
 * @property string $text
 * @property string $type
 * @property integer $project_id
 *
 * @property Project $project
 * @property CommunicationMembers[] $communicationMembers
 */
class Communication extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'communication';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['communication_date', 'subject', 'text', 'type', 'project_id'], 'required'],
            //[['communication_date', 'project_id'], 'integer'],
            [['project_id'], 'integer'],
            [['text'], 'string'],
            [['subject'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcommunication' => 'Idcommunication',
            'communication_date' => 'Communication Date',
            'subject' => 'Subject',
            'text' => 'Text',
            'type' => 'Type',
            'project_id' => 'Project ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['idproject' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommunicationMembers()
    {
        return $this->hasMany(CommunicationMembers::className(), ['communication_id' => 'idcommunication']);
    }
}
