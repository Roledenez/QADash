
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
                            $attributes = array('class' => 'form-horizontal', 'id' => 'adduser','role' => "form");
                            echo form_open("admin/users/add",$attributes);

                         ?>
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Email</th>
                      <th>Edit</th>
                      <th>Update</th>
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
                            $tr .= form_dropdown('role', $options, 'admin');
                          $tr .= "</td>";
                          $tr .= "<td>";
                            $tr .= form_submit($attributes);
                          $tr .= "</td>";
                        $tr .= "</tr>";
                        echo $tr;
                    }
                     ?>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>Admin</td>
                      <td><span class="label label-danger">Denied</span></td>
                      <td><?php echo "sroledenez@gmail.com" ?></td>
                      <td>
                       <?php
                                     $options = array(
                                    'admin'  => 'Administrator',
                                    'manager'    => 'Project Manager',
                                    'engineer'   => 'Engineer',
                                    'intern' => 'Intern',
                                  );

                            echo form_dropdown('role', $options, 'admin');
                                  ?>
                      </td>
                      <td>
                        <?php
                                        $attributes = array(
                                        'class' => 'btn btn-primary',
                                        'id' => 'form-submit',
                                        'type' => "submit",
                                        'name' => "submit",
                                        'value' => "Update"
                                        );

                                     echo form_submit($attributes);
                                     ?>
                      </td>
                    </tr>
                  </table>
              <?php echo form_close(); ?>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>

        </section><!-- /.content -->