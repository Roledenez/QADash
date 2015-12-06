<!DOCTYPE html>
<section class="content">

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3> 1 <?php
                        $progress = 0;
                        if (!empty($done) && !empty($notDone))
                            $progress = ($done / ($notDone + $done)) * 100;
                        ?></h3>
                    <p>All Projects</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo round($progress, 2); ?><sup style="font-size: 20px">%</sup></h3>
                    <p>Project Progress</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>44</h3>
                    <p>Project Test Status</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>
                    <p>Email Reports</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
    </div><!-- /.row -->
    <br><br>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <?php if($display!=1){ ?>
    <script type="text/javascript">
        $(document).ready(function()
        {
            var options = {
                chart: {
                    type: 'column',
                    renderTo: 'container',
                },
                title: {
                    text: 'Project Progress'
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
            $.getJSON("projectProgress_controller/drawProgressChart", function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                options.series[1] = json[2];
                chart = new Highcharts.Chart(options);
            });

        });
    </script>
    <?php } ?>

    <script src="<?php echo site_url('js/chartjs/highcharts.js') ?>"></script>
    <script src="<?php echo site_url('js/chartjs/modules/exporting.js') ?>"></script> 

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Project Progress</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Project Name</th>
                            <th>Starting Date</th>
                            <th>Ending Date</th>
                            <th>Status</th>
                            <th>Progress</th>
                            <th style="width: 40px">Progress</th>
                        </tr>
                        <?php
                        $color = null;
                        if ($projects[0]->prority_id == 1)
                            $color = "label label-danger";
                        elseif ($projects[0]->prority_id == 2)
                            $color = "label label-success";
                        else
                            $color = "label label-warning";

                        $prcolor = null;
                        if ($progress <= 50) {
                            $prcolor = "badge bg-red";
                            $pcolor = "progress-bar progress-bar-danger";
                        } elseif ($progress <= 75) {
                            $prcolor = "badge bg-yellow";
                            $pcolor = "progress-bar progress-bar-yellow";
                        } else {
                            $prcolor = "badge bg-green";
                            $pcolor = "progress-bar progress-bar-success";
                        }
                        ?>
                        <tr>
                            <td><?php echo $projects[0]->project_id ?></td>
                            <td><?php echo $projects[0]->name ?></td>
                            <td><?php echo $projects[0]->starting_date ?></td>
                            <td><?php echo $projects[0]->ending_date ?></td>
                            <td><?php echo $projects[0]->status ?></td>
                            <td>
                                <div class="progress progress-xs progress-striped active">
                                    <div class="<?php echo $pcolor ?>" style="width: <?php echo $progress . '%' ?>"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-red"><?php echo round($progress, 2) . '%' ?></span></td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div><!-- /.row -->
    <br><br>


    <div id="container" style="min-width: 400px; height: 500px; margin: 0 auto"></div>
</section>