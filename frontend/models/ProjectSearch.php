<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Project;

/**
 * ProjectSearch represents the model behind the search form about `app\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idproject', 'customer_id', 'start', 'end', 'hours', 'budget'], 'integer'],
            [['name', 'bug_tracker', 'svn', 'testflight'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Project::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idproject' => $this->idproject,
            'customer_id' => $this->customer_id,
            'start' => $this->start,
            'end' => $this->end,
            'hours' => $this->hours,
            'budget' => $this->budget,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'bug_tracker', $this->bug_tracker])
            ->andFilterWhere(['like', 'svn', $this->svn])
            ->andFilterWhere(['like', 'testflight', $this->testflight]);

        return $dataProvider;
    }
}
