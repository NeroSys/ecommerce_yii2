<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
?>

<?php foreach ($main as $category){?>

<?php
$it = $category->getDataItems();
//?>


<li><a href="<?= Url::to(['category/index', 'slug' => $category->slug])?>"><span>■</span> <?= (!empty($it['title']) ? $it['title'] : $category->name)?></a></li>

<?}?>