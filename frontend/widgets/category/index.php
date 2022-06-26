<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Lang;
use yii\widgets\LinkPager;

$lang = Lang::getCurrent()->url;
$route = $lang == 'ua' ? '/ua' : '/' . $lang;

?>

<section class="module pb-0" id="works" style="margin-bottom: 170px">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                <h2 class="module-title font-alt"><?= Yii::t('main', 'Пандуси') ?></h2>
                <div class="module-subtitle font-serif"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="filter font-alt" id="filters">
                    <li><a class="current wow fadeInUp" href="#" data-filter="*"><?= Yii::t('main', 'Всі') ?></a>
                    </li>
                    <li><a class="wow fadeInUp" href="#" data-filter=".wideramp"
                           data-wow-delay="0.2s"><?= Yii::t('main', 'Суцільні') ?></a>
                    </li>
                    <li><a class="wow fadeInUp" href="#" data-filter=".twopart"
                           data-wow-delay="0.4s"><?= Yii::t('main', 'Роздільні') ?></a></li>
                    <li><a class="wow fadeInUp" href="#" data-filter=".autoramp"
                           data-wow-delay="0.6s"><?= Yii::t('main', 'Автомобільні') ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <ul class="works-grid works-grid-gut works-grid-3 works-hover-d" id="works-grid">
            <?php foreach ($catalog as $item) { ?>
                <?php if ($item->id == 0) continue ?>
                <li class="work-item <?= $item->class_name ?>">
                    <a href="<?= Url::to($route . '/' . $item->url) ?>">
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
