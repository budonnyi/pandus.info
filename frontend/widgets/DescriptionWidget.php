<?php

namespace frontend\widgets;

use common\models\Product;
use Yii;
use yii\base\Widget;

class DescriptionWidget extends Widget
{

    public function run()
    {
        $url = 'fixed-ramps';
        $category = Category::findOne(['url' => $url]);

        $pictures = $category->pictures;
        $technicalData = $category->technical;

        return $this->render('description', ['parameters' => $parameters, 'technicalData' => $technicalData]);
    }
}
