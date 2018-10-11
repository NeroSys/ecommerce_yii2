<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 01.10.18
 * Time: 21:49
 */

namespace frontend\controllers;

use yii\web\HttpException;
use common\models\Category;
use common\models\Lang;
use common\models\Product;
use yii\data\Pagination;

class CategoryController extends AppController
{

    public function actionIndex($slug)
    {
        $model = Category::find()->where(['slug' => $slug])->one();

        if (empty($model))
            throw new HttpException(404, \Yii::t('site', 'Данной категории не существует'));

        $query = Product::find()->where(['category_id' => 1]);

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => 9, 'forcePageParam' => false]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $hits = Product::find()->where(['hit' => 1])->limit(9)->all();

        return $this->render('index', compact('model', 'products', 'pages', 'hits'));
    }

}