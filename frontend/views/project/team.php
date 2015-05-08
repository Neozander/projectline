<?php

use yii\helpers\Html;
use yii\bootstrap\Dropdown;
/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = 'Команда проекта: ' . ' ';
?>
<h1><?= Html::encode($this->title)?></h1>

<div class="dropdown">
    <h3>Добавить участника</h3>
    <form action="addmember" method="POST">
        <select name="add_team_member" id="add_team_member" class="form-control col-md-4">
            <?php
            $dropdown_list = '';
            foreach($users as $value){
                $dropdown_list.= '<option value="' . $value->id . '">' . $value->username . '</option>';
            }
            echo $dropdown_list;
            ?>
            <input type="submit" value="Добавить" class="btn btn-primary"/>
        </select>
    </form>
</div>