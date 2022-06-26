<?php

use common\models\Lang;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

//use yii\widgets\MaskedInput;

$lang = (Lang::getCurrent()->url);

?>

<a href="tel:+380962010191">
    <div id="newton_callback_phone" class="newton_callback_phone newton_animation"
         style="display: block;">
        <svg id="newton-callback-button" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" height="120px"
             viewBox="0 0 120 120" width="120px" version="1.1" y="0px" x="0px"
             xmlns:xlink="http://www.w3.org/1999/xlink"><g class="newton-ring">
                <path id="newton-track-background"
                      d="m60 1c-32.585 0-59 26.415-59 59s26.415 59 59 59 59-26.415 59-59-26.415-59-59-59zm0 115c-30.928 0-56-25.072-56-56s25.072-56 56-56c30.928 0 56 25.072 56 56s-25.072 56-56 56z"
                      fill="#3EB5E8"></path>
            </g>
            <g class="newton-wrapper">
                <circle class="newton-circle-back" cy="60" cx="60" r="34" fill="#3EB5E8"></circle>
                <g class="newton-circle-front">
                    <circle cy="60" cx="60" r="34" fill="#3EB5E8"></circle>
                    <path class="newton-icon-handset"
                          d="m59.34 48.038c-0.843 0.181-1.681 0.434-2.504 0.778-6.003 2.52-9.252 8.718-8.221 14.78-0.042 0.26-0.04 0.527 0.072 0.786 0.316 0.733 1.178 1.074 1.923 0.763 0.746-0.313 1.094-1.162 0.778-1.896-0.011-0.024-0.034-0.041-0.046-0.063-0.819-4.893 1.81-9.887 6.652-11.917 0.363-0.152 0.73-0.275 1.099-0.384 0.308 0.082 0.639 0.089 0.956-0.044 0.746-0.313 1.094-1.161 0.778-1.896-0.255-0.589-0.86-0.905-1.476-0.853l-0.011-0.054zm7.877 4.865l0.855-13.908c-2.436 0.489-2.402 2.61-2.402 2.61l-0.473 5.671c-0.814 5.348 2.02 5.627 2.02 5.627zm-21.886 13.454c0.62-0.26 0.932-0.896 0.831-1.523l0.032-0.006c-1.627-7.491 2.303-15.316 9.738-18.437 0.873-0.366 1.76-0.634 2.653-0.845l-0.022-0.118c0.042-0.014 0.085-0.009 0.126-0.025 0.729-0.307 1.071-1.137 0.761-1.854s-1.153-1.052-1.882-0.745c-0.109 0.046-0.191 0.123-0.282 0.19-0.872 0.226-1.74 0.492-2.595 0.851-8.661 3.635-13.241 12.75-11.349 21.478l0.045-0.009c0.019 0.101 0.02 0.201 0.062 0.3 0.31 0.717 1.153 1.05 1.882 0.743zm29.689-26.205c-1.313-1.785-5.783-0.978-5.783-0.978l-0.982 14.23 0.313 0.267 1.793 0.85c0.318 0.267 0.414 0.961 0.414 0.961-1.289 4.879-3.496 7.473-3.496 7.473-3.616 6.393-6.278 8.244-6.278 8.244-0.65 0.539-1.199 0.369-1.199 0.369-0.475-0.002-2.29-1.375-2.29-1.375l-12.773 7.361c1.72 4.612 3.803 4.405 3.803 4.405 16.692-0.466 24.25-14.581 24.25-14.581 9.835-14.467 2.228-27.226 2.228-27.226zm-21.017 28.373s-5.689 2.388-9.379 5.004-0.963 1.07-0.371 2.759l12.28-7.089s-1.356-1.099-2.53-0.674z"
                          fill="#FFFFFF"></path>
                    <path class="newton-icon-callback"
                          d="m79 44.986h-38c-2.209 0-4 1.791-4 4v23.028c0 2.209 1.791 4 4 4h38c2.209 0 4-1.791 4-4v-23.028c0-2.209-1.791-4-4-4zm-20.5 23.014h-16c-0.829 0-1.5-0.672-1.5-1.5s0.671-1.5 1.5-1.5h16c0.828 0 1.5 0.672 1.5 1.5s-0.672 1.5-1.5 1.5zm0-7h-16c-0.829 0-1.5-0.672-1.5-1.5s0.671-1.5 1.5-1.5h16c0.828 0 1.5 0.672 1.5 1.5s-0.672 1.5-1.5 1.5zm0-7h-16c-0.829 0-1.5-0.672-1.5-1.5s0.671-1.5 1.5-1.5h16c0.828 0 1.5 0.672 1.5 1.5s-0.672 1.5-1.5 1.5zm20.5 5.005c0 1.656-1.344 3-3 3h-8c-1.657 0-3-1.344-3-3v-5c0-1.657 1.343-3 3-3h8c1.656 0 3 1.343 3 3v5z"
                          fill="#FFFFFF"></path>
                    <path class="newton-icon-consultant"
                          d="m75 43.014h-30c-4.418 0-8 3.581-8 8v5.017c0 0.662-0.001 12.629-0.001 12.629 0 5.707 4.819 10.34 11.001 10.34 0-3.535 1.35-6.996 8.786-6.996h18.214c4.418 0 8-3.581 8-8v-12.99c0-4.419-3.582-8-8-8zm-10.5 17.986h-22c-0.829 0-1.5-0.672-1.5-1.5s0.671-1.5 1.5-1.5h22c0.828 0 1.5 0.672 1.5 1.5s-0.672 1.5-1.5 1.5zm0-7h-22c-0.829 0-1.5-0.672-1.5-1.5s0.671-1.5 1.5-1.5h22c0.828 0 1.5 0.672 1.5 1.5s-0.672 1.5-1.5 1.5z"
                          fill="#FFFFFF"></path>
                </g>
            </g>
        </svg>
    </div>
