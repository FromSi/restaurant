<?php

/* @var $this yii\web\View */
/* @var $model app\modules\request_statuses\models\RequestStatuses */

$this->title = Yii::t('app', 'Обновить статус заявки: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Статусы заявок'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновить');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>


