<section class="content">
    <br> <br>
    <div class="container">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <?php if (!empty($projMem)) { ?>
                <br> 
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Project Members</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Member Name</th>
                                    </tr>
                                    <?php for ($i = 0; $i < count($projMem); $i++) { ?>   
                                        <tr>
                                            <td><?php echo $projMem[$i]->uername ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                </div><!-- /.row -->

            <?php } ?> 
            <br>   <br>

            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Members to the Project</h3>
                </div>
                <div class="box-body">
                    <?php
                    $attributes = array('class' => 'form-horizontal', 'id' => 'Add Member', 'role' => "form");
                    echo form_open("manager/allocateMember_controller/addMembers", $attributes);
                    ?>

                    <div class="form-group">
                        <label for="member" class="col-sm-2 control-label">Member List</label>
                        <div class="col-sm-10">
                            <?php
                            echo form_dropdown('member', $members, "");
                            ?>
                            <div style="color:red"> <?php echo form_error('member'); ?> </div>
                        </div>
                    </div>                   
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div style="margin-top:10px" class="form-group">                     
                        <div class="col-sm-12 controls">
                            <!-- <button type="submit" class="btn btn-success">login</button> -->
                            <?php
                            $attributes = array(
                                'class' => 'btn btn-primary',
                                'id' => 'form-submit',
                                'type' => "submit",
                                'name' => "submit",
                                'value' => "Add Member"
                            );
                            echo form_submit($attributes);
                            ?>
                        </div>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div><!-- /.box -->
            <br>
            <?php if ($flag == 1) { ?>
                <div class="panel panel-primary filterable">
                    <div class="panel-heading">
                        <h3 class="panel-title">Members added!!</h3>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-2"></div>
                            <div class="col-10">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <table class="table" width="40">
                                            <thead>
                                                <tr class="filters">
                                                    <th><input type="text" class="form-control" placeholder="Member Name" disabled maxlength="10"></th>
                                                    <th><input type="text" class="form-control" placeholder="" disabled maxlength="10"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($mem); $i++) { ?>
                                                    <tr>
                                                        <td><?php
                                                            echo $mem[$i]->firstName;
                                                            $memID = $mem[$i]->users_id;
                                                            ?></td>
                                                        <?php echo form_open("manager/allocateMember_controller/deleteMembers/$memID"); ?> 
                                                        <td><input type="submit" class="btn btn-block btn-primary" value="Delete" /></td>
                                                        <?php echo form_close(); ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                <?php } ?>           
            </div>
        </div>
</section>