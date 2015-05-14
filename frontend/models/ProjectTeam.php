<?php

namespace app\models;

use common\models\User;

use Yii;

/**
 * This is the model class for table "project_team".
 *
 * @property integer $idproject_team
 * @property integer $project_id
 * @property integer $user_id
 * @property integer $role_id
 *
 * @property Project $project
 * @property User $user
 * @property UserRoles $role
 */
class ProjectTeam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'user_id', 'role_id'], 'required'],
            [['project_id', 'user_id', 'role_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idproject_team' => 'Idproject Team',
            'project_id' => 'Project ID',
            'user_id' => 'User ID',
            'role_id' => 'Role ID',
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Roles::className(), ['iduser_roles' => 'role_id']);
    }

    public function exludeIds($result){
        $exclude = '';
        foreach($result as $row){
            $exclude.= $row->user_id . ',';
        }
        return substr($exclude, 0, -1);
    }
}
