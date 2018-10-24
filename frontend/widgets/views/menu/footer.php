<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
?>

<?php foreach ($children as $category){?>

    <?php
    $it = $category->getDataItems();
    ?>
    <li><a href="<?= Url::to(['category/index', 'slug' => $category->slug])?>"><?= (!empty($it['title']) ? $it['title'] : $category->name)?></a></li>
<?}?>