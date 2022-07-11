<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use common\models\Lang;
use frontend\widgets\FooterWidget;

AppAsset::register($this);

$lang = Lang::getCurrent()->url;

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= $lang ?? Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->registerCsrfMetaTags() ?>

    <link id="color-scheme" href="/dist/css/colors/default.css" rel="stylesheet">

    <?php $this->head() ?>

    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="194x194" href="/favicons/favicon-194x194.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/favicons/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">

    <link rel="manifest" href="/favicons/site.webmanifest">
<!--    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#111121">-->
    <link rel="shortcut icon" href="/favicons/favicon.png" type="image/x-icon">

    <meta property="og:site_name" content="<?= $this->params['site_name'] ?>">
    <meta property="og:title" content="<?= $this->params['title'] ?>">
    <meta property="og:description" content="<?= $this->params['description'] ?>">
    <meta property="og:url" content="<?= $this->params['url'] ?>"/>
    <meta property="og:image" content="<?= $this->params['image'] ?>">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="630"/>
    <meta property="og:type" content="website">

    <meta name=”twitter:card” content=”summary_large_image”>
    <meta name=”twitter:site” content=”@handycarsua”>
    <meta name=”twitter:creator” content=”@handycarsua”>
    <meta name="twitter:title" content="<?= $this->params['title'] ?>">
    <meta name="twitter:description" content="<?= $this->params['description'] ?>">
    <meta name="twitter:image:src" content="<?= $this->params['image'] ?>">
    <meta name="twitter:url" content="<?= $this->params['url'] ?>">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?= $this->params['title'] ?>">
    <meta name="application-name" content="<?= Yii::t('main', 'Пандус для інваліда на візку') ?>">

    <?= \yii\helpers\Html::script($this->params['schema'] ?? \yii\helpers\Json::encode([
            '@context' => 'https://schema.org',
            '@type' => 'Thing',
            'name' => $this->params['title'],
            'image' => $this->params['image'],
            'url' => Url::canonical(),
            'descriptions' => $this->params['description'],
            'author' => [
                '@type' => 'Organization',
                'name' => Yii::t('main', 'Хендікарс ТОВ'),
                'url' => 'https://pandus.info',
                'telephone' => '+380962010191',
            ]
        ]), [
        'type' => 'application/ld+json',
    ]) ?>

    <link rel="canonical" href="<?= Url::canonical() ?>">

    <!-- pinterest verify -->
    <meta name="p:domain_verify" content="c68303539bfe44e2f9787be99fc735e0"/>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-01Y3XW2P8J"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-01Y3XW2P8J');
    </script>

    <!-- Google Tag Manager -->
<!--    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':-->
<!--                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],-->
<!--            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=-->
<!--            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);-->
<!--        })(window,document,'script','dataLayer','GTM-TMH74NW');</script>-->
    <!-- End Google Tag Manager -->

    <!-- Yandex.Metrika counter -->
<!--    <script type="text/javascript" >-->
<!--        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};-->
<!--            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})-->
<!--        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");-->
<!---->
<!--        ym(87321952, "init", {-->
<!--            clickmap:true,-->
<!--            trackLinks:true,-->
<!--            accurateTrackBounce:true,-->
<!--            webvisor:true-->
<!--        });-->
<!--    </script>-->
<!--    <noscript><div><img src="https://mc.yandex.ru/watch/87321952" style="position:absolute; left:-9999px;" alt="" /></div></noscript>-->
    <!-- /Yandex.Metrika counter -->

</head>

<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
<?php $this->beginBody() ?>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TMH74NW"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<main>
<!--    <div class="page-loader">-->
<!--        <div class="loader">--><?//= Yii::t('main', 'Завантаження...') ?><!--</div>-->
<!--    </div>-->

    <?= \frontend\widgets\NavbarWidget::widget() ?>

    <?= $content ?>

    <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>

    <div class="chare-buttons-wrapper" style="margin-bottom: 25px">
        <div class="share-buttons" style="width: 300px !important;">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= Url::current([], true); ?>" target="_blank" onclick="return Share.me(this);" rel="noopener">
                <div class="telegram share-block">
                    <img class="soc-icon-size" src="/images/social_icon/facebook.png" alt="facebook">
                </div>
            </a>
            <a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Ffiddle.jshell.net%2F_display%2F&text=<?= Url::current([], true); ?>"
               target="_blank" onclick="return Share.me(this)" rel="noopener">
                <div class="telegram share-block">
                    <img class="soc-icon-size" src="/images/social_icon/twitter.png" alt="twitter">
                </div>
            </a>
            <a id="telegram_share" href="#" rel="noopener">
                <div class="telegram share-block">
                    <img class="soc-icon-size" src="/images/social_icon/telegram.png" alt="telegram">
                </div>
            </a>
            <a href="#" id="viber_share" class="share-btn-in" rel="noopener">
                <div class="viber share-block">
                    <img class="soc-icon-size" src="/images/social_icon/viber.png" alt="viber">
                </div>
            </a>
            <a id="whatsapp_share" href="#" data-action="share/whatsapp/share" rel="noopener">
                <div class="telegram share-block">
                    <img class="soc-icon-size" src="/images/social_icon/whatsapp.png" alt="whatsapp">
                </div>
            </a>
            <a class="share-btn-vk" href="https://vk.com/share.php?url=<?= Url::current([], true); ?>" target="_blank"
               onclick="return Share.me(this);" rel="noopener">
                <div class="vk share-block">
                    <img class="soc-icon-size" src="/images/social_icon/vk.png" alt="vk">
                </div>
            </a>
        </div>
    </div>

    <script>
        var text = "<?= Url::current([], true); ?>";
        document.getElementById('viber_share')
            .setAttribute('href',"viber://forward?text=" + encodeURIComponent(text + " " + window.location.href));

        document.getElementById('telegram_share')
            .setAttribute('href',"tg://msg_url?url=" + encodeURIComponent(text + " " + window.location.href));

        document.getElementById('whatsapp_share')
            .setAttribute('href',"whatsapp://send?text=" + encodeURIComponent(text + " " + window.location.href));
    </script>

    <?= FooterWidget::widget() ?>

    <script>
        Share = {
            me: function (el) {
                Share.popup(el.href);
                return false;
            },

            popup: function (url) {
                window.open(url, '', 'toolbar=0,status=0,width=626,height=436');
            }
        };
    </script>

    <?php $buttonContinue = '<button type="button" class="btn btn-default" data-dismiss="modal">' .
        Yii::t('main', 'Продовжити перегляд') .
        '</button>' ?>

    <?php $buttonSuccess = '<a id="button-success" href="' . Url::to(['cart/view']) .
        '" class="btn btn-success">' .
        Yii::t('main', 'Обробити') . '</a>';
    ?>

    <?php
    Modal::begin([
        'header' => '<h2>' . Yii::t('main', 'Кошик') . '</h2>',
        'size' => 'modal-lg',
        'id' => 'cart',
        'footer' => $buttonContinue . $buttonSuccess,

    ]);
    Modal::end();
    ?>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

