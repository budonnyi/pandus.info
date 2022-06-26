<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новая категория', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

//            'id',
//            [
//                'attribute' => 'parent_id',
//                'value' => function ($data) {
//                    return $data->name_ru;
//                }
//            ],
//            'parent_id',
            ['attribute' => 'url',
                'value' => function ($data) {
                    return Html::a($data->url, ['update', 'id' => $data->id]);
                },
                'format' => 'html'
            ],
//            'class_name',
            'country_origyn',
            'name_ru',
//            'name_ua',
            //'sort_order',
            'description_short_ru:html',
            //'description_short_ua:ntext',
            'description_ru:html',
            //'description_ua:ntext',
            //'image',
            //'description_image',
//            'meta_title_ua',
//            'meta_title_ru',
            //'meta_description_ua:ntext',
            //'meta_description_ru',
            //'meta_keywords_ua:ntext',
            //'meta_keywords_ru',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return $data->status ? 'Показан' : 'Спрятан';
                }
            ],
            //'created_at',
            //'updated_at',

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
//                        $url = \yii\helpers\Url::toRoute(['category/update', 'id' => $key]);
//                        return $url;
//                    }
//                }
//            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
