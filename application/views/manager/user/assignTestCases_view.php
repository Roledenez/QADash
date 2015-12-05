<section class="content">
   <br>
   <?php if (!empty($testSuite)) { ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title">Assigned To Execute Test Suite Details</h2>
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
                                <?php echo form_open("manager/assignTestCases_controller/LoadTestCase/$pid/$ts_id"); ?> 
                                <td style="width: 180px;"><input type="submit" class="btn btn-block btn-primary" value="View TestCase" /></td>
                                <?php echo form_close(); ?>
                            </tr>
                        <?php } ?>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.row -->   
    </div>
   <?php } else { ?>
        <br><br><br><br><br><br>
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
        <div style=" alignment-adjust: central;" class="callout callout-danger">
            <br><br><br><br>
             <h4 style=" alignment-adjust: central;">&nbsp;&nbsp;No Test Cases Available To Assign!</h4>
            <br><br><br><br>
        </div>
        </div>
        <div class="col-lg-2"></div>

    <?php } 
    if (!empty($testCase)) { ?>
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
                                  
                                    ?>
                                    <tr>
                                        <td><?php echo $testCase[$i]->testcase_id ?></td> 
                                        <td><?php echo $testCase[$i]->testsuites_code ?></td> 
                                        <td><?php echo $testCase[$i]->title ?></td>
                                        <td><?php echo $testCase[$i]->description ?></td>
                                        <td><span class="<?php echo $color ?>"> <?php echo $testCase[$i]->pname ?></span></td>
                                        <td>
                                      <?php echo form_open("manager/assignTestCases_controller/AssignTestCase/$pid/$tc_id/$tsid"); ?> 
                                        <?php echo form_dropdown('user', $users, ''); ?>
                                       </td>
                                    <td style="width: 180px;"><input type="submit" class="btn btn-block btn-primary" value="Assign" /></td>
                                        <?php echo form_close(); ?>
                                    </tr>
                                <?php } ?> 
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.row --> 
            </div>
        <?php } ?>
    
</section>