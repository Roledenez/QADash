<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo site_url('bootstrap/js/jquery.gridly.js'); ?>" type="text/javascript"></script>
    <link href="<?php echo site_url('bootstrap/css/jquery.gridly.css'); ?>" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>
    <link href="<?php echo site_url('bootstrap/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo site_url('reportstyles/css/reportStyles.css'); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="<?php echo site_url('emailstyles/css/emailStyles.css'); ?>" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        function confirmDialog() {
            return confirm("Are you sure you want to delete this record?")
        }
    </script>

</head>
<body>
<div class="container">
    <div class="row"><h3 style="margin-left:20px">Report Generation</h3></div>
    <div class="row">
        <div class="col-md-12">

            <?php

            $attributes = array(
                'class' => 'form-area',
                'style' => 'width: 90%',
                'role' => "form",
            );

            echo form_open('engineer/report/projectreport_controller/generateReport',$attributes); ?>

                <div class="form-group">
                    <label for="filter">Report Type :</label>
                    <select name="reportType" class="form-control" value="<?php set_value('reportTitle')?>">
                        <option value="0" selected>Project Details</option>
                        <option value="1">Issue Level Report</option>
                        <option value="2">Test Case Report</option>
                        <option value="3">Project Progress Report</option>
                        <option value="4">QA Report</option>
                    </select>

                    <div class="form-group">
                        <label for="contain">Report Title :</label>
                        <input name="reportTitle" class="form-control" type="text"/>
                        <?php echo form_error('reportTitle'); ?>
                    </div>

                </div>

            <?php

            //echo form_submit('submit','Log in','class=\"btn btn-primary\"');
            $attributes = array(
                'class' => 'btn btn-primary',
                'id' => 'send',
                'type' => "submit",
                'name' => "send",
                'value' => "Generate Report"
            );

            echo form_input($attributes);
            ?>


            <?php echo form_close(); ?>
<!--            <form class="form-area" style="width: 90%" role="form">-->
<!--                <div class="form-group">-->
<!--                    <label for="filter">Report Type :</label>-->
<!--                    <select name="reportType" class="form-control">-->
<!--                        <option value="0" selected>Project Details</option>-->
<!--                        <option value="1">Issue Level Report</option>-->
<!--                        <option value="2">Test Case Report</option>-->
<!--                        <option value="3">Project Progress Report</option>-->
<!--                        <option value="4">QA Report</option>-->
<!--                    </select>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label for="contain">Report Title :</label>-->
<!--                    <input name="reportTitle" class="form-control" type="text"/>-->
<!--                </div>-->
<!--                --><?php //echo anchor('admin/report/projectreport_controller/generateReport', '<button class="btn btn-primary" >Generate Report</button>',
//                    array()) ?>
<!---->
<!--            </form>-->
            <div class="row"><h3 style="margin-left:20px">Previously Generated Reports</h3></div>
            <form class="form-area" style="width: 90%" role="form">
                <div class="well" style="max-height: 300px;overflow: auto;">
                    <ul class="list-group checked-list-box">

                        <?php
                        foreach ($reportlist as $value): ?>
                            <li class="list-group-item">
                                <?php echo anchor('engineer/report/singleReport_controller/displayPDF?filename=' . $value->report_name, $value->report_name, array(
                                    'target' => "_blank")) ?>
                                <?php echo anchor('engineer/report/report_controller/deleteFile?filename=' . $value->report_name, '<span class="glyphicon glyphicon-trash" style="float: right;color: red"></span>', array(
                                    'onclick' => "return confirmDialog();")) ?>

                            </li>
                        <?php endforeach; ?>


                    </ul>
                </div>
            </form>
        </div>

    </div>
</div>

</body>
</html>
