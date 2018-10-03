<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 01.10.18
 * Time: 23:07
 */

namespace frontend\widgets;

use yii\bootstrap\Widget;
use common\models\Category;

class MenuSidebarWidget extends Widget
{
    public function init(){

    }

    public function run() {

//        getting cache

//        $menu = Yii::$app->cache->get('menu-header');

//        if ($menu) return $menu;

        $categories = Category::find()->all();

//        setting cache

//        Yii::$app->cache->set('menu-header', $categories, 5);

        return $this->render('menu/menu-sidebar',[
            'categories' => $categories
        ]);


    }


}