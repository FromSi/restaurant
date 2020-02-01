<?php

/* @var $this yii\web\View */
/* @var $model app\modules\menu_items\models\MenuItems */

$this->title = Yii::t('app', 'Обновить меню: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Меню'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновить');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>


