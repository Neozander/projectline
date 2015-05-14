<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = 'Роли';
?>

<h1><?= Html::encode($this->title)?></h1>

<div>
    <ol>
<?php
    foreach($roles as $role){
        echo '<li>' . $role->role_name . '</li>';
    }
?>
    </ol>
<?= $this->render('addrole', [
    'model' => $rolesModel,
]) ?>

</div>