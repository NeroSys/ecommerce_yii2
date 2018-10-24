<?php
use yii\widgets\Breadcrumbs;
use frontend\widgets\MenuSidebarWidget;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use frontend\widgets\MenuWidget;

$lang_category = $model->getDataItems();

$this->title = $lang_category['title'];


?>



<!-- BANNER STRAT -->
<div class="banner inner-banner ">
    <div class="container">
        <section class="banner-detail">
            <h1 class="banner-title"><?= $lang_category['title']?></h1>
            <div class="bread-crumb right-side">
                <ul>
                    <ul>
                        <li><a href="<?= Url::to(['site/index']) ?>"><?= Yii::t('site', 'Home') ?></a>/</li>
                        <li><span><?= $lang_category['title'] ?></span></a></li>
                    </ul>
                </ul>
            </div>
        </section>
    </div>
</div>
<!-- BANNER END -->

<!-- CONTAIN START -->
<section class="ptb-95">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 mb-xs-30">
                <div class="sidebar-block">
                    <div class="sidebar-box listing-box mb-40"> <span class="opener plus"></span>
                        <div class="sidebar-title">
                            <h3><?= Yii::t('site', 'Categories') ?></h3>
                        </div>
                        <?= MenuWidget::widget(['tpl' => 'sidebar']) ?>
                    </div>
                    <div class="sidebar-box mb-40 visible-sm visible-md visible-lg"> <a href="#"> <img src="/frontend/web/images/homka.jpeg" alt="ambar"> </a> </div>
                    <div class="sidebar-box sidebar-item"> <span class="opener plus"></span>
                        <div class="sidebar-title">
                            <h3><?= Yii::t('site', 'Best Seller')?></h3>
                        </div>
                        <div class="sidebar-contant">
                            <ul>
                                <?php if (!empty($hits)) {?>
                                    <?php foreach ($hits as $hit) {?>
                                        <?php $lang_hit = $hit->getDataItems() ?>
                                        <li>
                                            <div class="pro-media">
                                                <a><img alt="<?= $hit->name ?>" src="<?= $hit->getMainImage() ?>"></a> </div>
                                            <div class="pro-detail-info">
                                                <a href="<?= Url::to(['product/view', 'slug'=> $hit->slug]) ?>">
                                                    <?= $lang_hit['title'] ?>
                                                </a>
                                                <div class="price-box"> <span class="price"><?=$lang_hit['currency']?> <?= $lang_hit['price'] ?></span> </div>
                                                <div class="cart-link">
                                                    <form class="add-to-cart" data-id="<?= $hit->id ?>">
                                                        <button title="Add to Cart"><?= Yii::t('site', 'Add to Cart')?></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    <?}?>
                                <?}?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-8">
                <div class="product-listing">
                    <div class="row">
                        <?php if (!empty($products)) {?>
                            <?php foreach ($products as $product) {?>
                                <?php $lang_product = $product->getDataItems() ?>
                                <div class="col-md-4 col-xs-6">
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
                                                            <form class="add-to-cart" data-id="<?= $product->id ?>">
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
                        <?}else{?>
                            <h4><?= Yii::t('site', 'Здесь товаров пока нет') ?></h4>
                        <?}?>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="pagination-bar">
                                <ul>
                                    <?=LinkPager::widget([
                                        'pagination' => $pages,

                                    ]);?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CONTAINER END -->
