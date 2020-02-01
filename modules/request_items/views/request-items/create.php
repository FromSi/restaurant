<?php

/* @var $this yii\web\View */
/* @var $model app\modules\request_items\models\RequestItems */

$this->title = Yii::t('app', 'Создать ячейку заявки');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ячейки заявок'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

