<body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                   <?php echo anchor('home', '<span>Pay<span>Roll</span></span><i class="zmdi zmdi-layers"></i>', 'class="logo"') ?>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Page title -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left">
                                    <i class="zmdi zmdi-menu"></i>
                                </button>
                            </li>
                            <li>
                                <h4 class="page-title">Attendance</h4>
                            </li>
                        </ul>

                        <!-- Right(Notification and Searchbox -->
                        <ul class="nav navbar-nav navbar-right">
                        <li>
                                <!-- Notification -->
                                <div class="notification-box">
                                    <ul class="list-inline m-b-0">
                                    
                                    <?php echo anchor('add-attendance', '<i class="zmdi zmdi-calendar  zmdi-hc-2x"></i>', array('title'=>'add-attendance')) ?>
                                        <li class="srch_form"> <i class="user_icon"></i></li>
                                        <li></li>
                                    </ul>
                                </div>
                                <!-- End Notification bar -->
                            </li>
                            <li>
                                <!-- Notification -->
                                <div class="notification-box">
                                    <ul class="list-inline m-b-0">
                                        <li>
                                            <a href="javascript:void(0);" class="right-bar-toggle">
                                                <i class="zmdi zmdi-notifications-none"></i>
                                            </a>
                                            <div class="noti-dot">
                                                <span class="dot"></span>
                                                <span class="pulse"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Notification bar -->
                            </li>
                           <li class="hidden-xs">
                                <!-- <form role="search" class="app-search">
                                    <input type="text" placeholder="Search..."
                                           class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                                </form>-->
                            </li>
                        </ul>

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!-- User --><?php foreach($profile_data as $detail){
						$img_path = "uploads/".$detail->profile_photo; ?>
                    <div class="user-box">
                        <div class="user-img">
                            <img src="<?php echo base_url($img_path);?>" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                            <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
                        </div>
                        <h5><?php 
						
						$name = $detail->username;
						echo anchor('profile', $name, array('title'=>'profile')); ?></h5>
                        
                        <ul class="list-inline">
                            <li>
                               <?php echo anchor('profile', '<i class="zmdi zmdi-settings"></i>', array('title'=>'My profile'), 'class="text-custom"');?>
                            </li>

                            <li>
                            <?php echo anchor('logout', '<i class="zmdi zmdi-power"></i>', array('title'=>'Logout'), 'class="text-custom"'); ?>    
                            </li>
                        </ul>
                    </div><?php }?>
                    <!-- End User -->

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                        	<li class="text-muted menu-title">Navigation</li>
                            <li>
                                <?php echo anchor('home', '<i class="zmdi zmdi-view-dashboard"></i><span>Dashboard</span>', array('title'=>'dashboard')); ?>
                            </li>

                            <li>
                                <?php echo anchor('employee', '<i class="zmdi zmdi-accounts"></i><span>Employee</span>', array('title'=>'employee')); ?>
                            </li>
                            <li>
                                <?php echo anchor('attendance', '<i class="zmdi zmdi-calendar"></i><span>Attendance</span>', array('title'=>'attendance')); ?>
                            </li>
                            <li>
                                <?php echo anchor('salary', '<i class="zmdi zmdi-invert-colors"></i><span>Salary</span>', array('title'=>'salary')); ?>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row"><?php
                        $sch_ferror = form_error('f_year', '<span class="error">', '</span>');
						$sch_terror = form_error('t_year', '<span class="error">', '</span>'); 
						 if(isset($sch_ferror) && $sch_ferror !="" && isset($sch_terror) && $sch_terror !="" || isset($sch_terror) && $sch_terror !="" || isset($sch_ferror) && $sch_ferror !=""){?>
							  <div class="search_form error_toggle" id="search_form"><?php
							 }else{?>
								  <div class="search_form" id="search_form"><?php
								 }?>
                       
                        <?php echo form_open('attendance-search'); ?>
                                    from:<input type="text" name="f_year" placeholder="YYYY">
                                    To:<input type="text" name="t_year" placeholder="YYYY">
                                    Employee: <select name="sch_names" class="form-control" id="sch_names">
                                    <option value="all">All</option><?php if(isset($attendance_user_details)){
										 foreach($attendance_user_details as $details){?>
                                         <option value="<?php echo $details->employee_name_id; ?>"><?php echo $details->employee_name_id; ?></option><?php }
									}?>
                                    </select>
                                    <input type="submit" name="search" value="Search">
                         <?php echo form_close(); ?>
                         <?php echo form_error('f_year', '<span class="error">', '</span>'); ?>
                         <?php echo form_error('t_year', '<span class="error">', '</span>'); ?>
                        </div>
                        <span class="error"><?php if(isset($error) && $result != '0'){
							echo $error." ".$result;
							}elseif(isset($error) && $result == '0'){
								echo $error;
								}elseif(isset($sucess)){
									echo $sucess;
									}?></span>
                                    
                                    <div class="table-responsive">
                                        <table class="table">
                                        <thead>
                                              <tr>
                                               
                                                <th>Records as Year</th>
                                                <th>view</th>
                                                <!--<th colspan="3">Action</th>-->
                                              </tr>
                                         </thead>
                                         <tbody><?php 
										 $i=1;
										 if(isset($attendance_details)){
										 foreach($attendance_details as $detail){
											 $year= $detail->attendance_year;
											 ?>
                                                <tr>
                                                     <td><a href="<?php echo base_url() . 'index.php/Attendance/year/'.$year; ?>"><?php echo $detail->attendance_year; ?></a></td>
                                                     <td><a href="<?php echo base_url() . 'index.php/Attendance/year/'.$year; ?>" title="view"><i class="zmdi zmdi-eye zmdi-hc-lg"></i></a></td>
                                                      <!--<td><a href="<?php //echo base_url() . 'index.php/Attendance/single/'; ?>" title="view"><i class="zmdi zmdi-eye zmdi-hc-lg"></i></a>
                                                      <td><a href="<?php //echo base_url() . 'index.php/Attendance/attendance_edit/'; ?>" title="edit"><i class="zmdi zmdi-edit zmdi-hc-lg"></i></a></td>   -->
                                                </tr>
                                                <?php $i++;}
										 }?>
                                            </tbody>
                                        </table>
                                    </div>

                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2018 - 2019 © School App.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="zmdi zmdi-close-circle-o"></i>
                </a>
                <h4 class="">Notifications</h4>
                <div class="notification-list nicescroll">
                    <ul class="list-group list-no-border user-list">
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="../assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">Michael Zenaty</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-info">
                                    <i class="zmdi zmdi-account"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Signup</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">5 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-pink">
                                    <i class="zmdi zmdi-comment"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Message received</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="../assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">James Anderson</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 days ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-warning">
                                    <i class="zmdi zmdi-settings"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">Settings</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        
        <script src="<?php echo base_url('/assets/js/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/detect.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/fastclick.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.slimscroll.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.blockUI.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/waves.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/wow.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.nicescroll.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.scrollTo.min.js'); ?>"></script>
        

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="<?php echo base_url('/assets/plugins/jquery-knob/jquery.knob.js'); ?>"></script>

        <!--Morris Chart-->
		<script src="<?php echo base_url('/assets/plugins/morris/morris.min.js'); ?>"></script>
		<script src="<?php echo base_url('/assets/plugins/raphael/raphael-min.js'); ?>"></script>

        <!-- Dashboard init -->
        <script src="<?php echo base_url('/assets/pages/jquery.dashboard.js'); ?>"></script>

        <!-- App js -->
        <script src="<?php echo base_url('/assets/js/jquery.core.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.app.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/custom.js'); ?>"></script>


    