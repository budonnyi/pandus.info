<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Product;
use common\models\Lang;
use Yii;
use yii\helpers\Url;

class ProductController extends AppController
{
    public function actionView($url)
    {
        //Статистика посещений
//        $this->on(\yii\web\Controller::EVENT_AFTER_ACTION, function ($event) {
//            \common\modules\statistics\CountKsl::init();
//        });

        $product = Product::find()->where(['url' => $url])->one();
        if ($product == null) {
            throw new \yii\web\HttpException(404, Yii::t("main", 'Такого товару не існує.'));
        }

        $category = Category::find()->where(['id' => $product->category_id])->one();

        $similarProducts = Product::find()
            ->where(['category_id' => $product->category_id])
            ->andWhere(['<>', 'id', $product->id])
            ->all();

        $lang = Lang::getCurrent()->url;
        $this->setMeta(
            $product->{'name_' . $lang} . ' ' . $category->{'meta_title_' . $lang},
            $product->{'meta_keywords_' . $lang},
            $product->{'name_' . $lang} . ' ' . $product->{'meta_description_' . $lang},
            Url::base(true) . '/product/' . $product->image);

        return $this->render('view', compact('product', 'similarProducts'));
    }
}
