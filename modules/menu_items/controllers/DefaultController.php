<?php

namespace app\modules\menu_items\controllers;

use yii\web\Controller;

/**
 * Default controller for the `menu_items` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
