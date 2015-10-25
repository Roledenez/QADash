<section class="content">
    <?php if (empty($projects)) { ?>
    <br> <br>
    <div class="box-body">
        <div class="callout callout-info">
            <div style="text-align: center;">
            <h1>Welcome To QA Matrix Dashboard</h1> <br> <br>
            <p><h3>Please Select a Project</h3></p>
            <br> <br><br> <br><br> <br>
            </div>
        </div>
    </div><!-- /.box-body -->
<?php } ?> 

    <?php if (!empty($projects)) { ?>

        <br> <br>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Project Progress</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Project Name</th>
                                <th>Starting Date</th>
                                <th>Ending Date</th>
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
                                <td><?php echo $projects[0]->status ?></td>

                            </tr>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div><!-- /.row -->

<?php } ?> 

</section>
