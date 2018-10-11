<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $name;
?>

<!-- CONTAIN START ptb-95-->
<section class="ptb-95 gray-bg error-block-main">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="error-block-detail error-block-bg">
                    <div class="row">
                        <div class="col-lg-5 col-md-6"></div>
                        <div class="col-lg-7 col-md-6">
                            <div class="main-error-text">404</div>
                            <div class="error-small-text"><?= Html::encode($this->title) ?></div>
                            <div class="error-slogan"><?= nl2br(Html::encode($message)) ?></div>
                            <div class="mt-40"> <a href="<?= Url::to(['site/index']) ?>" class="btn btn-color big">Back to Home</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CONTAINER END -->