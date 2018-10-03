<?php
/**
 * Html код для вывода переключателя языков
 */

use yii\helpers\Html;
?>
<div id="lang">
    <ul id="langs">
        <?php foreach ($langs as $lang):?>
            <li class="item-lang">
                <?= Html::a(Html::img("@web/images/{$lang->img}"), '/'.$lang->url.Yii::$app->getRequest()->getLangUrl()) ?>
            </li>
        <?php endforeach;?>
    </ul>
</div>



