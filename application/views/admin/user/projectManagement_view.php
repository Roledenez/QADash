-<section class="content">

    <script src ="<?php echo site_url('js/cjs/jquery-1.11.1.min.js') ?>"></script>
    <script src ="<?php echo site_url('js/cjs/jquery.dataTables.min.js') ?>"></script>
    <script src ="<?php echo site_url('js/cjs/dataTables.jqueryui.js') ?>"></script>
    <script src ="<?php echo site_url('js/cjs/jquery-ui.js') ?>"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo site_url('js/themes/blitzer/jquery-ui.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('js/themes/blitzer/jquery-ui.min.css.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('js/themes/blitzer/theme.css') ?>">

    <script type="text/javascript">
        $(document).ready(function () {

            $("#startingdate").datepicker({dateFormat: 'yy-mm-dd'});
            $("#endingDate").datepicker({dateFormat: 'yy-mm-dd'}).bind("change", function () {
                var minValue = $(this).val();
                minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
                minValue.setDate(minValue.getDate() + 1);
                $("#startingdate").datepicker("option", "minDate", minValue);
            })
        });

    </script> 

    <br> <br>
    <div class="container">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Testing Project</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <!--                <form class="form-horizontal">-->
                <div class="box-body">

                    <?php
                    $attributes = array('class' => 'form-horizontal', 'id' => 'createProject', 'role' => "form");
                    echo form_open("admin/projectManagement_controller/createProject", $attributes);
                    ?>

                    <div class="form-group">
                        <label for="projectid" class="col-sm-2 control-label">Project ID</label> 
                        <div class="col-sm-10">
                            <?php
                            $attributes = array(
                                'class' => 'form-control',
                                'id' => 'projectid',
                                'type' => "text",
                                'name' => "projectid",
                                'placeholder' => "Project ID",
                                'value' => $this->input->post('projectid')
                            );

                            echo form_input($attributes);
                            ?>
                            <div style="color:red"> <?php echo form_error('projectid'); ?> </div>

                        </div>
                    </div> 

                    <div class="form-group">
                        <label for="projectname" class="col-sm-2 control-label">Project Name</label>
                        <div class="col-sm-10">
                            <?php
                            $attributes = array(
                                'class' => 'form-control',
                                'id' => 'projectname',
                                'type' => "text",
                                'name' => "projectname",
                                'placeholder' => "Project Name",
                                'value' => $this->input->post('projectname')
                            );

                            echo form_input($attributes);
                            ?>
                            <div style="color:red"> <?php echo form_error('projectname'); ?> </div>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <?php
                            $attributes = array(
                                'class' => 'form-control',
                                'id' => 'description',
                                'type' => "text",
                                'name' => "description",
                                'placeholder' => "Description",
                                'value' => $this->input->post('description')
                            );

                            echo form_input($attributes);
                            ?>
                            <div style="color:red"> <?php echo form_error('description'); ?> </div>
                        </div>
                    </div> 


                    <div class="form-group">
                        <label for="startingdate" class="col-sm-2 control-label">Starting Date</label>
                        <div class="col-sm-10">
                            <?php
                            $attributes = array(
                                'class' => 'form-control',
                                'id' => 'startingdate',
                                'type' => "text",
                                'name' => "startingdate",
                                'placeholder' => "Strating Date",
                                'value' => $this->input->post('startingdate')
                            );

                            echo form_input($attributes);
                            ?>
                            <div style="color:red"> <?php echo form_error('startingdate'); ?> </div>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label for="endingDate" class="col-sm-2 control-label">Ending Date</label>
                        <div class="col-sm-10">
                            <?php
                            $attributes = array(
                                'class' => 'form-control',
                                'id' => 'endingDate',
                                'type' => "text",
                                'name' => "endingDate",
                                'placeholder' => "Ending Date",
                                'value' => $this->input->post('endingDate')
                            );

                            echo form_input($attributes);
                            ?>
                            <div style="color:red"> <?php echo form_error('endingDate'); ?> </div>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label for="priority" class="col-sm-2 control-label">Priority</label>
                        <div class="col-sm-10">
                            <?php
                            echo form_dropdown('priority', $priority, 2);
                            ?>
                            <div style="color:red"> <?php echo form_error('priority'); ?> </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <?php
                            $status = array(
                                'open' => 'Open',
                                'close' => 'Close',
                            );
                            echo form_dropdown('status', $status, set_value('open'));
                            ?>
                            <div style="color:red"> <?php echo form_error('status'); ?> </div>
                        </div>     
                    </div>

                    <!-- validating error output -->


                </div><!-- /.box-body -->
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
                                'value' => "Create Project"
                            );

                            echo form_submit($attributes);
                            ?>
                        </div>
                    </div>
                </div><!-- /.box-footer -->
                <!--                </form>-->
                <?php echo form_close(); ?>
            </div><!-- /.box -->

        </div>
    </div>
</section>