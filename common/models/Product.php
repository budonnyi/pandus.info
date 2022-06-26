<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;
use common\models\Category;


class Product extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $bigImageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    public function getCategories()
    {
        return $this->hasOne(\common\models\Category::className(), ['id' => 'category_id']);
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['category_id', 'name_ua', 'name_ru', 'description_short_ru', 'description_short_ua',  'technical_ru', 'technical_ua',], 'required'],
            [['description_ru', 'description_ua', 'description_short_ru', 'description_short_ua', 'technical_ru', 'technical_ua', 'meta_keyword_ua', 'meta_keyword_ru', 'meta_description_ua', 'meta_description_ru'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['url', 'name_ua'], 'string', 'max' => 100],
            [['image', 'big_image', 'name_ru', 'manufacturer', 'meta_title_ua', 'meta_title_ru'], 'string', 'max' => 255],
            [['class_name', 'country_origyn'], 'string', 'max' => 50],
            [['imageFile', 'bigImageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif, pdf'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'code' => 'Code',
            'url' => 'Url',
            'price' => 'Price',
            'image' => 'Image',
            'big_image' => 'Big Image',
            'name_ua' => 'Name Ua',
            'name_ru' => 'Name Ru',
            'description_ru' => 'Description Ru',
            'description_ua' => 'Description Ua',
            'description_short_ru' => 'Description Short Ru',
            'description_short_ua' => 'Description Short Ua',
            'technical_ru' => 'Technical Ru',
            'technical_ua' => 'Technical Ua',
            'manufacturer' => 'Manufacturer',
            'class_name' => 'Class Name',
            'country_origyn' => 'Country Origyn',
            'availability' => 'Availability',
            'meta_title_ua' => 'Meta Title Ua',
            'meta_title_ru' => 'Meta Title Ru',
            'meta_keyword_ua' => 'Meta Keyword Ua',
            'meta_keyword_ru' => 'Meta Keyword Ru',
            'meta_description_ua' => 'Meta Description Ua',
            'meta_description_ru' => 'Meta Description Ru',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function beforeSave($insert)
    {
        if ($file = UploadedFile::getInstance($this, 'imageFile')) {
            $dir = Yii::getAlias('@frontend') . '/web/product/';
            $this->image = $file->baseName . '_' . Yii::$app->getSecurity()->generateRandomString(6) . '.' . $file->extension;
            $file->saveAs($dir . $this->image);
        }

        if ($file = UploadedFile::getInstance($this, 'bigImageFile')) {
            $dir = Yii::getAlias('@frontend') . '/web/product/';
            $this->big_image = $file->baseName . '_' . Yii::$app->getSecurity()->generateRandomString(6) . '.' . $file->extension;
            $file->saveAs($dir . $this->big_image);
        }

        return parent::beforeSave($insert);
    }

    public function viewedCounter()
    {
        $this->viewed += 1;
        return $this->save(false);
    }

    public function getCategory()
    {
        return $this->hasOne(\common\models\Category::className(), ['id' => 'category_id']);
    }
}
