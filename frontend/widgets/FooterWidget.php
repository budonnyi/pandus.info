<?php

namespace frontend\widgets;

use common\models\Product;
use frontend\models\ContactForm;
use Yii;
use yii\base\Widget;

class FooterWidget extends Widget
{

    public function run()
    {
        $storeProducts = Product::find()->where(['<>', 'availability', 0])->limit(2)->orderBy(['id' => SORT_DESC])->all();
        $popularProducts = Product::find()->where(['in', 'id', [93, 160, 159]])->limit(3)->orderBy(['id' => SORT_DESC])->all();

        $contactFormModel = new ContactForm();

        if ($contactFormModel->load(Yii::$app->request->post()) && $contactFormModel->validate()) {
            //Статистика посещений
            $this->on(yii\web\Controller::EVENT_AFTER_ACTION, function ($event) {
                \common\modules\statistics\CountKsl::init();
            });

            $name = $contactFormModel->name;
//            $phone = $contactFormModel->phone;
            $email = $contactFormModel->email;
            $body = $contactFormModel->body;
            if ($contactFormModel->sendEmail($name, $email, $body)) {
                Yii::$app->session->setFlash('success', 'Дякуємо за повідомлення!');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error occured when sending your message.');
            }

            return true; //$this->refresh();
        }

        return $this->render('footer', ['storeProducts' => $storeProducts, 'contactFormModel' => $contactFormModel, 'popularProducts' => $popularProducts]);
    }
}
