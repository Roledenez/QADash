<section class="content">
    <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
                    You Have assigned for <?php echo count($projectsDet); ?> Projects <br>
                    <?php 
                   if($Issues!=null) {?>
                    You Have assigned for <?php echo count($Issues); ?> Issues <br>
                   <?php }?>
                     <?php 
                   if($assignedTC!=null) {?>
                    You Have assigned for <?php echo count($assignedTC); ?> Test Case
                   <?php }?>
                   
                  </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Project Assigned To Me</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Project Name</th>
                            <th>Prority</th>
                        </tr>
                        <?php
                        for ($i = 0; $i < count($projectsDet); $i++) {

                            $prcolor = null;
                            if ($projectsDet[$i]->prority_id == 1)
                                $prcolor = "badge bg-red";
                            elseif ($projectsDet[$i]->prority_id == 2)
                                $prcolor = "badge bg-yellow";
                            else
                                $prcolor = "badge bg-green";
                            ?>
                            <tr>
                                <td><?php echo $projectsDet[$i]->project_id ?></td>
                                <td><?php echo $projectsDet[$i]->name ?></td>
                                <td><span class="<?php echo $prcolor ?>"><?php echo $projectsDet[$i]->priority ?></span></td>
                            </tr>
<?php } ?>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div><!-- /.row -->
    
    <?php if($chart==null) { ?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {
              
                var options = {
                    chart: {
                        renderTo: 'container',
                        type: 'line',
                        marginRight: 130,
                        marginBottom: 25
                    },
                    title: {
                        text: 'Overall User Time Allocation',
                        x: -20 //center
                    },
                    subtitle: {
                        text: '',
                        x: -20
                    },
                    xAxis: {
                        categories: []
                    },
                    yAxis: {
                        title: {
                            min: 0,
                            text: '',
                            align: 'high'

                        },
                        labels: {
                            overflow: 'justify'
                        }

                    },
                    tooltip: {
                        formatter: function() {
                            return '<b>' + this.series.name + '</b><br/>' +
                                    this.x + ': ' + this.y;
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -10,
                        y: 100,
                        borderWidth: 0
                    },
                    series: []
                }

                $.getJSON("assignedToMe_controller/drawChart", function(json) {
                    options.xAxis.categories = json[0]['data'];
                    options.series[0] = json[1];
                    options.series[1] = json[2];
                    chart = new Highcharts.Chart(options);
                });
            });

        </script>
        <script src="<?php echo site_url('js/chartjs/highcharts.js') ?>"></script>
	<script src="<?php echo site_url('js/chartjs/modules/exporting.js') ?>"></script> 
        <div id="container" style="min-width: 400px; height: 500px; margin: 0 auto"></div>
    <?php }?>
    
    <?php echo form_open('engineer/assignedToMe_controller/AssignedJobsLoad');
        if($project) {
            $msg = 'please select a project';
        } 
        else{
            $msg = 'No projects available in the dashboard';
        }
    ?> 
    <div class="row" style=" margin-left: 10px; margin-top: 15px;">
        <h5 class="box-title">Projects List &nbsp;&nbsp;&nbsp; : &nbsp; <?php echo form_dropdown('projects', $project, 'id'); ?> </h5>
        <h5><b><?php echo $msg; ?></b></h5>
        <div>
            <input type="submit" style="width:200px;" class="btn btn-block btn-primary" value="Show Assigned Jobs" /></div>    
    </div>
    <?php echo form_close();
    
    if (count($Issues) > 0) {
            ?>
    
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Issues Assigned To Me</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>TestCase Name</th>
                            <th>Prority</th>
                        </tr>
                        <?php
                        for ($i = 0; $i < count($Issues); $i++) {

                            $prcolor = null;
                            if ($Issues[$i]->priority_id == 1)
                                $prcolor = "badge bg-red";
                            elseif ($Issues[$i]->priority_id == 2)
                                $prcolor = "badge bg-yellow";
                            else
                                $prcolor = "badge bg-green";
                            ?>
                            <tr>
                                <td><?php echo $Issues[$i]->issue_id ?></td>
                                <td><?php echo $Issues[$i]->description ?></td>
                                <td><span class="<?php echo $prcolor ?>"><?php echo $Issues[$i]->name ?></span></td>
                            </tr>
<?php } ?>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div><!-- /.row -->
     <?php } 
    ?>

    <br> <br>
    
     <?php 
    if (count($assignedTC) > 0) {
            ?>
    
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Test Cases Assigned To Me</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>TestCase Name</th>
                            <th>Prority</th>
                        </tr>
                        <?php
                        for ($i = 0; $i < count($assignedTC); $i++) {

                            $prcolor = null;
                            if ($assignedTC[$i]->priority_id == 1)
                                $prcolor = "badge bg-red";
                            elseif ($assignedTC[$i]->priority_id == 2)
                                $prcolor = "badge bg-yellow";
                            else
                                $prcolor = "badge bg-green";
                            ?>
                            <tr>
                                <td><?php echo $assignedTC[$i]->testcase_id ?></td>
                                <td><?php echo $assignedTC[$i]->description ?></td>
                                <td><span class="<?php echo $prcolor ?>"><?php echo $assignedTC[$i]->priority ?></span></td>
                            </tr>
<?php } ?>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div><!-- /.row -->
     <?php } 
    ?>
</section>
