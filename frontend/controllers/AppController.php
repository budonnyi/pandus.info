<?php

namespace frontend\controllers;

use yii\helpers\Url;
use yii\web\Controller;
use Yii;
use common\models\Lang;

class AppController extends Controller
{
    public function setMeta($title = null, $keywords = null, $description = null, $image = null)
    {
        $this->view->title = $title;
//        $this->view->registerMetaTag(['name' => 'title', 'content' => $title]);
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $keywords]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => $description]);

//        \Yii::$app->getView()->params['title'] = $title;
//        \Yii::$app->getView()->params['site_name'] = $siteName;
//        \Yii::$app->getView()->params['url'] = Url::canonical();
//        \Yii::$app->getView()->params['description'] = $description;
//        \Yii::$app->getView()->params['image'] = $image;
        Yii::$app->view->params['title'] = $title;
        Yii::$app->view->params['description'] = $description;
        Yii::$app->view->params['site_name'] = Yii::t('seo', 'Пандуси для коляски людям з інвалідністю');
        Yii::$app->view->params['image'] = $image;
        Yii::$app->view->params['url'] = Url::base(true) . '/' . Lang::getCurrent()->url . '/' . Yii::$app->request->pathInfo;
        Yii::$app->view->params['url'] = Url::canonical();

        return true;
    }
}
