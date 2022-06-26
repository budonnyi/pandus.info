<?php

?>

<section class="home-section home-parallax home-fade home-full-height bg-dark bg-dark-30" id="home" data-background="assets/images/section-4.jpg">
    <div class="titan-caption">
        <div class="caption-content">
            <div class="font-alt mb-30 titan-title-size-4">Помилка </div>
            <div class="font-alt">
                <?=  $exception->getMessage() ?? '' ?>
            </div>
            <div class="font-alt mt-30"><a class="btn btn-border-w btn-round" href="/">Повернутись на головну</a></div>
        </div>
    </div>
</section>

