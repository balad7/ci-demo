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
                                <h4 class="page-title">Edit</h4>
                            </li>
                        </ul>

                        <!-- Right(Notification and Searchbox --><?php foreach($salary_edit as $detail){
								$id = $detail->salary_id;
							}?>
                        <ul class="nav navbar-nav navbar-right">
                         
                        
                         <!-- Notification -->
                         <li>
                                <div class="notification-box">
                                    <ul class="list-inline m-b-0">
                                     <li>
                                             <?php //echo anchor('add-salary', '<i class="zmdi zmdi-money-box"></i>', array('title' => 'add')) ?>
                                        </li>
                                        <li> 
                                        <?php //echo anchor('salary', '<i class="zmdi zmdi-eye"></i>', array('title' => 'employee')) ?>
                                        </li>
                                         
                                    </ul>
                                </div>
                            </li>
							<!-- End Notification bar -->
                             
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
                                <form role="search" class="app-search">
                                    <input type="text" placeholder="Search..."
                                           class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                                </form>
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
					if(isset($salary_edit)){
						foreach($salary_edit as $detail){
							//print_r($detail);
							$salary_id = $detail->salary_id;
							$s_no = $detail->s_no;
							$name = $detail->employee_name;
								$attributes = array('name' => 'update_salary', 'id' => 'update_salary');
                            }
						     echo form_open('update-salary', $attributes); ?>
                             
                           
                                <div class="form-group">
                                            <label for="emp_name">Employee Name*</label>
                                            <select name="emp_name" class="form-control" id="emp_name" required><?php
											if(isset($emp_details)){
												foreach($emp_details as $details){?>
                                            		<option value="<?php echo $details->name.'-'.$details->s_no;?>" <?php if($s_no == $details->s_no){ echo 'selected="selected"';}?>><?php echo $details->name;?></option><?php 
												}
											}?>
                                           </select>
                                </div>
                                <div class="form-group">
                                    <label for="salary_month" >Month & Year*</label>
                                    <input type="text" name="salary_month" parsley-trigger="change" placeholder="Month & Year" class="form-control datepicker"  id="salary_month" value="<?php echo $detail->month_year;
													//$month_year1 = $detail->month_year;
													//$month_year2 = explode("-" ,$month_year1);
													//$month_year =$month_year2[1]."-".$month_year2[0];
													//echo $month_year;?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="basic_salary">Basic Salary*</label>
                                    <input type="text" name="basic_salary" parsley-trigger="change" placeholder="Basic Salary" class="form-control" id="basic_salary" value="<?php echo $detail->basic_salary;?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="hra">HRA*</label>
                                    <input type="text" name="hra" parsley-trigger="change" placeholder="House Rent Allowance" class="form-control" id="hra" value="<?php echo $detail->hra;?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="bonus">Bonus (or) if any*</label>
                                    <input type="text" name="bonus" parsley-trigger="change" placeholder="Bonus (or) if any" class="form-control" id="bonus" value="<?php echo $detail->bonus;?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="deduction">Deduction*</label>
                                    <input type="text" name="deduction" parsley-trigger="change" placeholder="Deduction" class="form-control" id="deduction" value="<?php echo $detail->deduction;?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="total_salary">Total Salary*</label>
                                    <input type="text" name="total_salary" parsley-trigger="change" placeholder="Total Salary" class="form-control" id="total_salary" value="<?php echo $detail->total_salary;?>" required>
                                </div>
                                <input type="hidden" name="salary_id" value="<?php echo $salary_id; ?>" >
                                <input type="hidden" name="salary_name" value="<?php echo $detail->employee_name;?>">
                                <input type="hidden" name="edited_month" value="<?php echo $detail->month_year;?>">
                                <div class="form-group m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit" name="edit_scl">
                                        Submit
                                    </button>
                                    <button class="btn btn-default waves-effect waves-light m-l-5">
                                        <?php echo anchor('salary', 'Cancel', array('title' => 'employee')) ?>
                                    </button>
                                </div>
                            <?php echo form_close();
								 				  }?>

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
        <script src="<?php echo base_url('/assets/js/jquery.blockUI.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/waves.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.nicescroll.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.slimscroll.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.scrollTo.min.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/custom.js'); ?>"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="<?php echo base_url('/assets/plugins/jquery-knob/excanvas.js'); ?>"></script>
        <![endif]-->
        <script src="<?php echo base_url('/assets/plugins/jquery-knob/excanvas.js'); ?>"></script>

        <!--Morris Chart-->
		<script src="<?php echo base_url('/assets/plugins/morris/morris.min.js'); ?>"></script>
		<script src="<?php echo base_url('/assets/plugins/raphael/raphael-min.js'); ?>"></script>

        <!-- Dashboard init -->
        <script src="<?php echo base_url('/assets/pages/jquery.dashboard.js'); ?>"></script>

        <!-- App js -->
        <script src="<?php echo base_url('/assets/js/jquery.core.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.app.js'); ?>"></script>
        
        <!-- Validation js (Parsleyjs) -->
        <script type="text/javascript" src="<?php echo base_url('/assets/plugins/parsleyjs/dist/parsley.min.js'); ?>"></script>
        <!-- Datepicker js (bootstrap-datepicker) -->
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js');?>"></script>
         <script type="text/javascript" src="<?php echo base_url('assets/plugins/moment/moment.js'); ?>"></script>
         <script src="<?php echo base_url('/assets/plugins/jquery-validation/dist/jquery.validate.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/jquery-validation/dist/additional-methods.js'); ?>"></script>
        
        <script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('form').parsley();
			});
		</script>
        <script>
			jQuery(document).ready(function(){
			
			 jQuery('.datepicker').datepicker({
				  viewMode: 'years',
				  format: 'mm-yyyy',
				  autoclose: true
				});
			
			
		})

	   </script>
        
			