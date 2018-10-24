
<?php
use yii\helpers\Url;
use frontend\widgets\MenuFooterWidget;
use frontend\widgets\MenuWidget;
?>
<!-- FOOTER START -->
<div class="footer ">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-middle">
                <div class="row">
                    <div class="col-md-3 f-col">
                        <div class="footer-static-block"> <span class="opener plus"></span>
                            <div class="f-logo">
                                <a href="index.html" class="">
                                    <img src="/frontend/web/images/galina.png" alt="Ambar">
                                </a>
                            </div>
                            <ul class="footer-block-contant">
                                <li>
                                    <p></p>
                                </li>
                                <li>
                                    <p></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 f-col">
                        <div class="footer-static-block"> <span class="opener plus"></span>
                            <h3 class="title"><?= Yii::t('site', 'Темы') ?><span></span></h3>
                            <ul class="footer-block-contant tagcloud">
                                <?= MenuWidget::widget(['tpl' => 'footer']) ?>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 f-col">
                        <div class="footer-static-block"> <span class="opener plus"></span>
                            <h3 class="title"><?= Yii::t('site', 'Категории') ?><span></span></h3>
                            <ul class="footer-block-contant link">
                                <?= MenuWidget::widget(['tpl' => 'footer-main']) ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 f-col">
                        <div class="footer-static-block"> <span class="opener plus"></span>
                            <h3 class="title"><?= Yii::t('site', 'Контакт') ?><span></span></h3>
                            <ul class="footer-block-contant address-footer">
                                <li class="item"> <i class="fa fa-envelope-o"> </i>
                                    <p> <a>nesterenko952@gmail.com </a> </p>
                                </li>
                            </ul>
                            <div class="footer_social  float-none-sm pt-sm-15 center-sm mt-sm-15">
                                <ul class="social-icon">
                                    <li><a title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                                    <!-- <li><a title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
                                    <li><a title="Linkedin" class="linkedin"><i class="fa fa-linkedin"> </i></a></li>
                                    <li><a title="RSS" class="rss"><i class="fa fa-rss"> </i></a></li> -->
                                    <li><a title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="copy-right center-xs">© 2018  All Rights Reserved. Design by <a href="#">NeRo systems</a></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="payment right-side float-none-xs center-xs">
                            <!-- <ul class="payment_icon">
                                <li class="visa"><a></a></li>
                                <li class="visa2"><a></a></li>
                                <li class="mastro"><a></a></li>
                                <li class="mastro2"><a></a></li>
                                <li class="paypal"><a></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="scroll-top">
    <div id="scrollup"></div>
</div>
<!-- FOOTER END -->
