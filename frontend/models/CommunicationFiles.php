<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "communication_files".
 *
 * @property integer $idcommunication_files
 * @property integer $communication_id
 * @property string $filename
 *
 * @property CommunicationMembers $communication
 */
class CommunicationFiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'communication_files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['communication_id', 'filename'], 'required'],
            [['communication_id'], 'integer'],
            [['filename'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcommunication_files' => 'Idcommunication Files',
            'communication_id' => 'Communication ID',
            'filename' => 'Filename',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommunication()
    {
        return $this->hasOne(CommunicationMembers::className(), ['idcommunication_members' => 'communication_id']);
    }
}
