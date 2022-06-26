<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model common\models\Blog */
/* @var $form yii\widgets\ActiveForm */

?>


<div class="container">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'title_ua')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?></div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'content_ua')->widget(CKEditor::className(), [
                'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                    'preset' => 'full',
                    'inline' => false,
                ]),
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'content_ru')->widget(CKEditor::className(), [
                'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                    'preset' => 'full',
                    'inline' => false,
                ]),
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div>
        <?php if (!empty($model->image)) { ?>
            <img src="/images/blog/<?= $model->image ?>" width="250">
        <?php } ?>
    </div>
    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'viewed')->textInput() ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'status')->dropDownList([
                1 => 'Показать',
                0 => 'Скрыть'
            ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
