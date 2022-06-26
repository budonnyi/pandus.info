<?php

namespace frontend\controllers;

use common\models\Product;
use yii\helpers\ArrayHelper;
use yii\imagine\Image;
use yii\web\Controller;
use Yii;

class ServiceController extends Controller
{
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

    public function actionTest()
    {
//        $product = Product::find()->count();
//        var_dump($product);
//        die;

//        $dir = Yii::getAlias('@frontend') . '/web/img/product/';
//        $files = scandir($dir);
//        array_shift($files);
//        array_shift($files);
//        array_shift($files);
//        unset($files[array_search('bigimages',$files)]);
//        unset($files[array_search('newdir',$files)]);
//        unset($files[array_search('newproduct',$files)]);

//        $productList = Product::find()
//            ->where(['in', 'image', $files])
//            ->all();
//
//        $products = array_unique(ArrayHelper::getColumn($productList, 'image'));
//
//        echo count($products); die;
//
//
////        echo '<pre>';
////        var_dump($files);
////        die;
//
//
//        foreach ($files as $product) {
//            $image = $dir . $product;
//            if (is_file($image) && in_array($product, $products)) {
//                copy($dir . $product, $dir . 'newproduct/' . $product);
////            Image::thumbnail($image, 400, 300)
////                ->save($image, ['quality' => 80]);
//
//            } else {
//                unlink($image);
//            }
//        }
//        die;
//
//        return true;
    }
}
