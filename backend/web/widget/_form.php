<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Widget */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'title_ua')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?></div>
    </div>

    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'description_ua')->textarea(['rows' => 6]) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?></div>
    </div>

    <?php if ($model->image) { ?>
        <img src="/widget_picture/<?= $model->image ?>" width="300">
    <?php } ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'widget_name')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
