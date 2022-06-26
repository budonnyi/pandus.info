<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->dropDownList([
        'user' => 'Пользователь',
        'admin' => 'Администратор'
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        '10' => 'Активный',
        '0' => 'Удаленный'
    ]) ?>

    <style>
        .btn {
            margin-top: 20px;
            font-size: 1.5rem;
            border-radius: 0px;
        }
    </style>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'),
            [
                'class' => 'btn btn-success',
                'style' => 'padding: 15px',
                'font-size' => '20px',
                'border-radius' => 0,
                'color' => '#fff',
            ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
