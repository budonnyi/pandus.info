<?php

namespace frontend\widgets;

use common\models\Lang;


class LangWidget extends \yii\bootstrap\Widget
{
    public function init()
    {

    }

    public function run() {

        return $this->render('language', [
            'current' => Lang::getCurrent(),
            'langs' => Lang::find()->where('id != :current_id', [':current_id' => Lang::getCurrent()->id])->all(),
        ]);
    }
}
