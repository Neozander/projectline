<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectTeam */
/* @var $form ActiveForm */
?>
<div class="team2">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'project_id')->hiddenInput(['value' => yii::$app->request->get('id')])->label(false) ?>
        <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map($users, 'id', 'username'), ['prompt' => 'Select user']) ?>
        <?= $form->field($model, 'role_id')->dropDownList(ArrayHelper::map($roles, 'iduser_roles', 'role_name'), ['prompt' => 'Select role']) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- team2 -->
