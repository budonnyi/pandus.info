<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = Yii::t('app', 'Редактировать пользователя: {name}', [
    'name' => $model->username,
]);

?>
<style>
    .user-update {
        padding: 20px 20px 20px 30px;
    }
</style>

<div class="container">
    <div class="user-update">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>