</a>

<div id="delivery-rules-ru" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Способы доставки</h4>
            </div>
            <div class="modal-body">
                <p>1. Новая Почта.</p>
                <p>2. Интайм.</p>
                <p>3. Деливери.</p>
                <p>4. Самовывоз.</p>
                <p>Вы приезжаете к нам на предприятие и принимаете товар.
                    Этот способ доставки удобен тем людям, у которых есть свой микроавтобус или грузовой вид транспорта,
                    автомобиль с прицепом и т.д.
                </p>
            </div>
        </div>
    </div>
</div>

<div id="delivery-rules-ua" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Способи доставки</h4>
            </div>
            <div class="modal-body">
                <p>1. Нова Пошта.</p>
                <p>2. Інтайм.</p>
                <p>3. Делівері.</p>
                <p>4. Самовивіз.</p>
                <p>Ви приїжджаєте до нас на підприємство і приймаєте товар.
                    Цей спосіб доставки зручний тим людям, у яких є свій мікроавтобус або вантажний вид транспорту,
                    автомобіль з причепом і т.д.
                </p>
            </div>
        </div>
    </div>
</div>

<div id="payment-rules-ru" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Способы оплаты товара</h4>
            </div>
            <div class="modal-body">
                <p>1.Оплата на карту Приват Банка.</p>
                <p>2.Оплата согласно полученного счета на расчетный счет.</p>
                <p>3.Наложенным платежом при получении товара у перевозчика.</p>
            </div>
        </div>
    </div>
</div>

<div id="payment-rules-ua" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Способи оплати товару</h4>
            </div>
            <div class="modal-body">
                <p>1.Оплата на карту Приват Банку.</p>
                <p>2.Оплата згдно наданого рахунку на розрахунковий рахунок.</p>
                <p>3.Наложеним платежем при отримані товару у перевізника.</p>
            </div>
        </div>
    </div>
</div>

<div class="module-small bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="widget">
                    <h5 class="widget-title font-alt">HANDYcars</h5>
                    <p><?= Yii::t('main', 'Компанія з 2015 року займається постачанням виробів для людей з івалідністю.') ?></p>
                    <p>Тел: <a href="tel:+380962010191">+38 096 2010191</a></p>
                    <p>Тел: <a href="tel:+380660679771">+38 066 0679771</a></p>
                    <p>Email: <a href="mailto:info@pandus.info"> info@pandus.info</a></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="widget">
                    <h5 class="widget-title font-alt"><?= Yii::t('main', 'Інформація') ?></h5>
                    <ul class="widget-posts">
                        <li class="clearfix">
                            <a href="#" data-toggle="modal" data-id=""
                               data-target="#delivery-rules-<?= $lang ?>"><?= Yii::t('main', 'Способи доставки') ?></a>
                        </li>
                        <li class="clearfix">
                            <a href="#" data-toggle="modal" data-id=""
                               data-target="#payment-rules-<?= $lang ?>"><?= Yii::t('main', 'Способи оплати') ?></a>
                        </li>
                        <li class="clearfix">
                            <a href="https://goo.gl/maps/zX8HsqF5nSVnS7WR6"
                               target="_blank" class="footer-gmap-link dashed-link"
                               rel="nofollow"><?= Yii::t('main', 'Карта проїзду в Google Maps') ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div>
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhandycarsltd%2F&tabs=timeline&width=340&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                             style="border:none; overflow:hidden; width: 100%"
                            class="pull-right">
                    </iframe>
                    <!--width="340" height="130"-->
                </div>
                <div class="pull-right" style="margin-top: 15px">
                    Мы принимаем: <img src="/img/visa-mastercard.png" alt="Возможна оплата visa/mastercard">
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="divider-d">

<footer class="footer bg-nodark" style="margin-top: 0px !important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12">
                <a href="https://www.braunability.eu/" target="_blank">
                    <?= Html::img('/img/logo-bae-header.png', ['height' => '50', 'alt' => 'BraunAbility
                            logotype']) ?>
                </a>
            </div>
            <div class="col-lg-4 col-12" style="font-size: 15px">
                <p class="copyright font-alt text-center">&copy; 2015&nbsp;
                    <a href="https://handycars.com.ua">
                        handycars.com.ua
                    </a>
                </p>
            </div>
            <div class="col-lg-4 col-12">
                <div class="footer-social-links" style="margin: auto; font-size: 22px">
                    <a href="https://www.facebook.com/handycarsltd" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/handycars.com.ua" target="_blank">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UC4eXRfe0dY8F5L8Ik4zUR3w" target="_blank">
                        <i class="fa fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
