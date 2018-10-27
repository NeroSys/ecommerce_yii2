<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 27.10.18
 * Time: 13:36
 */

namespace backend\controllers;

use yii\web\Controller;


class SalesController extends Controller
{

    public function actionIndex(){

        return $this->render('index');
    }

}