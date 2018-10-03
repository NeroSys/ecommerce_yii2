<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Добавить позицию';
?>
<div class="product-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php echo Breadcrumbs::widget(['links' => [
            [
                'template' => "<li><a class=\"link-effect\">{link}</a></li>\n",
                'label' => 'Товары', 'url' => ['index']
            ],
            $this->title
        ]]); ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
        'langs' => $langs
    ]) ?>

</div>
