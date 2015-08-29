
<section class="content">

               <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Profile</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
 					 <?php
                            $attributes = array('class' => 'form-horizontal', 'id' => 'profileForm','role' => "form");
                            echo form_open("admin/users/update");
                         ?>
                  <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">First Name</label>
                      <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
                        <?php
                                     $attributes = array(
                                        'class' => 'form-control',
                                        'id' => 'first-name',
                                        'type' => "text",
                                        'name' => "fname",
                                        'placeholder' => "First Name",
                                        'value' => $this->session->userdata('fname')
                                        );

                                     echo form_input($attributes);
                                  ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Last Name</label>
                      <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
                       <?php
                                     $attributes = array(
                                        'class' => 'form-control',
                                        'id' => 'last-name',
                                        'type' => "text",
                                        'name' => "lname",
                                        'placeholder' => "Last Name",
                                        'value' => $this->session->userdata('lname')
                                        );

                                     echo form_input($attributes);
                                  ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
                      <?php
                                     $attributes = array(
                                        'class' => 'form-control',
                                        'id' => 'username',
                                        'type' => "text",
                                        'name' => "username",
                                        'placeholder' => "Username",
                                        'disabled' => TRUE,
                                        'value' => $this->session->userdata('username')
                                        );

                                     echo form_input($attributes);
                                  ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
                      <?php
                                     $attributes = array(
                                        'class' => 'form-control',
                                        'id' => 'email',
                                        'type' => "email",
                                        'name' => "email",
                                        'placeholder' => "Email",
                                        'value' => $this->session->userdata('email')
                                        );

                                     echo form_input($attributes);
                                  ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
                      <?php
                                     $attributes = array(
                                        'class' => 'form-control',
                                        'id' => 'login-password',
                                        'type' => "password",
                                        'name' => "password",
                                        'placeholder' => "password",
                                        'value' => ""
                                        );

                                     echo form_input($attributes);
                                  ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Confirm Password</label>
                      <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
                      <?php
                                     $attributes = array(
                                        'class' => 'form-control',
                                        'id' => 'confirm-password',
                                        'type' => "password",
                                        'name' => "confirmpassword",
                                        'placeholder' => "Confirm Password",
                                        'value' => ""
                                        );

                                     echo form_input($attributes);
                                  ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="exampleInputFile">
                    </div>
                    <div class="checkbox">
                      <label>
                                <h4 style="color:red"> <?php echo validation_errors(); ?> </h4>
                      </label>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    <?php

                                    //echo form_submit('submit','Log in','class=\"btn btn-primary\"');
                                        $attributes = array(
                                        'class' => 'btn btn-primary',
                                        'id' => 'form-submit',
                                        'type' => "submit",
                                        'name' => "submit",
                                        // 'placeholder' => "password",
                                        'value' => "Update"
                                        );

                                     echo form_submit($attributes);
                                     ?>
                  </div>
        <?php echo form_close(); ?>
              </div><!-- /.box -->

 </section><!-- /.content -->