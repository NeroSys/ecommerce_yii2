<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 01.10.18
 * Time: 21:49
 */

namespace frontend\controllers;


use common\models\Category;
use common\models\Lang;

class CategoryController extends AppController
{

    public function actionIndex($slug)
    {
        $model = Category::find()->where(['slug' => $slug])->one();

        return $this->render('index', compact('model'));
    }

}