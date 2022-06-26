<?php

namespace frontend\widgets;

use common\models\Category;
use common\models\City;
use common\models\Product;
use frontend\models\ContactForm;
use Yii;
use yii\base\Widget;

class NavbarWidget extends Widget
{
    public function run()
    {
        $catalog = Category::find()
            ->where(['status' => 1])
            ->with('products')
            ->select(['id', 'url', 'name_ru', 'name_ua', 'sort_order'])
            ->orderBy(['manufacturer' => SORT_DESC])
            ->all();

        $cities = City::findAll(['status' => 1]);

        return $this->render('navbar', [
            'catalog' => $catalog,
            'cities' => $cities]);
    }
}
