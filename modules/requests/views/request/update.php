<?php

/* @var $this yii\web\View */
/* @var $model app\modules\requests\models\Request */

$this->title = Yii::t('app', 'Обновить заявку: ') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Заявки'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновить');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>


