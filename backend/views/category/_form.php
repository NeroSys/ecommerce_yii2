<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="col-md-5 col-sm-5 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-bars"></i> Основная информация</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?php if (!$model->isNewRecord){?>
                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
                <?}?>

                <?= $form->field($model, 'visible')->checkbox() ?>

                <?= $form->field($model, 'sort')->textInput() ?>

            </div>
        </div>
    </div>
<!--переводы контента-->
    <div class="col-md-7 col-sm-7 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-bars"></i> Переводы</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-xs-3">
                    <ul class="nav nav-tabs tabs-left">
                        <?php foreach ($langs as $lang): ?>

                            <li class=" <?php if ($lang->local == 'ru') echo 'active';?>">
                                <a href="#<?= $lang->id ?>" data-toggle="tab"><?= $lang->name ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="col-xs-9">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <?php foreach ($langs as $lang): ?>
                            <div class="tab-pane <?php if ($lang->local == 'ru') echo 'active';?>" id="<?= $lang->id ?>">
                                <?php
                                if(!$model->isNewRecord) $transcription = Category::getValue($model->id, $lang->id);
                                ?>

                                <?if(!empty($transcription)){?>
                                    <?= $form->field($model,'title['.$lang->id.']['.$transcription->id .']')->label('Название')->textInput(['maxlength' => true, 'value' => $transcription['title']])?>
                                <?} else {?>
                                    <?= $form->field($model,'titleNew['.$lang->id.'][]')->label('Название на '. $lang->name)->textInput(['maxlength' => true, 'value' => ''])?>
                                <?}?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
