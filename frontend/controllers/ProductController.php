<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 08.10.18
 * Time: 18:16
 */

namespace frontend\controllers;

use common\models\Product;
use common\models\Category;
use yii\web\HttpException;

class ProductController extends AppController
{
    public function actionView($slug)
    {
        $product = Product::find()->where(['slug' => $slug])->one();

        if (empty($product))
            throw new HttpException(404, \Yii::t('site', 'Такого товара не существует'));

        $hits = Product::find()->where(['hit' => 1])->all();

        $category = Category::find()->where(['id' => $product->category_id])->one();

        return $this->render('view', compact('product', 'hits', 'category'));
    }

}