<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\models\Lang;
use yii\widgets\MaskedInput;

$lang = Lang::getCurrent()->url;

$description = Lang::getCurrent()->url == 'ru'
    ? 'Безопасные и надежные пандусы для людей с инвалидностью. Большой выбор. Наличие на складе. Официальный дилер в Украине BraunAbility (Швеция)'
    : 'Безпечні та надійні пандуси для людей з інвалідністю. Великий вибір. Наявність на складі. Офіційний дилер BraunAbility (Швеція) на території України.';

$this->params['schema'] = \yii\helpers\Json::encode([
    "@context" => "https://schema.org/",
    "@type" => "Organization",
    "name" => Yii::t('main', 'Хендікарс ТОВ'),
    "logo" => "https://pandus.info/favicons/mstile-150x150.png",
    "contactPoint" => [
        "@type" => "ContactPoint",
        "telephone" => "+380962010191",
        "contactType" => "customer service"
    ],
    "email" => "info@pandus.info",
    "url" => \yii\helpers\Url::canonical(),
    "image" => [
        "https://pandus.info/slider_images/pandus4-min.jpg",
        "https://pandus.info/slider_images/pandus3-min.jpg",
        "https://pandus.info/slider_images/pandus-min.jpg"
    ],
    "currenciesAccepted" => "UAH",
    "hasMap" => "https://goo.gl/maps/zX8HsqF5nSVnS7WR6",

    "description" => $description,
    "brand" => Yii::t('main', 'Хендікарс ТОВ'),
    "telephone" => "+38 096 2010191",
    "sameAs" => [
        "https://www.facebook.com/handycarsltd",
        "https://www.instagram.com/handycars.com.ua/",
        "https://www.youtube.com/channel/UC4eXRfe0dY8F5L8Ik4zUR3w"
    ]
]);

?>

<div class="main">
    <section class="module" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h1 class="module-title font-alt"><?= Yii::t('main', "Зв'язатись с нами") ?></h1>
                    <div class="module-subtitle font-serif"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="alt-features-item mt-0">
                        <div class="alt-features-icon"><span class="icon-map"></span></div>
                        <h3 class="alt-features-title font-alt"><?= Yii::t('main', 'Контакти') ?></h3>
                        <?= Yii::t('main', 'ТОВ Хендікарс') ?><br/>
                        <?= Yii::t('main', 'вул.Саперно-Слобідська, 22') ?><br/>
                        <?= Yii::t('main', 'м.Київ') ?><br/><br>
                        <a href="https://goo.gl/maps/zX8HsqF5nSVnS7WR6"
                           target="_blank" class="footer-gmap-link dashed-link"
                           rel="nofollow"><?= Yii::t('main', 'Карта проїзду в Google Maps') ?></a>
                    </div>
                    <div class="alt-features-item mt-xs-60">
                        <div class="alt-features-icon"><span class="icon-megaphone"></span></div>
                        <h3 class="alt-features-title font-alt"><?= Yii::t('main', "Зв'язок") ?></h3>
                        Email: <a href="mailto:info@pandus.info">info@pandus.info</a><br/>
                        Тел: <a href="tel:+380962010191">+380 96 2010191</a><br/>
                        Тел: <a href="tel:+380660679771">+380 66 0679771</a><br/>
                    </div>
                </div>
                <div class="col-sm-8">
                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                    <?= $form->field($model, 'name')->textInput(['placeholder' => Yii::t('main', "Ваше ім'я")])->label(false) ?>
                    <?= $form->field($model, 'phone')->
                    widget(MaskedInput::className(), [
                        'options' => [
                            'id' => 'phone',
                            'placeholder' => Yii::t('main', 'Ваш Телефон')
                        ],
                        'clientOptions' => [
                            'clearIncomplete' => true,
                            'removeMaskOnSubmit' => true,
                        ],
                        'mask' => '+38 999 9999999',
                    ])->label(false) ?>
                    <?= $form->field($model, 'email')->textInput(['placeholder' => Yii::t('main', 'Ваш Email')])->label(false) ?>
                    <?= $form->field($model, 'body')->textarea(['rows' => 6, 'placeholder' => Yii::t('main', 'Ваше повідомлення')])->label(false) ?>
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('main', 'Відправити'), ['class' => 'btn btn-block btn-round btn-d', 'name' => 'contact-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </section>
</div>
