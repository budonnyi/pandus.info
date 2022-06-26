<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Product;
use common\models\Lang;

class BlogController extends AppController
{
    public function actionIndex()
    {
//        $this->setMeta(
//            $product->{'name_' . $lang} . ' ' . $category->{'meta_title_' . $lang},
//            $product->{'name_' . $lang} . ', ' . $category->{'meta_keyword_' . $lang},
//            $product->{'name_' . $lang} . ' ' . $category->{'meta_description_' . $lang},
//            '/product/' . $product->image);

        return $this->render('index');
    }

    public function actionView($url)
    {
        //Статистика посещений
        $this->on(\yii\web\Controller::EVENT_AFTER_ACTION, function ($event) {
            \common\modules\statistics\CountKsl::init();
        });

        $product = Product::find()->where(['url' => $url])->one();
        $category = Category::find()->where(['id' => $product->category_id])->one();

        $similarProducts = Product::find()
            ->where(['category_id' => $product->category_id])
            ->andWhere(['<>', 'id', $product->id ])
            ->all();

        $lang = Lang::getCurrent()->url;

        // $product->viewedCounter();

        $this->setMeta(
            $product->{'name_' . $lang} . ' ' . $category->{'meta_title_' . $lang},
            $product->{'name_' . $lang} . ', ' . $category->{'meta_keyword_' . $lang},
            $product->{'name_' . $lang} . ' ' . $category->{'meta_description_' . $lang},
            '/product/' . $product->image);

        if (empty($product)) {
            throw new \yii\web\HttpException(404, 'Такого товара не существует.');
        }

        $images = [];
        
        return $this->render('view', compact('product', 'images', 'similarProducts'));
    }
}
