<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
?>
<div class="product-index">

    <div class="col-lg-12">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php Pjax::begin(); ?>
    <div class="col-lg-3">
        <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <div class="col-lg-9">
        <p>
            <?= Html::a('Добавить позицию', ['create'], ['class' => 'btn btn-primary']) ?>
            <?php echo Breadcrumbs::widget(['links' => [
                $this->title
            ]]); ?>
        </p>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'image',
                    'format'=> 'html',
                    'label' => 'Превью',
                    'value' => function($data){
                        return Html::img($data->getMainImage(), ['width' => 50]);

                    }
                ],
//            'id',
                [
                    'attribute' => 'category_id',
                    'value' => function($data){
                        return $data->category->name;
                    }
                ],
                'name',
//            'slug',
//            'image',
//            'visible',
//            'sort',
                'viewed',
                'hit:boolean',
                'new:boolean',
                'sale:boolean',
                'created_at:date',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>

</div>
