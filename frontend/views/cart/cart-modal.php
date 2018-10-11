<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
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
                    <td><?= Html::img("@web/upload/product/{$item['img']}", ['alt' => $item['name'], 'width' => 70])?></td>
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
<?php else: ?>

    <h3 align="center"><img src="/frontend/web/images/11.jpg" class="rightimg">Корзина пуста</h3>
    <div class="clearfix"></div>
<?php endif;?>

