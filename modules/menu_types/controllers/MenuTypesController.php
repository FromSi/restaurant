<?php

namespace app\modules\menu_types\controllers;

use Bridge\Core\Controllers\BaseAdminController;
use yii\helpers\ArrayHelper;
use yii2tech\admin\actions\Position;
use dosamigos\grid\actions\ToggleAction;

/**
 * MenuTypesController implements the CRUD actions for [[app\modules\menu_types\models\MenuTypes]] model.
 * @see app\modules\menu_types\models\MenuTypes
 */
class MenuTypesController extends BaseAdminController
{
    /**
     * @inheritdoc
     */
    public $modelClass = 'app\modules\menu_types\models\MenuTypes';
    /**
     * @inheritdoc
     */
    public $searchModelClass = 'app\modules\menu_types\models\MenuTypesSearch';




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
                    'modelClass' => 'app\modules\menu_types\models\MenuTypes',
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
