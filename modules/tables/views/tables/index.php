<?php

use dosamigos\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii2tech\admin\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\tables\models\TablesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Столы');
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

        'id',
        [
            'attribute' => 'restaurant_id',
            'value' => function ($data){
                return $data->restaurant->name;
            },
            'filter' => Html::activeDropDownList($searchModel,
                'restaurant_id',
                ArrayHelper::map(\app\modules\restaurants\models\Restaurants::find()->all(), 'id', 'name'), [
                    'prompt' => Yii::t('app', 'Выберите ...'),
                    'class' => 'form-control'
                ])
        ],
        'name',
        'chair',
        [
            'class' => 'Bridge\Core\Widgets\Columns\ImageColumn',
            'attribute' => 'image',
        ],

        [
            'header' => Yii::t('app', 'Управление'),
            'class' => ActionColumn::class,
        ],
    ],
]); ?>
