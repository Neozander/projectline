<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "communication_members".
 *
 * @property integer $idcommunication_members
 * @property integer $communication_id
 * @property integer $user_id
 *
 * @property CommunicationFiles[] $communicationFiles
 * @property Communication $communication
 * @property User $user
 */
class CommunicationMembers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'communication_members';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['communication_id', 'user_id'], 'required'],
            [['communication_id', 'user_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcommunication_members' => 'Idcommunication Members',
            'communication_id' => 'Communication ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommunicationFiles()
    {
        return $this->hasMany(CommunicationFiles::className(), ['communication_id' => 'idcommunication_members']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommunication()
    {
        return $this->hasOne(Communication::className(), ['idcommunication' => 'communication_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
