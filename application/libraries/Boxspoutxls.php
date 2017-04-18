<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;
use Box\Spout\Writer\Style\StyleBuilder;
use Box\Spout\Writer\Style\Color;

class Boxspoutxls
{


    public function __construct()
    {

    }

    public function create_pareto_detail_report_xlsx($label_sheet, $labels_columns, $data_pareto_detail,$name)
    {
        $writer = WriterFactory::create(Type::XLSX);
		$writer->setTempFolder('uploads');
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

    public function create_pareto_detail_report_xlsx2($label_sheet, $labels_columns, $data_pareto_detail,$name)
    {
        $writer = WriterFactory::create(Type::XLSX);
		$writer->setTempFolder('uploads');
        $style = (new StyleBuilder())
			->setFontBold()
            ->setFontName('Arial')
            ->setFontSize(12)
            ->setFontColor(Color::WHITE)
            ->setShouldWrapText(false)
            ->setBackgroundColor(Color::DARK_BLUE)
            ->build();

		$styleCabecera = (new StyleBuilder())
			->setFontBold()
			->setFontName('Arial')
			->setFontSize(12)
			->setShouldWrapText(false)
			->build();

        $file_name = uniqid($name, true);
        $file_type = 'excel';
        $file_path = 'uploads/' . $file_name . '.xls';
        $writer->openToFile($file_path);


        $upi_ok_sheet = $writer->getCurrentSheet();
        $upi_ok_sheet->setName($label_sheet);
		$writer->addRow(array(' '));
        $writer->addRowWithStyle(array('DETEMINACION DE LA APTITUD DE PUESTOS DISPONIBLES PARA INCORPORAR PERSONAL CON DISCAPACIDAD'), $styleCabecera);
        $writer->addRowWithStyle(array('SEDES','AREAS','RESULTADO','RESULTADO','TOTAL'), $style);
        $writer->addRowWithStyle($labels_columns,$style);
        $writer->addRows($data_pareto_detail);

        $writer->close();

        $pdf_url = base_url().$file_path;
        return array('file_url' => $pdf_url, 'file_name' => $file_name, 'extension' => $file_type);
    }
}
