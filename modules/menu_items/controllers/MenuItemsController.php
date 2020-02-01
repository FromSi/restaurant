<?php

namespace app\modules\menu_items\controllers;

use Bridge\Core\Controllers\BaseAdminController;
use yii\helpers\ArrayHelper;
use yii2tech\admin\actions\Position;
use dosamigos\grid\actions\ToggleAction;

/**
 * MenuItemsController implements the CRUD actions for [[app\modules\menu_items\models\MenuItems]] model.
 * @see app\modules\menu_items\models\MenuItems
 */
class MenuItemsController extends BaseAdminController
{
    /**
     * @inheritdoc
     */
    public $modelClass = 'app\modules\menu_items\models\MenuItems';
    /**
     * @inheritdoc
     */
    public $searchModelClass = 'app\modules\menu_items\models\MenuItemsSearch';




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
                    'modelClass' => 'app\modules\menu_items\models\MenuItems',
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
