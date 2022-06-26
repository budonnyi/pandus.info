<?php

namespace frontend\controllers;

use common\models\Blog;
use common\models\Category;
use common\models\City;
use common\models\Lang;
use common\models\Product;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\controllers\AppController;
use yii\web\HttpException;

/**
 * Site controller
 */
class SiteController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
//                    [
//                        'actions' => ['signup'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
//                    [
//                        'allow' => false,
////                        'roles' => ['?'],
//                        'ips' => ['31.43.56.3'],
//                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
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

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        //Статистика посещений
        $this->on(\yii\web\Controller::EVENT_AFTER_ACTION, function ($event) {
            \common\modules\statistics\CountKsl::init();
        });

        $carouselItems = Product::find()
            ->joinWith(['categories'])
            ->orderBy('RAND()')
            ->where(['product.status' => 1])
            ->andWhere(['category.status' => 1])
            ->all();
        $blog = Blog::find()->where(['status' => 1])->limit(3)->all();

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', Lang::getCurrent()->url == 'ru' ? 'Спасибо за сообщение!' : 'Дякуємо за повідомлення!');
            } else {
                Yii::$app->session->setFlash('error', Lang::getCurrent()->url == 'ru' ? 'Чтото пошло не так..' : 'Щось пішло не так..');
            }
            return $this->refresh();
        }

        Lang::getCurrent()->url == 'ru' ?
            $this->setMeta('Пандусы для инвалида на коляске купить с доставкой по Украине',
                'пандус, купить, инвалид, коляска, телескопический, раскладной, переносной',
                'Пандусы для людей с инвалидностью ✅ Купить пандус для инвалида - переносные и стационарные ✅ 100% гарантия качества ✅ Всегда в наличии! Опыт поставки пандусов с 2015 года.',
                Url::base(true) . '/img/' . 'pandus_sm4.jpg')
            : $this->setMeta('Пандуси для інваліда на візку купити з доставкою по Україні',
            'пандус, купити, інвалід, візок, телескопічний, розкладний, переносний',
            'Пандуси для людей з інвалідністю ✅ Купити пандус для інваліда - переносні та стаціонарні ✅ 100% гарантія якості ✅ Завжди в наявності! Досвід постачання пандусів з 2015 року.',
            Url::base(true) . '/img/' . 'pandus_sm4.jpg');

        return $this->render('index', compact( 'carouselItems', 'model', 'blog'));
    }

    public function actionPost($url)
    {
        $model = Blog::findOne(['url' => $url]);
        if ($model == null) {
            throw new \yii\web\HttpException(404, Yii::t('main', 'Сторінка не існує.'));
        }

        $resentBlogs = Blog::find()->where(['status' => 1])->limit(3)->all();

        Lang::getCurrent()->url == 'ru' ? (
        $this->setMeta('Пандусы для инвалида - ' . $model->title_ru,
            'пандус, купить, инвалид, коляска, телескопический, раскладной, ступени',
            'Магазин пандусов для людей с инвалидностью. ✅ Блог про пандусы от Хендикарс. Статья ' . $model->title_ru,
            Url::base(true) . '/images/blog/' . $model->image)) : (
        $this->setMeta('Пандуси для інваліда - ' . $model->title_ua,
            'пандус, купити, інвалід, коляска, візок, телескопічний, розкладний, ступені, сходи',
            'Магазин пандусів для людей з інвалідністю. ✅ Блог про пандуси від Хендікарс. Стаття ' . $model->title_ua,
            Url::base(true) . '/images/blog/' . $model->image));

        return $this->render('post', ['model' => $model, 'resentBlogs' => $resentBlogs]);
    }

    public function actionCities($city)
    {
        $model = City::findOne(['city' => $city, 'status' => 1]);

        if ($model == null) {
            throw new \yii\web\HttpException(404, Yii::t('main', 'Сторінка не існує.'));
        }

        $products = Product::find()->where(['status' => 1, 'availability' => 1])->orderBy(['name_ru' => SORT_DESC])->all();

        $cities = City::findAll(['status' => 1]);
        $catalog = Category::find()->where(['status' => 1])->orderBy(['sort_order' => SORT_ASC])->all();

        Lang::getCurrent()->url == 'ru' ? (
        $this->setMeta('Купить пандус для людей с инвалидностью ' . $model->city_where_ru,
            'пандус, купить, инвалид, коляска, телескопический, раскладной, ступени',
            'Магазин пандусов для людей с инвалидностью. ✅ Доставка ' . $model->city_where_ru . '. Официальный дилер в Украине BraunAbility (Швеция), опыт работы с 2015 года.',
            Url::base(true) . '/img/pandus_sm4.jpg')) : (
        $this->setMeta('Купити пандус для людей з інвалідністю ' . $model->city_where_ua,
            'пандус, купити, інвалід, коляска, візок, телескопічний, розкладний, ступені, сходи',
            'Магазин пандусів для людей з інвалідністю. ✅ Доставка ' . $model->city_where_ua . '. Офіційний дилер в Україні BraunAbility (Швеція), досвід роботи з 2015 року.',
            Url::base(true) . '/img/pandus_sm4.jpg'));

        return $this->render('cities', [
            'model' => $model,
            'products' => $products,
            'cities' => $cities,
            'catalog' => $catalog,
        ]);
    }

    public function actionCity()
    {
        $model = City::findAll(['status' => 1]);

        if ($model == null) {
            throw new \yii\web\HttpException(404, Yii::t('main', 'Сторінка не існує.'));
        }

        $products = Product::find()->where(['status' => 1, 'availability' => 1])->orderBy(['name_ru' => SORT_DESC])->all();

        $cities = City::findAll(['status' => 1]);
        $catalog = Category::find()->where(['status' => 1])->orderBy(['sort_order' => SORT_ASC])->all();

        Lang::getCurrent()->url == 'ru' ? (
        $this->setMeta('Купить пандус для инвалида c доставкой по Украине',
            'пандус, купить, инвалид, коляска, телескопический, раскладной, ступени',
            'Магазин пандусов для людей с инвалидностью. ✅ Доставка в любой город. ✅ Официальный дилер в Украине BraunAbility (Швеция), ✅ опыт работы с 2015 года.',
            Url::base(true) . '/img/pandus_sm4.jpg')) : (
        $this->setMeta('Купити пандус для інваліда з доставкою по Україні',
            'пандус, купити, інвалід, коляска, візок, телескопічний, розкладний, ступені, сходи',
            'Магазин пандусів для людей з інвалідністю. ✅ Доставка у любе місто. ✅ Офіційний дилер в Україні BraunAbility (Швеція), ✅ досвід роботи з 2015 року.',
            Url::base(true) . '/img/pandus_sm4.jpg'));

        return $this->render('city', [
            'model' => $model,
            'products' => $products,
            'cities' => $cities,
            'catalog' => $catalog,
        ]);
    }

    public function actionBlog()
    {
        $model = Blog::find()->where(['status' => 1])->orderBy(['created_at' => SORT_DESC])->all();

        if ($model == null) {
            throw new \yii\web\HttpException(404, Yii::t('main', 'Сторінка не існує.'));
        }

        Lang::getCurrent()->url == 'ru' ? (
        $this->setMeta('Блог о пандусах для людей с инвалидностью',
            'пандус, купить, инвалид, коляска, телескопический, раскладной, ступени',
            'Блог магазина пандусов для людей с инвалидностью. ✅ Доставка пандусов в любой город Украины.',
            Url::base(true) . '/img/pandus_sm4.jpg')) : (
        $this->setMeta('Блог про пандуси для людей з інвалідністю',
            'пандус, купити, інвалід, коляска, візок, телескопічний, розкладний, ступені, сходи',
            'Блог магазина пандусів для людей з інвалідністю. ✅ Доставка у любе місто Украаїни.',
            Url::base(true) . '/img/pandus_sm4.jpg'));

        return $this->render('blog', [
            'model' => $model
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();

        Lang::getCurrent()->url == 'ru' ? (
        $this->setMeta('Контакты Хендикарс - пандусы для людей с инвалидностью',
            'пандус, купить, инвалид, коляска, телескопический, раскладной, ступени',
            'Продаем безопасные и надежные пандусы для людей с инвалидностью. ✅ Официальный дилер в Украине BraunAbility (Швеция), ✅ опыт работы начиная с 2015 года. ✅ Звоните и мы всегда сможем договориться!',
            Url::base(true) . '/img/pandus_sm4.jpg')) : (
        $this->setMeta('Контакти Хендікарс - пандуси для людей з інвалідністю',
            'пандус, купити, інвалід, коляска, візок, телескопічний, розкладний, ступені, сходи',
            'Продаємо безпечні і надійні пандуси для людей з інвалідністю. ✅ Офіційний дилер в Україні BraunAbility (Швеція), ✅ досвід роботи починаючи з 2015 року. ✅ Телефонуйте і ми завжди зможемо домовитися!',
            Url::base(true) . '/img/pandus_sm4.jpg'));

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Дякуємо за повідомлення!');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }
            return $this->refresh();
        }

        return $this->render('contact', compact('model'));
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
