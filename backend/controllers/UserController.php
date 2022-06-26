<?php

namespace backend\controllers;

use Yii;
//use common\models\SignupForm;
use common\models\User;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'error', 'logout'],
                'rules' => [
                    [
                        'actions' => ['create', 'update', 'index', 'view', 'delete'],
                        'allow' => true,
                        'roles' => ['admin']
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {

        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {

            if (isset($model->password)) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($model->password);
            }

            $model->generateAuthKey();
            $model->generateEmailVerificationToken();

            $model->save(false);

            Yii::$app->session->setFlash('success', 'Новый пользователь добавлен.');

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionUpdate($id)
    {
        Yii::$app->params['title'] = 'Управление пользователями';
        Yii::$app->params['page_title'] = 'Управление пользователями';

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {

            if (isset($model->password)) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($model->password);
            }

            $model->save(false);


            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
