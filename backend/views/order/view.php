<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p><?php echo Breadcrumbs::widget(['links' => [
            [
                'template' => "<li><a class=\"link-effect\">{link}</a></li>\n",
                'label' => 'Заказы', 'url' => ['index']],
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
        <?php if($model->manager_discount !== null)
            echo Html::a('В карточку менеджера: '. $model->manager->name, ['manager/view', 'id' => $model->manager->id], ['class' => 'btn btn-warning'])
        ?>
    </p>

    <div class="col-md-12 col-sm-12 col-xs-12">

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
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Детали заказа</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'id',
                                    'created_at',
                                    'qty',
                                    'sum',
                                    [
                                        'attribute' => 'status',
                                        'value' => function($data){
                                            return !$data->status ? '<span class="text-danger">Активен</span>' : '<span class="text-success">Выполнен</span>';
                                        },
                                        'format' => 'html',
                                    ],
                                    'name',
                                    'email:email',
                                    'phone',
                                    [
                                        'attribute' => 'viewed',
                                        'value' => function($data){
                                            return !$data->viewed ? '<span class="text-danger">Не просмотрен</span>' : '<span class="text-success">Просмотрен</span>';
                                        },
                                        'format' => 'html',
                                    ],
                                ],
                            ]) ?>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <?= GridView::widget([
                                'dataProvider' => new ActiveDataProvider(['query' => $model->getOrderItems()]),
                                'layout' => "{items}\n{pager}",
                                'columns' => [
                                        [
                                                'attribute' => 'product_id',
                                            'value' => function($data){
                                                return "<img src=". $data->product->getMainImage() ." height=\"100\">";
                                            },
                                            'format' => 'html',
                                        ],
                                    'name',
                                    'price',
                                    'qty_item',
                                    'sum_item',
                                ],
                            ]); ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
