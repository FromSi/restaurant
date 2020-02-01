<?php

namespace app\modules\request_statuses\controllers;

use Bridge\Core\Controllers\BaseAdminController;
use yii\helpers\ArrayHelper;
use yii2tech\admin\actions\Position;
use dosamigos\grid\actions\ToggleAction;

/**
 * RequestStatusesController implements the CRUD actions for [[app\modules\request_statuses\models\RequestStatuses]] model.
 * @see app\modules\request_statuses\models\RequestStatuses
 */
class RequestStatusesController extends BaseAdminController
{
    /**
     * @inheritdoc
     */
    public $modelClass = 'app\modules\request_statuses\models\RequestStatuses';
    /**
     * @inheritdoc
     */
    public $searchModelClass = 'app\modules\request_statuses\models\RequestStatusesSearch';




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
                    'modelClass' => 'app\modules\request_statuses\models\RequestStatuses',
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
