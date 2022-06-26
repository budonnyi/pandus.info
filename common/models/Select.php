<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Select extends ActiveRecord
{
    public $restoran;
    public $date;

    public function rules()
    {
        return [
            [['restoran', 'date'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'restoran' => 'Ресторан',
            'date' => 'Период',
        ];
    }
}
