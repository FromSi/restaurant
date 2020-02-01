<?php

namespace app\modules\request_items\controllers;

use Bridge\Core\Controllers\BaseAdminController;
use yii\helpers\ArrayHelper;
use yii2tech\admin\actions\Position;
use dosamigos\grid\actions\ToggleAction;

/**
 * RequestItemsController implements the CRUD actions for [[app\modules\request_items\models\RequestItems]] model.
 * @see app\modules\request_items\models\RequestItems
 */
class RequestItemsController extends BaseAdminController
{
    /**
     * @inheritdoc
     */
    public $modelClass = 'app\modules\request_items\models\RequestItems';
    /**
     * @inheritdoc
     */
    public $searchModelClass = 'app\modules\request_items\models\RequestItemsSearch';




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
                    'modelClass' => 'app\modules\request_items\models\RequestItems',
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
