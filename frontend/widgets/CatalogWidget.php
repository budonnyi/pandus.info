<?php

namespace frontend\widgets;

use common\models\Category;
use Yii;
use yii\base\Widget;
use common\models\Lang;

class CatalogWidget extends Widget
{
    public function run()
    {
        $catalog = Category::find()->where(['status' => 1])->orderBy(['manufacturer' => SORT_ASC])->all();
        $lang = Lang::getCurrent()->url;

        return $this->render('catalog', ['catalog' => $catalog, 'lang' => $lang]);
    }
}
