
<?php
tcpdf();

$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "Test Report";
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();

?>

<?php
$content = ob_get_contents();
$html = str_get_html('admin/user/report_view');
foreach($html->findByClass('DropTarget')->find('img') as $element)
    $content = $content + $element;

$html1 = file_get_contents('admin/user/r.html',null,null,null,null);

ob_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');

$path = 'C:/Users/Piya/Desktop/reports';
// Supply a filename including the .pdf extension
$filename = 'report.pdf';

// Create the full path
$full_path = $path . '/' . $filename;

// Output PDF
$obj_pdf->Output($full_path, 'F');
$obj_pdf->Output('report.pdf', 'D');
?>