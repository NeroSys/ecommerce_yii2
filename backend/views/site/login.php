<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>


<section class="login_content">

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <div>
            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
        </div>
        <div>
            <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
        </div>
        <div>
            <?= $form->field($model, 'rememberMe')->checkbox()->label('Запомнить меня') ?>
        </div>
        <div>
            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
        <div class="clearfix"></div>
        <div class="separator">


            <div class="clearfix"></div>
            <br />
            <div>
                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Galin-A</h1>

                <p>©2018 </p>
            </div>
        </div>

    <!-- form -->
</section>
<!-- content -->