<?php

namespace app\controllers;

use app\modules\menu_items\models\MenuItems;
use app\modules\request_items\models\RequestItems;
use app\modules\requests\models\Request;
use app\modules\tables\models\Tables;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTables($id)
    {
        $models = Tables::findAll(['restaurant_id' => $id]);

        if (!empty($models)) {
            return $this->render('tables', compact('models'));
        } else {
            throw new NotFoundHttpException();
        }
    }

    public function actionMenu($id)
    {
        $models = Request::findAll(['table_id' => $id]);

        return $this->render('menu', compact('models', 'id'));
    }

    public function actionRequestAjax(){
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();

            $response = Yii::$app->response;
            $response->format = \yii\web\Response::FORMAT_JSON;

            if (!empty($data['ids']) && !empty($data['id'])){
                $list = explode(',', $data['ids']);
                $request = new Request;
                $request->request_status_id = 1;
                $request->table_id = $data['id'];

                if ($request->save()){
                    foreach ($list as $value){
                        $item = new RequestItems;
                        $item->menu_item_id = $value;
                        $item->request_id = $request->id;

                        $item->save();
                    }
                }
            }

            $response->statusCode = 200;

            return $response;
        }
    }
}
