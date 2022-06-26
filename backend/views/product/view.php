<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

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
            'category_id',
            'code',
            'url:url',
            'price',
            'image',
            'big_image',
            'name_ua',
            'name_ru',
            'description_ru:ntext',
            'description_ua:ntext',
            'description_short_ru:ntext',
            'description_short_ua:ntext',
            'manufacturer',
            'class_name',
            'country_origyn',
            'availability',
            'meta_title_ua:ntext',
            'meta_title_ru',
            'meta_keyword_ua',
            'meta_keyword:ntext',
            'meta_description_ua:ntext',
            'meta_description_ru:ntext',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
