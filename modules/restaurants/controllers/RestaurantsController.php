<?php

namespace app\modules\restaurants\controllers;

use Bridge\Core\Controllers\BaseAdminController;
use yii\helpers\ArrayHelper;
use yii2tech\admin\actions\Position;
use dosamigos\grid\actions\ToggleAction;

/**
 * RestaurantsController implements the CRUD actions for [[app\modules\restaurants\models\Restaurants]] model.
 * @see app\modules\restaurants\models\Restaurants
 */
class RestaurantsController extends BaseAdminController
{
    /**
     * @inheritdoc
     */
    public $modelClass = 'app\modules\restaurants\models\Restaurants';
    /**
     * @inheritdoc
     */
    public $searchModelClass = 'app\modules\restaurants\models\RestaurantsSearch';




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
                    'modelClass' => 'app\modules\restaurants\models\Restaurants',
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
