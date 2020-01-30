<?php

namespace app\modules\request_statuses\controllers;

use yii\web\Controller;

/**
 * Default controller for the `request_statuses` module
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
