<?php
use frontend\widgets\LangWidget;
use frontend\widgets\MenuHeaderWidget;
use yii\helpers\Url;
?>

<!-- HEADER START -->
<header class="navbar navbar-custom " id="header">
    <div class="header-top">
        <div class="container">
            <div class="header-top-inner">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="top-link top-link-left">
                            <ul>
                                <?= LangWidget::widget();?>
                                <li class="welcome-msg"> <?= Yii::t('test', 'Congratulations!')?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="right-side float-left-xs header-right-link">
                            <ul>
                                <li class="main-search">
                                    <div class="header_search_toggle desktop-view">
                                        <form action="<?= Url::to(['site/search'])?>" name="header_search_form" id="header_search_form" method="get">
                                            <div class="search-box">
                                                <input class="input-text" type="text" name="q" placeholder="Search here...">
                                                <button class="search-btn"></button>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="cart-icon">
                                    <a href="#" onclick="return getCart()"> <span>
                                            <small class="cart-notification">

                                                <?php if (!empty($_SESSION['cart.qty'])){
                                                    echo $_SESSION['cart.qty'];
                                                }else{
                                                    echo 0;
                                                }?>
                                            </small>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="header-inner">
                <div class="navbar-header">
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"><i class="fa fa-bars"></i></button>
                    <a class="navbar-brand page-scroll" href="<?= Url::to(['site/index']) ?>"> <img alt="ambar" src="/frontend/web/images/logo.png"> </a> </div>
                <div class="right-side float-none-sm">
                    <div id="menu" class="navbar-collapse collapse left-side" >
                        <ul class="nav navbar-nav navbar-left">
                            <?= MenuHeaderWidget::widget(); ?>
                        </ul>
                    </div>
                </div>
                <div class="header_search_toggle mobile-view">
                    <form>
                        <div class="search-box">
                            <input class="input-text" type="text" placeholder="Search entire store here...">
                            <button class="search-btn"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER END -->