<?php

/* @var $this yii\web\View */
/* @var $model app\modules\tables\models\Tables */

$this->title = Yii::t('app', 'Обновить стол: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Столы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновить');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>


