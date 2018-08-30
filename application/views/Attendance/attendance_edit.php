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

                        <!-- Right(Notification and Searchbox --><?php 
						if(isset($attendance_edit)){
						foreach($attendance_edit as $detail){
								$id = $detail->attendance_id;
							}
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
                            <!--<li class="hidden-xs">
                                <form role="search" class="app-search">
                                    <input type="text" placeholder="Search..."
                                           class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>-->
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


                        <div class="row"> 
                        <span class="error"><?php
						if(isset($error) && $result != '0'){
							echo $error." ".$result;
							}elseif(isset($error) && $result == '0'){
								echo $error;
								}elseif(isset($sucess)){
									echo $sucess;
									}?></span>
							<?php $attributes = array('name' => 'attendance_update', 'id' => 'attendance_update');?> 
                             <span class="error"><?php echo validation_errors(); ?></span><?php 
						     echo form_open('attendance-update', $attributes); ?>                                      
                                         <?php 
										 foreach($attendance_edit as $detail){
											 $month = $detail->attendance_month;
											 $year = $detail->attendance_year;
											 $working_days = $detail->working_days;
										 }?> 
                             <div class="month_year_overall">
                                <div class="form-group">
                                    <label for="atten_month" >Month & Year*</label>
                                   <div class="month_year_div"> 
                                   <select name="atten_month" class="form-control" parsley-trigger="change" id="atten_month" required>
                                                    <option value="">Month</option>
                                                    <option <?php if($month == "1"){ echo 'selected="selected"';}?> value="1">January</option>
                                                    <option <?php if($month == "2"){ echo 'selected="selected"';}?> value="2">February</option>
                                                    <option <?php if($month == "3"){ echo 'selected="selected"';}?> value="3">March</option>
                                                    <option <?php if($month == "4"){ echo 'selected="selected"';}?> value="4">April</option>
                                                    <option <?php if($month == "5"){ echo 'selected="selected"';}?> value="5">May</option>
                                                    <option <?php if($month == "6"){ echo 'selected="selected"';}?> value="6">June</option>
                                                    <option <?php if($month == "7"){ echo 'selected="selected"';}?> value="7">July</option>
                                                    <option <?php if($month == "8"){ echo 'selected="selected"';}?> value="8">August</option>
                                                    <option <?php if($month == "9"){ echo 'selected="selected"';}?> value="9">September</option>
                                                    <option <?php if($month == "10"){ echo 'selected="selected"';}?> value="10">October</option>
                                                    <option <?php if($month == "11"){ echo 'selected="selected"';}?> value="11">November</option>
                                                    <option <?php if($month == "12"){ echo 'selected="selected"';}?> value="12">December</option>
                                           </select>
                                            <select name="atten_year" class="form-control" parsley-trigger="change" id="atten_year" required><?php $current_year = date('Y');
											$i = 0;
											
											?>
                                                    <option value="">YYYY</option>
                                                    <?php for ($i = 0; $i <= 5; $i++) { ?>
                                                    <option <?php if($year == $current_year){ echo 'selected="selected"';}?>><?php echo $current_year;?></option><?php $current_year++;}?>
                                           </select>
                                           </div>
                                </div>
                                <div class="form-group">
                                           <label class="working_days" for="wking_days">No of working days*</label>
                                      <div class="working_days_div">
                                           <input type="text" name="wking_days" parsley-trigger="change" placeholder="No of working days of this month" class="form-control" id="wking_days" value="<?php echo $working_days;?>" required>
                                      </div>     
                                            
                                </div> 
                             </div>   
                                <table class="attendance_table">
                                     <tr>
                                        <th>Name(EmpID)</th>
                                        <th>CL</th>
                                        <th>Loss of Pay</th>
                                        <th>Permission(Hrs)</th>
                                      </tr><?php
								 foreach($attendance_edit as $detail){?>
                                      <tr>
                                            <td><input type="text" name="emp_name[en][]" parsley-trigger="change" class="form-control" id="emp_name" value="<?php echo $detail->employee_name_id;?>">
                                            <input type="hidden" name="emp_id[id][]" id="emp_id" value="<?php echo $detail->s_no;?>">
                                            <input type="hidden" name="attendence_edit_id[aten_id][]" value="<?php echo $detail->attendance_id;?>"></td>
                                            <td><input type="text" name="cl[cl][]" parsley-trigger="change" placeholder="No of CL's" class="form-control" id="cl" value="<?php echo $detail->cl;?>"></td>
                                            <td><input type="text" name="unpaid_leaves[ul][]" parsley-trigger="change" placeholder="Enter no of unpaid leaves" class="form-control" id="unpaid_leaves" value="<?php echo $detail->unpaid_leaves;?>"></td>
                                            <td><input type="text" name="permission[pm][]" parsley-trigger="change" placeholder="Permission(Hrs)" class="form-control" id="permission" value="<?php echo $detail->permission;?>"></td>
                                      </tr><?php 
								 }?>

                                </table>
                                <input type="hidden" name="actual_month" value="<?php echo $month;?>">
                                <input type="hidden" name="actual_year" value="<?php echo $year;?>">
                                <div class="form-group m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit" name="add_atten">
                                        Update
                                    </button>
                                </div>
                            <?php echo form_close(); ?>
										<?php //}?>

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
        
			