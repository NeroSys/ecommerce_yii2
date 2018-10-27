<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = Yii::t('site', 'Оформление заказа');
?>

<!-- BANNER STRAT -->
<div class="banner inner-banner">
    <div class="container">
        <section class="banner-detail">
            <h1 class="banner-title"><?= $this->title ?></h1>
            <div class="bread-crumb right-side">
                <ul>
                    <li><a href="<?= Url::to(['site/index']) ?>"><?= Yii::t('site', 'Home') ?></a>/</li>
                    <li><span><?= $this->title ?></span></li>
                </ul>
            </div>
        </section>
    </div>
</div>
<!-- BANNER END -->

<!-- CONTAIN START -->
<section class="checkout-section ptb-95 ">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="checkout-content" >
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="heading-part align-center">
                                <h2 class="heading"><?= Yii::t('site', 'Пожалуйста, проверьте детали заказа') ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <?php if( Yii::$app->session->hasFlash('success') ): ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <?php echo Yii::$app->session->getFlash('success'); ?>
                                </div>
                            <?php endif;?>

                            <?php if( Yii::$app->session->hasFlash('error') ): ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <?php echo Yii::$app->session->getFlash('error'); ?>
                                </div>
                            <?php endif;?>
                            <?php if(!empty($session['cart'])): ?>
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th><?= Yii::t('site', 'Товар')?></th>
                                            <th><?= Yii::t('site', 'Название')?></th>
                                            <th><?= Yii::t('site', 'Количество')?></th>
                                            <th><?= Yii::t('site', 'Цена')?></th>
                                            <th><?= Yii::t('site', 'Сумма')?></th>
                                            <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($session['cart'] as $id => $item):?>
                                            <tr>
                                                <td><a href="<?= Url::to(['product/view', 'slug' => $item['slug']]) ?>"><?= Html::img("@web/upload/product/{$item['img']}", ['alt' => $item['name'], 'width' => 70])?></a></td>
                                                <td><a href="<?= Url::to(['product/view', 'slug' => $item['slug']]) ?>"><?= $item['name']?></a></td>
                                                <td><?= $item['qty']?></td>
                                                <td><?= $item['currency'] ?><?= $item['price'] ?></td>
                                                <td><?= $item['currency'] ?><?= $item['qty'] * $item['price'] ?></td>
                                                <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                                            </tr>
                                        <?php endforeach?>
                                        <tr>
                                            <td colspan="4">Итого: </td>
                                            <td><?= $session['cart.qty']?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">На сумму: </td>
                                            <td>----<?= $session['cart.sum']?>----</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p>  </p>
                                <h2 class="heading"><?= Yii::t('site', 'Ваши данные') ?></h2>

                                <?php $form = ActiveForm::begin() ?>
                                <?= $form->field($order, 'name')?>
                                <?= $form->field($order, 'email')?>
                                <?= $form->field($order, 'phone')?>
                                <?= $form->field($order, 'manager_discount')?>
                                <?= Html::submitButton(Yii::t('site', 'Заказать'), ['class' => 'btn-lg btn-warning']) ?>
                                <?php ActiveForm::end() ?>

                            <?php else: ?>

                                <h3 align="center"><img src="/frontend/web/images/11.jpg" class="rightimg"><?= Yii::t('site', 'Корзина пуста') ?></h3>
                                <div class="clearfix"></div>
                                <a href="<?= Url::to(['site/index']) ?>" class="btn btn-warning"><?= Yii::t('site', 'Вернуться к покупкам') ?></a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CONTAINER END -->