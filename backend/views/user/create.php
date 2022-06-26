<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = Yii::t('app', 'Добавить пользователя');

?>
<div class="container">
<div class="user-create" style="padding: 20px">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>