<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Lang;
use yii\widgets\MaskedInput;

$lang = Lang::getCurrent()->url;

$this->registerJsFile('/dist/lib/simple-text-rotator/jquery.simple-text-rotator.min.js', ['position' => \yii\web\View::POS_END]);
$this->registerJsFile('/dist/js/initTextRotator.js', ['position' => \yii\web\View::POS_END]);
$this->registerJsFile("/dist/lib/flexslider/jquery.flexslider.js", ['position' => \yii\web\View::POS_END]);
$this->registerJsFile("/dist/lib/isotope/dist/isotope.pkgd.js", ['position' => \yii\web\View::POS_END]);

$this->registerCssFile('/dist/lib/flexslider/flexslider.css');
$this->registerCssFile("/dist/lib/simple-text-rotator/simpletextrotator.css");

$sliderContent = [
    1 => [
        'image' => '/img/pandus-min.jpg',
        'title' => Yii::t('main', 'Купити пандус для інваліда на колясці'),
        'category' => Yii::t('main', 'Пандус для людини з інвалідністю'),
        'description' => Yii::t('main', 'Переносний пандус для коляски'),
        'buttonLink' => Url::toRoute('category/index'),
        'button' => Yii::t('main', 'Купити пандус')
    ],
    2 => [
        'image' => '/slider_images/pandus3-min.jpg',
        'title' => Yii::t('main', 'Купити переносний пандус'),
        'category' => Yii::t('main', 'Купити карбоновий пандус'),
        'description' => Yii::t('main', 'Суцільний переносний пандус'),
        'buttonLink' => Url::toRoute(['category/category', 'url' => 'carbon-ramps']),
        'button' => Yii::t('main', 'Купити пандус')
    ],
    3 => [
        'image' => '/slider_images/pandus4-min.jpg',
        'title' => Yii::t('main', 'Купити пандус для інваліда'),
        'category' => Yii::t('main', 'Легкий пандус для інваліда'),
        'description' => Yii::t('main', 'Телескопічний пандус для коляски'),
        'buttonLink' => Url::toRoute(['category/category', 'url' => 'carbon-ramps']),
        'button' => Yii::t('main', 'Купити пандус')
    ],
    4 => [
        'image' => '/slider_images/pandus2-min.jpg',
        'title' => Yii::t('main', 'Купити втомобільний пандус для інваліда'),
        'category' => Yii::t('main', 'Автомобільний пандус'),
        'description' => Yii::t('main', 'З двох та трьох частин'),
        'buttonLink' => Url::toRoute(['category/category', 'url' => 'two-part-ramps']),
        'button' => Yii::t('main', 'Купити пандус')
    ],
    5 => [
        'image' => '/slider_images/pandus5-min.jpg',
        'title' => Yii::t('main', 'Купити пандус для коляски і інваліда на візку'),
        'category' => Yii::t('main', 'Пандуси для інваліда на візку'),
        'description' => Yii::t('main', 'Професійний автопандус'),
        'buttonLink' => Url::toRoute(['category/category', 'url' => 'telescopic-ramps']),
        'button' => Yii::t('main', 'Купити пандус')
    ],
];
?>

