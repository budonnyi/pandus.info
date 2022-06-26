<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Lang;

$lang = Lang::getCurrent()->url;

$this->params['breadcrumbs'][] = [
    'template' => "<li>{link}</li>\n", //  шаблон для этой ссылки
    'label' => 'Продукция', // название ссылки
    'url' => ['/category'] // сама ссылка
];

$this->params['schema'] = \yii\helpers\Json::encode([
    "@context" => "https://schema.org/",
    "@type" => "Product",
    "name" => $product->{'name_' . $lang},
    "image" => [
        "https://pandus.handycars.com.ua/product/{$product->image}"
    ],
    "description" => !empty($product->{'description_short_' . $lang}) ? htmlentities(strip_tags($product->{'description_short_' . $lang})) : htmlentities($product->{'name_' . $lang}),
    "sku" => $product->code ?? $product->id,
    "mpn" => $product->manufacturer,
    /*"review" => 'Рекомендую купить ' . $product->{'name_' . $lang},
    "author" => 'Author ' . $product->code,*/
    "priceCurrency" => "UAH",
    "price" => $product->price,
    "url" => \yii\helpers\Url::canonical(),
    "priceValidUntil" => date('Y-m-d', time()),
    "brand" => [
        "@type" => "Thing",
        "name" => $product->manufacturer
    ],
    "aggregateRating" => [
        "@type" => "AggregateRating",
        "ratingValue" => "4.8",
        "reviewCount" => "89"
    ],
    "offers" => [
        "@type" => "Offer",
        "url" => "https://pandus.handycars.com.ua/{$lang}/contact",
        "priceCurrency" => "UAH",
        "price" => $product->price,
        "priceValidUntil" => date('Y-m-d', time()),
        "itemCondition" => "https://schema.org/NewCondition",
        "availability" => "https://schema.org/InStock",
        "seller" => [
            "@type" => "Organization",
            "name" => "Интернет-магазин pandus.handycars.com.ua"
        ]
    ]
]);

?>

<div class="main">
    <div>
        <section class="module" style="padding: 100px 0 50px">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 mb-sm-40">
                        <a class="gallery" href="#">
                            <img src="/product/<?= $product->image ?>"
                                 alt="<?= $product->{'name_' . $lang} ?>"/>
                        </a>
                        <ul class="product-gallery">
                            <?php if (isset($images)) : ?>
                                <?php foreach ($images as $img) : ?>
                                    <li>
                                        <a class="gallery" href="assets/images/shop/product-8.jpg"></a>
                                        <img src="assets/images/shop/product-8.jpg"
                                             alt="<?= $product->{'name_' . $lang} ?>"/>
                                    </li>
                                <?php endforeach ?>
                            <?php endif ?>
                        </ul>

                        <script>
                            $('.gallery').on('click', function () {
                                return false;
                            })
                        </script>

                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="product-title font-alt"
                                    style="font-size: 32px"><?= $product->categories->{'name_' . $lang} . ' ' . $product->name ?></h1>
                            </div>
                        </div>

                        <div class="row mb-20">
                            <div class="col-sm-12">
                                <div class="price font-alt"><span style="display: none"><?= $product->price ?></span>
                                <span class="amount" style="font-size: 28px">
                                    <?= number_format($product->price, 2, ',', '\'') ?> грн
                                </span>
                                </div>
                                <span style="display: none"><?= Url::to($product->url . '.html') ?></span>
                            </div>
                        </div>

                        <span style="display: none"><?= $product->{'description_short_' . $lang} ?></span>

                        <div class="row mb-40">
                            <div class="col-sm-12">
                                <div class="description">
                                    <p style="margin-top: 24px;">
                                        <span>
                                            <?= $product->{'description_short_' . $lang} ?>
                                        </span>
                                    </p>

                                    <?php if (!empty($product->{'technical_' . $lang})) { ?>
                                        <h3 class="font-alt"
                                            style="margin-top: 50px; font-size: 24px"><?= Yii::t('main', 'Технічні параметри') ?>
                                        </h3>
                                        <div><?= $product->{'technical_' . $lang} ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-20">
                            <div class="col-sm-4 mb-sm-20">
                                <input id="qty" class="form-control input-lg"
                                       type="number"
                                       value="1"
                                       max="5"
                                       min="1"
                                       required="required"/>
                            </div>
                            <div class="col-sm-8">
                                <a class="add-to-cart btn btn-lg btn-round btn-b" data-id="<?= $product->id ?>">
                                    <?= Yii::t('main', 'Купити') ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr class="divider-w">
        <section class="module-small">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h2 class="module-title font-alt"><?= Yii::t('main', 'Схожа продукція') ?></h2>
                    </div>
                </div>
                <div class="row multi-columns-row">
                    <?php foreach ($similarProducts as $item) { ?>
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="shop-item">
                                <div class="shop-item-image">
                                    <img src="/product/<?= $item->image ?>"
                                         alt="<?= $item->{'name_' . $lang} ?>"/>
                                    <div class="shop-item-detail">
                                        <a class="add-to-cart btn btn-round btn-b" data-id="<?= $item->id ?>">
                                        <span class="icon-basket">
                                            <?= Yii::t('main', 'Купити') ?>
                                        </span>
                                        </a>
                                    </div>
                                </div>
                                <h4 class="shop-item-title font-alt">
                                    <a href="<?= Url::to($item->url . '.html') ?>"><?= $item->{'name_' . $lang} ?></a>
                                </h4>
                                <p class="price-num"><?= number_format($item->price, 2, ',', '\'') . ' грн' ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>
</div>
