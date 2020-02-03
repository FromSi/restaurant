<?php

/* @var $this yii\web\View */

?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><?= Yii::t('frontend', 'Ресторан') ?></li>
    </ol>
</nav>

<div class="grid-list">
    <div class="container">
        <div class="row">

            <?php foreach (\app\modules\restaurants\models\Restaurants::find()->all() as $value): ?>

                <div class="col-sm">
                    <div class="card" style="width: 18rem;">

                        <?php if(!empty($value->image)): ?>

                            <img src="/media/restaurants/<?= $value->id ?>/<?= $value->image ?>" class="card-img-top" alt="<?= $value->name ?>">

                        <?php endif; ?>

                        <div class="card-body">
                            <h5 class="card-title"><?= $value->name ?></h5>
                            <p class="card-text"><?= $value->description ?></p>
                            <a href="/tables/<?= $value->id ?>" class="btn btn-primary"><?= Yii::t('frontend', 'Выбрать') ?></a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>