-<section class="content">

    <script src ="<?php echo site_url('js/cjs/jquery-1.11.1.min.js') ?>"></script>
    <script src ="<?php echo site_url('js/cjs/jquery.dataTables.min.js') ?>"></script>
    <script src ="<?php echo site_url('js/cjs/dataTables.jqueryui.js') ?>"></script>
    <script src ="<?php echo site_url('js/cjs/jquery-ui.js') ?>"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo site_url('js/themes/blitzer/jquery-ui.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('js/themes/blitzer/jquery-ui.min.css.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('js/themes/blitzer/theme.css') ?>">

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
                <!--<form class="form-horizontal">-->
                <div class="box-body">

                    <?php
                        $attributes = array('class' => 'form-horizontal', 'id' => 'formCreateIssue', 'role' => "form");                        
                        echo form_open_multipart("engineer/Create_issue_controller/create_issue", $attributes);
                    ?>

                    <!-- Text field for issue code -->
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

                    <!-- Dropdown for issue type -->
                    <div class="form-group">
                        <label for="issueType" class="col-sm-2 control-label">Issue Type</label>
                        <div class="col-sm-10">
                            <?php
                            $issueType = array(
                                     'New Feature'  => 'New Feature',
                                     'Blocker'    => 'Blocker',
                                     'Bug'   => 'Bug',
                                     'Improvement' => 'Improvement',
                                     'Support Request' => 'Support Request',
                                     'Third Party Issue' => 'Third Party Issue',
                                      );

                            echo form_dropdown('issueType', $issueType, set_value('New Feature'));
                            ?>
                            <div style="color:red"> <?php echo form_error('issueType'); ?> </div>
                        </div>
                    </div>

                    <!-- Text field for summary -->
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

                    <!-- Text field for description -->
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

                    <!-- Dropdown for priority -->
                    <div class="form-group">
                        <label for="priority" class="col-sm-2 control-label">Priority</label>
                        <div class="col-sm-10">
                            <?php
                            $priority = array(
                                     'Blocker'  => 'Blocker',
                                     'Critical'    => 'Critical',
                                     'Major'   => 'Major',
                                     'Minor' => 'Minor',
                                     'Trivial' => 'Trivial'                                   
                                    );

                            echo form_dropdown('priority', $priority, set_value('blocker'));
                            ?>
                            <div style="color:red"> <?php echo form_error('priority'); ?> </div>
                        </div>
                    </div>

                </div><!-- /.box-body -->

                <!-- Submit(Save) button -->
                <div>                    
                    <?php
                            $attributes = array(
                                'class' => 'form-control',
                                'id' => 'imageUpload',
                                'type' => "file",
                                'name' => "userfile[]",
                                'placeholder' => "imageUpload",
                                'multiple' => ""
                            );

                            echo form_input($attributes);
                            ?>
                </div>
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
                            <!-- <p data-placement="top" data-toggle="tooltip" title="Save"><button class="btn btn-primary btn-xs" data-title="Save" data-toggle="modal" data-target="#save" >Create Issue</button></p> -->
                        </div>
                    </div>
                </div>                                
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>


<!-- Save alert -->
<div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Save this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to save this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" id="btnYes" class="btn btn-success" data-dismiss="modal" onclick="SaveIssue(1);"><span class="glyphicon glyphicon-ok-sign" ></span>Yes</button>
       <button type="button" id="btnNo" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
    <!-- /.modal-dialog --> 
    </div>