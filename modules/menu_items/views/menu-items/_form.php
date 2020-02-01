<?php

use yii\bootstrap\Html;
use Bridge\Core\Widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\menu_items\models\MenuItems */
/* @var $form Bridge\Core\Widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-8">

        <?= $form->field($model, 'menu_type_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(
                \app\modules\menu_types\models\MenuTypes::find()->all(),
                'id',
                'name'
            ),
            ['prompt' => Yii::t('app', 'Выберите...')]
        ) ?>


        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'price')->textInput() ?>

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

        <?= $form->field($model, 'is_active')->switchInput() ?>

    </div>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Обновить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>
