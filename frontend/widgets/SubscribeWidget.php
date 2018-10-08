<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 08.10.18
 * Time: 16:23
 */

namespace frontend\widgets;

use yii\base\Widget;
use Yii;
use common\models\Subscribe;

class SubscribeWidget extends Widget
{

    public function init()
    {

    }

    public function run()
    {
        $model = new Subscribe();

        if (\Yii::$app->request->isPost && $model->load(\Yii::$app->request->post()) && $model->validate() && $model->save()) {

            Yii::$app->session->setFlash('subscribeMsg', 'OK!', false);
            Yii::$app->response->refresh();

        } else {
            Yii::$app->session->setFlash('subscribeMsg', 'Not OK...', false);
            // Yii::$app->response->refresh();
        }


        return $this->render('subscribe/view', compact('model'));


    }
}
