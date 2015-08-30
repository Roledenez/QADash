
<section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Users</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <!-- <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search"> -->
                      <div class="input-group-btn">
                        <!-- <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> -->
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                <?php
                            // $attributes = array('class' => 'form-horizontal', 'id' => 'adduser','role' => "form");
                            // echo form_open("admin/users/changeRole",$attributes);

                         ?>
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Email</th>
                      <th>Role</th>
                      <!-- <th>Update</th> -->
                    </tr>
                    <?php
                      // var_dump($users);
                      $options = array(
                                    'admin'  => 'Administrator',
                                    'manager'    => 'Project Manager',
                                    'engineer'   => 'Engineer',
                                    'intern' => 'Intern',
                                  );
                       $attributes = array(
                                        'class' => 'btn btn-primary',
                                        'id' => 'form-submit',
                                        'type' => "submit",
                                        'name' => "submit",
                                        'value' => "Update"
                                        );



                      foreach ($users as &$user) {
                          $formAtt = array('class' => 'form-horizontal', 'id' => 'adduser','role' => "form");
                          $hidden = array(
                                        // 'class' => 'btn btn-primary',
                                        'id' =>  $user->users_id,
                                        'type' => "hidden",
                                        'name' => "id",
                                        // 'value' => $user->users_id
                                        );
                        $tr = "";
                        $tr .= "<tr>";
                          $tr .= "<td>";
                            $tr .= $user->users_id;
                          $tr .= "</td>";
                          $tr .= "<td>";
                            $tr .= $user->firstName." ".$user->lastName;
                          $tr .= "</td>";
                          $tr .= "<td>";
                            $tr .= $user->role;
                          $tr .= "</td>";
                          $tr .= "<td>";
                            $tr .= "<span class=\"label label-success\">Approved</span>";
                          $tr .= "</td>";
                          $tr .= "<td>";
                            $tr .= $user->email;
                          $tr .= "</td>";
                          $tr .= "<td>";
                            $tr .= form_open("admin/users/changeRole",$formAtt);
                            $tr .= form_dropdown('role', $options, 'admin');
                            $tr .=  form_hidden($hidden);
                          // $tr .= "</td>";
                          // $tr .= "<td>";
                            $tr .= form_submit($attributes);
                            $tr .= form_close();
                          $tr .= "</td>";
                        $tr .= "</tr>";
                        echo $tr;
                    }
                     ?>
                  </table>
              <?php //echo form_close(); ?>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>

        </section><!-- /.content -->