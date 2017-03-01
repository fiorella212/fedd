<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

class Boxspoutxls
{


    public function __construct()
    {

    }

    public function create_pareto_detail_report_xlsx($label_sheet, $labels_columns, $data_pareto_detail,$name)
    {
        $writer = WriterFactory::create(Type::XLSX);
        $file_name = uniqid($name, true);
        $file_type = 'excel';
        $file_path = 'uploads/' . $file_name . '.xlsx';
        $writer->openToFile($file_path);


        $upi_ok_sheet = $writer->getCurrentSheet();
        $upi_ok_sheet->setName($label_sheet);
        $writer->addRow($labels_columns);
        $writer->addRows($data_pareto_detail);

        $writer->close();

        $pdf_url = base_url().$file_path;
        return array('file_url' => $pdf_url, 'file_name' => $file_name, 'extension' => $file_type);
    }
}
