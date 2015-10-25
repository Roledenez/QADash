<!DOCTYPE html>
<section class="content">
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
                        text: 'Overall Project Time Allocation',
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

                $.getJSON("projectProgress_controller/drawChart", function(json) {
                    options.xAxis.categories = json[0]['data'];
                    options.series[0] = json[1];
                    options.series[1] = json[2];
                    chart = new Highcharts.Chart(options);
                });
            });

        </script>
        <script src="<?php echo site_url('js/chartjs/highcharts.js') ?>"></script>
	<script src="<?php echo site_url('js/chartjs/modules/exporting.js') ?>"></script> 
        
        <div class="row">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Project Progress</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Project Name</th>
                      <th>Status</th>
                      <th>Progress</th>
                      <th style="width: 40px">Label</th>
                    </tr>
                    <?php for($i=0; $i<count($projects); $i++){ 
                        $color=null;
                            if($projects[$i]->prority_id == 1)
                                $color = "label label-danger";
                            elseif ($projects[$i]->prority_id == 2)
                                $color = "label label-success";
                            else
                                $color = "label label-warning";
                         $pcolor=null;  
                            if($projects[$i]->progress <=50)
                                $pcolor = "progress-bar progress-bar-danger";
                            elseif ($projects[$i]->progress <=75)
                                $pcolor = "progress-bar progress-bar-yellow";
                            else
                                $pcolor = "progress-bar progress-bar-success";
                            
                         $prcolor=null;  
                            if($projects[$i]->progress <=50)
                                $prcolor = "badge bg-red";
                            elseif ($projects[$i]->progress <=75)
                                $prcolor = "badge bg-yellow";
                            else
                                $prcolor = "badge bg-green";   
                     ?>
                    <tr>
                      <td><?php echo $projects[$i]->project_id ?></td>
                      <td><?php echo $projects[$i]->name ?></td>
                      <td><?php echo $projects[$i]->status ?></td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="<?php echo $pcolor ?>" style="width: <?php echo $projects[$i]->progress.'%' ?>"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-red"><?php echo $projects[$i]->progress.'%' ?></span></td>
                    </tr>
                    <?php } ?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          </div><!-- /.row -->
          <br><br>
        <div id="container" style="min-width: 400px; height: 500px; margin: 0 auto"></div>
</section>