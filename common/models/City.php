<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string|null $city
 * @property string|null $city_ru
 * @property string|null $city_ua
 * @property string|null $city_where_ru
 * @property string|null $city_where_ua
 * @property string|null $content_ru
 * @property string|null $content_ua
 * @property string|null $image
 * @property int|null $viewed
 * @property int|null $status
 * @property int|null $created_at
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['viewed', 'status', 'created_at'], 'integer'],
            [['city', 'city_ru', 'city_ua', 'city_where_ru', 'city_where_ua'], 'string', 'max' => 100],
            [['content_ru', 'content_ua'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
            'city_ru' => 'City Ru',
            'city_ua' => 'City Ua',
            'city_where_ru' => 'City Where Ru',
            'city_where_ua' => 'City Where Ua',
            'content_ru' => 'Content Ru',
            'content_ua' => 'Content Ua',
            'image' => 'Image',
            'viewed' => 'Viewed',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
