<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Project Name</th>
            <th>Start date</th>
            <th>End date</th>
            <th>Hours</th>
            <th>Budget</th>
            <th></th>
        </tr>
        <?php
        foreach ($dataProvider as $value){
            echo '<tr>
            <td>' . $value->idproject . '</td>
            <td>' . $value->customer_id . '</td>
            <td>' . $value->name . '</td>
            <td>' . $value->start . '</td>
            <td>' . $value->end . '</td>
            <td>' . $value->hours . '</td>
            <td>' . $value->budget . '</td>
            <td>
                <a data-pjax="0" title="View" href="' . yii::getAlias('@web') .'/project/' . $value->idproject . '"><span class="glyphicon glyphicon-eye-open"></span></a>
                <a data-pjax="0" title="Update" href="' . yii::getAlias('@web') .'/project/update?id=' . $value->idproject . '"><span class="glyphicon glyphicon-pencil"></span></a>
                <a data-pjax="0" data-method="post" data-confirm="Are you sure you want to delete this item?" title="Delete" href="' . yii::getAlias('@web') .'/project/delete?id=' . $value->idproject . '"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>';
        }
        ?>
    </table>

</div>
