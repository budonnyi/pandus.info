<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_origyn')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'name_ua')->textInput(['maxlength' => true]) ?></div>
    </div>

    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'description_short_ru')
                ->widget(CKEditor::className(), [
                    'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                        'preset' => 'basic',
                        'inline' => false,
                    ]),
                ]); ?></div>
        <div class="col-md-6"><?= $form->field($model, 'description_short_ua')
                ->widget(CKEditor::className(), [
                    'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                        'preset' => 'basic',
                        'inline' => false,
                    ]),
                ]); ?></div>
    </div>


    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'description_ru')->widget(CKEditor::className(), [
                'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                    'preset' => 'full',
                    'inline' => false,
                ]),
            ]); ?></div>
        <div class="col-md-6"><?= $form->field($model, 'description_ua')->widget(CKEditor::className(), [
                'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                    'preset' => 'full',
                    'inline' => false,
                ]),
            ]); ?></div>
    </div>

    <div class="row">
        <div class="col-md-6"><?php if (isset($model->image)) { ?>
                <img src="/category/<?= $model->image ?>" width="300">
                <p><?= $model->image ?></p>
            <?php } ?>
            <?= $form->field($model, 'imageFile')->fileInput() ?></div>
        <div class="col-md-6"><?php if (isset($model->description_image)) { ?>
                <img src="/category/<?= $model->description_image ?>" width="300">
                <p><?= $model->description_image ?></p>
            <?php } ?>
            <?= $form->field($model, 'descriptionImageFile')->fileInput() ?></div>
    </div>


    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'meta_title_ru')->textInput(); ?></div>
        <div class="col-md-6"><?= $form->field($model, 'meta_title_ua')->textInput(); ?></div>
    </div>


    <div class="row">
        <div class="col-md-6"> <?= $form->field($model, 'meta_description_ru')->textarea(['rows' => 3]) ?>
        </div>
        <div class="col-md-6"><?= $form->field($model, 'meta_description_ua')->textarea(['rows' => 3]) ?></div>
    </div>


    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'meta_keywords_ru')->textarea(['rows' => 3]) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'meta_keywords_ua')->textarea(['rows' => 3]) ?></div>
    </div>


    <?= $form->field($model, 'widgets')->textInput() ?>








    <?= $form->field($model, 'status')->dropDownList([
        '1' => 'Показывать',
        '0' => 'Скрыть'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
