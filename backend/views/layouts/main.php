<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);

//$role = Yii::$app->getUser()->identity->role;
if (!Yii::$app->user->isGuest) {
    $userRole = Yii::$app->user->identity->role;
    $userName = Yii::$app->user->identity->username;
}

//$this->registerJsFile('');

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <link rel="icon" href="/admin/dist/images/fav.ico"/>
    <!--    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<style>
    .logotype-maria {
        width: 253px !important;
        padding: 0px;
        margin: 0px;
    }

     .cont {
         width: 100%;
     }
</style>

<div class="wrapper">

    <?php if (!Yii::$app->user->isGuest) { ?>

    <div id="header-fix" class="header w-100">
        <nav class="navbar navbar-expand-lg crystal-bg-primary py-0 pl-0 text-white">
            <a href="/admin" class="navbar-brand site-logo crystal-bg-secondry <!--mr-0--> <!--pt-4 pl-3-->">
                <?= Html::img('http://placehold.it/253x75',
                    ['alt' => 'Наш логотип', 'width' => '100%',
                        'class' => "logotype-maria"]) ?>
            </a>
            <div class="navbar-header px-3 pt-4 mr-lg-4 crystal-brd-right">
                <button type="button" id="sidebarCollapse" class="navbar-btn bg-transparent">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav notification ml-auto">
                    <li class="nav-item dropdown align-self-center mr-3">
                        <a class="nav-link position-relative p-3" data-toggle="dropdown" aria-expanded="false">
                            <div class="media">
                                <?= Html::img('@web/dist/images/av1.png',
                                    [
                                        'alt' => '',
                                        'class' => "img-fluid d-flex mr-3 rounded-circle",
                                        'width' => "44"
                                    ])
                                ?>
                                <div class="media-body crystal-line-height-1_5 align-self-center text-white">
                                    <small class="text-uppercase"><?= $userName ?></small>
                                    <small class="d-block"><?= $userRole ?></small>
                                </div>
                            </div>
                        </a>

                        <ul class="dropdown-menu border crystal-border-light border-top-0 rounded-0 py-0 font-weight-bold">
                            <li>
                                <?= Html::a('<span class="ti-power-off pr-2"></span> Выход ', ['site/logout'],
                                    [
                                        'data' => ['method' => 'post'],
                                        'class' => 'dropdown-item ',
                                    ]);
                                ?>
                            </li>
                        </ul>

                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <nav id="sidebar">
        <div class="sidebar-nav">
            <ul class="metismenu list-unstyled mb-0" id="menu">
                <li>
                    <a href="/" class="navbar-brand site-logo crystal-bg-secondry mr-0 pt-4 pl-3">
                        <?= Html::img('/admin/dist/images/logo-v1.png', ['class' => 'img-fluid', 'alt' => '']) ?>
                    </a>
                </li>

                <?php if (!Yii::$app->user->isGuest) { ?>
                    <li><a href="<?= Url::to(['blog/index']) ?>"><i class="fa fa-desktop pr-2"></i> Блог</a></li>
                    <li><a href="<?= Url::to(['category/index']) ?>"><i class="fa fa-desktop pr-2"></i> Категории</a></li>
                    <li><a href="<?= Url::to(['product/index']) ?>"><i class="fa fa-desktop pr-2"></i> Товары</a></li>
                    <li><a href="<?= Url::to(['order/index']) ?>"><i class="fa fa-desktop pr-2"></i> Запросы</a></li>
                    <li><a href="<?= Url::to(['widget/index']) ?>"><i class="fa fa-desktop pr-2"></i> Виджеты категорий</a></li>
                    <li><a href="<?= Url::to(['video/index']) ?>"><i class="fa fa-desktop pr-2"></i> Видео категорий</a></li>
                    <li><a href="<?= Url::to(['city/index']) ?>"><i class="fa fa-desktop pr-2"></i> Города</a></li>
                    <li><a href="<?= Url::to(['db/index']) ?>"><i class="fa fa-desktop pr-2"></i> Импорт БД</a></li>
                    <?php if (\Yii::$app->user->can('userPanel')) { ?>
                        <li><a href="<?= Url::to(['/user']) ?>"><i class="fa fa-user pr-2"></i> Пользователи</a></li>
                    <?php } ?>

                <?php } ?>


            </ul>
        </div>
    </nav>

    <div id="content">
        <p class="nav-title">
            <i class="fa fa-home pr-2"></i>Главная / <?php echo Yii::$app->params['title'] ?? '';
            echo isset(Yii::$app->params['subtitle']) ? ' / ' . Yii::$app->params['subtitle'] : '' ?>
        </p>
        <h2><?= Yii::$app->params['page_title'] ?? "" ?></h2>
        <div class="container-fluid" style="min-height: 450px;">
            <?php } ?>

            <div class="row">

                <style>
                    .cont {
                        padding: 20px;
                    }
                </style>
                <div class="cont">
                    <?= $content ?>
                </div>

            </div>

        </div>
    </div>

    <!-- Top To Bottom-->
    <div class="scrollup text-center crystal-bg-primary">
        <a href="#" class="text-white"><i class="fa fa-chevron-up"></i></a>
    </div>
    <!-- End Top To Bottom-->

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
