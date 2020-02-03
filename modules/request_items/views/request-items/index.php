<?php

use dosamigos\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii2tech\admin\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\request_items\models\RequestItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ячейки заявок');
$this->params['breadcrumbs'][] = $this->title;
$this->params['contextMenuItems'] = [
    ['create'],
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

        [
            'attribute' => 'request_id',
            'value' => function ($data){
                return $data->request->id;
            },
            'filter' => Html::activeDropDownList($searchModel,
                'request_id',
                ArrayHelper::map(\app\modules\requests\models\Request::find()->all(), 'id', 'id'), [
                    'prompt' => Yii::t('app', 'Выберите ...'),
                    'class' => 'form-control'
                ])
        ],
        [
            'attribute' => 'menu_item_id',
            'value' => function ($data){
                return $data->menuItem->name;
            },
            'filter' => Html::activeDropDownList($searchModel,
                'menu_item_id',
                ArrayHelper::map(\app\modules\menu_items\models\MenuItems::find()->all(), 'id', 'name'), [
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
