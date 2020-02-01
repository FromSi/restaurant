<?php

/* @var $this yii\web\View */
/* @var $model app\modules\restaurants\models\Restaurants */

$this->title = Yii::t('app', 'Обновить ресторан: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Рестораны'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновить');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>


