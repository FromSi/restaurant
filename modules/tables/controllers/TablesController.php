<?php

namespace app\modules\tables\controllers;

use Bridge\Core\Controllers\BaseAdminController;
use yii\helpers\ArrayHelper;
use yii2tech\admin\actions\Position;
use dosamigos\grid\actions\ToggleAction;

/**
 * TablesController implements the CRUD actions for [[app\modules\tables\models\Tables]] model.
 * @see app\modules\tables\models\Tables
 */
class TablesController extends BaseAdminController
{
    /**
     * @inheritdoc
     */
    public $modelClass = 'app\modules\tables\models\Tables';
    /**
     * @inheritdoc
     */
    public $searchModelClass = 'app\modules\tables\models\TablesSearch';




    /**
     * @inheritdoc
     */
    public function actions()
    {
        return ArrayHelper::merge(
            parent::actions(),
            [
                'toggle' => [
                    'class' => ToggleAction::class,
                    'modelClass' => 'app\modules\tables\models\Tables',
                    'onValue' => 1,
                    'offValue' => 0
                ],
                'position' => [
                    'class' => Position::class,
                ],
            ]
        );
    }
}
