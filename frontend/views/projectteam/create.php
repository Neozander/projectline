<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProjectTeam */

$this->title = 'Create Project Team';
$this->params['breadcrumbs'][] = ['label' => 'Project Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-team-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
