<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectTeam */

$this->title = 'Update Project Team: ' . ' ' . $model->idproject_team;
$this->params['breadcrumbs'][] = ['label' => 'Project Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idproject_team, 'url' => ['view', 'id' => $model->idproject_team]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-team-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
