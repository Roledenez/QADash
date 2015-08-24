 <!-- Modal content-->
   <!--  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <!-- <h4 class="modal-title">Log in</h4>
        <p>Please log in using your credentials</p> -->
    <!--   </div>
      <div class="modal-body"> -->





<div class="container">
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Reset your password</div>
                    </div>

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                        <!-- <form id="loginform" class="form-horizontal" role="form" action="<?php// echo base_url(); ?>index.php/login_controller/login_data" method="POST"> -->
                        <?php
                            $attributes = array('class' => 'form-horizontal', 'id' => 'loginform','role' => "form");
                            echo form_open();

                         ?>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <!-- <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email"> -->
                                <?php
                                     $attributes = array(
                                        'class' => 'form-control',
                                        'id' => 'login-username',
                                        'type' => "text",
                                        'name' => "email",
                                        'placeholder' => "username or email",
                                        'value' => ""
                                        );

                                     echo form_input($attributes);
                                  ?>
                            </div>

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



                            <div class="input-group">
                                <div class="checkbox">
                                    <label>
                                        <!-- <input id="login-remember" type="checkbox" name="remember" value="1"> -->
                                        <?php
                                     $attributes = array(
                                        // 'class' => 'form-control',
                                        'id' => 'login-remember',
                                        'type' => "checkbox",
                                        'name' => "remember",
                                        // 'placeholder' => "password",
                                        'value' => "1"
                                        );

                                     echo form_input($attributes);
                                  ?>
                                   Remember me
                                    </label>
                                </div>
                                <h4 style="color:red"> <?php echo validation_errors(); ?> </h4>

                            </div>


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
                                        'value' => "Log in"
                                        );

                                     echo form_submit($attributes);
                                     ?>
                                    <a id="btn-fblogin" href="#" class="btn btn-primary">Register here</a>

                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12 control">
                                    <!-- <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                        Don't have an account!
                                        <a href="#" onClick="$('#loginbox').hide();
                                                $('#signupbox').show()">
                                            Sign Up Here
                                        </a>
                                    </div> -->
                                </div>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
            <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Sign Up</div>
                        <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide();
                                                $('#loginbox').show()">Sign In</a></div>
                    </div>
                    <div class="panel-body" >
                        <form id="signupform" class="form-horizontal" role="form">

                            <div id="signupalert" style="display:none" class="alert alert-danger">
                                <p>Error:</p>
                                <span></span>
                            </div>



                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Email</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="email" placeholder="Email Address">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="firstname" class="col-md-3 control-label">First Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-3 control-label">Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="passwd" placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="icode" class="col-md-3 control-label">Invitation Code</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="icode" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <!-- Button -->
                                <div class="col-md-offset-3 col-md-9">
                                    <button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                                    <span style="margin-left:8px;">or</span>
                                </div>
                            </div>

                            <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">

                                <div class="col-md-offset-3 col-md-9">
                                    <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                                </div>

                            </div>

<table class="table">
            <!-- <tr>
                <td>Email</td>
                <td></td>
            </tr> -->
            <!-- <tr>
                <td>Password</td>
                <td><?php// echo form_input('password'); ?></td>
            </tr> -->
            <!-- <tr>
                <td></td>
                <td><?php //echo form_submit('submit','Log in','class=\"btn btn-primary\"'); ?></td>
            </tr> -->
        </table>




                        <!-- </form> -->
        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
     <!--    </div>



      </div>
 -->
