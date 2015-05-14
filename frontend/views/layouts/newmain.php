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
            <ul class="navbar-nav navbar-right nav" id="w1">
                <li class="active"><a href="/projectline/frontend/web/">Home</a></li>
                <?php
                    if (Yii::$app->user->isGuest) {
                        echo '<li>' . html::a('Регистрация', Yii::getAlias('@web') . '/site/signup') . '</li>';
                        echo '<li>' . html::a('Вход', Yii::getAlias('@web') . '/site/login') . '</li>';
                    } else {
                        echo '<li>' . html::a('Проекты', Yii::getAlias('@web') . '/project') . '</li>';
                        echo '<li>' . html::a('Роли', Yii::getAlias('@web') . '/roles') . '</li>';
                        echo '<li>' . html::a('Выход('.Yii::$app->user->identity->username.')', Yii::getAlias('@web') . '/site/logout',
                                ['data-method' => 'post']) . '</li>';
                    }
                ?>
            </ul>
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
                    <a href="<?= yii::getAlias('@web')?>/project/<?= yii::$app->request->get('id') ?>/customer" data-toggle="tab"><i class="fa fa-user fa-fw"></i> Заказчик</a>
                </li>
                <li>
                    <a href="<?= yii::getAlias('@web')?>/project/<?= yii::$app->request->get('id') ?>/team" data-toggle="tab"><i class="fa fa-users fa-fw"></i> Команда</a>
                </li>
                <li>
                    <a href="#project_info" data-toggle="tab"><i class="fa fa-list-alt fa-fw"></i> Данные по проекту</a>
                </li>
                <li>
                    <a href="<?= yii::getAlias('@web')?>/project/<?= yii::$app->request->get('id') ?>/communication" data-toggle="tab"><i class="fa fa-comments-o fa-fw"></i> Переписка</a>
                </li>
            </ul>
            <!-- /#side-menu -->
        </div>
        <!-- /.sidebar-collapse -->
    </nav>
    <!-- /.navbar-static-side -->

    <div id="page-wrapper">
        <!-- Tab panes -->
        <div class="content">
            <?= $content ?>
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
