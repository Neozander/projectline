<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $idproject
 * @property integer $customer_id
 * @property string $name
 * @property integer $start
 * @property integer $end
 * @property integer $hours
 * @property integer $budget
 * @property string $bug_tracker
 * @property string $svn
 * @property string $testflight
 *
 * @property Communication[] $communications
 * @property Files[] $files
 * @property Customer $customer
 * @property ProjectTeam[] $projectTeams
 * @property Timeline[] $timelines
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'name', 'budget', 'bug_tracker'], 'required'],
            [['customer_id', 'start', 'end', 'hours', 'budget'], 'integer'],
            [['name', 'bug_tracker', 'svn', 'testflight'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idproject' => 'Idproject',
            'customer_id' => 'Customer ID',
            'name' => 'Name',
            'start' => 'Start',
            'end' => 'End',
            'hours' => 'Hours',
            'budget' => 'Budget',
            'bug_tracker' => 'Bug Tracker',
            'svn' => 'Svn',
            'testflight' => 'Testflight',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommunications()
    {
        return $this->hasMany(Communication::className(), ['project_id' => 'idproject']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(Files::className(), ['project_id' => 'idproject']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['idcustomer' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectTeams()
    {
        return $this->hasMany(ProjectTeam::className(), ['project_id' => 'idproject']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimelines()
    {
        return $this->hasMany(Timeline::className(), ['project_id' => 'idproject']);
    }
}
