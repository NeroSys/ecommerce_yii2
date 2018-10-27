<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Manager */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manager-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-8">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-4">
        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'discount')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'percent')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
