<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo site_url('reportstyles/css/reportStyles.css'); ?>" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="container">
        <div class="section">
            <div class="col-md-12" style="margin-bottom: 10px">

                <?php echo anchor('manager/report/report_controller','<button style="" type="button" class="btn btn-success">Back</button>',array(
                ))?>
                <?php echo anchor('manager/email/email_controller/getAttatchment?filename='.$report,'<button style="margin-left: 900px;" type="button" class="btn btn-success">Email Report</button>',array(
                    ))?>


            </div>

            <div class="col-md-12">
                <object data="<?php echo base_url() ?>reports/<?php echo $report?>" type="application/pdf" width="1050px" height="800px">
            </div>



        </div>
</div>
</body>

</html>
