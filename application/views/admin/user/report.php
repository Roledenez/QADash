
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

<!DOCTYPE HTML>
<section class="content">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            var options = {
                chart: {
                    type: 'column',
                    renderTo: 'container'

                },
                title: {
                    text: 'Project Time Allocation'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: [],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Rainfall (mm)'
                    }
                },
                tooltip: {

                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: []
            }

            $.getJSON("columnchart_controller/drawChart", function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                options.series[1] = json[2];
                chart = new Highcharts.Chart(options);
            });

        });
    </script>

    <script src="<?php echo site_url('js/chartjs/highcharts.js') ?>"></script>
    <script src="<?php echo site_url('js/chartjs/modules/exporting.js') ?>"></script>

    <div id="container" style="min-width: 310px; height: 500px; margin: 0 auto"></div>

</section>

<?php
$content = ob_get_contents();
//$html = str_get_html('<html><body>Hello!</body></html>');
$html1 = file_get_contents('admin/user/r.html',null,null,null,null);
//$html = str_get_html($html1);
//$raw = http_get('r.html');
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