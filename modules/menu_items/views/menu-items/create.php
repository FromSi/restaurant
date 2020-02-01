<?php

/* @var $this yii\web\View */
/* @var $model app\modules\menu_items\models\MenuItems */

$this->title = Yii::t('app', 'Создать меню');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Меню'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

