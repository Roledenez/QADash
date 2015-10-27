<!DOCTYPE HTML>
<section class="content">
    <?php
    echo form_open('engineer/testcaseChart_controller');
//        if($projects) {
//            $msg = 'please select a project';
//        } 
//        else{
//            $msg = 'No projects available in the dashboard';
//        }
//    
    ?> 
    <!--    <div class="row" style=" margin-left: 10px; margin-top: 15px;">
            <h5 class="box-title">Projects List &nbsp;&nbsp;&nbsp; : &nbsp; //<?php echo form_dropdown('projects', $projects, 'id'); ?> </h5>
            <h5><b>//<?php echo $msg; ?></b></h5>
            <div>
                <input type="submit" style="width:200px;" class="btn btn-block btn-primary" value="Show Project TestCase Status" /></div>    
        </div>-->
    <?php
    echo form_close();

    // if($names!=null){
    ?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            var pid = "<?php echo $names; ?>";
            var options = {
                chart: {
                    type: 'column',
                    renderTo: 'container',
                },
                title: {
                    text: 'Project Test Case Status'
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
                        text: 'No of Test Cases'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
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
            $.getJSON("testcaseChart_controller/drawChart", function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                options.series[1] = json[2];
                //options.series[2] = json[3];
                chart = new Highcharts.Chart(options);
            });

        });
    </script>

    <script src="<?php echo site_url('js/chartjs/highcharts.js') ?>"></script>
    <script src="<?php echo site_url('js/chartjs/modules/exporting.js') ?>"></script> 
    <br>
    <div id="container" style="min-width: 310px; height: 500px; margin: 0 auto"></div>
    <br><br>
        <?php echo form_open("engineer/testcaseChart_controller/showTetCasesDetails/$names"); ?> 
    <input type="submit" class="btn btn-block btn-primary" value="Show Test Case Details" />
        <?php echo form_close();
        ?>
<?php //} ?>

</section>