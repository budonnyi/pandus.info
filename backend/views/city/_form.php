<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model common\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_where_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_where_ua')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'content_ru')
                ->widget(CKEditor::className(), [
                    'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                        'preset' => 'full',
                        'inline' => false,
                    ]),
                ]); ?></div>
        <div class="col-md-6"><?= $form->field($model, 'content_ua')
                ->widget(CKEditor::className(), [
                    'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                        'preset' => 'full',
                        'inline' => false,
                    ]),
                ]); ?></div>
    </div>

<!--    --><?//= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'viewed')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([
        1 => 'Показывать',
        0 => 'Скрыть'
    ]) ?>

    <!--    --><? //= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
