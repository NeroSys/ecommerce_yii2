<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Category;
use common\models\Product;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Url;
use common\components\cropper\Widget;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Основная информация</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Цены</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Переводы</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Изображение</a>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

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
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

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
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

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
                                            <?= $form->field($model, 'description['.$lang->id.']['.$transcription->id .']')->widget(CKEditor::className(), [
                                                'options' => [
                                                    'row' => 2,
                                                    'value' => $transcription['description']],
                                            ])->label('Описание')?>

                                        <?} else {?>

                                            <?= $form->field($model, 'descriptionNew['.$lang->id.'][]')->widget(CKEditor::className(), [
                                                'options' => [
                                                    'row' => 2,
                                                    'value' => '',]
                                            ])->label('Текст описания')?>

                                        <?}?>

                                        <?if(!empty($transcription)){?>
                                            <?= $form->field($model, 'text['.$lang->id.']['.$transcription->id .']')->widget(CKEditor::className(), [
                                                'options' => [
                                                    'row' => 2,
                                                    'value' => $transcription['text']],
                                            ])->label('Описание')?>

                                        <?} else {?>

                                            <?= $form->field($model, 'textNew['.$lang->id.'][]')->widget(CKEditor::className(), [
                                                'options' => [
                                                    'row' => 2,
                                                    'value' => '',]
                                            ])->label('Текст описания')?>

                                        <?}?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                    </div>

                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">

                    <?php echo $form->field($model, 'mainImage')->widget(Widget::className(), [
                        'uploadUrl' => Url::toRoute('product/uploadPhoto'),
                        'width' => 700,
                        'height' => 1000
                    ])->label('') ?>

                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
