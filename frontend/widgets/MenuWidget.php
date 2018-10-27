<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 22.10.18
 * Time: 20:09
 */

namespace frontend\widgets;

use common\models\Category;
use yii\base\Widget;

class MenuWidget extends Widget
{
    public $tpl;


    public function init()
    {
        parent::init();

        if ($this->tpl === null){

            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run(){

        $main = Category::find()->where(['category_id' => null])->all();

        $children = Category::find()->where(['category_id' => !null])->all();


        return $this->render('menu/'.$this->tpl, compact('main', 'children'));
    }

}