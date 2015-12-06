<?php $this->load->view('components/page_head'); ?>
<body class="skin-blue sidebar-mini" ng-app="header">
    <div class="wrapper">

      <!-- header bar -->
      <?php $this->load->view('components/header'); ?>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo site_url('dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('fname')." ".$this->session->userdata('lname'); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php  $pid = $this->session->userdata('project_id') ; ?>
            <li class="header"><a href="<?php 
            if(!empty($this->session->userdata('project_id')))
                 echo site_url("engineer/projectManagement_controller/createTestSuit/$pid");
               else
                 echo site_url("engineer/base_controller");
             ?>">CREAT TEST SUITE</a></li>
            <li>
                <a href=<?php 
                if(!empty($this->session->userdata('project_id')))
                 echo site_url("engineer/assignedToMe_controller");
               else
                 echo site_url("engineer/base_controller");
               ?> >
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Projects</span>
                <span class="label label-primary pull-right">2</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="projectSprint_controller"><i class="fa fa-circle-o"></i> Project Sprint</a></li>
                <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="testcaseChart_controller">
                <i class="fa fa-th"></i>
                <span>Issues</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="TestCaseIsuuesChart_controller"><i class="fa fa-circle-o"></i>Overall View</a></li>
                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i>Issue status </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="testcaseChart_controller">
                <i class="fa fa-pie-chart"></i>
                <span>Testing</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="linechart_controller"><i class="fa fa-circle-o"></i> Overall View</a></li> 
                <li><a href=<?php 
                if(!empty($this->session->userdata('project_id')))
                 echo site_url("engineer/testcaseChart_controller");
               else
                 echo site_url("engineer/base_controller");
                ?> ><i class="fa fa-circle-o"></i> Test Case Status</a></li>         
              </ul>
            </li>
            <li>
              <a href="pages/calendar.html">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>
            <li>
              <a href="email/email_controller">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>
              <li>
                  <a href=<?php
                  if(!empty($this->session->userdata('project_id')))
                      echo site_url("engineer/report/report_controller");
                  else
                      echo site_url("engineer/base_controller");
                  ?>
                      <i class="fa fa-envelope"></i> <span>Reports</span>
                      <small class="label pull-right bg-yellow">12</small>
                  </a>
              </li>

            <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">


      <!-- Main content -->

        <?php if(isset($users)){
                 $this->load->view($subview,$users);
               }
              else{
                 $this->load->view($subview);
              }
         ?>


        <!-- end of the main content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://qadash.com">QADashboard Studio</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <?php $this->load->view('components/control_side_bar'); ?>

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

   <?php $this->load->view('components/page_tail'); ?>