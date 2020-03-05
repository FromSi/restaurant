<?php


namespace app\components;

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class XlsxHelper
{
    /**
     * Собираем документ таблицы
     * @param array $data - [
     *      'A1' => 'Hello',
     *      'B2' => 'World',
     * ]
     * @param string $active_sheet - шаблон файла
     * @param string $active_sheet - название листа
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public static function buildFile(Spreadsheet $spreadsheet, array $data, string  $active_sheet = '01') : Spreadsheet
    {
        $helper = new Sample();
        if ($helper->isCli()) {
            $helper->log('This example should only be run from a Web Browser' . PHP_EOL);
            return 1;
        }
        $spreadsheet->getProperties()->setCreator('Test')
            ->setLastModifiedBy('Test')
            ->setTitle('Test Document')
            ->setSubject('Test Document')
            ->setDescription('Test Document')
            ->setKeywords('Test')
            ->setCategory('Test');

        foreach ($data as $key => $value){
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue($key, $value);
        }
        $spreadsheet->getActiveSheet()->setTitle($active_sheet);
        $spreadsheet->setActiveSheetIndex(0);

        return $spreadsheet;
    }

    /**
     * @param Spreadsheet $spreadsheet - объект таблицы
     * @param string $file_name - название файла
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public static function sendFile(Spreadsheet $spreadsheet, string $file_name = 'seenus')
    {
        $file_name .= '.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $file_name . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

}
