<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 09.10.18
 * Time: 9:32
 */

namespace frontend\controllers;

use common\models\Product;
use common\models\Sales;
use frontend\models\Cart;
use common\models\Order;
use common\models\OrderItems;
use Yii;

class CartController extends AppController
{
    public function actionAdd($id)
    {
        $qty = (int) Yii::$app->request->get('qty');

        $qty = !$qty ? 1 : $qty;

        $product = Product::findOne($id);
        if (empty($product)) return false;

        $language = Yii::$app->language;

        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $language, $qty);
        if (!Yii::$app->request->isAjax){
            $this->redirect(Yii::$app->request->referrer);
        }
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionClear(){
        $session =Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionDelItem(){
        $id = Yii::$app->request->get('id');
        $session =Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionShow(){
        $session =Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionView(){
        $session =Yii::$app->session;
        $session->open();

        $order = new Order();

        if ($order->load(Yii::$app->request->post())){
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            $order->currency = $session['currency'];
            if($order->save()){
                $this->saveOrderItems($session['cart'], $order->id);
                $this->saveSales($session, $order->id, $order->manager_discount);
                Yii::$app->session->setFlash('success', 'Ваш заказ принят. Менеджер вскоре свяжется с Вами.');
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка оформления заказа');
            }
        }



        return $this->render('view', compact('session', 'order'));
    }

    protected function saveOrderItems($items, $order_id){

        foreach($items as $id => $item){
            $order_items = new OrderItems();
            $order_items->item_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty'] * $item['price'];
            $order_items->save();
        }
    }

    protected function saveSales($session, $order_id, $manager){

        $sales = new Sales();
        $sales->order_id = $order_id;
        $sales->currency = $session['currency'];
        $sales->sum= $session['cart.sum'];
        $sales->manager_discount = $manager;
        $sales->save();
    }

}