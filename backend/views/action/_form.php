<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use common\models\Action;
use common\components\cropper\Widget;
use yii\helpers\Url;
use dosamigos\datepicker\DateRangePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Action */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="action-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Основная информация</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Переводы</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Изображения</a>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?php if (!$model->isNewRecord){?>
                        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
                    <?}?>

                    <?= $form->field($model, 'start')->widget(DateRangePicker::className(), [
                        'attributeTo' => 'finish',
                        'form' => $form, // best for correct client validation
                        'language' => 'ru',
                        'size' => 'lg',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-MM-yyyy'
                        ]
                    ])->label('Начало и окончание акции') ?>

                    <?= $form->field($model, 'visible')->checkbox() ?>

                    <?= $form->field($model, 'sort')->textInput() ?>

                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

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
                                            if(!$model->isNewRecord) $transcription = Action::getValue($model->id, $lang->id);
                                            ?>

                                            <?if(!empty($transcription)){?>
                                                <?= $form->field($model,'title['.$lang->id.']['.$transcription->id .']')->label('Название')->textInput(['maxlength' => true, 'value' => $transcription['title']])?>
                                            <?} else {?>
                                                <?= $form->field($model,'titleNew['.$lang->id.'][]')->label('Название на '. $lang->name)->textInput(['maxlength' => true, 'value' => ''])?>
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

                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

                    <?php echo $form->field($model, 'mainImage')->widget(Widget::className(), [
                        'uploadUrl' => Url::toRoute('action/uploadPhoto'),
                        'width' => 371,
                        'height' => 230
                    ])->label('') ?>

                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
