<?php

use yii\bootstrap\Html;
use Bridge\Core\Widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\requests\models\Request */
/* @var $form Bridge\Core\Widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-8">

        <?= $form->field($model, 'request_status_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(
                \app\modules\request_statuses\models\RequestStatuses::find()->all(),
                'id',
                'name'
            ),
            ['prompt' => Yii::t('app', 'Выберите...')]
        ) ?>

        <?= $form->field($model, 'table_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(
                \app\modules\tables\models\Tables::find()->all(),
                'id',
                'name'
            ),
            ['prompt' => Yii::t('app', 'Выберите...')]
        ) ?>


    </div>

    <div class="col-md-4">

    </div>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Обновить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>
