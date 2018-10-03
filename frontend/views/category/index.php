<?php
use yii\widgets\Breadcrumbs;
use frontend\widgets\MenuSidebarWidget;

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
                    <?php echo Breadcrumbs::widget(['links' => [
                        $this->title
                    ]]); ?>
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
                        <?= MenuSidebarWidget::widget()?>
                    </div>
                    <div class="sidebar-box mb-40 visible-sm visible-md visible-lg"> <a href="#"> <img src="/frontend/web/images/homka.jpeg" alt="ambar"> </a> </div>
                    <div class="sidebar-box sidebar-item"> <span class="opener plus"></span>
                        <div class="sidebar-title">
                            <h3>Best Seller</h3>
                        </div>
                        <div class="sidebar-contant">
                            <ul>
                                <li>
                                    <div class="pro-media"> <a><img alt="T-shirt" src="/frontend/web/images/1.jpg"></a> </div>
                                    <div class="pro-detail-info"> <a>Black African Print</a>
                                        <div class="rating-summary-block">
                                            <div class="rating-result" title="53%"> <span style="width:53%"></span> </div>
                                        </div>
                                        <div class="price-box"> <span class="price">$80.00</span> </div>
                                        <div class="cart-link">
                                            <form>
                                                <button title="Add to Cart">Add To Cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pro-media"> <a><img alt="T-shirt" src="/frontend/web/images/2.jpg"></a> </div>
                                    <div class="pro-detail-info"> <a>Black African Print</a>
                                        <div class="rating-summary-block">
                                            <div class="rating-result" title="53%"> <span style="width:53%"></span> </div>
                                        </div>
                                        <div class="price-box"> <span class="price">$80.00</span> </div>
                                        <div class="cart-link">
                                            <form>
                                                <button title="Add to Cart">Add To Cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pro-media"> <a><img alt="T-shirt" src="/frontend/web/images/3.jpg"></a> </div>
                                    <div class="pro-detail-info"> <a>Black African Print</a>
                                        <div class="rating-summary-block">
                                            <div class="rating-result" title="53%"> <span style="width:53%"></span> </div>
                                        </div>
                                        <div class="price-box"> <span class="price">$80.00</span> </div>
                                        <div class="cart-link">
                                            <form>
                                                <button title="Add to Cart">Add To Cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-8">
                <div class="product-listing">
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <div class="product-item">
                                <div class="sale-label"><span>Sale</span></div>
                                <div class="new-label"><span>New</span></div>
                                <div class="product-image"> <a href="product-page.html"> <img src="/frontend/web/images/1.jpg" alt=""> </a>
                                    <div class="product-detail-inner">
                                        <div class="detail-inner-left left-side">
                                            <ul>
                                                <li class="pro-cart-icon">
                                                    <form>
                                                        <button title="Add to Cart"></button>
                                                    </form>
                                                </li>
                                                <li class="pro-wishlist-icon active"><a href="#"></a></li>
                                                <!--<li class="pro-compare-icon"><a href="#"></a></li>-->
                                                <li class="pro-rating-icon"><a href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item-details">
                                    <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                                    <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="product-item">
                                <div class="product-image"> <a href="product-page.html"> <img src="/frontend/web/images/2.jpg" alt=""> </a>
                                    <div class="product-detail-inner">
                                        <div class="detail-inner-left left-side">
                                            <ul>
                                                <li class="pro-cart-icon">
                                                    <form>
                                                        <button title="Add to Cart"></button>
                                                    </form>
                                                </li>
                                                <li class="pro-wishlist-icon"><a href="#"></a></li>
                                                <!--<li class="pro-compare-icon"><a href="#"></a></li>-->
                                                <li class="pro-rating-icon"><a href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item-details">
                                    <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                                    <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="product-item">
                                <div class="sale-label"><span>Sale</span></div>
                                <div class="product-image"> <a href="product-page.html"> <img src="/frontend/web/images/3.jpg" alt=""> </a>
                                    <div class="product-detail-inner">
                                        <div class="detail-inner-left left-side">
                                            <ul>
                                                <li class="pro-cart-icon">
                                                    <form>
                                                        <button title="Add to Cart"></button>
                                                    </form>
                                                </li>
                                                <li class="pro-wishlist-icon"><a href="#"></a></li>
                                                <!--<li class="pro-compare-icon"><a href="#"></a></li>-->
                                                <li class="pro-rating-icon"><a href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item-details">
                                    <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                                    <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="product-item">
                                <div class="new-label"><span>New</span></div>
                                <div class="product-image"> <a href="product-page.html"> <img src="/frontend/web/images/4.jpg" alt=""> </a>
                                    <div class="product-detail-inner">
                                        <div class="detail-inner-left left-side">
                                            <ul>
                                                <li class="pro-cart-icon">
                                                    <form>
                                                        <button title="Add to Cart"></button>
                                                    </form>
                                                </li>
                                                <li class="pro-wishlist-icon"><a href="#"></a></li>
                                                <!--<li class="pro-compare-icon"><a href="#"></a></li>-->
                                                <li class="pro-rating-icon"><a href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item-details">
                                    <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                                    <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="product-item">
                                <div class="product-image"> <a href="product-page.html"> <img src="/frontend/web/images/5.jpg" alt=""> </a>
                                    <div class="product-detail-inner">
                                        <div class="detail-inner-left left-side">
                                            <ul>
                                                <li class="pro-cart-icon">
                                                    <form>
                                                        <button title="Add to Cart"></button>
                                                    </form>
                                                </li>
                                                <li class="pro-wishlist-icon"><a href="#"></a></li>
                                                <!--<li class="pro-compare-icon"><a href="#"></a></li>-->
                                                <li class="pro-rating-icon"><a href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item-details">
                                    <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                                    <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="product-item">
                                <div class="product-image"> <a href="product-page.html"> <img src="/frontend/web/images/2.jpg" alt=""> </a>
                                    <div class="product-detail-inner">
                                        <div class="detail-inner-left left-side">
                                            <ul>
                                                <li class="pro-cart-icon">
                                                    <form>
                                                        <button title="Add to Cart"></button>
                                                    </form>
                                                </li>
                                                <li class="pro-wishlist-icon"><a href="#"></a></li>
                                                <!--<li class="pro-compare-icon"><a href="#"></a></li>-->
                                                <li class="pro-rating-icon"><a href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item-details">
                                    <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                                    <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="product-item">
                                <div class="sale-label"><span>Sale</span></div>
                                <div class="new-label"><span>New</span></div>
                                <div class="product-image"> <a href="product-page.html"> <img src="/frontend/web/images/1.jpg" alt=""> </a>
                                    <div class="product-detail-inner">
                                        <div class="detail-inner-left left-side">
                                            <ul>
                                                <li class="pro-cart-icon">
                                                    <form>
                                                        <button title="Add to Cart"></button>
                                                    </form>
                                                </li>
                                                <li class="pro-wishlist-icon active"><a href="#"></a></li>
                                                <!--<li class="pro-compare-icon"><a href="#"></a></li>-->
                                                <li class="pro-rating-icon"><a href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item-details">
                                    <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                                    <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="product-item">
                                <div class="product-image"> <a href="product-page.html"> <img src="/frontend/web/images/2.jpg" alt=""> </a>
                                    <div class="product-detail-inner">
                                        <div class="detail-inner-left left-side">
                                            <ul>
                                                <li class="pro-cart-icon">
                                                    <form>
                                                        <button title="Add to Cart"></button>
                                                    </form>
                                                </li>
                                                <li class="pro-wishlist-icon"><a href="#"></a></li>
                                                <!--<li class="pro-compare-icon"><a href="#"></a></li>-->
                                                <li class="pro-rating-icon"><a href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item-details">
                                    <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                                    <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="product-item">
                                <div class="sale-label"><span>Sale</span></div>
                                <div class="product-image"> <a href="product-page.html"> <img src="/frontend/web/images/3.jpg" alt=""> </a>
                                    <div class="product-detail-inner">
                                        <div class="detail-inner-left left-side">
                                            <ul>
                                                <li class="pro-cart-icon">
                                                    <form>
                                                        <button title="Add to Cart"></button>
                                                    </form>
                                                </li>
                                                <li class="pro-wishlist-icon"><a href="#"></a></li>
                                                <!--<li class="pro-compare-icon"><a href="#"></a></li>-->
                                                <li class="pro-rating-icon"><a href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item-details">
                                    <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                                    <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="pagination-bar">
                                <ul>
                                    <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
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
