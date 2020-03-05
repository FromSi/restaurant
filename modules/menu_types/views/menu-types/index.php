<?php

use dosamigos\grid\GridView;
use yii2tech\admin\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\menu_types\models\MenuTypesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Типы меню');
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
        'name',

        [
            'header' => Yii::t('app', 'Управление'),
            'class' => ActionColumn::class,
        ],
    ],
]); ?>
