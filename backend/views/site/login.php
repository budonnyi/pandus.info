<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="login-wrapper">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Логин'])->label(false) ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль'])->label(false) ?>

        <?= $form->field($model, 'rememberMe')->checkbox()->label('<i  class="my-checkbox" ></i>запомнить') ?>

        <div class="form-group">
            <a id="help" href="#">Восстановление доступа</a>
            <?= Html::submitButton('Войти', ['class' => 'login', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<style>
    body{
        overflow: hidden;
    }
    .site-login{
        position: absolute;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-image: url("/admin/dist/images/bg.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    .login-wrapper{
        width: 360px;
        background: #fff;
        padding: 20px;
        color: #666;
        height: fit-content;
    }
    .my-checkbox{
        display: inline-block;
        width: 20px;
        height: 20px;
        margin-right: 10px;
        border: 2px solid #000;
        position: relative;
        top: 3px;
    }
    #help{
        padding: 5px 10px;
        background: #e31e25;
        color: #ffffff;
        display: none;
    }
    .login{
        padding: 6px 12px;
        background: #d4af36;
        color: #ffffff;
        outline: none;
        border: none;
        cursor: pointer;
        float: right;
    }
    input#loginform-rememberme:checked + i.my-checkbox{
        background-image: url("/admin/dist/images/chacked.png");
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
    }
    input#loginform-rememberme{
        display: block;
        width: 0;
        height: 0;
        opacity: 0;
    }
    .sign-in{
        display: flex;
        justify-content: flex-end;
    }
    #loginform-username{
        border: 2px solid #d4af36;
        outline: none;
    }
    #loginform-password{
        border: 2px solid #d4af36;
        outline: none;
    }
    .form-control:focus{
        box-shadow: none;
    }
    @media (max-width: 375px) {
        .login-wrapper{
            width: 296px;
        }
    }
</style>
