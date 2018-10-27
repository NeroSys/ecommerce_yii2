<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 09.10.18
 * Time: 9:34
 */

namespace frontend\models;

use yii\db\ActiveRecord;


class Cart extends ActiveRecord
{

    public function addToCart($product, $language, $qty = 1)
    {

        if (!isset($_SESSION['cart']['language'])){
            $lang = $language;
        }

        $lang_product = $product->getSessionItems($lang);

        if (isset($_SESSION['cart'][$product->id])){
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        }else{

            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'name'  => $lang_product['title'],
                'price' => $lang_product['price'],
                'currency' => $lang_product['currency'],
                'img' => $product->image,
                'slug' => $product->slug,

            ];
        }

        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;

        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty*$lang_product['price'] : $qty*$lang_product['price'];

        $_SESSION['currency'] = $lang_product['currency'];

    }

    public function recalc($id){
        if(!isset($_SESSION['cart'][$id])) return false;
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }
}