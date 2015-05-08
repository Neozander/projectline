<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="wrapper">

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div id="project_Name_script">
            </div>
        </div>
        <!-- /.navbar-header -->

    </nav>
    <!-- /.navbar-static-top -->

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav nav-tabs nav-stacked" id="side-menu">

                <li class="active">
                    <a a href="#home" data-toggle="tab"><i class="fa fa-clock-o fa-fw"></i> Хронология</a>
                </li>
                <li>
                    <a href="#files" data-toggle="tab"><i class="fa fa-paperclip fa-fw"></i> Файлы</a>
                </li>
                <li>
                    <a href="#client" data-toggle="tab"><i class="fa fa-user fa-fw"></i> Заказчик</a>
                </li>
                <li>
                    <a href="#team" data-toggle="tab"><i class="fa fa-users fa-fw"></i> Команда</a>
                </li>
                <li>
                    <a href="#project_info" data-toggle="tab"><i class="fa fa-list-alt fa-fw"></i> Данные по проекту</a>
                </li>
                <li>
                    <a href="#messages" data-toggle="tab"><i class="fa fa-comments-o fa-fw"></i> Переписка</a>
                </li>
            </ul>
            <!-- /#side-menu -->
        </div>
        <!-- /.sidebar-collapse -->
    </nav>
    <!-- /.navbar-static-side -->

    <div id="page-wrapper">
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-clock-o fa-fw"></i> Хронология</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="row" id="timeline_header">
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <ul class="timeline" id="timeline_script">
                            </ul>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="row" id="timeline_footer">
                </div>

            </div>
            <div class="tab-pane" id="files">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-paperclip fa-fw"></i> Файлы</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h4><i class="fa fa-download fa-fw"></i> Файлы для скачивания</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Дата и время</th>
                                    <th>Описание</th>
                                    <th>Путь к файлу в Copy</th>
                                </tr>
                                </thead>
                                <tbody id="filesD_script">
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                        <hr>
                        <h4><i class="fa fa-globe fa-fw"></i> Файлы онлайн</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Дата и время</th>
                                    <th>Описание</th>
                                </tr>
                                </thead>
                                <tbody id="filesO_script">
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <div class="tab-pane" id="client">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-user fa-fw"></i> Заказчик</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div id="client_info_script">
                        </div>
                        <p><hr></p>
                        <div id="contacts_script">
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <div class="tab-pane" id="team">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-users fa-fw"></i> Команда</h1>
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
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->


                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <div class="tab-pane" id="project_info">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-list-alt fa-fw"></i> Данные по проекту</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">

                        <div class="table-responsive" id="project_info_script">
                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <div class="tab-pane" id="messages">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-comments-o fa-fw"></i> Переписка</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12" id="messages_script">
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

    <footer>
        <div class="container">
            <p> © Webparadox 2014 </p>
        </div>
    </footer>
    <!-- /#footer -->

</div>
<!-- /#wrapper -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
