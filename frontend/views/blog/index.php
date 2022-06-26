<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Lang;
use yii\widgets\LinkPager;

$lang = Lang::getCurrent()->url;
$route = $lang == 'ua' ? '/ua' : '/ru';

?>

<!--    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">-->
<!--    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">-->
<!--    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">-->

<!--    <link href="assets/lib/animate.css/animate.css" rel="stylesheet">-->
<!--    <link href="assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">-->
<!--    <link href="assets/lib/et-line-font/et-line-font.css" rel="stylesheet">-->
<!--    <link href="assets/lib/flexslider/flexslider.css" rel="stylesheet">-->
<!--    <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">-->
<!--    <link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">-->
<!--    <link href="assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">-->
<!--    <link href="assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">-->
<!-- Main stylesheet and color file-->
<!--    <link href="assets/css/style.css" rel="stylesheet">-->
<!--    <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">-->

<!--    <main>-->
<!--      <div class="page-loader">-->
<!--        <div class="loader">Loading...</div>-->
<!--      </div>-->


<div class="main">
    <section class="module bg-dark-60 blog-page-header" data-background="assets/images/blog_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Блог</h2>
                    <div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with
                        my whole heart.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="module">
        <div class="container">
            <div class="row post-masonry post-columns">

                <?php if (isset($articles)) { ?>
                    <?php foreach ($articles as $item) { ?>
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="post">
                                <div class="post-thumbnail">
                                    <a href="<?= Url::to(['article', 'id' => $item->id]) ?>">
                                        <img src="/img/<?= $item->image ?>" alt="<?= $blog->title ?>"/>
                                    </a>
                                </div>
                                <div class="post-header font-alt">
                                    <h2 class="post-title">
                                        <a href="<?= Url::to(['article', 'id' => $item->id]) ?>"><?= $item->title ?></a>
                                    </h2>
                                    <div class="post-meta">Автор:&nbsp;<a href="#"><?= $blog->author ?></a> | <?= date('d.M.Y', $item->created_at) ?> | 3 Comments
                                    </div>
                                </div>
                                <div class="post-entry">
                                    <?php $string = substr(strip_tags($item->content), 0, 200); ?>
                                    <?php $string = rtrim($string, "!,.-"); ?>
                                    <?php $string = substr($string, 0, strrpos($string, ' ')); ?>
                                    <p><?= $string ?></p>
                                </div>
                                <div class="post-more"><a class="more-link" href="<?= Url::to(['article', 'id' => $item->id]) ?>">Читать статью</a></div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>

                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="post">
                        <div class="post-thumbnail"><a href="#"><img src="assets/images/post-masonry-1.jpg" alt="Blog-post Thumbnail"/></a></div>
                        <div class="post-header font-alt">
                            <h2 class="post-title"><a href="#">Shore after the tide</a></h2>
                            <div class="post-meta">By&nbsp;<a href="#">Andy River</a>&nbsp;| 11 November | 4 Comments
                            </div>
                        </div>
                        <div class="post-entry">
                            <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                        </div>
                        <div class="post-more"><a class="more-link" href="#">Read more</a></div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="post">
                        <div class="post-thumbnail"><a href="#"><img src="assets/images/post-5.jpg" alt="Blog-post Thumbnail"/></a></div>
                        <div class="post-header font-alt">
                            <h2 class="post-title"><a href="#">We in New Zealand</a></h2>
                            <div class="post-meta">By&nbsp;<a href="#">Dylan Woods</a>&nbsp;| 5 November | 15 Comments
                            </div>
                        </div>
                        <div class="post-entry">
                            <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                        </div>
                        <div class="post-more"><a class="more-link" href="#">Read more</a></div>
                    </div>
                </div>

            </div>
            <div class="pagination font-alt"><a href="#"><i class="fa fa-angle-left"></i></a><a class="active" href="#">1</a><a href="#">2</a><a href="#">3</a><a
                        href="#">4</a><a href="#"><i class="fa fa-angle-right"></i></a></div>
        </div>
    </section>

    <!--        <hr class="divider-d">-->

</div>
<div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
<!--    </main>-->
<!--
JavaScripts
=============================================
-->
<!--    <script src="assets/lib/jquery/dist/jquery.js"></script>-->
<!--    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>-->
<!--    <script src="assets/lib/wow/dist/wow.js"></script>-->
<!--    <script src="assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>-->
<!--    <script src="assets/lib/isotope/dist/isotope.pkgd.js"></script>-->
<!--    <script src="assets/lib/imagesloaded/imagesloaded.pkgd.js"></script>-->
<!--    <script src="assets/lib/flexslider/jquery.flexslider.js"></script>-->
<!--    <script src="assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>-->
<!--    <script src="assets/lib/smoothscroll.js"></script>-->
<!--    <script src="assets/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>-->
<!--    <script src="assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>-->
<!--    <script src="assets/js/plugins.js"></script>-->
<!--    <script src="assets/js/main.js"></script>-->
