<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\menu_items\models\MenuItems */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Меню'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['contextMenuItems'] = [
    ['update', 'id' => $model->id],
    ['delete', 'id' => $model->id]
];
?>
<div class="row">
    <div class="col-lg-8 detail-view-wrap">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'menu_type_id',
                'value' => function ($data){
                    return $data->menuType->name;
                }
            ],
            'name',
            'description',
            'image',
            'price',
            'is_active',
        ],
    ]) ?>
    </div>
</div>