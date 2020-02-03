<?php

$this->registerJsFile('/js/menu.js', ['position' => Yii\web\view::POS_END, 'depends' => [\yii\web\JqueryAsset::className()]]);

?>

<div data-value="<?= $id ?>" id="id-table"></div>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/"><?= Yii::t('frontend', 'Ресторан') ?></a></li>
        <li class="breadcrumb-item"><a href="/tables/<?= $id ?>"><?= Yii::t('frontend', 'Стол') ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= Yii::t('frontend', 'Меню') ?></li>
    </ol>
</nav>

<div class="row">
    <div class="col-2">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-menu-list" data-toggle="list"
               href="#list-menu" role="tab" aria-controls="menu"><?= Yii::t('frontend', 'Меню') ?></a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
               href="#list-history" role="tab" aria-controls="history"><?= Yii::t('frontend', 'История') ?></a>
        </div>
    </div>
    <div class="col-10">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-menu" role="tabpanel" aria-labelledby="list-menu-list">

                <?php foreach (\app\modules\menu_items\models\MenuItems::findAll(['is_active' => 1]) as $value): ?>

                    <div class="list-group">
                        <a data-value="<?= $value->id ?>" href="#" class="list-group-item list-group-item-action item-list-menu"> <!-- active -->
                            <div class="media">

                                <?php if (!empty($value->image)): ?>

                                    <img src="/media/menu_items/<?= $value->id ?>/medium-<?= $value->image ?>" alt="<?= $value->name ?>" width="100" height="100" style="margin-right: 16px;">

                                <?php endif; ?>

                                <div class="media-body">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5><?= $value->name ?> <span class="badge badge-dark" style="font-size: 50%;"><?= $value->menuType->name ?></span>
                                        </h5>
                                        <strong><?= number_format($value->price, 2, ',', ' ') ?> <?= Yii::t('frontend', 'тг') ?></strong>
                                    </div>
                                    <p class="mb-1"><?= $value->description ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php endforeach; ?>

                <a type="button" class="btn btn-primary btn-send-request" data-value="<?= $id ?>" style="margin-top: 16px; color: aliceblue;"><?= Yii::t('frontend', 'Сделать заказ') ?></a>

            </div>
            <div class="tab-pane fade" id="list-history" role="tabpanel" aria-labelledby="list-history-list">

                <?php foreach (\app\modules\requests\models\Request::find()->all() as $value): ?>

                    <div class="card bg-light mb-3">
                        <div class="card-header"><?= Yii::t('frontend', 'Сумма') ?>: <?= number_format($value->getSum(), 2, ',', ' ') ?> <?= Yii::t('frontend', 'тг') ?></div>
                        <div class="card-body">

                            <?php foreach ($value->requestItems as $value2): ?>

                                <div class="list-group">
                                    <li class="list-group-item"> <!-- active -->
                                        <div class="media">

                                            <?php if (!empty($value2->menuItem->image)): ?>

                                                <img src="/media/menu_items/<?= $value2->menuItem->id ?>/medium-<?= $value2->menuItem->image ?>" alt="<?= $value2->menuItem->name ?>" width="100" height="100"
                                                     style="margin-right: 16px;">

                                            <?php endif; ?>

                                            <div class="media-body">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5><?= $value2->menuItem->name ?> <span class="badge badge-dark" style="font-size: 50%;"><?= $value2->menuItem->menuType->name ?></span>
                                                    </h5>
                                                    <strong><?= number_format($value2->menuItem->price, 2, ',', ' ') ?> <?= Yii::t('frontend', 'тг') ?></strong>
                                                </div>
                                                <p class="mb-1"><?= $value2->menuItem->description ?></p>
                                            </div>
                                        </div>
                                    </li>
                                </div>

                            <?php endforeach; ?>

                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>