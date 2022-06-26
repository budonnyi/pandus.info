<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Lang;
use yii\widgets\MaskedInput;

$lang = Lang::getCurrent()->url;

$this->params['schema'] = \yii\helpers\Json::encode([
    "@context" => "http://schema.org/",
    "@type" => "Article",
    "headline" => $model->{'title_' . $lang} ?? '',
    "image" => "https://pandus.info/images/blog/{$model->image}",
    "description" => $model->{'content_' . $lang} ?? '',
    "author" => $model->author ?? '',
    "url" => \yii\helpers\Url::canonical(),
    "publisher" => [
        "@type" => "Organization",
        "name" => Yii::t('main', 'Хендікарс ТОВ'),
        "url" => "https://pandus.info",
        "logo" => [
            "@type" => "ImageObject",
            "url" => "https://pandus.info/images/blog/{$model->image}"
        ]
    ],
    "datepublished" => date('Y-m-d', $model->created_at)

]);

?>

<section class="module-small">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-8">
                <div class="post">
                    <div class="post-thumbnail">
                        <img src="/images/blog/<?= $model->image ?>" alt="<?= $model->{'title_' . $lang} ?? '' ?>" style="width: 100%"/>
                    </div>
                    <div class="post-header font-alt">
                        <h1 class="post-title"><?= $model->{'title_' . $lang} ?? '' ?></h1>
                        <div class="post-meta">
                            Автор:&nbsp;<a href="#"><?= $model->author ?? '' ?></a>| <?= date('d.m.Y', $model->created_at) ?>
                        </div>
                    </div>
                    <div class="post-entry">
                        <?= $model->{'content_' . $lang} ?? '' ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 sidebar">
                <div class="widget">
                    <?php if (isset($resentBlogs)) { ?>
                        <h5 class="widget-title font-alt"><?= Yii::t('main', 'Читати також') ?></h5>
                        <ul class="widget-posts">
                            <?php foreach ($resentBlogs as $item) { ?>
                                <li class="clearfix">
                                    <div class="widget-posts-image" style="width: 100px; margin: 5px">
                                        <a href="<?= Url::to(['post', 'url' => $item->url]) ?>">
                                            <img src="/images/blog/<?= $item->image ?>" alt="<?= $item->{'title_' . $lang} ?? '' ?>"/>
                                        </a>
                                    </div>
                                    <div class="widget-posts-body">
                                        <div class="widget-posts-title">
                                            <a href="<?= Url::to(['post', 'url' => $item->url]) ?>"><?= $item->{'title_' . $lang} ?? '' ?></a>
                                        </div>
                                        <div class="widget-posts-meta"><?= date('d.m.Y', $item->created_at) ?></div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
