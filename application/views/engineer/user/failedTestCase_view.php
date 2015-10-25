<section class="content">

    <?php
    echo form_open('engineer/testcaseChart_controller');
//        if($project) {
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
    <?php echo form_close(); ?>

    <?php if ($FTestCases == null && $PTestCases == null && $InPTestCases == null) { ?>
        <div class="box-header">
            <h2 class="box-title"><span class="label label-primary">No Test Cases Available</span></h2>
        </div><!-- /.box-header -->
        <?php
    }
    
    if (!empty($FTestCases)) {
        ?>
        <br> <br>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="box-title"><span class="label label-primary"> Failed Test Cases</span></h2>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Test Case ID</th>
                                <th>Test Case Title</th>
                                <th>Test Suite</th>
                                <th>Priority</th>
                            </tr>
                            <?php
                            for ($i = 0; $i < count($FTestCases); $i++) {
                                $color = null;
                                if ($FTestCases[$i]->priority == 1)
                                    $color = "label label-danger";
                                elseif ($FTestCases[$i]->priority == 2)
                                    $color = "label label-success";
                                else
                                    $color = "label label-warning";
                                ?>
                                <tr>
                                    <td><?php echo $FTestCases[$i]->testcase_id ?></td>
                                    <td><?php echo $FTestCases[$i]->title ?></td>
                                    <td><?php echo $FTestCases[$i]->testSuite ?></td>
                                    <td><span class="<?php echo $color ?>"> <?php echo $FTestCases[$i]->prname ?></span></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    <?php } ?>

    <?php if(!empty($PTestCases)) { ?>
        <br> <br>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="box-title"><span class="label label-primary"> Passed Test Cases</span></h2>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Test Case ID</th>
                                <th>Test Case Title</th>
                                <th>Test Suite</th>
                                <th>Priority</th>
                            </tr>
                            <?php
                            for ($i = 0; $i < count($PTestCases); $i++) {
                                $color = null;
                                if ($PTestCases[$i]->priority == 1)
                                    $color = "label label-danger";
                                elseif ($PTestCases[$i]->priority == 2)
                                    $color = "label label-success";
                                else
                                    $color = "label label-warning";
                                ?>
                                <tr>
                                    <td><?php echo $PTestCases[$i]->testcase_id ?></td>
                                    <td><?php echo $PTestCases[$i]->title ?></td>
                                    <td><?php echo $PTestCases[$i]->testSuite ?></td>
                                    <td><span class="<?php echo $color ?>"> <?php echo $PTestCases[$i]->prname ?></span></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    <?php } ?>
       
    <?php
    
    if(!empty($InPTestCases)) { ?>
        <br> <br>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="box-title"><span class="label label-primary"> In Progress Test Cases</span></h2>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Test Case ID</th>
                                <th>Test Case Title</th>
                                <th>Test Suite</th>
                                <th>Priority</th>
                            </tr>
                            <?php
                            for ($i = 0; $i < count($InPTestCases); $i++) {
                                $color = null;
                                if ($InPTestCases[$i]->priority == 1)
                                    $color = "label label-danger";
                                elseif ($InPTestCases[$i]->priority == 2)
                                    $color = "label label-success";
                                else
                                    $color = "label label-warning";
                                ?>
                                <tr>
                                    <td><?php echo $InPTestCases[$i]->testcase_id ?></td>
                                    <td><?php echo $InPTestCases[$i]->title ?></td>
                                    <td><?php echo $InPTestCases[$i]->testSuite ?></td>
                                    <td><span class="<?php echo $color ?>"> <?php echo $InPTestCases[$i]->prname ?></span></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    <?php } ?>
</section>
