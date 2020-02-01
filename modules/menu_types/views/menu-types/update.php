<?php

/* @var $this yii\web\View */
/* @var $model app\modules\menu_types\models\MenuTypes */

$this->title = Yii::t('app', 'Обновить тип меню: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Типы меню'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновить');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>


