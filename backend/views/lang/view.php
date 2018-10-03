<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model common\models\Lang */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Langs', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p><?php echo Breadcrumbs::widget(['links' => [
            [
                'template' => "<li><a class=\"link-effect\">{link}</a></li>\n",
                'label' => 'Языки сайта', 'url' => ['index']],
            $this->title
        ]]); ?></p>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'url:url',
            'local',
            'name',
            'default:boolean',
//            'date_update:date',
//            'date_create:date',
        ],
    ]) ?>

</div>
