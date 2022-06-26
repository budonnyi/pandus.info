<?php

use yii\helpers\Url;

$this->registerCssFile('/dist/css/cities-block.css');

?>

<section class="module" id="cities">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="module-title font-alt"><?= Yii::t('main', 'Основні міста з котрими працює Пандус.Інфо') ?></h2>
            </div>
        </div>
        <div class="soflex1">
            <?php if (isset($cities)) { ?>
                <?php foreach ($cities as $city) { ?>
                    <div class="footer-list-item">
                        <a href="<?= Url::toRoute(['site/cities', 'city' => $city->city ]) ?>">
                            <?= $city->{'city_' . $lang} ?>
                        </a>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>
