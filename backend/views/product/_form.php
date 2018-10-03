<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Category;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="col-md-5 col-sm-5 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-bars"></i> Основная информация</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->asArray()->all(),'id', 'name'), ['prompt' => '']) ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?php if (!$model->isNewRecord){?>
                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
                <?}?>

                <?= $form->field($model, 'sort')->textInput() ?>

                <?= $form->field($model, 'viewed')->textInput() ?>

                <?= $form->field($model, 'hit')->checkbox() ?>

                <?= $form->field($model, 'new')->checkbox() ?>

                <?= $form->field($model, 'sale')->checkbox() ?>

                <?= $form->field($model, 'visible')->checkbox() ?>

            </div>
        </div>
    </div>
    <!--цена-->
    <div class="col-md-7 col-sm-7 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-bars"></i> Цена</h2>
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
                                if(!$model->isNewRecord) $transcription = Product::getValue($model->id, $lang->id);
                                ?>

                                <?if(!empty($transcription)){?>
                                    <?= $form->field($model,'price['.$lang->id.']['.$transcription->id .']')->label('Стоимость')->textInput(['maxlength' => true, 'value' => $transcription['price']])?>
                                <?} else {?>
                                    <?= $form->field($model,'priceNew['.$lang->id.'][]')->label('Стоимость на '. $lang->name)->textInput(['maxlength' => true, 'value' => ''])?>
                                <?}?>

                                <?php if(!$model->isNewRecord){?>
                                    <?if(!empty($transcription)){?>
                                        <?= $form->field($model,'oldPrice['.$lang->id.']['.$transcription->id .']')->label('Старая цена')->textInput(['maxlength' => true, 'value' => $transcription['old_price']])?>
                                    <?}?>
                                <?}?>

                                <?if(!empty($transcription)){?>
                                    <?= $form->field($model,'currency['.$lang->id.']['.$transcription->id .']')->label('Валюта для страны')->textInput(['maxlength' => true, 'value' => $transcription['currency']])?>
                                <?} else {?>
                                    <?= $form->field($model,'currencyNew['.$lang->id.'][]')->label('Валюта для '. $lang->name)->textInput(['maxlength' => true, 'value' => ''])?>
                                <?}?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
<!--        переводы-->
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
                                <a href="#1<?= $lang->id ?>" data-toggle="tab"><?= $lang->name ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="col-xs-9">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <?php foreach ($langs as $lang): ?>
                            <div class="tab-pane <?php if ($lang->local == 'ru') echo 'active';?>" id="1<?= $lang->id ?>">
                                <?php
                                if(!$model->isNewRecord) $transcription = Product::getValue($model->id, $lang->id);
                                ?>

                                <?if(!empty($transcription)){?>
                                    <?= $form->field($model,'title['.$lang->id.']['.$transcription->id .']')->label('Название')->textInput(['maxlength' => true, 'value' => $transcription['title']])?>
                                <?} else {?>
                                    <?= $form->field($model,'titleNew['.$lang->id.'][]')->label('Название на '. $lang->name)->textInput(['maxlength' => true, 'value' => ''])?>
                                <?}?>

                                <?if(!empty($transcription)){?>
                                    <?= $form->field($model,'description['.$lang->id.']['.$transcription->id .']')->label('Описание')->textInput(['maxlength' => true, 'value' => $transcription['description']])?>
                                <?} else {?>
                                    <?= $form->field($model,'descriptionNew['.$lang->id.'][]')->label('Описание на '. $lang->name)->textInput(['maxlength' => true, 'value' => ''])?>
                                <?}?>

                                <?if(!empty($transcription)){?>
                                    <?= $form->field($model,'text['.$lang->id.']['.$transcription->id .']')->label('Текст карточки товара')->textInput(['maxlength' => true, 'value' => $transcription['text']])?>
                                <?} else {?>
                                    <?= $form->field($model,'textNew['.$lang->id.'][]')->label('Текст карточки товара '. $lang->name)->textInput(['maxlength' => true, 'value' => ''])?>
                                <?}?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <?php ActiveForm::end(); ?>

</div>
