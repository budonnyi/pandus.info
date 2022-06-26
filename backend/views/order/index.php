<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Запросы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'id',
                'value' => function ($data) {
                    return Html::a($data->id, '/admin/order/viewlist?id=' . $data->id);
                },
                'format' => 'html'
            ],
            'created_at',
            'updated_at',
            'qty',
            'sum',
            'comment:ntext',
            //'status',
            'name',
            'email:email',
            'phone',
            'address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
