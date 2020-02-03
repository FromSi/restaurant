<?php

/* @var $this yii\web\View */

?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/"><?= Yii::t('frontend', 'Ресторан') ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= Yii::t('frontend', 'Стол') ?></li>
    </ol>
</nav>

<div class="grid-list">
    <div class="container">
        <div class="row">

            <?php foreach ($models as $value): ?>

                <div class="col-sm">
                    <div class="card" style="width: 18rem;">

                        <?php if(!empty($value->image)): ?>

                            <img src="/media/tables/<?= $value->id ?>/<?= $value->image ?>" class="card-img-top" alt="<?= $value->name ?>">

                        <?php endif; ?>

                        <div class="card-body">
                            <h5 class="card-title"><?= $value->name ?></h5>
                            <a href="/menu/<?= $value->id ?>" class="btn btn-primary"><?= Yii::t('frontend', 'Выбрать') ?></a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>