<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

use yii\widgets\Breadcrumbs;

$this->title = 'Обновить данные : ' . $model->name;
?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php echo Breadcrumbs::widget(['links' => [
            [
                'template' => "<li><a class=\"link-effect\">{link}</a></li>\n",
                'label' => 'Товары', 'url' => ['index']
            ],
            [
                'template' => "<li><a class=\"link-effect\">{link}</a></li>\n",
                'label' => $model->name, 'url' => ['product/view', 'id' => $model->id]
            ],
            $this->title
        ]]); ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
        'langs' => $langs
    ]) ?>


</div>
