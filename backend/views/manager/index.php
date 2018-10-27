<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ManagerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Менеджеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manager-index">

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

//            'id',
            'name',
            'email:email',
            'phone',
            'skype',
            'discount',
            'percent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
