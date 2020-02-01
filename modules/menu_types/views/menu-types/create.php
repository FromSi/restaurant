<?php

/* @var $this yii\web\View */
/* @var $model app\modules\menu_types\models\MenuTypes */

$this->title = Yii::t('app', 'Создать тип меню');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Типы меню'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

