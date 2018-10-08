<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 08.10.18
 * Time: 16:33
 */
?>

    <div class="newsletter-box">

        <?$form = ActiveForm::begin([
            'options' =>
                [
                    'method' => 'post',

                ]
        ]) ?>

        <?=$form->field($model, 'email', ['template'=>'{input}',])
            ->textInput(['placeholder' => Yii::t('site', 'Подписаться')]);?>
        <?= Html::submitButton('Subscribe', ['class' => 'btn-color ']) ?>
<!--        <input type="email" placeholder="Put your Email Address Here">-->
<!--        <button title="Subscribe" class="btn-color "></button>-->

        <?php $form = ActiveForm::end() ?>
    </div>


