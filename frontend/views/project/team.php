<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = 'Команда проекта: ' . ' ';
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-users fa-fw"><?= Html::encode($this->title)?></i></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ФИО</th>
                        <th>Должность</th>
                    </tr>
                </thead>
                <tbody id="team_script">
                    <?php
                        $i = 0;
                        foreach($team as $member){
                            echo '<tr>
                                    <td>' . ++$i . '</td>
                                    <td>' . $member->user->username . '</td>
                                    <td>' . $member->role->role_name . '</td>
                                    </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
        <h3>Добавить участника</h3>
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'project_id')->hiddenInput(['value' => yii::$app->request->get('id')])->label(false) ?>
        <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map($users, 'id', 'username'), ['prompt' => 'Select user']) ?>
        <?= $form->field($model, 'role_id')->dropDownList(ArrayHelper::map($roles, 'iduser_roles', 'role_name'), ['prompt' => 'Select role']) ?>

        <div class="form-group">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
