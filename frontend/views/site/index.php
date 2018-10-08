<?php
use yii\helpers\Url;
use frontend\widgets\SubscribeWidget;
/* @var $this yii\web\View */

$this->title = 'My';
?>
<!-- CONTAIN START -->

<!--  Sub Banner Block Start  -->
<section>
    <div class="container">
        <div class="sub-banner-block center-xs">
            <div class="row ">
                <?php if ($actions) {?>
                    <?php foreach ($actions as $action) {?>
                        <?php $lang_actions = $action->getDataItems() ?>
                        <div class="col-sm-4 ">
                            <div class="sub-banner sub-banner1">
                                <a> <img src="<?= $action->getMainImage() ?>" alt="<?= $action->slug ?>">
                                    <div class="sub-banner-detail">
                                        <?php if (is_object($lang_actions)) {?>
                                            <div class="sub-banner-subtitle"><?= $lang_actions['title'] ?></div>
                                            <span></span>
                                            <div class="sub-banner-title"><?= $lang_actions['text'] ?></div>
                                        <?}?>
                                    </div>
                                    <div class="effect"></div>
                                </a>
                            </div>
                        </div>
                    <?}?>
                <?}?>
            </div>
        </div>
    </div>
</section>
<!--  Sub Banner Block End  -->

<!--  Featured Products Slider Block Start  -->
<section class="pt-95">
    <div class="container">
        <div class="product-slider">
            <div class="row">
                <div class="col-xs-12">
                    <div class="heading-part align-center mb-40">
                        <div class="category-bar ">
                            <ul class="tab-stap">
                                <li id="step1" class="active"><a href="javascript:void(0)"><?= Yii::t('site', 'Популярные') ?></a></li>
                                <li id="step2"><a href="javascript:void(0)"><?= Yii::t('site', 'Новинки') ?></a></li>
                                <li id="step3"><a href="javascript:void(0)"><?= Yii::t('site', 'Хиты') ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="pro_cat">
                    <div id="data-step1" class="product-slider-main position-r" data-temp="tabdata">
                        <?php if (!empty($products)) {?>
                            <div class="owl-carousel pro_cat_slider">
                                <?php foreach ($products as $product) {?>
                                    <?php if ($product->viewed > 1) {?>
                                        <?php $lang_product = $product->getDataitems(); ?>
                                        <div class="item">
                                            <div class="product-item">
                                                <?php if ($product->sale) {?>
                                                    <div class="sale-label"><span>Sale</span></div>
                                                <?}?>
                                                <?php if ($product->new) {?>
                                                    <div class="new-label"><span>New</span></div>
                                                <?}?>
                                                <div class="product-image">
                                                    <a href="<?= Url::to(['product/view', 'slug' => $product->slug])?>">
                                                        <img src="<?= $product->getMainImage() ?>" alt="<?= $product->slug ?>">
                                                    </a>
                                                    <div class="product-detail-inner">
                                                        <div class="detail-inner-left left-side">
                                                            <ul>
                                                                <li class="pro-cart-icon">
                                                                    <form>
                                                                        <button title="<?= Yii::t('site', 'Add to Cart')?>"></button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-item-details">
                                                    <div class="product-item-name"> <a href="<?= Url::to(['product/view', 'slug' => $product->slug])?>">
                                                            <?php if (!empty($lang_product)){?>
                                                                <?= $lang_product['title'] ?>
                                                            <?}?>
                                                        </a>
                                                    </div>
                                                    <div class="price-box">
                                                        <?php if (!empty($lang_product)){?>
                                                        <span class="price"><?= $lang_product['currency'] ?> <?=$lang_product['price']?></span> <del class="price old-price">
                                                            <?php if ($lang_product->old_price !== null) ?><?=$lang_product['old_price']?>
                                                        </del> </div>
                                                    <?}?>
                                                </div>
                                            </div>
                                        </div>
                                    <?}?>
                                <?}?>
                            </div>
                        <?}?>
                    </div>
                    <div id="data-step2" class="product-slider-main position-r" data-temp="tabdata" style="display:none">
                        <?php if (!empty($new)) {?>
                            <div class="owl-carousel pro_cat_slider">
                                <?php foreach ($new as $item){ ?>
                                    <?php $lang_item = $item->getDataItems() ?>
                                    <div class="item">
                                        <div class="product-item">
                                            <div class="new-label">
                                                <span>New</span>
                                            </div>
                                            <div class="product-image">
                                                <a href="<?= Url::to(['product/view', 'slug' => $item->slug]) ?>">
                                                    <img src="<?= $item->getMainImage() ?>" alt="<?= $item->slug ?>">
                                                </a>
                                                <div class="product-detail-inner">
                                                    <div class="detail-inner-left left-side">
                                                        <ul>
                                                            <li class="pro-cart-icon">
                                                                <form>
                                                                    <button title="<?= Yii::t('site', 'Add to Cart')?>"></button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item-details">
                                                <div class="product-item-name"> <a href="<?= Url::to(['product/view', 'slug' => $product->slug])?>">
                                                        <?php if (!empty($lang_item)){?>
                                                            <?= $lang_item['title'] ?>
                                                        <?}?>
                                                    </a>
                                                </div>
                                                <div class="price-box">
                                                    <?php if (!empty($lang_item)){?>
                                                    <span class="price"><?= $lang_item['currency'] ?> <?=$lang_item['price']?></span> <del class="price old-price">
                                                        <?php ($lang_item->old_price !== null) ? $lang_item['old_price'] : ''?>
                                                    </del>
                                                <?}?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?}?>
                            </div>
                        <?}?>
                    </div>
                    <div id="data-step3" class="product-slider-main position-r" data-temp="tabdata" style="display:none">
                        <?php if (!empty($hits)) {?>
                            <div class="owl-carousel pro_cat_slider">
                                <?php foreach ($hits as $hit) {?>
                                    <?php $lang_hit = $hit->getDataItems(); ?>
                                <?}?>
                                <div class="item">
                                    <div class="product-item">
                                        <?php if ($hit->sale) {?>
                                            <div class="sale-label"><span>Sale</span></div>
                                        <?}?>
                                        <?php if ($hit->new) {?>
                                            <div class="new-label"><span>New</span></div>
                                        <?}?>
                                        <div class="product-image">
                                            <a href="<?= Url::to(['product/view', 'slug' => $hit->slug])?>">
                                                <img src="<?= $hit->getMainImage() ?>" alt="<?= $hit->slug ?>">
                                            </a>
                                            <div class="product-detail-inner">
                                                <div class="detail-inner-left left-side">
                                                    <ul>
                                                        <li class="pro-cart-icon">
                                                            <form>
                                                                <button title="<?= Yii::t('site', 'Add to Cart')?>"></button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item-details">
                                            <div class="product-item-name"> <a href="<?= Url::to(['product/view', 'slug' => $hit->slug])?>">
                                                    <?php if (!empty($lang_hit)){?>
                                                        <?= $lang_hit['title'] ?>
                                                    <?}?>
                                                </a>
                                            </div>
                                            <div class="price-box">
                                                <?php if (!empty($lang_hit)){?>
                                                <span class="price"><?= $lang_hit['currency'] ?> <?=$lang_hit['price']?></span> <del class="price old-price">
                                                    <?php if ($lang_hit->old_price !== null) ?><?=$lang_hit['old_price']?>
                                                </del> </div>
                                            <?}?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  Featured Products Slider Block End  -->

<!--  Featured Products Slider Block Start  -->
<section class="mb-60">
    <div class="container">
        <div class="product-slider">
            <div class="row">
                <div class="col-xs-12">
                    <div class="heading-part align-center mb-40">
                        <h2 class="main_title"><?= Yii::t('site', 'Распродажа') ?></h2>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="pro_cat">
                    <?php if (!empty($sales)) {?>
                    <?}?>
                    <div class="owl-carousel pro_cat_slider">
                        <?php foreach ($sales as $sale) {?>
                            <?php $lang_sale = $sale->getDataItems() ?>
                            <div class="item">
                                <div class="product-item">
                                    <?php if ($sale->sale) {?>
                                        <div class="sale-label"><span>Sale</span></div>
                                    <?}?>
                                    <div class="product-image">
                                        <a href="<?= Url::to(['product/view', 'slug' => $sale->slug])?>">
                                            <img src="<?= $sale->getMainImage() ?>" alt="<?= $sale->slug ?>">
                                        </a>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left left-side">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="<?= Yii::t('site', 'Add to Cart')?>"></button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item-details">
                                        <div class="product-item-name"> <a href="<?= Url::to(['product/view', 'slug' => $sale->slug])?>">
                                                <?php if (!empty($lang_sale)){?>
                                                    <?= $lang_sale['title'] ?>
                                                <?}?>
                                            </a>
                                        </div>
                                        <div class="price-box">
                                            <?php if (!empty($lang_sale)){?>
                                            <span class="price"><?= $lang_sale['currency'] ?> <?=$lang_sale['price']?></span> <del class="price old-price">
                                                <?php if ($lang_sale->old_price !== null) ?><?=$lang_sale['old_price']?>
                                            </del> </div>
                                        <?}?>
                                    </div>
                                </div>
                            </div>
                        <?}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  Featured Products Slider Block End  -->

<!-- News Letter Start -->
<section>
    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="newsletter-inner center-sm">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="newsletter-title">
                                    <div class="newsletter-icon">
                                        <img alt="ambar" src="/frontend/web/images/newsletter-icon.png">
                                    </div>
                                    <h2 class="main_title">Subscribe to Our Newsletter</h2>
                                    <span>Everday! at Huge Discounts in our Designer Clothing Sale</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <?= SubscribeWidget::widget(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- News Letter End -->

<!-- CONTAINER END -->