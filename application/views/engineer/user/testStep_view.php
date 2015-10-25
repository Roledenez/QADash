<section class="content">
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
        </div>
    </div><!-- /.row -->
    <br>
            <?php
                echo form_open("engineer/projectManagement_controller/LoadcreateTestSuit/$ppid");?> 
                            <td style="width: 300px;"><input type="submit" class="btn btn-block btn-primary" value="Create Test Suites" /></td>
                <?php echo form_close();
             ?>

    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title">Test Suite Details</h2>
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
                        $ts_code = $testSuite[0]->testsuites_code;
                        $ts_id = $testSuite[0]->testsuites_id;
                        ?>
                        <tr>
                            <td><?php echo $testSuite[$i]->testsuites_id ?></td> 
                            <td><?php echo $testSuite[$i]->testsuites_code ?></td>
                            <td><?php echo $testSuite[$i]->name ?></td>
                            <td><span class="<?php echo $color ?>"> <?php echo $testSuite[$i]->pname ?></span></td>
                            <?php echo form_open("engineer/projectManagement_controller/LoadcreateTestCase/$ppid/$ts_code"); ?> 
                            <td style="width: 180px;"><input type="submit" class="btn btn-block btn-primary" value="New Test Case" /></td>
                            <?php echo form_close(); ?>
                        </tr>
                         <?php } ?>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.row --> 
    </div>


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
                                    <th>Test Case Code</th>
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
                                    $ts_code = $testCase[$i]->testsuites_code;
                                    ?>
                                    <tr>
                                        <td><?php echo $testCase[$i]->testcase_id ?></td> 
                                        <td><?php echo $testCase[$i]->testsuites_code ?></td> 
                                        <td><?php echo $testCase[$i]->testcase_code ?></td>
                                        <td><?php echo $testCase[$i]->title ?></td>
                                        <td><?php echo $testCase[$i]->description ?></td>
                                        <td><span class="<?php echo $color ?>"> <?php echo $testCase[$i]->pname ?></span></td>
                                        <?php echo form_open("engineer/projectManagement_controller/LoadcreateTestStep/$ppid/$tc_id/$ts_code"); ?> 
                                        <td style="width: 180px;"><input type="submit" class="btn btn-block btn-primary" value="New Test Step" /></td>
                                        <?php echo form_close(); ?>
                                    </tr>
                                <?php } ?> 
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.row --> 
            </div>

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
                                    <?php
                                for ($i = 0; $i < count($testStep); $i++) { ?>
                                    <tr>
                                        <td><?php echo $testStep[$i]->testcaseStep_id ?></td> 
                                        <td><?php echo $testStep[$i]->testcase_id ?></td>
                                        <td><?php echo $testStep[$i]->description ?></td>
                                        <td><?php echo $testStep[$i]->expectedResult  ?></td>
                                    </tr>
                                <?php } ?>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.row --> 
                </div>


                </section> 
