<section class="content">
    
    <?php echo form_open('admin/testcaseChart_controller'); ?> 
    <div class="row" style=" margin-left: 10px; margin-top: 15px;">
        <h5 class="box-title">Projects List &nbsp;&nbsp;&nbsp; : &nbsp; <?php echo form_dropdown('projects', $projects, 'id'); ?> </h5>
        <div>
            <input type="submit" style="width:200px;" class="btn btn-block btn-primary" value="Show Project TestCase Status" /></div>    
    </div>
    <?php echo form_close();?>
    <br> <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h2 class="box-title"><span class="label label-primary"> <?php echo $FTestCases[0]->pname ?></span></h2>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Test Case ID</th>
                            <th>Test Case Description</th>
                            <th>Test Suit</th>
                            <th>Priority</th>
                        </tr>
                        <?php for($i=0; $i<count($FTestCases); $i++){ 
                            $color=null;
                            if($FTestCases[$i]->priority == 1)
                                $color = "label label-danger";
                            elseif ($FTestCases[$i]->priority == 2)
                                $color = "label label-success";
                            else
                                $color = "label label-warning";
                            ?>
                        <tr>
                            <td><?php echo $FTestCases[$i]->tid ?></td>
                            <td><?php echo $FTestCases[$i]->testcase ?></td>
                            <td><?php echo $FTestCases[$i]->testSuit ?></td>
                            <td><span class="<?php echo $color ?>"> <?php echo $FTestCases[$i]->prname ?></span></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>


</section>
