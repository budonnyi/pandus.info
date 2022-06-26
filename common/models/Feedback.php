<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string|null $ip
 * @property int|null $is_blocked
 * @property string|null $body
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $date
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_blocked'], 'integer'],
            [['body'], 'string'],
            [['date'], 'safe'],
            [['ip', 'email', 'phone'], 'string', 'max' => 20],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
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
            'ip' => 'Ip',
            'is_blocked' => 'Is Blocked',
            'body' => 'Body',
            'email' => 'Email',
            'phone' => 'Phone',
            'date' => 'Date',
        ];
    }
}
