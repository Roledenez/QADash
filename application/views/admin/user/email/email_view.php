<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo site_url('bootstrap/js/jquery.gridly.js'); ?>" type="text/javascript"></script>
    <link href="<?php echo site_url('bootstrap/css/jquery.gridly.css'); ?>" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>

    <script src="<?php echo site_url('emailstyles/js/jquery.bsmselect.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('emailstyles/js/jquery.bsmselect.sortable.js'); ?>"
            type="text/javascript"></script>
    <script src="<?php echo site_url('emailstyles/js/jquery.bsmselect.compatibility.js'); ?>"
            type="text/javascript"></script>

    <link href="<?php echo site_url('emailstyles/cs/jquery.bsmselect.css'); ?>" rel="stylesheet" type="text/css"/>
    <!--    <link href="-->
    <?php //echo site_url('emailstyles/cs/jquery.bsmselect.css'); ?><!--" rel="stylesheet" type="text/css"/>-->
    <!--    <link rel="stylesheet" type="text/css" href="example.css" />-->

    <script type="text/javascript">//<![CDATA[

        jQuery(function ($) {

            // Initialize options
            var emails = [
                'admin@admin.com',
                'chathurigamage17@gmailcom',
                'nimal@gmail.com',
                'x@yahoo.com'
            ];

            $.each(emails, function (index, email) {
                $(".sminit").each(function () {
                    $(this).append($("<option>").html(email));
                });
            });

            $("option:nth-child(7n)").attr('selected', 'selected');

            // Example 1
            $("#cities1").bsmSelect({
                addItemTarget: 'bottom',
                animate: true,
                highlight: true,
                plugins: [
                    $.bsmSelect.plugins.sortable({
                        axis: 'y',
                        opacity: 0.5
                    }, {listSortableClass: 'bsmListSortableCustom'}),
                    $.bsmSelect.plugins.compatibility()
                ]
            });

        });

    </script>


</head>
<body>
<div class="container">

    <section class="">
        <?php echo form_open('admin/email/email_controller/sendmail'); ?>
<!--        --><?php
//        $attributes = array('class' => 'form-horizontal', 'id' => 'sendemail','role' => "form");
//        echo form_open("admin/email/email_controller/sendmail",$attributes);
//
//        ?>

        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Compose New Message</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <div class="row" style=" margin-left: 10px; margin-top: 15px;">
                            <?php

                            //echo form_submit('submit','Log in','class=\"btn btn-primary\"');
                            $attributes = array(
                                'class' => 'sminit',
                                'id' => 'cities1',
                                'type' => "select",
                                'title'=>'To:',
                                'name' => "emails[]",
                                'value' => ""
                            );

                            echo form_dropdown($attributes);
                            ?>

                        </div>
                        <div class="form-group">
                            <?php

                            //echo form_submit('submit','Log in','class=\"btn btn-primary\"');
                            $attributes = array(
                                'class' => 'form-control',
                                'id' => 'subject',
                                'type' => "textarea",
                                'placeholder'=>'Subject:',
                                'name' => "subject",
                                'value' => ""
                            );

                            echo form_input($attributes);
                            ?>

                        </div>
                        <div class="form-group">
                            <?php

                            //echo form_submit('submit','Log in','class=\"btn btn-primary\"');
                            $attributes = array(
                                'class' => 'form-control',
                                'id' => 'compose-textarea',
                                'type' => "textarea",
                                'name' => "submit",
                                'style' => "height: 300px",
                                'value' => ""
                            );

                            echo form_submit($attributes);
                            ?>
<!--                    <textarea id="compose-textarea" class="form-control" style="height: 300px">-->

<!--                    </textarea>-->
                        </div>
                        <div class="form-group">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Attachment
                                <?php

                                //echo form_submit('submit','Log in','class=\"btn btn-primary\"');
                                $attributes = array(
                                    'class' => '',
                                    'id' => 'file',
                                    'type' => "file",
                                    'name' => "attatchment",
                                    'value' => ""
                                );

                                echo form_input($attributes);
                                ?>
                            <label >The generate report is already attached</label>
                            </div>
                            <p class="help-block">Max. 32MB</p>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="pull-right">
                            <button class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                            <?php

                            //echo form_submit('submit','Log in','class=\"btn btn-primary\"');
                            $attributes = array(
                                'class' => 'btn btn-primary',
                                'id' => 'send',
                                'type' => "submit",
                                'name' => "send",
                                'value' => "Send"
                            );

                            echo form_input($attributes);
                            ?>

                        </div>
                        <button class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
            <?php echo form_close(); ?>
            <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>


</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="../../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- Page Script -->
<script>
    $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
    });
</script>
</body>
</html>
