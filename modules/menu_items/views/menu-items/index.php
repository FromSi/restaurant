<?php

use dosamigos\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii2tech\admin\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\menu_items\models\MenuItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Меню');
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
            'attribute' => 'menu_type_id',
            'value' => function ($data){
                return $data->menuType->name;
            },
            'filter' => Html::activeDropDownList($searchModel,
                'menu_type_id',
                ArrayHelper::map(\app\modules\menu_types\models\MenuTypes::find()->all(), 'id', 'name'), [
                    'prompt' => Yii::t('app', 'Выберите ...'),
                    'class' => 'form-control'
                ])
        ],
        'name',
        'description',
        [
            'class' => 'Bridge\Core\Widgets\Columns\ImageColumn',
            'attribute' => 'image',
        ],
        'price',
        [
            'class' => 'dosamigos\grid\columns\ToggleColumn',
            'attribute' => 'is_active',
            'onValue' => 1,
            'onLabel' => 'Active',
            'offLabel' => 'Not active',
            'contentOptions' => ['class' => 'text-center'],
            'afterToggle' => 'function(r, data){if(r){console.log("done", data)};}',
            'filter' => ['1' => 'Active', '0' => 'Not active'],
        ],

        [
            'header' => Yii::t('app', 'Управление'),
            'class' => ActionColumn::class,
        ],
    ],
]); ?>
