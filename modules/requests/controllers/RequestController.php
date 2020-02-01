<?php

namespace app\modules\requests\controllers;

use Bridge\Core\Controllers\BaseAdminController;
use yii\helpers\ArrayHelper;
use yii2tech\admin\actions\Position;
use dosamigos\grid\actions\ToggleAction;

/**
 * RequestController implements the CRUD actions for [[app\modules\requests\models\Request]] model.
 * @see app\modules\requests\models\Request
 */
class RequestController extends BaseAdminController
{
    /**
     * @inheritdoc
     */
    public $modelClass = 'app\modules\requests\models\Request';
    /**
     * @inheritdoc
     */
    public $searchModelClass = 'app\modules\requests\models\RequestSearch';




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
                    'modelClass' => 'app\modules\requests\models\Request',
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
