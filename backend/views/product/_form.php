<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'category_id')->dropDownList([
                \yii\helpers\ArrayHelper::map(\common\models\Category::find()->all(), 'id', 'name_ru'),
            ]) ?>
        </div>
        <div class="col-md-3"><?= $form->field($model, 'code')->textInput() ?></div>
        <div class="col-md-3"><?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-3"><?= $form->field($model, 'price')->textInput() ?></div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div>
                <?php if (!empty($model->image)) { ?>
                    <img src="/product/<?= $model->image ?>" width="250">
                <?php } ?>
            </div>
            <?= $form->field($model, 'imageFile')->fileInput() ?>
        </div>
        <!--<div class="col-md-6">
            <div>
                <?php /*if (!empty($model->big_image)) { */?>
                    <img src="/product/<?/*= $model->big_image */?>" width="250">
                <?php /*} */?>
            </div>
            <?/*= $form->field($model, 'bigImageFile')->fileInput() */?>
        </div>-->
    </div>

    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'name_ua')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6"> <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?></div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'description_short_ua')->widget(CKEditor::className(), [
                'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                    'preset' => 'basic',
                    'inline' => false,
                ]),
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'description_short_ru')->widget(CKEditor::className(), [
                'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                    'preset' => 'basic',
                    'inline' => false,
                ]),
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'technical_ua')->widget(CKEditor::className(), [
                'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                    'preset' => 'standard',
                    'inline' => false,
                ]),
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'technical_ru')->widget(CKEditor::className(), [
                'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                    'preset' => 'standard',
                    'inline' => false,
                ]),
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"><?= $form->field($model, 'manufacturer')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-4"><?= $form->field($model, 'country_origyn')->dropDownList([
                'Швеція' => 'Швеція',
                'Україна' => 'Україна'
            ]) ?>
        </div>
        <div class="col-md-4"><?= $form->field($model, 'availability')->dropDownList([
                '1' => 'На складе',
                '0' => 'Под заказ'
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'meta_title_ua')->textarea(['rows' => 4]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'meta_title_ru')->textarea(['rows' => 4]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'meta_description_ua')->textarea(['rows' => 4]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'meta_description_ru')->textarea(['rows' => 4]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'meta_keyword_ua')->textarea(['rows' => 4]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'meta_keyword_ru')->textarea(['rows' => 4]) ?>
        </div>
    </div>

    <?= $form->field($model, 'status')->dropDownList([
        '1' => 'Показывать',
        '0' => 'Спрятать'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
