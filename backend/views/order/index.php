<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <div class="col-lg-3">
        <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <div class="col-lg-9">
        <p>
            <?= Html::a('Ручное добавление заказа', ['create'], ['class' => 'btn btn-primary']) ?>
            <?php echo Breadcrumbs::widget(['links' => [
                $this->title
            ]]); ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [

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
                //'phone',
                [
                    'attribute' => 'viewed',
                    'value' => function($data){
                        return !$data->viewed ? '<span class="text-danger">Не просмотрен</span>' : '<span class="text-success">Просмотрен</span>';
                    },
                    'format' => 'html',
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>

    <?php Pjax::end(); ?>
</div>
