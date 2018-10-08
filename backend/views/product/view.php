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

    <div class="col-md-4 col-sm-4 col-xs-12">
        <img src="<?= $model->getMainImage() ?>" height="400">
    </div>

    <div class="col-md-8 col-sm-8 col-xs-12">

        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-bars"></i> <?= $model->name ?></small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Основная информация</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Цены</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Переводы</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

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
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

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
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

                            <?= GridView::widget([
                                'dataProvider' => new ActiveDataProvider(['query' => $model->getProductLangs()]),
                                'layout' => "{items}\n{pager}",
                                'columns' => [
                                    'lang',
                                    'title:ntext',
                                    'description:html'
                                ],
                            ]); ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
