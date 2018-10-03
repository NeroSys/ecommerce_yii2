<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Языки сайта';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lang-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить язык', ['create'], ['class' => 'btn btn-primary']) ?>
        <?php echo Breadcrumbs::widget(['links' => [
            $this->title
        ]]); ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'url:url',
//            'local',
            'name',
            'default:boolean',
//            'date_update:date',
//            'date_create:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
