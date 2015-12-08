<?php $this->load->view('components/page_head'); ?>
<body class="skin-blue sidebar-mini">
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
                        <p><?php echo $this->session->userdata('fname') . " " . $this->session->userdata('lname'); ?></p>
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
                    <li class="header"><a href="<?php echo site_url("manager/projectManagement_controller"); ?>">CREAT TEST PROJECT</a></li>
                    <li>
                        <a href=<?php
                        if (!empty($this->session->userdata('project_id')))
                            echo site_url("manager/projectProgress_controller");
                        else
                            echo site_url("manager/base_controller");
                        ?>>
                           <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="projectSprint_controller">
                            <i class="fa fa-files-o"></i>
                            <span>Projects</span>
                            <span class="label label-primary pull-right">*</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href=<?php
                        if (!empty($this->session->userdata('project_id')))
                            echo site_url("manager/projectManagement_controller");
                        else
                            echo site_url("manager/base_controller");
                        ?>><i class="fa fa-circle-o"></i> Create Test Project</a></li>
                            <li><a href=<?php
                        if (!empty($this->session->userdata('project_id')))
                            echo site_url("manager/allocateMember_controller");
                        else
                            echo site_url("manager/base_controller");
                        ?>><i class="fa fa-circle-o"></i> Allocate Members</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Testing</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href=<?php
                                if (!empty($this->session->userdata('project_id')))
                                    echo site_url("manager/assignTestCases_controller");
                                else
                                    echo site_url("manager/base_controller");
                                ?>><i class="fa fa-circle-o"></i> Assign To Execute</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="pages/widgets.html">
                            <i class="fa fa-th"></i> <span>Issues</span> <small class="label pull-right bg-green">*</small>
                        </a>
                    </li>
                    <li>
                        <a href=<?php
                        if (!empty($this->session->userdata('project_id')))
                            echo site_url("manager/report/report_controller");
                        else
                            echo site_url("manager/base_controller");
                        ?>>
                            <i class="fa fa-file-powerpoint-o"></i> <span>Reports </span>
                        </a>
                    </li>
                    <li>
                        <a href=<?php
                            echo site_url("manager/todo_controller");
                        ?>>
                            <i class="fa fa-calendar"></i> <span>To Do List</span>
                            <small class="label pull-right bg-red">*</small>
                        </a>
                    </li>
                    <li>
                        <a href=<?php
                            echo site_url("manager/calendar_controller/showcal");
                        ?>>
                            <i class="fa fa-calendar"></i> <span>Calendar</span>
                            <small class="label pull-right bg-red">*</small>
                        </a>
                    </li>
                    <li>
                        <a href=<?php
                            echo site_url("manager/email/email_controller");
                        ?>>
                            <i class="fa fa-envelope"></i> <span>Mailbox</span>
                            <small class="label pull-right bg-yellow">*</small>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->

            <?php
            if (isset($users)) {
                $this->load->view($subview, $users);
            } else {
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