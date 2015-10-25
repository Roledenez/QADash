<header class="main-header" ng-app="header">
        <!-- Logo -->
        <a href="<?php echo site_url("admin/dashboard"); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>QA</b>Dashboard</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li>
                <div class="dropdown" ng-controller="customersCtrl">
                  <!--                  <button class="btn btn-info dropdown-toggle " type="button" data-toggle="dropdown">Select Project-->
                  <!--                    <span class="caret"></span></button>-->
                  <form method="post" action="project/testForm">
                    <select name="projectName" class="btn btn-info dropdown-toggle" ng-model="selectedProject">
                      <option ng-repeat="x in names" selected="true" value="{{x.name}}">{{x.name}}</option>
                    </select>
                    <input type="submit" value="Load" class="btn btn-info pull-right"/>
                  </form>
                  <!--                  <ul class="dropdown-menu" >-->
                  <!--                    <li ng-repeat="x in names" ><a ng-click="setCurrent(x.name)" ng-model="selectedProject" target="_self" ng-hef="http://localhost:82/QADash/public_html/admin/dashboard?id={{x.name}}" >{{x.name}} -->
                  <?php //$projectName="{{x.name}}"; ?><!--</a></li>-->
                  <!--                    <li><a href="#">CSS</a></li>-->
                  <!--                    <li><a href="#">JavaScript</a></li>-->
                  <!--                  </ul>-->
                </div>
              </li>
              <li>
                <!--                <a class="btn btn-info pull-right" href="">Load -->
                <?php ////echo $projectName ?><!--</a>-->
              </li>
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu" ng-controller="getUnreadChatCtrl">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">{{chats.length}}</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have {{chats.length}} messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li ng-repeat="c in chats"><!-- start message -->
                        <a href="#">
                          <div class="pull-left" ng-switch on="c.user_id">

                            <img ng-switch-when="<?php echo $this->session->userdata('uid') ?>"
                                 src="<?php echo site_url('dist/img/user2-160x160.jpg'); ?>" class="img-circle"
                                 alt="User Image"/>
                            <img ng-switch-default src="<?php echo site_url('dist/img/user3-128x128.jpg'); ?>"
                                 class="img-circle" alt="User Image"/>
                          </div>
                          <h4>
                            New Message
                            <small><i class="fa fa-clock-o"></i> {{c.create_date}} time</small>
                          </h4>
                          <p>{{c.chat_message_content}}</p>
                        </a>
                      </li><!-- end message -->
                      <!--                      <li>-->
                      <!--                        <a href="#">-->
                      <!--                          <div class="pull-left">-->
                      <!---->
                      <!--                            <img src="-->
                      <?php //echo site_url('dist/img/user3-128x128.jpg'); ?><!--" class="img-circle" alt="User Image" />-->
                      <!--                          </div>-->
                      <!--                          <h4>-->
                      <!--                            AdminLTE Design Team-->
                      <!--                            <small><i class="fa fa-clock-o"></i> 2 hours</small>-->
                      <!--                          </h4>-->
                      <!--                          <p>Why not buy a new awesome theme?</p>-->
                      <!--                        </a>-->
                      <!--                      </li>-->
                      <!--                      <li>-->
                      <!--                        <a href="#">-->
                      <!--                          <div class="pull-left">-->
                      <!--                            <img src="-->
                      <?php //echo site_url('dist/img/user4-128x128.jpg'); ?><!--" class="img-circle" alt="User Image" />-->
                      <!--                          </div>-->
                      <!--                          <h4>-->
                      <!--                            Developers-->
                      <!--                            <small><i class="fa fa-clock-o"></i> Today</small>-->
                      <!--                          </h4>-->
                      <!--                          <p>Why not buy a new awesome theme?</p>-->
                      <!--                        </a>-->
                      <!--                      </li>-->
                      <!--                      <li>-->
                      <!--                        <a href="#">-->
                      <!--                          <div class="pull-left">-->
                      <!--                            <img src="-->
                      <?php //echo site_url('dist/img/user3-128x128.jpg'); ?><!--" class="img-circle" alt="User Image" />-->
                      <!--                          </div>-->
                      <!--                          <h4>-->
                      <!--                            Sales Department-->
                      <!--                            <small><i class="fa fa-clock-o"></i> Yesterday</small>-->
                      <!--                          </h4>-->
                      <!--                          <p>Why not buy a new awesome theme?</p>-->
                      <!--                        </a>-->
                      <!--                      </li>-->
                      <!--                      <li>-->
                      <!--                        <a href="#">-->
                      <!--                          <div class="pull-left">-->
                      <!--                            <img src="-->
                      <?php //echo site_url('dist/img/user4-128x128.jpg'); ?><!--" class="img-circle" alt="User Image" />-->
                      <!--                          </div>-->
                      <!--                          <h4>-->
                      <!--                            Reviewers-->
                      <!--                            <small><i class="fa fa-clock-o"></i> 2 days</small>-->
                      <!--                          </h4>-->
                      <!--                          <p>Why not buy a new awesome theme?</p>-->
                      <!--                        </a>-->
                      <!--                      </li>-->
                    </ul>
                  </li>
                  <li class="footer"><a href="<?php echo site_url("engineer/chat"); ?>">See All Messages</a></li>
                </ul>
              </li>


              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu" ng-controller="unreadNotificationCtrl">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">{{notifications.length}}</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have {{notifications.length}} notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li ng-repeat="n in notifications">
                        <a href="{{n.navigate_url}}">
                          <i class="fa fa-warning text-green"></i> {{n.notification}}
                        </a>
                      </li>

                    </ul>
                  </li>
                  <li class="footer"><a href="<?php echo site_url() . 'engineer/notification/gotoActiveStream' ?>"
                                        ng-click="readNotification()">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="<?php echo site_url() . 'engineer/notification/gotoProjectActiveStream' ?>">View all
                      tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo site_url('dist/img/user2-160x160.jpg'); ?>" class="user-image" alt="User Image" />
                  <span class="hidden-xs"><?php echo $this->session->userdata('fname')." ".$this->session->userdata('lname'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo site_url('dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $this->session->userdata('fname')." ".$this->session->userdata('lname')." - ".$this->session->userdata('role'); ?>
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo site_url('engineer/users/showProfile'); ?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url('login/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>