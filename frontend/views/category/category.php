<!-- AA: Breadcrumbs (not for start page) -->
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Lang;

$lang = Lang::getCurrent()->url;

// Определение имени раздела и его описания (выбранная категория)
$name = $category->{'name_' . $lang};
$description_short = $category->{'description_short_' . $lang};
$description = $category->{'description_' . $lang};
$description_image = $category->description_image;

$this->params['breadcrumbs'][] = ['label' => $name, 'url' => ['/category/' . $url]];

$this->params['schema'] = \yii\helpers\Json::encode([
    "@context" => "http://www.schema.org",
    "@type" => "ItemList",
    "name" => $name,
    "image" => "https://pandus.info/category/{$category->description_image}",
    "url" => \yii\helpers\Url::canonical(),
    "description" => htmlentities(strip_tags($description_short)),
    "itemListOrder" => "Unordered",
    "brand" => "Feal, Sweden",
    "numberOfItems" => count($products),
    "itemListElement" => $elements,
    /*"aggregateRating" => [
        "@type" => "aggregateRating",
        "ratingValue" => "5",
        "reviewCount" => "56",
        "bestRating" => "5"
    ],*/
    "offers" => [
        "@type" => "AggregateOffer",
        "offerCount" => "145",
        "lowPrice" => "5000",
        "highPrice" => "90000",
        "priceCurrency" => "UAH"
    ]
]);

?>

<div class="main" style="margin-top: 51px">
    <div style="margin-top: 20px">
        <div class="container">

            <h1 class="text-center" style="margin-top: 45px"><?= $name ?></h1>
            <h3 class="lead text-center">
                <?= $description_short ?>
            </h3>

            <?php if ($widgets) { ?>
                <div class="row">
                    <?php foreach ($widgets as $item) { ?>
                        <div class="col-xs-12 col-md-4">
                            <div class="sd-object sd-text-center sd-object-text-image" style="min-height: 80px">
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

    <?php if ($videos) { ?>
        <div class="container">
            <div class="row">
                <?php foreach ($videos as $item) { ?>
                    <div class="col-xs-12 col-md-6">
                        <div class="">
                            <h3 class="text-center heading">
                                <?= $item->{'title_' . $lang} ?>
                            </h3>
                        </div>
                        <iframe width="560" height="315"
                                src="<?= $item->image ?>"
                                allow="accelerometer; autoplay;
                                    encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen style="border: 0px; max-width: 100%">
                        </iframe>
                        <div class="sd-object sd-text-left sd-object-text-image" style="max-width: 100%">
                            <?= $item->{'description_' . $lang} ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>

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

                                    <div class="card-body" style="/*border-top: 1px solid #ccc*/">
                                        <h4 class="card-text text-center"><?= $item->{'name_' . $lang} ?></h4>
                                    </div>
                                </a>
                                <div class="card-body" style="padding-left: 10px; border-top: 1px solid #ccc">
                                    <div class="price">
                                        <h4 class="card-text">
                                            <?= Yii::t('main', 'Ціна: ') ?>
                                            <?= number_format($item->price, 2, ',', '\'') ?>
                                        </h4>
                                        <a class="add-to-cart btn btn-lg btn-round btn-b" data-id="<?= $item->id ?>">
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
</div>
