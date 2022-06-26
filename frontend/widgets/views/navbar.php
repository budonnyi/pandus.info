<?php

use common\models\Lang;
use yii\helpers\Html;
use yii\helpers\Url;

$lang = Lang::getCurrent()->url;

?>

<nav class="navbar navbar-custom navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse"
                    data-target="#custom-collapse"><span
                        class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                        class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand"
               href="<?= Url::toRoute('site/index') ?>"><?= Yii::t('main', 'Пандус Інфо') ?></a>
        </div>
        <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= Url::toRoute('site/index') ?>"><?= Yii::t('main', 'Головна') ?></a></li>
                <li class="dropdown"><a class="dropdown-toggle" href="<?= Url::toRoute('category/index') ?>" data-toggle="dropdown"><?= Yii::t('main', 'Каталог') ?></a>
                    <ul class="dropdown-menu">
                        <?php if (isset($catalog)) { ?>
                            <?php foreach ($catalog as $category) { ?>
                                <li class="dropdown">
                                    <a class="dropdown-toggle"
                                       href="<?= Url::toRoute(['category/category', 'url' => $category->url]) ?>"
                                       data-toggle="dropdown">
                                        <?= $category->{'name_' . $lang} ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($category->products as $product) { ?>
                                            <li>
                                                <a href="<?= Url::toRoute(['product/view', 'url' => $product->url]) ?>">
                                                    <?= $product->categories->{'name_' . $lang} . ' ' . $product->name ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </li>
                <li>
                    <a class="section-scroll" href="<?= Url::toRoute('site/blog') ?>">
                        <?= Yii::t('main', 'Блог') ?>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="<?= Url::toRoute('site/city') ?>"
                       data-toggle="dropdown">
                        <?= Yii::t('main', 'Міста') ?>
                    </a>
                    <?php if (isset($cities)) { ?>
                        <ul class="dropdown-menu">
                            <?php foreach ($cities as $city) { ?>
                                <li>
                                    <a href="<?= Url::toRoute(['site/cities', 'city' => $city->city]) ?>">
                                        <?= Yii::t('main', 'Купити пандус') . ' ' . $city->{'city_where_' . $lang} ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </li>
                <li>
                    <a class="section-scroll" href="<?= Url::toRoute('site/contact') ?>">
                        <?= Yii::t('main', 'Контакт') ?>
                    </a>
                </li>
                <li>
                    <a class="section-scroll" href="tel:+380962010191">
                        +380962010191
                    </a>
                </li>
                <li>
                    <a id="getCart" href="#" rel="noopener">
                        <span class="icon-basket"></span>
                    </a>
                </li>
                <li>
                    <?= \frontend\widgets\LangWidget::widget() ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
