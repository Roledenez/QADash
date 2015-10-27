<!DOCTYPE html>
<html class="no-js">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo site_url('bootstrap/js/jquery.gridly.js'); ?>" type="text/javascript"></script>
    <link href="<?php echo site_url('bootstrap/css/jquery.gridly.css'); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('reportstyles/css/report.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css"/>
    <script src="<?php echo site_url('reportstyles/js/report.js'); ?>"></script>

</head>
<body onload="OnLoad()">
<!--<section class="content">-->

<!-- Main Div -->

<div class="container">
    <div class="content">

        <table>

            <tr>
                <td>
                    <div class="DropTarget">
                        <h2>&nbsp;&nbsp;&nbsp;&nbsp;Select Charts to Generate Report</h2>

                        <div class="Dragable" selectable="no">
                            <img src="<?php echo site_url('reportstyles/img/chart-1.png'); ?> "
                                 style="width:20em;height:20em;"/>
                        </div>
                        <div class="Dragable" selectable="no">
                            <img src="<?php echo site_url('reportstyles/img/chart2.png'); ?> "
                                 style="width:20em;height:20em;"/>
                        </div>
                        <div class="Dragable" selectable="no">
                            <img src="<?php echo site_url('reportstyles/img/chart3.jpg'); ?> "
                                 style="width:20em;height:20em;"/>
                        </div>
                        <div class="Dragable" selectable="no">
                            <img src="<?php echo site_url('reportstyles/img/chart4.gif'); ?> "
                                 style="width:20em;height:20em;"/>
                        </div>
                        <div class="Dragable" selectable="no">
                            <img src="<?php echo site_url('reportstyles/img/chart5.jpg'); ?> "
                                 style="width:20em;height:20em;"/>
                        </div>
                        <div class="Dragable" selectable="no">
                            <img src="<?php echo site_url('reportstyles/img/chart6.png'); ?> "
                                 style="width:20em;height:20em;"/>
                        </div>
                    </div>

                </td>


                <td>
                       <div class="DropTarget">
                            <h2>&nbsp;&nbsp;&nbsp;&nbsp;Test Report Customize</h2>
<!---->
                           <?php echo form_open('admin/reportpage_controller'); ?>
                                <button  type="submit" class="btn btn-success btn-large"
                                    style="float: inherit; width: 10em;padding-: 3px"> Generate PDF
                                </button>
                            <?php echo form_close();?>  &nbsp;&nbsp;&nbsp;&nbsp;
                           <?php echo form_open('admin/email/email_controller'); ?>
                           <button  type="submit" class="btn btn-success btn-large"
                                    style="float: inherit; width: 10em;padding-: 3px"> Attatch To Email
                           </button>
                           <?php echo form_close();?>

                            <br/><br/>

                        </div>
                </td>
            </tr>
        </table>

        <br/>


    </div>

</div>


</body>
</html>
