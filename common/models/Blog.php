<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string|null $title_ua
 * @property string|null $title_ru
 * @property string|null $content_ua
 * @property string|null $content_ru
 * @property string|null $author
 * @property string|null $image
 * @property int|null $viewed
 * @property string|null $url
 * @property int|null $status
 * @property int|null $created_at
 */
class Blog extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_ua', 'content_ru', 'title_ua', 'title_ru', 'author'], 'required'],
            [['content_ua', 'content_ru'], 'string'],
            [['viewed', 'status', 'created_at'], 'integer'],
            [['title_ua', 'title_ru'], 'string', 'max' => 255],
            [['author', 'url'], 'string', 'max' => 200],
            [['image'], 'string', 'max' => 150],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['created_at'],
                ],
            ],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title_ru',
                'slugAttribute' => 'url',//default name slug
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_ua' => 'Title Ua',
            'title_ru' => 'Title Ru',
            'content_ua' => 'Content Ua',
            'content_ru' => 'Content Ru',
            'author' => 'Author',
            'image' => 'Image',
            'viewed' => 'Viewed',
            'url' => 'Url',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $dir = Yii::getAlias('@blog') . '/';
            $this->imageFile->saveAs($dir . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->image = $this->imageFile->baseName . '.' . $this->imageFile->extension;

            $image = Yii::getAlias('@blog/' . $this->image);
            Image::thumbnail($image, 400, 200)
                ->save(Yii::getAlias('@blog/' . $this->image), ['quality' => 80]);
            return true;
        } else {
            return false;
        }
    }


//    public function beforeSave($insert)
//    {
//        if ($file = UploadedFile::getInstance($this, 'imageFile')) {
//            $dir = Yii::getAlias('@blog') . '/';
//            $this->image = $file->baseName . '.' . $file->extension;
//            $this->imageFile = $file->baseName . '.' . $file->extension;
//            $file->saveAs($dir . $this->image);
//
//            $image = Yii::getAlias('@blog/' . $this->image);
//            Image::resize($image, 400, 200)
//                ->save(Yii::getAlias('@blog/' . $this->image), ['quality' => 80]);
//        }
//    }
}
