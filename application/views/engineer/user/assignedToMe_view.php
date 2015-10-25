<section class="content">
    <br>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
        You Have assigned for <?php echo count($projectsDet); ?> Projects <br>
        <?php if (!empty($reviewTS)) { ?>
            You Have assigned for Review <?php echo count($reviewTS); ?> Test Suites <br>
        <?php } ?>
        <?php if (!empty($assignedTC)) { ?>
            You Have assigned for Execute <?php echo count($assignedTC); ?> Test Case
        <?php } ?>

    </div>

    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title">Project Details</h2>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Project Name</th>
                            <th>Starting Date</th>
                            <th>Ending Date</th>
                            <th>Priority</th>
                            <th>Status</th>
                        </tr>
                        <?php
                        $color = null;
                        if ($projects[0]->prority_id == 1)
                            $color = "label label-danger";
                        elseif ($projects[0]->prority_id == 2)
                            $color = "label label-success";
                        else
                            $color = "label label-warning";
                        ?>
                        <tr>
                            <td><?php echo $projects[0]->project_id ?></td> 
                            <td><?php echo $projects[0]->name ?></td>
                            <td><?php echo $projects[0]->starting_date ?></td>
                            <td><?php echo $projects[0]->ending_date ?></td>
                            <td><span class="<?php echo $color ?>"> <?php echo $projects[0]->pname ?></span></td>
                            <td><?php echo $projects[0]->status ?></td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <br>
        </div>
    </div><!-- /.row -->


    <br>
    <?php if (!empty($testSuite)) { ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h2 class="box-title">Assigned To Review Test Suite Details</h2>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Test Suite Code</th>
                                <th>Test Suite Title</th>
                                <th>Priority</th>
                                <th></th>
                            </tr>
                            <?php
                            for ($i = 0; $i < count($testSuite); $i++) {
                                $color = null;
                                if ($testSuite[$i]->Priority == 1)
                                    $color = "label label-danger";
                                elseif ($testSuite[$i]->Priority == 2)
                                    $color = "label label-success";
                                else
                                    $color = "label label-warning";
                                $ts_id = $testSuite[$i]->testsuites_id;
                                ?>
                                <tr>
                                    <td><?php echo $testSuite[$i]->testsuites_id ?></td> 
                                    <td><?php echo $testSuite[$i]->testsuites_code ?></td>
                                    <td><?php echo $testSuite[$i]->name ?></td>
                                    <td><span class="<?php echo $color ?>"> <?php echo $testSuite[$i]->pname ?></span></td>
                                    <?php echo form_open("engineer/assignedToMe_controller/LoadTestCase/$pid/$ts_id"); ?> 
                                    <td style="width: 180px;"><input type="submit" class="btn btn-block btn-primary" value="View TestCase" /></td>
                                    <?php echo form_close(); ?>
                                </tr>
                            <?php } ?>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.row -->   
        </div>
    <?php }else { ?>

        <div class="callout callout-danger">
            <h4">No Test Suites Available To Review!</h4>
        </div>

    <?php } ?>

    <?php if (!empty($testCase)) { ?>
        <br>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h2 class="box-title">Test Case Details</h2>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Test Suite Code</th>
                                <th>Test Case Title</th>
                                <th> Description</th>
                                <th>Priority</th>
                                <th></th>
                            </tr>
                            <?php
                            for ($i = 0; $i < count($testCase); $i++) {
                                $color = null;
                                if ($testCase[$i]->prority_id == 1)
                                    $color = "label label-danger";
                                elseif ($testCase[$i]->prority_id == 2)
                                    $color = "label label-success";
                                else
                                    $color = "label label-warning";

                                $tc_id = $testCase[$i]->testcase_id;

                                $options = array(
                                    'Review Passed' => 'Review Passed',
                                    'Review Failed' => 'Review Failed',
                                );
                                ?>
                                <tr>
                                    <td><?php echo $testCase[$i]->testcase_id ?></td> 
                                    <td><?php echo $testCase[$i]->testsuites_code ?></td> 
                                    <td><?php echo $testCase[$i]->title ?></td>
                                    <td><?php echo $testCase[$i]->description ?></td>
                                    <td><span class="<?php echo $color ?>"> <?php echo $testCase[$i]->pname ?></span></td>
                                    <td>
                                        <?php echo form_open("engineer/assignedToMe_controller/UpdateStatus/$pid/$tc_id/$tsid"); ?> 
                                        <?php echo form_dropdown('review', $options, 'pass'); ?>
                                    </td>
                                    <td style="width: 180px;"><input type="submit" class="btn btn-block btn-primary" value="Reviewed" /></td>
                                    <?php echo form_close(); ?>
                                </tr>
                            <?php } ?> 
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.row --> 
        </div>
     <?php } ?>

        
    <br>
    <?php echo form_open("engineer/assignedToMe_controller/LoadAssignedTestCase/$pid"); ?> 
    <td style="width: 300px;"><input type="submit" class="btn btn-block btn-primary" value="View Assigned Test Cases For Execution" /></td>
    <?php echo form_close();
    ?>

    <br>

</section>
