<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Управление пользователями';

?>

<style>
    .table-bordered {
        border: 1px solid #ddd;
    }

    .btn {
        border-radius: 0px;
        padding: 10px 15px;
        font-size: 14px;
    }

    .container-fluid .row .prompt-index .grid-view {
        padding: 10px 20px;
        margin: 15px 0px !important;
    }
</style>

<?php if (Yii::$app->user->identity->role == 'admin') { ?>

    <div class="prompt-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= Html::a('Добавить нового пользователя', ['create'],
            ['class' => 'btn btn-success btn-xl']) ?>

        <?php Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => [
                'class' => 'table table-striped table-bordered'
            ],
            'columns' => [
                [
                    'attribute' => 'id',
                    'headerOptions' => ['style' => 'text-align: center'],
                    'label' => 'id',
                    'value' => function ($data) {
                        return Html::a($data->id, "/admin/user/update?id=" . $data->id);
                    },
                    'format' => 'html',
                ],
                [
                    'attribute' => 'name',
                    'headerOptions' => ['style' => 'text-align: center'],
                ],
                [
                    'attribute' => 'username',
                    'headerOptions' => ['style' => 'text-align: center'],
                ],
                [
                    'attribute' => 'email',
                    'headerOptions' => ['style' => 'text-align: center'],
                ],
                [
                    'attribute' => 'role',
                    'headerOptions' => ['style' => 'text-align: center'],
                    'value' => function ($data) {
                        if ($data->role == 'admin') {
                            $result = 'Администратор';
                        } else if ($data->role == 'user') {
                            $result = 'Пользователь';
                        } else if ($data->role == 'moder') {
                            $result = 'Модератор';
                        }

                        return ($result);
                    },
                    'format' => 'html',
                ],
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
                            $url = \yii\helpers\Url::toRoute(['user/update', 'id' => $key]);
                            return $url;
                        }
                    },
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
<?php } ?>
