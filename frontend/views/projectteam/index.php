<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectTeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Teams';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-team-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Project Team', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idproject_team',
            'project_id',
            'user_id',
            'role_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
