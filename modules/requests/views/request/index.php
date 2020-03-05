<?php

use dosamigos\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii2tech\admin\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\requests\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Заявки');
$this->params['breadcrumbs'][] = $this->title;
$this->params['contextMenuItems'] = [
    ['create'],
    [
        'label' => \Yii::t('admin', 'Экспорт в Excel'),
        'url' => \yii\helpers\Url::to('/document/report'),
        'class' => 'btn-info'
    ],
];

?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'options' => ['class' => 'grid-view table-responsive'],
    'behaviors' => [
        \dosamigos\grid\behaviors\ResizableColumnsBehavior::class
    ],
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        [
            'attribute' => 'request_status_id',
            'value' => function ($data){
                return $data->requestStatus->name;
            },
            'filter' => Html::activeDropDownList($searchModel,
                'request_status_id',
                ArrayHelper::map(\app\modules\request_statuses\models\RequestStatuses::find()->all(), 'id', 'name'), [
                    'prompt' => Yii::t('app', 'Выберите ...'),
                    'class' => 'form-control'
                ])
        ],
        [
            'attribute' => 'table_id',
            'value' => function ($data){
                return $data->table->name;
            },
            'filter' => Html::activeDropDownList($searchModel,
                'table_id',
                ArrayHelper::map(\app\modules\tables\models\Tables::find()->all(), 'id', 'name'), [
                    'prompt' => Yii::t('app', 'Выберите ...'),
                    'class' => 'form-control'
                ])
        ],

        [
            'header' => Yii::t('app', 'Управление'),
            'class' => ActionColumn::class,
        ],
    ],
]); ?>
