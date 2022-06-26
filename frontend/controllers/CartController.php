<?php

namespace frontend\controllers;

use Yii;
use common\models\Product;
use common\models\Cart;
use common\models\Order;
use common\models\OrderItems;
use yii\base\ErrorException;

class CartController extends AppController
{
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $qty = Yii::$app->request->get('qty');
        $qty = (int)$qty;
        $qty = !$qty ? 1 : $qty;

        $product = Product::findOne($id);

        if (empty($product)) return false;

        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();

        $cart->addToCart($product, $qty);

        if (!Yii::$app->request->isAjax) {
            return $this->redirect(Yii::$app->request->referrer);
        }

        $this->layout = false;

        return $this->render('cart-modal', compact('session'));
    }

    public function actionClear()
    {
        $session = Yii::$app->session;

        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');

        $this->layout = false;

        return $this->render('cart-modal', compact('session'));
    }

    public function actionDelItem()
    {
        $id = Yii::$app->request->get('id');

        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->recalc($id);

        $this->layout = false;

        return $this->render('cart-modal', compact('session'));
    }

    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();

        $this->layout = false;

        return $this->render('cart-modal', compact('session'));
    }

    public function actionView()
    {
        $session = Yii::$app->session;
        $session->open();

        $this->setMeta('Корзина');

        $order = new Order();

        if ($order->load(Yii::$app->request->post())) {

            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];

            $session['comment'] = $order->comment;
            $session['name'] = $order->name;
            $session['phone'] = $order->phone;
            $session['email'] = $order->email;
            $session['address'] = $order->address;

            if ($order->save()) {

                $this->saveOrderItems($session['cart'], $order->id);

                Yii::$app->mailer->compose('order', ['session' => $session], 'comment')
                    ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->params['senderName']])
                    ->setTo(['budonnyi@gmail.com', 'budonnaya@me.com'])
                    ->setSubject('Новый заказ с PANDUS.INFO от ' . $order->name)
                    ->setTextBody('message from Yii2')
                    ->send();

                Yii::$app->session->setFlash('success', 'Ваш запрос принят. Мы скоро свяжемся с Вами. :)');

                $session->remove('cart');
                $session->remove('name');
                $session->remove('phone');
                $session->remove('email');
                $session->remove('comment');
                $session->remove('cart.qty');
                $session->remove('cart.sum');

                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка оформления заказа...');
            }
        }

        return $this->render('view', compact('session', 'order'));
    }

    public function saveOrderItems($items, $order_id)
    {
        foreach ($items as $id => $item) {
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty'] * $item['price'];

            $order_items->save();
        }
    }
}
