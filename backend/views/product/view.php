<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p><?php echo Breadcrumbs::widget(['links' => [
            [
                'template' => "<li><a class=\"link-effect\">{link}</a></li>\n",
                'label' => 'Товары', 'url' => ['index']],
            $this->title
        ]]); ?>
    </p>
    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="col-md-5 col-sm-5 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-bars"></i> Основная информация</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        [
                            'attribute' => 'category_id',
                            'value' => function($data){
                                return $data->category->name;
                            }
                        ],
                        'name',
                        'slug',
//                        'image',
//                        'preview',
                        'visible:boolean',
                        'sort',
                        'viewed',
                        'hit:boolean',
                        'new:boolean',
                        'sale:boolean',
                        'created_at:date',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
    <!--переводы контента-->
    <div class="col-md-7 col-sm-7 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-bars"></i> Цены</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?= GridView::widget([
                    'dataProvider' => new ActiveDataProvider(['query' => $model->getProductLangs()]),
                    'layout' => "{items}\n{pager}",
                    'columns' => [
                        'lang',
                        'price',
                        'old_price',
                        'currency'
                    ],
                ]); ?>
            </div>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-bars"></i> Переводы</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?= GridView::widget([
                    'dataProvider' => new ActiveDataProvider(['query' => $model->getProductLangs()]),
                    'layout' => "{items}\n{pager}",
                    'columns' => [
                        'lang',
                        'title:ntext',
                        'description:ntext'
                    ],
                ]); ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
