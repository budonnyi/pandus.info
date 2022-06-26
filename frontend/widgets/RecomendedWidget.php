<?php

namespace frontend\widgets;

use common\models\Product;
use Yii;
use yii\base\Widget;

class RecomendedWidget extends Widget
{
    public function run()
    {
        $products = Product::find()->where(['status' => 1, 'availability' => 1])->orderBy(['name_ru' => SORT_DESC])->all();

        return $this->render('recomended', ['products' => $products]);
    }
}
