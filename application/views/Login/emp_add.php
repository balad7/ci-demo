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
                                <h4 class="page-title">Employee Register</h4>
                            </li>
                        </ul>

                        <!-- Right(Notification and Searchbox -->
                        <ul class="nav navbar-nav navbar-right">
                         <li>
                                <!-- Notification -->
                                
                                <div class="notification-box">
                                    <ul class="list-inline m-b-0">
                                        <li>
                                             <?php //echo anchor('employee', '<i class="zmdi zmdi-eye"></i>', array('title'=>'view')); ?>             
                                        </li>
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
							$attributes = array('name' => 'insert_form', 'id' => 'insert_school');?>
                             <span class="error"><?php echo validation_errors(); ?></span>
                           <?php  echo form_open('register', $attributes); ?>
                           
                                <div class="form-group col-6">
                                    <label for="userName">Name<span>*</span></label>
                                    <input type="text" name="emp_name" parsley-trigger="change" placeholder="Enter Employee name" class="form-control" id="emp_name" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="class">Employee Number<span>*</span></label>
                                    <input type="text" name="emp_number" parsley-trigger="change" placeholder="Enter Employee Number" class="form-control" id="emp_number" required>
                                </div>
                               <!-- <div class="form-group col-6">
                                	<label for="Dob" >Date of Birth (Certificate)<span>*</span></label>
                                    <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                        <input class="form-control" size="16" type="text" value="" readonly>
                                        
                                    </div>
                                    <input type="hidden" id="dtp_input2" value="" /><br/>
                                </div>-->
                                <div class="form-group col-6">
                                    <label for="Dob" >Date of Birth (Certificate)<span>*</span></label>
                                    <input type="text" name="certificate_date" parsley-trigger="change" placeholder="Date of Birth (Certificate)" class="form-control datepicker"  id="date" required>
                                </div>
                                
                                <div class="form-group col-6">
                                    <label for="Dob" >Date of Birth (Celebration)<span>*</span></label>
                                    <input type="text" name="celeb_date" parsley-trigger="change" placeholder="Date of Birth (Celebration)" class="form-control datepicker"  id="date" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="Dob" >Date of joining<span>*</span></label>
                                    <input type="text" name="joining_date" parsley-trigger="change" placeholder="Date of joining" class="form-control datepicker1"  id="date" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="class">Address Line 1<span>*</span></label>
                                    <input type="text" name="address_line_1" parsley-trigger="change" placeholder="Enter Employee Address" class="form-control" id="address" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="class">Address Line 2<span>*</span></label>
                                    <input type="text" name="address_line_2" parsley-trigger="change" placeholder="Enter Employee Address" class="form-control" id="address" required>
                                </div>
                                <div class="form-group col-6">
                                       <label for="city">City<span>*</span></label>
                                       <input type="text" name="city" parsley-trigger="change" placeholder="Enter city" class="form-control" id="city" required>
                                </div>
                                <div class="form-group col-6">
                                       <label for="region">State<span>*</span></label>
                                        <input type="text" name="region" parsley-trigger="change" placeholder="Enter State" class="form-control" id="region" required>
                                </div>
                               <div class="form-group col-6">
                                       <label for="country">country<span>*</span></label>
                                        <input type="text" name="employee_country" parsley-trigger="change" placeholder="Enter Country" class="form-control" id="employee_country" required>
                                </div>
                                <div class="form-group col-6">
                                       <label for="city">Zipcode<span>*</span></label>
                                       <input type="text" name="pincode" parsley-trigger="change" placeholder="Enter PIN code" class="form-control" id="pincode" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="c_number">Mobile<span>*</span></label>
                                    <input type="text" name="mobile_number" parsley-trigger="change" placeholder="Enter Employee Mobile Number" class="form-control" id="mobile_number" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="c_number">Alternate no<span>*</span></label>
                                    <input type="text" name="alt_number" parsley-trigger="change" placeholder="Enter Employee Alternate  Number" class="form-control" id="alt_number" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="class">Email id (Personal)<span>*</span></label>
                                    <input type="email" name="p_email" parsley-trigger="change" placeholder="Enter Email id (Personal)" class="form-control" id="p_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                                </div>
                                 <div class="form-group col-6">
                                    <label for="class">Email id (Official)<span>*</span></label>
                                    <input type="email" name="o_email" parsley-trigger="change" placeholder="Enter Email id (Official)" class="form-control" id="o_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                                </div>
                                <div class="form-group col-6" style="display:inline-block">
                                            <label class="control-label">Gender<span>* </span></label>
                                            <div class="radio_button">
                                            <div class="radio-inline">
                                              <input type="radio" name="employee_gender" value="Male">Male
                                            </div>
                                            <div class="radio-inline">
                                              <input type="radio" name="employee_gender" value="Female" required>Female
                                            </div>
                                            </div>
                                                    
                                </div> 
                                <div class="form-group col-6" id="have_exp">
                                            <label class="control-label">Have experience<span>*</span> </label>
                                            <div class="radio_button">
                                            <div class="radio-inline">
                                              <input type="radio" name="experience" value="Yes" >Yes
                                            </div>
                                            <div class="radio-inline">
                                              <input type="radio" name="experience" value="No" required>No
                                            </div>
                                            </div>
                                                    
                                </div>
                               
                                <div class="form-group years col-6" style="display:none" >
                                            <label for="exp_years">Year of experience</label>
                                             <input type="text" name="experience_years" class="form-control" parsley-trigger="change" placeholder="Enter Experience Details" id="years" min="0">
                                </div>
                                 <div class="form-group col-6">
                                    <label for="cert_obt" >Certificate Obtained</label>
                                    <input type="text" name="cert_obt" parsley-trigger="change" placeholder="Certificate Obtained" class="form-control"  id="cert_obt">
                                </div> 
                                <div class="form-group col-6" id="wk_sts">
                                            <label for="wk_sts">Working Status<span>*</span></label>
                                            <select name="wk_status" class="form-control wk_status" id="wk_status" required>
                                            		<option value="">Please select the status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Disqualified">Disqualified </option>
                                                    <option value="Relieved">Relieved</option>
                                           </select>
                                </div>
                                <div class="form-group col-6 cert_dis" style="display:none">
                                    <label for="cert_obt" >Disqualified Date</label>
                                    <input type="text" name="disqualified_date" parsley-trigger="change" placeholder="Disqualified Date" class="form-control datepicker1"  id="date">
                                </div>
                                <div class="form-group cert_reliev" style="display:none">
                                    <label for="cert_reliev" >Relieved Date</label>
                                    <input type="text" name="relieved_date" parsley-trigger="change" placeholder="Relieved Date" class="form-control datepicker1"  id="date">
                                </div> 

                                <div class="form-group col-12 m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit" name="edit_scl">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                        Reset
                                    </button>
                                </div>
                            <?php echo form_close(); ?>

                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2018 - 2019 © Payroll App.
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
        
         <!-- Datepicker js (bootstrap-datepicker) -->
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js');?>"></script>
         <script type="text/javascript" src="<?php echo base_url('assets/plugins/moment/moment.js'); ?>"></script>
         <script src="<?php echo base_url('/assets/plugins/jquery-validation/dist/jquery.validate.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/jquery-validation/dist/additional-methods.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/bootstrap-datetimepicker-master/bootstrap-datetimepicker.min.js'); ?>"></script>
        

        <!-- App js -->
        <script src="<?php echo base_url('/assets/js/jquery.core.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.app.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/crs.min.js'); ?>"></script>
         <!-- Validation js (Parsleyjs) -->
        <script type="text/javascript" src="<?php echo base_url('/assets/plugins/parsleyjs/dist/parsley.min.js'); ?>"></script>
        
        <script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('form').parsley();
			});
		</script>
        <script>
			jQuery(document).ready(function(){
			jQuery('.datepicker').datepicker({
				  viewMode: 'days',
				  toolbarPlacement: 'top',
				 showTodayButton : true,
				  format: 'dd-mm-yyyy',
				  autoclose: true,
				  endDate: '-18y'
				});
			jQuery('.datepicker1').datepicker({
				viewMode: 'days',
				toolbarPlacement: 'top',
				showTodayButton : true,
				  format: 'dd-mm-yyyy',
				  autoclose: true,
				});
			jQuery('.form_date').datetimepicker({
				//language:  'fr',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0
			});
			})

	   </script>