<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Сводная информация о пользователе ' . $model->username;

\yii\web\YiiAsset::register($this);
?>

<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return $data->status == '10' ? '<span class="text-success">Активный</span>' : '<span class="text-danger">Удаленный</span>';
                },
                'format' => 'html'
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
