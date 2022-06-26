<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'База данных';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <br/>
    <p>
        <?= Html::a('Создать дамп БД (экспорт)', ['export'], ['class' => 'btn btn-success']) ?>
    </p>
    <br/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'dump',
                'format' => 'text',
                'label' => 'Путь к дампу БД',
            ],
            [
                'format' => 'raw',
                'value' => function ($data, $id) {
                    return Html::a('Импортировать в БД', \yii\helpers\Url::to(['import', 'path' => $data['dump']]), ['title' => 'Импортировать', 'class' => 'btn btn-primary']);
                }
            ],
            [
                'format' => 'raw',
                //кнопку удаления выводим только если >1 дампа БД
                'value' => function ($data, $id) {
                    if (Yii::$app->params['count_db'] > 1) {
                        return Html::a('Удалить', \yii\helpers\Url::to(['delete', 'path' => $data['dump']]), ['title' => 'Удалить', 'class' => 'btn btn-danger']);
                    } else return false;
                }
            ],
        ],
    ]); ?>

</div>
