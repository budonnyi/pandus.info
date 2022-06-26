<?php

namespace frontend\models;

use common\models\Feedback;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $body;

    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'body'], 'required'],
            ['email', 'email'],
//            ['phone', 'match', 'pattern' => '/^\+38/s[0-9]{3}/s[0-9]{7}/', 'message' => 'Wrong phone number' ],
            [['phone'], 'string', 'min' => 7],
        ];
    }

    public function sendEmail()
    {
        $ip = Yii::$app->request->userIP;
        $feedback = Feedback::findOne(['ip' => $ip]);
//        echo '<pre>';
//        print_r($this->attributes);
//        die;
        if($feedback == null) {
            $search = ['are you', 'hello', 'http:', 'https:'];

            $error = false;
            if (str_word_count($this->body) > 200) {
                $error = true;
            }

            if (substr($this->phone, 3, 1) != '0') {
                $error = true;
            }

            $parts = explode("@", $this->email);
            if (in_array($parts[1], ['yahoo.com', 'pandus.info'])) {
                $error = true;
            }

            foreach ($search as $item) {
                if (preg_match("/$item/is", $this->body)) {
                    $error = true;
                }
            }

            if (preg_match("/^\+380/", $this->phone) == false) {
                $error = true;
            }

            if (!$error) {
                return Yii::$app->mailer->compose('letter_order', ['name' => $this->name, 'phone' => $this->phone, 'email' => $this->email, 'body' => $this->body])
                    ->setTo(['budonnyi@gmail.com', 'budonnaya@me.com'])
                    ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->params['senderName']])
                    ->setSubject('Сообщение с ПАНДУС ИНФО')
                    ->send();
            } else {
                $feedback = new Feedback();
                $feedback->body = $this->body;
                $feedback->email = $this->email;
                $feedback->phone = $this->phone;
                $feedback->ip = Yii::$app->request->userIP;
                $feedback->is_blocked = true;
                $feedback->save(false);
            }
        }
    }

    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
            $this->phone = '+38' . str_replace([' ', '(', ')'], "", $this->phone);
            return parent::beforeValidate();
        } else {
            return false;
        }
    }
}
