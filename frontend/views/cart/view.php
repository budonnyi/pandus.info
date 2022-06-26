<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Корзина';

$this->registerMetaTag([
    'name' => 'robots',
    'content' => 'noindex,nofollow'
]);

?>

<div class="main">
    <section class="module">
        <div class="container">
            <?php if (Yii::$app->session->hasFlash('success')) : ?>
                <div class="alert alert-success alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" data-label="close"><span
                                aria-hidden="true">&times;</span></button>
                    <?= Yii::$app->session->getFlash('success'); ?>
                </div>
            <?php endif; ?>

            <?php if (Yii::$app->session->hasFlash('error')) : ?>
                <div class="alert alert-danger alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" data-label="close"><span
                                aria-hidden="true">&times;</span></button>
                    <?= Yii::$app->session->getFlash('error'); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($session['cart'])) : ?>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h1 class="module-title font-alt"><?= Yii::t('main', 'Оформлення замовлення') ?></h1>
                </div>
            </div>
            <hr class="divider-w pt-20">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-border checkout-table">
                        <thead>
                        <tr>
                            <th class="hidden-xs">Продукт</th>
                            <th><?= Yii::t('main', 'Назва') ?></th>
                            <th><?= Yii::t('main', 'Кількість') ?></th>
                            <th><?= Yii::t('main', 'Ціна') ?></th>
                            <th class="hidden-xs"><?= Yii::t('main', 'Разом') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($session['cart'] as $id => $item) { ?>
                            <tr>
                                <td class="hidden-xs">
                                    <a href="#">
                                        <img src="https://pandus.info/product/<?= $item['img'] ?>"
                                             alt="<?= $item['name'] ?>"/>
                                    </a>
                                </td>
                                <td>
                                    <h5 class="product-title font-alt"><?= $item['name'] ?></h5>
                                </td>

                                <td>
                                    <h5 class="product-title font-alt"><?= $item['qty'] ?> </h5>
                                </td>
                                <td >
                                    <h5 class="product-title font-alt"><?= number_format($item['price'], 2, ',', "'") ?> грн</h5>
                                </td>
                                <td class="hidden-xs">
                                    <h5 class="product-title font-alt"><?= number_format($item['price'] * $item['qty'], 2, ',', "'") ?> грн</h5>
                                </td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <hr class="divider-w">
            <div class="row mt-70">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="shop-Cart-totalbox">
                        <h4 class="font-alt"><?= Yii::t('main', 'Разом') ?></h4>
                        <table class="table table-striped table-border checkout-table">
                            <tbody>
                            <tr>
                                <th><?= Yii::t('main', 'До сплати') ?></th>
                                <td><?= number_format($session['cart.sum'], 2, ',', "'") ?> грн</td>
                            </tr>

                            </tbody>
                        </table>

                        <?php $form = ActiveForm::begin() ?>
                        <?= $form->field($order, 'name') ?>
                        <?= $form->field($order, 'email') ?>
                        <?= $form->field($order, 'phone') ?>
                        <?= $form->field($order, 'comment')->textarea(['rows' => '3'])->label(Yii::t('main', "Коментар (не обов'язковий)")) ?>
<!--                        <?//= $form->field($order, 'address')->textarea(['rows' => 3])->label(Yii::t('main', "Адреса доставки (не обов'язковий)")) ?> -->
                        <?= Html::submitButton('Відправити', ['class' => 'btn btn-lg btn-block btn-round btn-d']) ?>
                        <?php ActiveForm::end() ?>

                        <?php else : ?>

                            <h3>
                                <?= Yii::t('main', 'Товаров нет') ?>
                            </h3>

                        <?php endif ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
