<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property string $title_ua
 * @property string $title_ru
 * @property string $description_ua
 * @property string $description_ru
 * @property string $image
 * @property string $video_name
 */
class Video extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ua', 'title_ru', 'description_ua', 'description_ru', 'video_name'], 'required'],
            [['description_ua', 'description_ru'], 'string'],
            [['title_ua', 'title_ru'], 'string', 'max' => 255],
            [['image', 'video_name'], 'string', 'max' => 150],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif, pdf'],
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
            'description_ua' => 'Description Ua',
            'description_ru' => 'Description Ru',
            'image' => 'Image',
            'video_name' => 'Video Name',
        ];
    }

    public function beforeSave($insert)
    {
        if ($file = UploadedFile::getInstance($this, 'imageFile')) {
            $dir = Yii::getAlias('@frontend') . "/web/video_picture/";
            $this->image = $file->baseName . '_' . Yii::$app->getSecurity()->generateRandomString(6) . '.' . $file->extension;
            $file->saveAs($dir . $this->image);
        }

        return parent::beforeSave($insert);
    }
}
