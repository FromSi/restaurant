<?php

/* @var $this yii\web\View */
/* @var $model app\modules\tables\models\Tables */

$this->title = Yii::t('app', 'Создать стол');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Столы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

