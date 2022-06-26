<?php

namespace frontend\widgets;

use common\models\City;
use Yii;
use yii\base\Widget;
use common\models\Lang;

class CitiesWidget extends Widget
{

    public function run()
    {
        $cities = City::findAll(['status' => true]);

        $lang = Lang::getCurrent()->url;

        return $this->render('cities', ['cities' => $cities, 'lang' => $lang]);
    }
}
