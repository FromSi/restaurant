<?php

/* @var $this yii\web\View */
/* @var $model app\modules\request_statuses\models\RequestStatuses */

$this->title = Yii::t('app', 'Создать статус заявки');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Статусы заявок'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

