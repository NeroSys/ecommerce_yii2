<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
?>

<?php foreach ($categories as $category){?>

    <?php
$it = $category->getDataItems();
    ?>
    <li><a href="<?= Url::to(['/pages/'.$category->slug.''])?>"><?= (!empty($it['title']) ? $it['title'] : $category->name)?></a></li>
<?}?>