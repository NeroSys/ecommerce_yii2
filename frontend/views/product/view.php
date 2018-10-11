<?php
use yii\helpers\Url;

$lang = $product->getDataItems();
$lang_category = $category->getDataItems();

$this->title = $lang['title'];

?>
<!-- BANNER STRAT -->
<div class="banner inner-banner">
    <div class="container">
        <section class="banner-detail">
            <h1 class="banner-title"><?= $lang['title'] ?></h1>
            <div class="bread-crumb right-side">
                <ul>
                    <li><a href="<?= Url::to(['site/index']) ?>"><?= Yii::t('site', 'Home') ?></a>/</li>
                    <li><a href="<?= Url::to(['category/index', 'slug' => $category->slug])?>"><span><?= $lang_category['title'] ?></span></a></li>
                </ul>
            </div>
        </section>
    </div>
</div>
<!-- BANNER END -->

<!-- CONTAIN START -->
<section class=" pt-95">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5 mb-xs-30">
                <div class="fotorama" data-nav="thumbs" data-allowfullscreen="native">
                    <a href="#"><img src="<?= $product->getMainImage() ?>" alt="<?= $product->name ?>"></a>
                </div>
            </div>
            <div class="col-md-7 col-sm-7">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="product-detail-main">
                            <div class="product-item-details">
                                <h1 class="product-item-name"><?= $lang['title'] ?></h1>

                                <div class="price-box"> <span class="price">650грн</span> <del class="price old-price">750грн</del> </div>

                                <p><?= $lang['text'] ?></p>
                                <div class="mb-40">
                                    <div class="product-qty">
                                        <label for="qty">кол-во:</label>
                                        <div class="custom-qty">
                                            <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items" type="button"> <i class="fa fa-minus"></i> </button>
                                            <input type="text" class="input-text qty" title="Qty" value="1" maxlength="8" id="qty" name="qty">
                                            <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items" type="button"> <i class="fa fa-plus"></i> </button>
                                        </div>
                                    </div>
                                    <div class="bottom-detail cart-button">
                                        <ul>
                                            <li class="pro-cart-icon">
                                                <form class="add-to-cart" data-id="<?= $product->id ?>">
                                                    <button title="Add to Cart" class="btn-black">В корзину</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pb-95">
    <div class="container">
        <div class="product-slider">
            <div class="row">
                <div class="col-xs-12">
                    <div class="heading-part align-center mb-40">
                        <h2 class="main_title"><?= Yii::t('site', 'Хиты') ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="pro_cat">
                    <?php if (!empty($hits)) {?>
                        <div id="related_products" class="owl-carousel pro_cat_slider">
                            <?php foreach ($hits as $hit) {?>
                                <?php $lang_hit = $hit->getDataItems(); ?>
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
                                                            <form class="add-to-cart" data-id="<?= $hit->id ?>">
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
                            <?}?>
                        </div>
                    <?}?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CONTAINER END -->