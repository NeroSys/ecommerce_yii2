<?php


namespace frontend\widgets;

use yii\bootstrap\Widget;
use common\models\Category;

class MenuFooterWidget extends Widget
{
    public function init(){

    }

    public function run() {

//        getting cache

//        $menu = Yii::$app->cache->get('menu-header');

//        if ($menu) return $menu;

        $categories = Category::find()->all();

//        setting cache

//        Yii::$app->cache->set('menu-header', $categories);

        return $this->render('menu/menu-footer',[
            'categories' => $categories
        ]);


    }


}
