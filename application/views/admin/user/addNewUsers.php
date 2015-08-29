

<div class="container">
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Add new user</div>
                    </div>

                    <div style="padding-top:30px" class="panel-body" >

                        <!-- <form id="loginform" class="form-horizontal" role="form" action="<?php// echo base_url(); ?>index.php/login_controller/login_data" method="POST"> -->
                        <?php
                            $attributes = array('class' => 'form-horizontal', 'id' => 'adduser','role' => "form");
                            echo form_open("admin/users/add",$attributes);

                         ?>

                          <!-- First Name -->
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <!-- <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email"> -->
                                <?php
                                     $attributes = array(
                                        'class' => 'form-control',
                                        'id' => 'first-name',
                                        'type' => "text",
                                        'name' => "fname",
                                        'placeholder' => "First Name",
                                        'value' => ""
                                        );

                                     echo form_input($attributes);
                                  ?>
                            </div>

							<!-- Last name -->
                             <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <!-- <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email"> -->
                                <?php
                                     $attributes = array(
                                        'class' => 'form-control',
                                        'id' => 'last-name',
                                        'type' => "text",
                                        'name' => "lname",
                                        'placeholder' => "Last Name",
                                        'value' => ""
                                        );

                                     echo form_input($attributes);
                                  ?>
                            </div>

                            <!-- Username -->
                             <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <!-- <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email"> -->
                                <?php
                                     $attributes = array(
                                        'class' => 'form-control',
                                        'id' => 'username',
                                        'type' => "text",
                                        'name' => "username",
                                        'placeholder' => "Username",
                                        'value' => ""
                                        );

                                     echo form_input($attributes);
                                  ?>
                            </div>

							<!-- email -->
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <!-- <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email"> -->
                                <?php
                                     $attributes = array(
                                        'class' => 'form-control',
                                        'id' => 'email',
                                        'type' => "text",
                                        'name' => "email",
                                        'placeholder' => "Email",
                                        'value' => ""
                                        );

                                     echo form_input($attributes);
                                  ?>
                            </div>

							<!-- password -->
                             <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <!-- <input id="login-password" type="password" class="form-control" name="password" placeholder="password"> -->
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

							<!-- role dropdown -->
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                <!-- <input id="login-password" type="password" class="form-control" name="password" placeholder="password"> -->
                                <?php
                                     $options = array(
									                  'admin'  => 'Administrator',
									                  'manager'    => 'Project Manager',
									                  'engineer'   => 'Engineer',
									                  'intern' => 'Intern',
									                );

									// $shirts_on_sale = array('small', 'large');

									echo form_dropdown('role', $options, 'admin');
                                  ?>

                             <!-- validating error output -->
                            </div>
                                <h4 style="color:red"> <?php echo validation_errors(); ?> </h4>
                            </div>

							<!-- submit button -->
                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls">
                                    <!-- <button type="submit" class="btn btn-success">login</button> -->
                                    <?php

                                    //echo form_submit('submit','Log in','class=\"btn btn-primary\"');
                                        $attributes = array(
                                        'class' => 'btn btn-primary',
                                        'id' => 'form-submit',
                                        'type' => "submit",
                                        'name' => "submit",
                                        // 'placeholder' => "password",
                                        'value' => "Add user"
                                        );

                                     echo form_submit($attributes);
                                     ?>
                                </div>
                            </div>

        			<?php echo form_close(); ?>


                    </div>
                </div>
            </div>


