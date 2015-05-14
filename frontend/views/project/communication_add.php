<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;
use yii\helpers\ArrayHelper;

?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'communication_date')->widget(DateTimePicker::className(),[
        'clientOptions' => [
            'format' => 'yyyy-mm-dd hh:ii',
            'autoclose' => true,
        ]
    ]) ?>
    <?= $form->field($model, 'subject')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'text')->textarea() ?>
    <?= $form->field($model, 'type')->textInput(['maxlength' => 32]) ?>
    <?= $form->field($model, 'project_id')->hiddenInput(['value' => yii::$app->request->get('id')])->label(false) ?>
    <?= $form->field($members_model, 'user_id')->dropDownList(ArrayHelper::map($members,'user_id', 'user.username'),['prompt' => 'Select members','multiple' => 'multiple']) ?>


    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
