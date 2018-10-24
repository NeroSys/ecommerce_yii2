<?php
use yii\helpers\Url;
?>
<div class="sidebar-contant">
    <ul>
        <?php foreach ($children as $category){?>

            <?php
            $it = $category->getDataItems();
            //?>

            <li>
                <a href="<?= Url::to(['category/index', 'slug' => $category->slug])?>" class="page-scroll">
                    <?= (!empty($it['title']) ? $it['title'] : $category->name)?><span>(0)</span>
                </a>
            </li>
        <?}?>
    </ul>
</div>