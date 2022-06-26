<?php

namespace backend\controllers;

use common\models\Product;
use Yii;
use common\models\City;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ServiceController extends Controller
{
    public function actionTest()
    {
//        $products = Product::find()->all();
//
//        foreach ($products as $product) {
//            $product->description_short_ru = trim(strip_tags($product->description_short_ru));
//            $product->description_short_ua = trim(strip_tags($product->description_short_ua));
//            $product->technical_ru = str_replace('Максимум.', 'Макс.', $product->technical_ru);
//            $product->technical_ua = str_replace('Максимум.', 'Макс.', $product->technical_ua);
//            $product->save(false);
//        }

        die('EOF');
    }
}
