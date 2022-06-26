<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\models\Lang;

$lang = Lang::getCurrent()->url;

?>

<section class="module pb-0">
    <div class="container">
        <?php if (!empty($products)) { ?>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt"><?= Yii::t("main", "Рекомендовані товари") ?></h2>
                </div>
            </div>

            <div class="row">
                <?php foreach ($products as $item) { ?>
                    <div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 30px">
                        <div class="card" style="border: 1px solid #ccc">
                            <a href="<?= Url::to(['product/view', 'url' => $item->url]) ?>"
                               style="text-decoration: none;">

                                <?= Html::img(('/product/' . $item->image), ['class' => 'card-img-top', 'alt' => $item->name_ru]) ?>

                                <div class="card-body" style="/*border-top: 1px solid #ccc*/">
                                    <h4 class="card-text text-center"><?= $item->{'name_' . $lang} ?></h4>
                                </div>
                            </a>
                            <h5 class="text-center" style="color: green"><?= Yii::t("main", "В наявності") ?></h5>
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
</section>