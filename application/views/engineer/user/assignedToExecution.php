<section class="content">
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
                            <th>Test Case Title</th>
                            <th>Test Suite Title</th>
                            <th> Description</th>
                            <th>Priority</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                        for ($i = 0; $i < count($testCase); $i++) {
                            $color = null;
                            if ($testCase[$i]->priority_id == 1)
                                $color = "label label-danger";
                            elseif ($testCase[$i]->priority_id == 2)
                                $color = "label label-success";
                            else
                                $color = "label label-warning";

                            $tc_id = $testCase[$i]->testcase_id;
                            $options1 = array(
                                'Execution Passed' => 'Execution Passed',
                                'Execution Failed' => 'Execution Failed',
                            );
                            ?>
                            <tr>
                                <td><?php echo $testCase[$i]->testcase_id ?></td> 
                                <td><?php echo $testCase[$i]->title ?></td>
                                <td><?php echo $testCase[$i]->name ?></td>
                                <td><?php echo $testCase[$i]->description ?></td>
                                <td><span class="<?php echo $color ?>"> <?php echo $testCase[$i]->priority ?></span></td>
                                <?php echo form_open("engineer/assignedToMe_controller/UpdateExecutionStatus/$pid/$tc_id"); ?> 
                                <td><?php echo form_dropdown('execute', $options1, 'Execution Passed'); ?></td>
                                <td style="width: 180px;"><input type="submit" class="btn btn-block btn-primary" value="Execute" /></td>
                                <?php echo form_close(); ?>
                                <?php echo form_open("engineer/assignedToMe_controller/LoadTestStep/$pid/$tc_id"); ?> 
                                <td style="width: 180px;"><input type="submit" class="btn btn-block btn-primary" value="View Test Steps" /></td>
                                <?php echo form_close(); ?>
                            </tr>
                        <?php } ?> 
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.row --> 
    </div>

    <?php if (!empty($testStep)) { ?>
        <br>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h2 class="box-title">Test Case Step Details</h2>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Test Case ID</th>
                                <th> Description</th>
                                <th>Expected Result</th>
                                <th></th>
                            </tr>
                            <?php for ($i = 0; $i < count($testStep); $i++) { ?>
                                <tr>
                                    <td><?php echo $testStep[$i]->testcaseStep_id ?></td> 
                                    <td><?php echo $testStep[$i]->testcase_id ?></td>
                                    <td><?php echo $testStep[$i]->description ?></td>
                                    <td><?php echo $testStep[$i]->expectedResult ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.row --> 
        </div>
    <?php } ?>

</section>