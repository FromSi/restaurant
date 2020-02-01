<?php

/* @var $this yii\web\View */
/* @var $model app\modules\requests\models\Request */

$this->title = Yii::t('app', 'Создать заявку');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Заявки'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

