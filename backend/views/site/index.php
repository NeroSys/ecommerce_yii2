<?php
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Панель управления сайтом';

Yii::$app->language = 'ru';
?>

<!-- top tiles -->
<div class="row tile_count">
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <a href="<?= Url::to(['product/create']) ?>">
                <span class="count_top"><i class="fa fa-shopping-cart"></i> Всего товаров</span>
                <div class="count"><?= count($products) ?></div>
                <span class="count_bottom">Добавить новый товар</span>
            </a>
        </div>
    </div>
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <a href="<?= Url::to(['category/create']) ?>">
                <span class="count_top"><i class="fa fa-clock-o"></i> Категорий магазина</span>
                <div class="count"><?= count($categories) ?></div>
                <span class="count_bottom">Добавить категорию</span>
            </a>
        </div>
    </div>
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-usd"></i> Продажи</span>
            <div class="count green">2,500</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
        </div>
    </div>
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <a href="<?= Url::to(['action/create']) ?>">
                <span class="count_top"><i class="fa fa-bolt"></i> Акции</span>
                <div class="count"><?= count($actions) ?></div>
                <span class="count_bottom">Объявить акцию</span>
            </a>
        </div>
    </div>
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-users"></i> Подписчики</span>
            <div class="count">2,315</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
        </div>
    </div>
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-user"></i> Заказы</span>
            <div class="count">25</div>
            <span class="count_bottom">Открыть список</span>
        </div>
    </div>

    <div class="clearfix"></div>
</div>
<!-- /top tiles -->

<div class="row">

    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table design <small>Custom design</small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th>
                            <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th class="column-title">Invoice </th>
                        <th class="column-title">Invoice Date </th>
                        <th class="column-title">Order </th>
                        <th class="column-title">Bill to Name </th>
                        <th class="column-title">Status </th>
                        <th class="column-title">Amount </th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr class="even pointer">
                        <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td class=" ">121000040</td>
                        <td class=" ">May 23, 2014 11:47:56 PM </td>
                        <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                        <td class=" ">John Blank L</td>
                        <td class=" ">Paid</td>
                        <td class="a-right a-right ">$7.45</td>
                        <td class=" last"><a href="#">View</a>
                        </td>
                    </tr>
                    <tr class="odd pointer">
                        <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td class=" ">121000039</td>
                        <td class=" ">May 23, 2014 11:30:12 PM</td>
                        <td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i>
                        </td>
                        <td class=" ">John Blank L</td>
                        <td class=" ">Paid</td>
                        <td class="a-right a-right ">$741.20</td>
                        <td class=" last"><a href="#">View</a>
                        </td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <!-- Start to do list -->
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Категории</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="">
                    <?php foreach ($categories as $category) {?>
                        <ul class="to_do">
                            <li>
                                <a href="<?= Url::to(['category/view', 'id' => $category->id]) ?>"><?= $category->name ?></a>
                            </li>
                        </ul>
                    <?}?>
                </div>
            </div>
        </div>
    </div>
    <!-- End to do list -->
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div>
            <div class="x_title">
                <h2>Акции магазина</h2>
                <div class="clearfix"></div>
            </div>
            <ul class="list-unstyled top_profiles scroll-view">
                <?php if (!empty($actions)) {?>
                    <?php foreach ($actions as $action) {?>
                        <li class="media event">
                            <a href="<?= Url::to(['action/view', 'id' => $action->id]) ?>" class="pull-left border-<?php
                            ($action->id%2) ? 'aero' : 'green';
                            ?>aero profile_thumb">
                                <i class="fa fa-bolt <?php ($action->id%2) ? 'aero' : 'green' ?>"></i>
                            </a>
                            <div class="media-body">
                                <a class="title" href="<?= Url::to(['action/view', 'id' => $action->id]) ?>"><?= $action->name ?></a>
                                <?php $lang_action = $action->getDataItems();?>
                                <p> <small><?= $lang_action['text'] ?></small>
                                </p>
                            </div>
                        </li>
                        <?}?>
                <?}?>
            </ul>
        </div>
    </div>
</div>

