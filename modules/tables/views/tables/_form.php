<?php

use yii\bootstrap\Html;
use Bridge\Core\Widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\tables\models\Tables */
/* @var $form Bridge\Core\Widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-8">

        <?= $form->field($model, 'restaurant_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(
                \app\modules\restaurants\models\Restaurants::find()->all(),
                'id',
                'name'
            ),
            ['prompt' => Yii::t('app', 'Выберите...')]
        ) ?>


        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'chair')->textInput(['maxlength' => true]) ?>


    </div>

    <div class="col-md-4">

        <?= $form->field($model, 'image')->imageUpload(['pluginOptions' => [
                'deleteUrl' => \yii\helpers\Url::to([
                    '/admin/base-admin/delete-file',
                    'id' => $model->id,
                    'modelName' => $model::className(),
                    'behaviorName' => 'imageUpload',
                ])]
            ]
        ) ?>

    </div>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Обновить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>
