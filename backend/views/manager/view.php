<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Manager */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="manager-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p><?php echo Breadcrumbs::widget(['links' => [
            [
                'template' => "<li><a class=\"link-effect\">{link}</a></li>\n",
                'label' => 'Менеджеры', 'url' => ['index']],
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
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Продажи</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'id',
                                    'name',
                                    'email:email',
                                    'phone',
                                    'skype',
                                    'discount',
                                    'percent'
                                ],
                            ]) ?>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <?= GridView::widget([
                                'dataProvider' => new ActiveDataProvider(['query' => $model->getSalesItems()]),
                                'layout' => "{items}\n{pager}",
                                'columns' => [
//                                    [
//                                        'attribute' => 'product_id',
//                                        'value' => function($data){
//                                            return "<img src=". $data->product->getMainImage() ." height=\"100\">";
//                                        },
//                                        'format' => 'html',
//                                    ],
                                [
                                        'attribute' => 'id',
                                    'value' => function($data){
                                        return "<a href=". Url::to(['order/view', 'id' => $data->id]).">". $data->id."</a>";
                                    },
                                    'format' => 'html'
                                ],
                                    'sum',
                                    'created_at',
                                ],
                            ]); ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


</div>
