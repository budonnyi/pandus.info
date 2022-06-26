<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новый товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'category_id',
                'value' => function ($data) {
                    return $data->category->name_ru;
                }
            ],
            'url',
//            'name_ua',
            'name_ru',
//            'price',
            //'image',
            //'big_image',
//            'technical_ru:html',
//            'technical_ua:html',
            //'description_ua:ntext',
            //'description_short_ru:ntext',
            //'description_short_ua:ntext',
            //'manufacturer',
            //'class_name',
            //'country_origyn',
            //'availability',
            'meta_title_ua',
            'meta_title_ru',
            //'meta_keyword_ua',
            //'meta_keyword:ntext',
            //'meta_description_ua:ntext',
            //'meta_description_ru:ntext',
            //'meta_description_ua:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:260px;'],
                'header' => 'Управление',
                'template' => '{update}',
                'buttons' => [
                    //view button
                    'update' => function ($url, $model) {
                        return Html::a('Редактировать', $url,
                            ['title' => 'View']);
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'update') {
                        $url = \yii\helpers\Url::toRoute(['product/update', 'id' => $key]);
                        return $url;
                    }
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
