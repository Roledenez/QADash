<!DOCTYPE HTML>
<section class="content">

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {
                var options = {
                    chart: {
                        type: 'column',
                        renderTo: 'container',
                        
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
                            text: 'No of hours'
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