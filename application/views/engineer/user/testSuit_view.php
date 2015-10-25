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
            <br>
            <?php
                echo form_open("engineer/projectManagement_controller/LoadcreateTestSuit/$ppid");?> 
                            <td style="width: 300px;"><input type="submit" class="btn btn-block btn-primary" value="Create Test Suites" /></td>
                <?php echo form_close();
             ?>
        </div>
    </div><!-- /.row -->

    <?php if ($load_ts != null) { ?>
        <br> <br>
        <div class="container">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create Test Suite</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <!--                <form class="form-horizontal">-->
                    <div class="box-body">

                        <?php
                        $attributes = array('class' => 'form-horizontal', 'id' => 'createTestSuite', 'role' => "form");
                        echo form_open("engineer/projectManagement_controller/AddnewTestSuite/$ppid", $attributes);
                        ?>

                        <div class="form-group">
                            <label for="ts_code" class="col-sm-2 control-label">Test Suite Code</label>
                            <div class="col-sm-10">
                                <?php
                                $attributes = array(
                                    'class' => 'form-control',
                                    'id' => 'ts_code',
                                    'type' => "text",
                                    'name' => "ts_code",
                                    'placeholder' => "Test Suite Code",
                                    'value' => $this->input->post('ts_code')
                                );

                                echo form_input($attributes);
                                ?>
                                <div style="color:red"> <?php echo form_error('ts_code'); ?> </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Test Suite Title</label>
                            <div class="col-sm-10">
                                <?php
                                $attributes = array(
                                    'class' => 'form-control',
                                    'id' => 'title',
                                    'type' => "text",
                                    'name' => "title",
                                    'placeholder' => "Test Suite Title",
                                    'value' => $this->input->post('title')
                                );

                                echo form_input($attributes);
                                ?>
                                <div style="color:red"> <?php echo form_error('title'); ?> </div>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="priority" class="col-sm-2 control-label">Priority</label>
                            <div class="col-sm-10">
                                <?php
                                echo form_dropdown('priority', $priority, set_value('priority'));
                                ?>
                                <div style="color:red"> <?php echo form_error('priority'); ?> </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="users" class="col-sm-2 control-label">Assigned To Review</label>
                            <div class="col-sm-10">
                                <?php
                                echo form_dropdown('users', $users, set_value('users'));
                                ?>
                                <div style="color:red"> <?php echo form_error('users'); ?> </div>
                            </div>
                        </div>
                        
                        </div><!-- /.box -->
                        <div class="box-footer">
                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls">
                                    <!-- <button type="submit" class="btn btn-success">login</button> -->
                                    <?php
                                    $attributes = array(
                                        'class' => 'btn btn-primary',
                                        'id' => 'form-submit',
                                        'type' => "submit",
                                        'name' => "submit",
                                        'value' => "Create Test Suite"
                                    );

                                    echo form_submit($attributes);
                                    ?>
                                </div>
                            </div>
                        </div><!-- /.box-footer -->
                        <!--</form>-->
                        <?php echo form_close(); ?>
                    

                </div>
            </div>
        </div>
    <?php } ?>

<?php if ($load_tc == 1) { ?>
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
                        $ts_id = $testSuite[$i]->testsuites_code;
                        ?>
                        <tr>
                            <td><?php echo $testSuite[$i]->testsuites_id ?></td> 
                            <td><?php echo $testSuite[$i]->testsuites_code ?></td>
                            <td><?php echo $testSuite[$i]->name ?></td>
                            <td><span class="<?php echo $color ?>"> <?php echo $testSuite[$i]->pname ?></span></td>
                            <?php echo form_open("engineer/projectManagement_controller/LoadcreateTestCase/$ppid/$ts_id");?> 
                            <td style="width: 180px;"><input type="submit" class="btn btn-block btn-primary" value="New Test Case" /></td>
                            <?php echo form_close();?>
                        </tr>
                        <?php } ?>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
    </div><!-- /.row -->   
    <?php } ?>
</section>