<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ActionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Акции магазина';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="action-index">

    <h1><?= Html::encode($this->title) ?></h1>

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
                    return Html::img($data->getMainImage(), ['width' => 90]);

                }
            ],
            'name',
            'start',
            'finish',
            //'slug',
            //'visible',
            'sort',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
