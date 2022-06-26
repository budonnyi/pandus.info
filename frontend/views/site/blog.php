<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Lang;
use yii\widgets\MaskedInput;

$lang = Lang::getCurrent()->url;

$this->params['schema'] = \yii\helpers\Json::encode([
    "@context" => "https://schema.org/",
    "@type" => "Article",
    "name" => Yii::t('main', 'Пандуси: Блог питань безпеки'),
    "url" => \yii\helpers\Url::canonical(),
    "image" => "https://pandus.info/slider_images/pandus4-min.jpg",
    "description" => Yii::t('main', 'Короткі історії про пандуси'),
    "brand" => "Хендикарс"
]);

?>

<section class="module bg-dark-60 blog-page-header" data-background="/slider_images/pandus4-min.jpg" style="margin-top: 50px">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1">
                <h1 class="module-title font-alt">
                    <?= Yii::t('main', 'Пандуси: Блог питань безпеки') ?>
                </h1>
                <div class="module-subtitle font-serif">
                    <?= Yii::t('main', 'Короткі історії про пандуси') ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="module">
    <div class="container">
        <?php if (isset($model)) { ?>
            <div class="row multi-columns-row post-columns">
                <?php foreach ($model as $item) { ?>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="post">
                            <div class="post-thumbnail">
                                <a href="<?= Url::to(['post', 'url' => $item->url]) ?>">
                                    <img src="/images/blog/<?= $item->image ?>" alt="<?= $item->{'title_' . $lang} ?? '' ?>"/>
                                </a>
                            </div>
                            <div class="post-header font-alt">
                                <a href="<?= Url::to(['post', 'url' => $item->url]) ?>"><?= $item->{'title_' . $lang} ?? '' ?></a>
                                <div class="post-meta">Автор&nbsp;<a href="#"><?= $item->author ?? '' ?></a>&nbsp;| <?= date('d.m.Y', $item->created_at) ?>
                                </div>
                            </div>
                            <div class="post-entry">

                                <?php
                                if (!empty($item->{'content_' . $lang}) && strlen($item->{'content_' . $lang}) > 180) {
                                    $text = strip_tags($item->{'content_' . $lang} ?? '');
                                    $postContent = rtrim(mb_substr($text, 0, 180), "!,.-");
                                    $postContent = mb_substr($postContent, 0, mb_strrpos($postContent, ' '));
                                } else {
                                    $postContent = $item->{'content_' . $lang};
                                }
                                ?>

                                <?= $postContent ?>

                            </div>
                            <div class="post-more">
                                <a class="more-link" href="<?= Url::to(['post', 'url' => $item->url]) ?>">
                                    <?= Yii::t('main', 'Читати') ?>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        <?php } else { ?>
            <h3></h3>
        <?php } ?>
    </div>
</div>