<section class="home-section home-parallax home-fade" id="home">
    <div class="hero-slider">
        <ul class="slides">
            <?php foreach ($sliderContent as $key => $item) { ?>
                <li class="bg-dark-30"
                    style="background-image:url(<?= $item['image'] ?>)"
                    title="<?= $item['title'] ?>">
                    <div class="titan-caption">
                        <div class="caption-content">
                            <div class="font-alt mb-30 titan-title-size-1">
                                <h2><?= $item['category'] ?></h2>
                            </div>
                            <div class="font-alt mb-40 titan-title-size-2">
                                <h2 style="font-size: 30px"><?= $item['description'] ?></h2>
                            </div>
                            <a class="section-scroll btn btn-border-w btn-round"
                               href="<?= $item['buttonLink'] ?>"><?= $item['button'] ?></a>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>

<div class="main">

    <?= \frontend\widgets\RecomendedWidget::widget() ?>

    <section class="module pb-0">
        <div id="about">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="module-title font-alt"><?= Yii::t('main', 'Пандуси для сходів під візок') ?></h1>
                        <div class="module-subtitle font-serif"></div>
                    </div>

                    <div class="col-sm-12">

                        <?php if ($lang == 'ua') { ?>
                            <p>В сучасному суспільстві людей з обмеженими можливостями досить багато, але нажаль для них
                                не
                                передбачені необхідні зручності. Ці люди також хочуть приймати участь у житті сучасної
                                громади та користуватись соціальними благами як і решта.</p>
                            <p>Для людей з обмеженими можливостями, особливо для людини на інвалідному візку, сучасний
                                світ
                                надає безліч перешкод та незручностей у вигляді сходів та навіть бордюрів, не говорячи
                                про
                                посадку в автомобіль. Саме для подолання перешкод та перепон використовується
                                пандус.</p>
                            <p>Пандус - це похила площина між двома різнорівневими поверхнями, що призначена для
                                колісного
                                транспорту (інвалідного візка або дитячої коляски) для підйому і спуску на висоту входу
                                або
                                подолання перешкоди. Наявність такого пандусу дозволять інвалідам та маломобільним
                                громадянам без особливих труднощів відвідувати аптеки, лікарні, школи та інші освітні
                                заклади, ресторани, соціальні служби, адміністративні будівлі та інші організації.</p>
                            <p>Купити пандус можна в <a href="<?= Url::toRoute(['category/index']) ?>">різних варіантах
                                    виконання</a>.</p>
                            <p>Завдяки легкій вазі та зручному виконанню користування пандусом зручно як інвалідам на
                                візку
                                так і супроводжуючим їх особам.</p>
                            <p>Для виготовлення пандуса використовують легкий та міцний матеріал високої якості, а саме
                                алюміній. Це є запорукою, що пандус прослужить довго й надійно. Використання такого
                                пандусу
                                має цілу низку переваг:</p>
                            <ul>
                                <li>висока міцність пандуса</li>
                                <li>швидка готовність пандуса до використання</li>
                                <li>обов’язкова наявність бортиків забезпечує безпеку</li>
                                <li>тривалий термін експлуатації пандуса</li>
                                <li>стійкість до впливів вологи та інших зовнішніх чинників</li>
                                <li>простота монтажу й демонтажу</li>
                                <li>доступність у широкому діапазоні варіантів</li>
                                <li>не потребують спеціального догляду та легко очистити від забруднень, не витрачаючи
                                    сили
                                    й спеціальних засобів
                                </li>
                            </ul>
                            <p>Як правильно встановити пандус? При встановлені пандусу необхідно розуміти, що кут нахилу
                                для
                                безпечного використання має складати не більше як 11 градусів. Також ширина кожної ланки
                                пандусу має бути не меншою за 15см для безпечного пересування людини з інвалідністю на
                                візку.</p>
                            <p>Компанія Хендікарс надає можливість купити пандус
                                <a href="<?= Url::toRoute(['category/country', 'country' => 'Швеція']) ?>">шведського</a>
                                або
                                <a href="<?= Url::toRoute(['category/country', 'country' => 'Україна']) ?>">українського</a>
                                виробництва за
                                прийнятною ціною з алюмінію вибравши необхідний виріб з каталогу з доставкою по Києву та
                                Україні.</p>
                            <p>У нас ви можете купити пандуси таких видів: <a
                                        href="<?= Url::toRoute(['category/types', 'type' => 'rozdilni']) ?>">роздільні
                                    пандуси</a>,
                                <a href="<?= Url::toRoute(['category/types', 'type' => 'sucilni']) ?>">суцільні
                                    пандуси</a>,
                                <a href="<?= Url::toRoute(['category/types', 'type' => 'avtomobilni']) ?>">автомобільні
                                    пандуси</a>.</p>
                        <?php } else { ?>
                            <p>В современном обществе людей с ограниченными возможностями достаточно много, но к
                                сожалению
                                для
                                них не предусмотрены необходимые удобства. Эти люди также хотят участвовать в жизни
                                современного
                                общества и пользоваться социальными благами как и остальные.
                            </p>
                            <p>Для людей с ограниченными возможностями, особенно для человека в инвалидной коляске,
                                современный
                                мир
                                предоставляет множество препятствий и неудобств в виде лестницы и даже бордюров, не
                                говоря о
                                посадке
                                в автомобиль. Именно для преодоления препятствий и преград используется пандус.</p>
                            <p>Пандус - это
                                наклонная плоскость между двумя разноуровневыми поверхностями, предназначена для
                                колесного
                                транспорта (инвалидной коляске или детской коляски) для подъема и спуска на высоту входа
                                или
                                преодоления препятствия. Наличие такого пандуса позволят инвалидам и маломобильным
                                гражданам
                                без
                                особого труда посещать аптеки, больницы, школы и другие образовательные учреждения,
                                рестораны,
                                социальные службы, административные здания и другие организации.</p>
                            <p>Купить пандус можно в <a href="<?= Url::toRoute(['category/index']) ?>">в различных
                                    вариантах
                                    исполнения.</a>
                            </p>
                            <p>Благодаря легкому весу и удобному выполнению пользования пандусом удобно как инвалидам на
                                коляске
                                так и сопровождающим их лицам.</p>
                            <p>Это является залогом, что пандус прослужит долго и надежно. Использование такого пандуса
                                имеет
                                целый
                                ряд преимуществ:</p>
                            <ul>
                                <li>высокая прочность пандуса</li>
                                <li>быстрая готовность пандуса к использованию</li>
                                <li>обязательно наличие бортиков обеспечивает безопасность</li>
                                <li>длительный срок эксплуатации пандуса</li>
                                <li>устойчивость к воздействиям влаги и других внешних факторов</li>
                                <li>простота монтажа и демонтажа</li>
                                <li>доступность в широком диапазоне вариантов</li>
                                <li>не требуют специального ухода и легко очистить от загрязнений, не тратя силы и
                                    специальных средств
                                </li>
                            </ul>
                            <p>Как правильно установить пандус? При установке пандуса необходимо понимать, что угол
                                наклона
                                для безопасного использования должен составлять не более 11 градусов. Также ширина
                                каждого звена
                                пандуса должна быть не менее 15 см для безопасного передвижения человека с инвалидностью
                                на
                                коляске.</p>
                            <p>Компания Хендикарс предоставляет возможность купить пандус <a
                                        href="<?= Url::toRoute(['category/country', 'country' => 'Швеція']) ?>">шведского</a>
                                или
                                <a href="<?= Url::toRoute(['category/country', 'country' => 'Україна']) ?>">украинского</a>
                                производства по
                                приемлемой цене из алюминия выбрав необходимое изделие из каталога с доставкой по Киеву
                                и
                                Украине.</p>
                            <p>У нас вы можете купить пандусы следующих видов: <a
                                        href="<?= Url::toRoute(['category/types', 'type' => 'rozdilni']) ?>">раздельные
                                    пандусы</a>,
                                <a href="<?= Url::toRoute(['category/types', 'type' => 'sucilni']) ?>">сплошные
                                    пандусы</a>,
                                <a href="<?= Url::toRoute(['category/types', 'type' => 'avtomobilni']) ?>">автомобильные
                                    пандусы</a>.</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?= \frontend\widgets\CatalogWidget::widget() ?>

    <?php if (isset($blog) && !empty($blog)) { ?>
        <section class="module pb-0" id="news">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h2 class="module-title font-alt"><?= Yii::t('main', 'Останні статті') ?></h2>
                    </div>
                    <div class="col-sm-3">
                        <div class="text-right">
                            <a href="<?= Url::toRoute('site/blog') ?>"><?= Yii::t('main', 'Всі статті') ?></a>
                        </div>
                    </div>
                </div>
                <div class="row multi-columns-row post-columns">
                    <?php foreach ($blog as $item) { ?>
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="post mb-20">
                                <div class="post-thumbnail">
                                    <a href="<?= Url::to(['post', 'url' => $item->url]) ?>">
                                        <img src="/images/blog/<?= $item->image ?>"
                                             alt="<?= $item->{'title_' . $lang} ?? '' ?>"/>
                                    </a>
                                </div>
                                <div class="post-header font-alt">
                                    <h2 class="post-title">
                                        <a href="<?= Url::to(['post', 'url' => $item->url]) ?>"><?= $item->{'title_' . $lang} ?? '' ?></a>
                                    </h2>
                                    <div class="post-meta">Автор&nbsp;<a
                                                href="#"><?= $item->author ?? '' ?></a>&nbsp;| <?= date('d.m.Y', $item->created_at) ?>
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
                                    } ?>
                                    <p><?= $postContent ?></p>
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
            </div>
        </section>
    <?php } ?>

    <section class="module pb-0" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt"><?= Yii::t('main', "Купити пандус в Києві") ?></h2>
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
                        <?= Yii::t('main', 'м.Київ') ?><br/>
                        <a href="https://goo.gl/maps/zX8HsqF5nSVnS7WR6"
                           target="_blank" class="footer-gmap-link dashed-link"
                           rel="nofollow"><?= Yii::t('main', 'Карта проїзду в Google Maps') ?></a>
                        <a href="https://handycars.com.ua">https://handycars.com.ua</a><br>
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
                    <?php $form = ActiveForm::begin(['id' => 'contact-form',
                        /*'enableAjaxValidation' => true*/]); ?>
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

    <?= \frontend\widgets\CitiesWidget::widget() ?>

</div>