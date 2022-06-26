<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Виджеты';
?>

<div class="widget-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новый виджет', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

//            'id',
            'title_ua',
            'title_ru',
            'description_ua:ntext',
            'description_ru:ntext',
            'image',
            'widget_name',

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
                        $url = \yii\helpers\Url::toRoute(['widget/update', 'id' => $key]);
                        return $url;
                    }
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
