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
                    <h3 class="box-title">Create Issue</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <!--                <form class="form-horizontal">-->
                <div class="box-body">

                    <?php
                        $attributes = array('class' => 'form-horizontal', 'id' => 'ceateIssue', 'role' => "form");
                        echo form_open("admin/createIssue_c1/createIssue", $attributes);
                    ?>

                    <div class="form-group">
                        <label for="issueId" class="col-sm-2 control-label">Issue ID</label> 
                        <div class="col-sm-10">
                            <?php
                            $attributes = array(
                                'class' => 'form-control',
                                'id' => 'issueId',
                                'type' => "text",
                                'name' => "issueId",
                                'placeholder' => "Issue ID",
                                'value' => $this->input->post('issueId')
                            );

                            echo form_input($attributes);
                            ?>
                            <div style="color:red"> <?php echo form_error('issueId'); ?> </div>

                        </div>
                    </div> 

                    <div class="form-group">
                        <label for="issueCode" class="col-sm-2 control-label">Issue Code</label>
                        <div class="col-sm-10">
                            <?php
                            $attributes = array(
                                'class' => 'form-control',
                                'id' => 'issueCode',
                                'type' => "text",
                                'name' => "issueCode",
                                'placeholder' => "issueCode",
                                'value' => $this->input->post('issueCode')
                            );

                            echo form_input($attributes);
                            ?>
                            <div style="color:red"> <?php echo form_error('issueCode'); ?> </div>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label for="issueType" class="col-sm-2 control-label">Issue Type</label>
                        <div class="col-sm-10">
                            <?php
                            $issueType = array(
                                     'new_feature'  => 'New Feature',
                                     'blocker'    => 'Blocker',
                                     'bug'   => 'Bug',
                                     'improvement' => 'Improvement',
                                     'support_request' => 'Support Request',
                                     'third_party_issues' => 'Third Party Issue',
                                      );

                            echo form_dropdown('issueType', $issueType, set_value('new_feature'));
                            ?>
                            <div style="color:red"> <?php echo form_error('issueType'); ?> </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="summary" class="col-sm-2 control-label">Summary</label>
                        <div class="col-sm-10">
                            <?php
                            $attributes = array(
                                'class' => 'form-control',
                                'id' => 'summary',
                                'type' => "text",
                                'name' => "summary",
                                'placeholder' => "Summary",
                                'value' => $this->input->post('summary')
                            );

                            echo form_input($attributes);
                            ?>
                            <div style="color:red"> <?php echo form_error('summary'); ?> </div>
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
                        <label for="priority" class="col-sm-2 control-label">Priority</label>
                        <div class="col-sm-10">
                            <?php
                            $priority = array(
                                     'blocker'  => 'Blocker',
                                     'critical'    => 'Critical',
                                     'major'   => 'Major',
                                     'minor' => 'Minor',
                                     'trivial' => 'Trivial'                                   
                                    );

                            echo form_dropdown('priority', $priority, set_value('blocker'));
                            ?>
                            <div style="color:red"> <?php echo form_error('priority'); ?> </div>
                        </div>
                    </div>

                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">                            
                            <?php
                            $attributes = array(
                                'class' => 'btn btn-primary',
                                'id' => 'form-submit',
                                'type' => "submit",
                                'name' => "submit",
                                'value' => "Create Issue"
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