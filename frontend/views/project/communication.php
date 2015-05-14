<?php

use yii\helpers\Html;

$this->title = 'Переписка';
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-comments-o fa-fw"></i><?= HTML::encode($this->title) ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">

    <div class="add_communication">
        <?= $this->render('communication_add', [
            'model' => $communication_model,
            'members_model' => $communication_members_model,
            'members' => $members,
        ]) ?>
    </div>

    <div class="col-lg-12" id="messages_script">
        <?php foreach($communications as $communication):?>
            <?php var_dump($communication); ?>
            <div class="panel panel-info">

                <div class="panel-heading">
                    <strong><?= $communication->subject ?></strong>
                    <?= date('Y-m-d H:i',$communication->communication_date) ?> / <i class="fa fa-skype fa-fw"></i> <?= $communication->type ?>
                </div>
                <div class="panel-body">
                    <p><strong> Иванов, Алешков, Бушуев </strong></p>

                    <hr>
                    <p><?= $communication->text ?></p>
                </div>
                <div class="panel-footer">
                    Файлы:

                    <a href="https://copy.com/FCNsXQxcRM6yDiR7" target="_blank">123.txt</a>,

                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
