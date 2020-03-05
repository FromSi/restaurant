<?php


namespace app\controllers;


use app\components\XlsxHelper;
use app\modules\requests\models\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use yii\web\Controller;

class DocumentController extends Controller
{
    function actionReport(){
        $pathFile = 'restaurant_reports.xlsx';
        $data = [];
        $spreadsheet = IOFactory::load($pathFile);

        $requests = Request::find()->all();

        $one = 2;
        foreach ($requests as $index => $value){
            $items = $value->requestItems;

            for ($i = 0; $i < count($items); $i++){
                if ($i === 0){
                    $data["A$one"] = $value->table->restaurant->name;
                    $data["B$one"] = $value->table->name;
                    $data["C$one"] = $value->id;
                    $data["D$one"] = $value->requestStatus->name;
                    $data["E$one"] = $value->sum;
                }

                $data["F$one"] = $items[$i]->menuItem->name;
                $data["G$one"] = $items[$i]->menuItem->price;

                $one++;
            }
        }

        $file = XlsxHelper::buildFile($spreadsheet, $data, 'Отчет');
        XlsxHelper::sendFile($file, 'Отчет');
    }
}