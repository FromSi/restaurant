<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\requests\models\Request */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Заявки'), 'url' => ['index']];
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
                'attribute' => 'request_status_id',
                'value' => function ($data){
                    return $data->requestStatus->name;
                }
            ],
            [
                'attribute' => 'table_id',
                'value' => function ($data){
                    return $data->table->name;
                }
            ],
        ],
    ]) ?>
    </div>
</div>