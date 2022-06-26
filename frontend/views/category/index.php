<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Lang;
use yii\widgets\LinkPager;

$lang = Lang::getCurrent()->url;

$description = $lang == 'ru'
    ? 'Каталог пандусов. Безопасные и надежные пандусы для людей с инвалидностью. Большой выбор. Наличие на складе. Официальный дилер в Украине BraunAbility (Швеция)'
    : 'Каталог пандусів. Безпечні та надійні пандуси для людей з інвалідністю. Великий вибір. Наявність на складі. Офіційний дилер BraunAbility (Швеція) на території України.';

$this->params['schema'] = \yii\helpers\Json::encode([
    "@context" => "http://www.schema.org",
    "@type" => "ItemList",
    "name" => Yii::t('main', 'Каталог пандусів')
        . ((isset($country) && $country == 'Україна') ? ' ' . Yii::t('main', 'українського виробництва') : '')
        . ((isset($country) && $country == 'Швеція') ? ' ' . Yii::t('main', 'шведського виробництва') : ''),
    "image" => "https://pandus.info/slider_images/pandus4-min.jpg",
    "url" => \yii\helpers\Url::canonical(),
    "description" => Yii::t('main', 'Каталог пандусів')
        . ((isset($country) && $country == 'Україна') ? ' ' . Yii::t('main', 'українського виробництва') : '')
        . ((isset($country) && $country == 'Швеція') ? ' ' . Yii::t('main', 'шведського виробництва') : ''),
    "itemListOrder" => "Unordered",
    "brand" => "Feal, Sweden",
    "numberOfItems" => count($catalog),
    "itemListElement" => $elements,
//    "aggregateRating" => [
//        "@type" => "aggregateRating",
//        "ratingValue" => "5",
//        "reviewCount" => "56",
//        "bestRating" => "5"
//    ],
    "offers" => [
        "@type" => "AggregateOffer",
        "offerCount" => "145",
        "lowPrice" => "5000",
        "highPrice" => "90000",
        "priceCurrency" => "UAH"
    ]
]);

$this->registerJsFile("/dist/lib/isotope/dist/isotope.pkgd.js", ['position' => \yii\web\View::POS_END]);

?>

