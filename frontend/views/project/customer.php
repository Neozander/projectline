<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = 'Заказчик';
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-user fa-fw"></i><?= HTML::encode($this->title) ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div id="client_info_script">
            <div>
                <h2> <small>Название: </small><?= $customer->customer_name ?></h2>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Реквизиты компании
                        </h4>
                    </div>
                    <div id="collapseRec" style="height: auto;">
                        <div class="panel-body"><?= $customer->details ?></div>
                    </div>
                </div>
            </div></div>
        <p></p><hr><p></p>
        <div id="contacts_script">

            <?php
                foreach($customer_contacts as $contact):
            ?>
            <div>
                <h2><small>Контактное лицо: </small><?=$contact->contact_name?></h2>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                        <tr><td><i class="fa fa-envelope fa-fw"></i> Email:</td><td><?=$contact->contact_email ?></td></tr>
                        <tr><td><i class="fa fa-skype fa-fw"></i> Skype</td><td><?=$contact->contact_skype ?></td></tr>
                        <tr><td><i class="fa fa-phone fa-fw"></i> Телефон:</td><td><?=$contact->contact_phone ?></td></tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <hr>
            </div>

            <?php endforeach;?>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

