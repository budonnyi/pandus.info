<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\components\rbac\UserRoleRule;

class RbacController extends Controller
{

    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll(); //удаляем старые данные

        //Создадим для примера права для доступа к админке
        $dashboard = $auth->createPermission('adminPanel');
        $dashboard->description = 'Админ панель';
        $auth->add($dashboard);

        $userPanel = $auth->createPermission('userPanel');
        $userPanel->description = 'Управление пользователями';
        $auth->add($userPanel);

        $alert = $auth->createPermission('alert');
        $alert->description = 'Обработка алерта';
        $auth->add($alert);

        //Добавляем объект определяющий правила для ролей пользователей, он будет сохранен в файл rules.php
        $rule = new UserRoleRule();
        $auth->add($rule);

        //Добавляем роли
        $admin = $auth->createRole('admin');
        $admin->description = 'Администратор';
        $admin->ruleName = $rule->name;
        $auth->add($admin);

        $user = $auth->createRole('user');
        $user->description = 'Пользователь';
        $user->ruleName = $rule->name;
        $auth->add($user);

        //Добавляем потомков
        $auth->addChild($admin, $dashboard);
        $auth->addChild($admin, $userPanel);
        $auth->addChild($admin, $alert);
        $auth->addChild($user, $dashboard);
        $auth->addChild($user, $alert);

    }

}
