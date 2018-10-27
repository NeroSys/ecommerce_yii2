<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\Manager */

$this->title = 'Добавить менеджера';
$this->params['breadcrumbs'][] = ['label' => 'Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manager-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php echo Breadcrumbs::widget(['links' => [
            [
                'template' => "<li><a class=\"link-effect\">{link}</a></li>\n",
                'label' => 'Менеджеры', 'url' => ['index']
            ],
            $this->title
        ]]); ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
