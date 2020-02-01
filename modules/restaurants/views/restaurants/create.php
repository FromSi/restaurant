<?php

/* @var $this yii\web\View */
/* @var $model app\modules\restaurants\models\Restaurants */

$this->title = Yii::t('app', 'Создать рестораны');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Рестораны'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

