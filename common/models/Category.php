<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string|null $url
 * @property string|null $class_name
 * @property string|null $country_origyn
 * @property string|null $name_ru
 * @property string|null $name_ua
 * @property int|null $sort_order
 * @property string|null $description_short_ru
 * @property string|null $description_short_ua
 * @property string|null $description_ru
 * @property string|null $description_ua
 * @property string|null $image
 * @property string|null $description_image
 * @property string|null $meta_title_ua
 * @property string|null $meta_title_ru
 * @property string|null $meta_description_ua
 * @property string|null $meta_description_ru
 * @property string|null $meta_keyword_ua
 * @property string|null $meta_keyword_ru
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Category extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $descriptionImageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
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

    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id'])->select(['category_id', 'url', 'name', 'name_ua', 'name_ru', 'price'])->orderBy(['name' => SORT_ASC]);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort_order', 'status'], 'integer'],
            [['description_short_ru', 'description_short_ua', 'description_ru', 'description_ua', 'meta_description_ua', 'meta_keywords_ua', 'meta_title_ru', 'meta_description_ru', 'meta_keywords_ru', 'meta_title_ua'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['url'], 'string', 'max' => 100],
            [['class_name', 'country_origyn', 'name_ru', 'name_ua'], 'string', 'max' => 50],
            [['image', 'description_image'], 'string', 'max' => 255],
            [['widgets'], 'string', 'max' => 250],
            [['imageFile', 'descriptionImageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif, pdf'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'url' => 'Url',
            'class_name' => 'Class Name',
            'country_origyn' => 'Country Origyn',
            'name_ru' => 'Name Ru',
            'name_ua' => 'Name Ua',
            'sort_order' => 'Sort Order',
            'description_short_ru' => 'Description Short Ru',
            'description_short_ua' => 'Description Short Ua',
            'description_ru' => 'Description Ru',
            'description_ua' => 'Description Ua',
            'image' => 'Image',
            'description_image' => 'Description Image',
            'meta_title_ua' => 'Meta Title Ua',
            'meta_title_ru' => 'Meta Title Ru',
            'meta_description_ua' => 'Meta Description Ua',
            'meta_description_ru' => 'Meta Description Ru',
            'meta_keyword_ua' => 'Meta Keywords Ua',
            'meta_keyword_ru' => 'Meta Keywords Ru',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function beforeSave($insert)
    {
        if ($file = UploadedFile::getInstance($this, 'imageFile')) {
            $dir = Yii::getAlias('@frontend') . '/web/category/';
            $this->image = $file->baseName . '_' . Yii::$app->getSecurity()->generateRandomString(6) . '.' . $file->extension;
            $file->saveAs($dir . $this->image);
        }

        if ($file = UploadedFile::getInstance($this, 'descriptionImageFile')) {
            $dir = Yii::getAlias('@frontend') . '/web/category/';
            $this->description_image = $file->baseName . '_' . Yii::$app->getSecurity()->generateRandomString(6) . '.' . $file->extension;
            $file->saveAs($dir . $this->description_image);
        }

        return parent::beforeSave($insert);
    }

    public function viewedCounter()
    {
        $this->viewed += 1;
        return $this->save(false);
    }
}
