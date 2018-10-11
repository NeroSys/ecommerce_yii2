<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
    <div class="newsletter-box">
        <?$form = ActiveForm::begin([
            'options' => ['method' => 'post']
        ]) ?>
        <?=$form->field($model, 'email', ['template'=>'{input}',])
            ->textInput(['placeholder' => Yii::t('site', Yii::t('site', 'Введите свой email'))]);?>
        <?= Html::submitButton(Yii::t('site', 'Подписаться'), ['class' => 'btn-color ']) ?>
        <?php $form = ActiveForm::end() ?>
    </div>