<section class="module pb-0" id="works">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="module-title font-alt"><?= Yii::t('main', 'Каталог пандусів')
                    . ((isset($country) && $country == 'Україна') ? ' ' . Yii::t('main', 'українського виробництва') : '')
                    . ((isset($country) && $country == 'Швеція') ? ' ' . Yii::t('main', 'шведського виробництва') : '') ?> </h1>
                <div class="module-subtitle font-serif"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="filter font-alt" id="filters">
                    <li><a class="current wow fadeInUp" href="#" data-filter="*"><?= Yii::t('main', 'Всі') ?></a></li>
                    <li><a class="wow fadeInUp" href="#" data-filter=".wideramp"
                           data-wow-delay="0.2s"><?= Yii::t('main', 'Суцільні') ?></a></li>
                    <li><a class="wow fadeInUp" href="#" data-filter=".twopart"
                           data-wow-delay="0.4s"><?= Yii::t('main', 'Роздільні') ?></a></li>
                    <li><a class="wow fadeInUp" href="#" data-filter=".autoramp"
                           data-wow-delay="0.6s"><?= Yii::t('main', 'Автомобільні') ?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <ul class="works-grid works-grid-gut works-grid-3 works-hover-d" id="works-grid">
            <?php foreach ($catalog as $item) { ?>
                <?php if ($item->id == 0) continue ?>
                <li class="work-item <?= $item->class_name ?>">
                    <a href="<?= Url::toRoute(['category/category', 'url' => $item->url]) ?>">
                        <div class="work-image">
                            <img src="/category/<?= $item->image ?>"
                                 alt="<?= $item->{'name_' . $lang} ?>"/></div>
                        <div class="work-caption font-alt">
                            <h3 class="work-title"><?= $item->{'name_' . $lang} ?></h3>
                            <div class="work-descr"><?= Yii::t('main', $item->country_origyn) ?></div>
                        </div>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>

<section class="module pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                <h2 class="module-title font-alt"><?= Yii::t('main', 'Пандуси') ?></h2>
                <div class="module-subtitle font-serif"></div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-sm-12">
                <?php if ($lang == 'ua') { ?>
                    <p>Пандус - це похила площина між двома різнорівневими поверхнями, що призначена для колісного
                        транспорту (інвалідного візка або дитячої коляски) для підйому і спуску на висоту входу або
                        подолання перешкоди. Наявність такого пандусу дозволять інвалідам та маломобільним
                        громадянам без особливих труднощів відвідувати аптеки, лікарні, школи та інші освітні
                        заклади, ресторани, соціальні служби, адміністративні будівлі та інші організації.</p>
                    <p>Купити пандус можна в різних варіантах виконання.</p>
                    <p>Завдяки легкій вазі та зручному виконанню користування пандусом зручно як інвалідам на візку
                        так і супроводжуючим їх особам.</p>
                    <p>Для виготовлення пандуса використовують легкий та міцний матеріал високої якості, а саме
                        алюміній. Це є запорукою, що пандус прослужить довго й надійно. Використання такого пандусу
                        має цілу низку переваг:</p>
                    <ul>
                        <li>висока міцність пандуса</li>
                        <li>швидка готовність пандуса до використання</li>
                        <li>обов’язкова наявність бортиків забезпечує безпеку</li>
                        <li>тривалий термін експлуатації пандуса</li>
                        <li>стійкість до впливів вологи та інших зовнішніх чинників</li>
                        <li>простота монтажу й демонтажу</li>
                        <li>доступність у широкому діапазоні варіантів</li>
                        <li>не потребують спеціального догляду та легко очистити від забруднень, не витрачаючи сили
                            й спеціальних засобів
                        </li>
                    </ul>
                    <p>Як правильно встановити пандус? При встановлені пандусу необхідно розуміти, що кут нахилу для
                        безпечного використання має складати не більше як 11 градусів. Також ширина кожної ланки
                        пандусу має бути не меншою за 15см для безпечного пересування людини з інвалідністю на
                        візку.</p>
                    <p>Компанія Хендікарс надає можливість купити пандус
                        <a href="<?= Url::toRoute(['category/country', 'country' => 'Швеція']) ?>">шведського</a> або
                        <a href="<?= Url::toRoute(['category/country', 'country' => 'Україна']) ?>">українського</a>
                        виробництва за
                        прийнятною ціною з алюмінію вибравши необхідний виріб з каталогу з доставкою по Києву та
                        Україні.</p>
                    <p>У нас ви можете купити пандуси таких видів:
                        <a href="<?= Url::toRoute(['category/types', 'type' => 'rozdilni']) ?>">роздільні
                            пандуси</a>,
                        <a href="<?= Url::toRoute(['category/types', 'type' => 'sucilni']) ?>">суцільні пандуси</a>,
                        <a href="<?= Url::toRoute(['category/types', 'type' => 'avtomobilni']) ?>">автомобільні
                            пандуси</a>.</p>
                <?php } else { ?>
                    <p>Пандус - это
                        наклонная плоскость между двумя разноуровневыми поверхностями, предназначена для колесного
                        транспорта (инвалидной коляске или детской коляски) для подъема и спуска на высоту входа или
                        преодоления препятствия. Наличие такого пандуса позволят инвалидам и маломобильным гражданам
                        без особого труда посещать аптеки, больницы, школы и другие образовательные учреждения,
                        рестораны, социальные службы, административные здания и другие организации.</p>
                    <p>Купить пандус можно в различных вариантах исполнения. </p>
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
                            специальных
                            средств
                        </li>
                    </ul>
                    <p>Как правильно установить пандус? При установке пандуса необходимо понимать, что угол наклона
                        для
                        безопасного использования должен составлять не более 11 градусов. Также ширина каждого звена
                        пандуса
                        должна быть не менее 15 см для безопасного передвижения человека с инвалидностью на
                        коляске.</p>
                    <p>Компания Хендикарс предоставляет возможность купить пандус
                        <a href="<?= Url::toRoute(['category/country', 'country' => 'Швеція']) ?>">шведского</a> или
                        <a href="<?= Url::toRoute(['category/country', 'country' => 'Україна']) ?>">украинского</a> производства по
                        приемлемой цене из алюминия выбрав необходимое изделие из каталога с доставкой по Киеву и
                        Украине.</p>
                    <p>У нас вы можете купить пандусы следующих видов: <a
                                href="<?= Url::toRoute(['category/types', 'type' => 'rozdilni']) ?>">раздельные
                            пандусы</a>,
                        <a href="<?= Url::toRoute(['category/types', 'type' => 'sucilni']) ?>">сплошные пандусы</a>,
                        <a href="<?= Url::toRoute(['category/types', 'type' => 'avtomobilni']) ?>">автомобильные
                            пандусы</a>.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="module">
    <div class="container">
        <?php if (!empty($products)) { ?>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt"><?= Yii::t("main", "Пандуси в наявності які завтра ви можете отримати") ?></h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($products as $item) { ?>
                    <div class="col-md-4" style="margin-bottom: 30px">
                        <div class="card" style="border: 1px solid #ccc">
                            <a href="<?= Url::toRoute(['product/view', 'url' => $item->url]) ?>"
                               style="text-decoration: none;">
                                <?= Html::img(('/product/' . $item->image), ['class' => 'card-img-top', 'alt' => Yii::t('main', 'Купити') . ' ' . $item->{'name_' . $lang} . ' ' . Yii::t('main', 'з доставкою по Україні')]) ?>
                                <div class="card-body" style="/*border-top: 1px solid #ccc*/">
                                    <h4 class="card-text text-center"><?= Yii::t('main', 'Купити') . ' ' . $item->{'name_' . $lang} . ' ' . Yii::t('main', 'з доставкою по Україні') ?></h4>
                                </div>
                            </a>
                            <h5 class="text-center" style="color: green"><?= Yii::t("main", "В наявності") ?></h5>
                            <div class="card-body" style="padding-left: 10px; border-top: 1px solid #ccc">
                                <div class="price">
                                    <h4 class="card-text">
                                        <?= Yii::t('main', 'Ціна: ') ?>
                                        <?= number_format($item->price, 2, ',', '\'') ?></h4>
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
</section>
