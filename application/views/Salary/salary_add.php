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
                                <h4 class="page-title">Salary Detail</h4>
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
                        <div class="row">
                        <span class="error"><?php if(isset($error) && $result != '0'){
							echo $error." ".$result;
							}elseif(isset($error) && $result == '0'){
								echo $error;
								}elseif(isset($sucess)){
									echo $sucess;
									}?></span>
							<?php $attributes = array('name' => 'salary_insert', 'id' => 'salary_insert');?> 
                             <span class="error"><?php echo validation_errors(); ?></span><?php 
						     echo form_open('add', $attributes); ?>
                             <div class="month_year_overall">
                                <div class="form-group">
                                    <label for="salary_month" >Month & Year*</label>
                                   <div class="month_year_div"> 
                                   <select name="salary_month" class="form-control" parsley-trigger="change" id="atten_month" required>
                                                    <option value="">Month</option>
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                           </select>
                                            <select name="salary_year" class="form-control" parsley-trigger="change" id="salary_year" required><?php $current_year = date('Y');
											$i = 0;
											
											?>
                                                    <option value="">Year</option>
                                                    <?php for ($i = 0; $i <= 5; $i++) { ?>
                                                    <option ><?php echo $current_year;?></option><?php $current_year++;}?>
                                           </select>
                                           </div>
                                	</div>
                                </div>
                                <table class="attendance_table">
                                     <tr>
                                        <th>Name(EmpID)</th>
                                        <th>Gross Salary</th>
                                        <th>Basic Salary</th>
                                        <th>HRA</th>
                                        <th>Bonus (or) if any*</th>
                                        <th>Deduction Label*</th>
                                        <th>Deduction Amount*</th>
                                      </tr><?php if(isset($emp_details)){
												foreach($emp_details as $detail){?>
                                      <tr>
                                            <td>
                                            <input type="text" name="salary_name[]" parsley-trigger="change" class="form-control" id="emp_name" value="<?php echo $detail->employee_name.'('.$detail->employee_number.')';?>" readonly>
                                            <input type="hidden" name="salary_id[]" id="salary_id" value="<?php echo $detail->s_no;?>"></td>
                                            <td><input type="text" name="gross_pay[]" parsley-trigger="change" placeholder="Grass Salary" class="form-control" id="gross_pay" min="0" required></td>
                                            <td><input type="text" name="basic_pay[]" parsley-trigger="change" placeholder="Basic Salary" class="form-control" id="basic_pay" min="0" required></td>
                                            <td><input type="text" name="hra[]" parsley-trigger="change" placeholder="HRA" class="form-control" id="hra" min="0" required></td>
                                            <td><input type="text" name="bonus[]" parsley-trigger="change" placeholder="Amount" class="form-control" id="bonus" min="0" required></td>
                                            <td><input type="text" name="deduction_label[]" parsley-trigger="change" placeholder="Label" class="form-control" id="deduction_label" required></td>
                                             <td><input type="text" name="deduction_amount[]" parsley-trigger="change" placeholder="Amount" class="form-control" id="deduction_amount" min="0" required></td>
                                      </tr><?php }
									  }?>

                                </table>
                                <div class="form-group m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit" name="edit_scl">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                        Cancel
                                    </button>
                                </div>
                            <?php echo form_close(); ?>

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
        
         <!-- Datepicker js (bootstrap-datepicker) -->
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js');?>"></script>
         <script type="text/javascript" src="<?php echo base_url('assets/plugins/moment/moment.js'); ?>"></script>
         <script src="<?php echo base_url('/assets/plugins/jquery-validation/dist/jquery.validate.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/jquery-validation/dist/additional-methods.js'); ?>"></script>

        <!-- App js -->
        <script src="<?php echo base_url('/assets/js/jquery.core.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.app.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/crs.min.js'); ?>"></script>
         <!-- Validation js (Parsleyjs) -->
        <script type="text/javascript" src="<?php echo base_url('/assets/plugins/parsleyjs/dist/parsley.min.js'); ?>"></script>
        
        <script type="text/javascript">
			$(document).ready(function() {
				$('form').parsley();
			});
		</script>
        <script>
			$(document).ready(function(){
			 $('.datepicker').datepicker({
				  viewMode: 'years',
				  format: 'mm-yyyy',
				  autoclose: true
				});
			
			})

	   </script>