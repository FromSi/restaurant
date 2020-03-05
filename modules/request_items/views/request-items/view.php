<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\request_items\models\RequestItems */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ячейки заявок'), 'url' => ['index']];
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
                'attribute' => 'request_id',
                'value' => function ($data){
                    return $data->request->id;
                }
            ],
            [
                'attribute' => 'menu_item_id',
                'value' => function ($data){
                    return $data->menuItem->name;
                }
            ],
        ],
    ]) ?>
    </div>
</div>