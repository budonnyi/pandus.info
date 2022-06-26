<!-- AA: Breadcrumbs (not for start page) -->
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Lang;

$lang = (Lang::getCurrent()->url);

// Определение имени раздела и его описания (выбранная категория)
$name = $category->{'name_' . $lang};
$description_short = $category->{'description_short_' . $lang};
$description = $category->{'description_' . $lang};
$description_image = $category->description_image;

$this->params['breadcrumbs'][] = ['label' => $name, 'url' => ['/category/' . $url]];

?>

<div class="main" style="margin-top: 51px">
    <div style="margin-top: 20px">
        <div class="container">

            <h1 class="text-center" style="margin-top: 45px"><?= $name ?></h1>
            <h3 class="lead text-center">
                <?= $description_short ?>
            </h3>

            <section class="module bg-dark-40 portfolio-page-header img-responsive"
                     data-background="/category/<?= $category->description_image ?>" style="min-height: 680px">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <h1 class="module-title font-alt"><? /*= $name */ ?></h1>
                            <div class="module-subtitle"><? /*= $description_short */ ?></div>
                        </div>
                    </div>
                </div>
            </section>

            <?php if ($widgets) { ?>
                <div class="row">
                    <?php foreach ($widgets as $item) { ?>
                        <div class="col-xs-12 col-md-4">
                            <div class="sd-object sd-text-center sd-object-text-image">
                                <h3 class="text-center heading">
                                    <?= $item->{'title_' . $lang} ?></h3></div>
                            <div class="sd-object sd-object-code">
                                <img src="/widget_picture/<?= $item->image ?>" title=""
                                     alt="<?= $item->{'title_' . $lang} ?>" style="border:0px; width: 100%">
                            </div>
                            <div class="sd-object sd-text-left sd-object-space">
                                <div class="sd-object sd-object-space" style="height:15px;">
                                    <div class="sd-object">&nbsp;</div>
                                </div>
                            </div>
                            <div class="sd-object sd-text-left sd-object-text-image" style="max-width: 100%">
                                <?= $item->{'description_' . $lang} ?>
                            </div>
                            <div class="sd-object sd-text-left sd-object-space">
                                <div class="sd-object sd-object-space" style="height:30px;">
                                    <div class="sd-object">&nbsp;</div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

        </div>
    </div>

    <div class="container">
        <div style="margin-top: 20px;">


            <?php if (!empty($description)) { ?>
                <h2 class="text-center"
                    style="margin-top: 45px; margin-bottom: 45px;"><?= Yii::t('main', 'Технічні характеристики') ?></h2>
                <div style="overflow: scroll">
                    <?= $description ?>
                </div>
            <?php } ?>

            <?php if (!empty($products)) { ?>
                <h2 class="text-center" style="margin: 30px auto"><?= Yii::t("main", "Товари у категорії") ?></h2>

                <div class="row">
                    <?php foreach ($products as $item) { ?>
                        <div class="col-md-4" style="margin-bottom: 30px">
                            <div class="card" style="border: 1px solid #ccc">
                                <a href="<?= Url::to(['product/view', 'url' => $item->url]) ?>"
                                   style="text-decoration: none;">

                                    <?= Html::img(('/product/' . $item->image), ['class' => 'card-img-top', 'alt' => $item->name_ru]) ?>

                                    <div class="card-body" style="border-top: 1px solid #ccc">
                                        <h4 class="card-text text-center"><?= $item->{'name_' . $lang} ?></h4>
                                    </div>
                                </a>
                                <div class="card-body" style="padding-left: 10px; border-top: 1px solid #ccc">
                                    <div class="price">
                                        <h4 class="card-text">
                                            <?= Yii::t('main', 'Ціна: ') ?>
                                            <?= number_format($item->price, 2, ',', '\'') ?></h4>
                                        <a class="add-to-cart btn btn-lg btn-round btn-b" data-id="<?= $item->id ?>"
                                           href="<?= Url::to(['cart/add/', 'id' => $item->id]) ?>">
                                            <?= Yii::t('main', 'Купити') ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body" style="padding: 0 10px; border-top: 1px solid #ccc">
                                    <div class="card-text">
                                        <?= $item->{'technical_' . $lang} ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

        </div>

    </div>
