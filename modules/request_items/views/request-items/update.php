<?php

/* @var $this yii\web\View */
/* @var $model app\modules\request_items\models\RequestItems */

$this->title = Yii::t('app', 'Обновить ячейку заявки: ') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ячейки заявок'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновить');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>


