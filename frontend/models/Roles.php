<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_roles".
 *
 * @property integer $iduser_roles
 * @property string $role_name
 *
 * @property ProjectTeam[] $projectTeams
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_name'], 'required'],
            [['role_name'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iduser_roles' => 'Iduser Roles',
            'role_name' => 'Role Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectTeams()
    {
        return $this->hasMany(ProjectTeam::className(), ['role_id' => 'iduser_roles']);
    }
}
