<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create City', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' =>['class' => '','style'=>'text-align: center'],
                'value' => function($data) {
                    return Html::a($data->city, ['update', 'id' => $data->id]);
                },
                'format' => 'html'
            ],
//            'city',
            'city_ru',
            'city_ua',
            'city_where_ru',
            //'city_where_ua',
            [
                'attribute' => 'content_ru',
                'contentOptions' =>['class' => '','style'=>'text-align: left'],
                'value' => function($data) {
                    return \yii\helpers\StringHelper::truncate($data->content_ru, 150);
//                    return mb_substr($data->content_ru, 0, 150);
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'content_ua',
                'contentOptions' =>['class' => '','style'=>'text-align: left'],
                'value' => function($data) {
                    return \yii\helpers\StringHelper::truncate($data->content_ua, 150);
//                    return mb_substr($data->content_ua, 0, 150);
                },
                'format' => 'html'
            ],
            //'image',
            //'viewed',
            //'status',
            //'created_at',

//            [
//                'class' => 'yii\grid\ActionColumn',
//                'contentOptions' => ['style' => 'width:260px;'],
//                'header' => 'Управление',
//                'template' => '{update}',
//                'buttons' => [
//
//                    //view button
//                    'update' => function ($url, $model) {
//                        return Html::a('Редактировать', $url,
//                            ['title' => 'View']);
//                    },
//                ],
//
//                'urlCreator' => function ($action, $model, $key, $index) {
//                    if ($action === 'update') {
//                        $url = \yii\helpers\Url::toRoute(['city/update', 'id' => $key]);
//                        return $url;
//                    }
//                }
//            ],
        ],
    ]); ?>


</div>
