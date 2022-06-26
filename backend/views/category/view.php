<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'parent_id',
            'url:url',
            'class_name',
            'country_origyn',
            'name_ru',
            'name_ua',
            'sort_order',
            'description_short_ru:ntext',
            'description_short_ua:ntext',
            'description_ru:ntext',
            'description_ua:ntext',
            'image',
            'description_image',
            'meta_title_ua',
            'meta_title_ru',
            'meta_description_ua:ntext',
            'meta_description_ru',
            'meta_keywords_ua:ntext',
            'meta_keywords_ru',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
