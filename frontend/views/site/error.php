<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;

?>

<?php if ($exception->statusCode == '403') { ?>
    <?= $this->render('/site/404', ['exception' => $exception]) ?>
<?php } ?>

<?php if ($exception->statusCode == '404') { ?>
    <?= $this->render('/site/404', ['exception' => $exception]) ?>
<?php } ?>

<?php if ($exception->statusCode == '500') { ?>
    <?= $this->render('/site/404', ['exception' => $exception]) ?>
<?php } ?>
