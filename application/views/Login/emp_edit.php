<body class="fixed-left ">

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

                        <!-- Right(Notification and Searchbox --><?php foreach($employee_edit as $detail){
							$id = $detail->s_no;
							}?>
                        <ul class="nav navbar-nav navbar-right">
                         
                        
                         <!-- Notification -->
                         <li>
                                <div class="notification-box">
                                    <ul class="list-inline m-b-0">
                                     <li>
                                             <?php //echo anchor('add-employee', '<i class="zmdi zmdi-account-add"></i>', array('title' => 'add-employee')) ?>
                                        </li>
                                        <li> 
                                        <?php //echo anchor('employee', '<i class="zmdi zmdi-eye"></i>', array('title' => 'employee')) ?>
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


                        <div class="row">
						<span class="error"><?php if(isset($error) && $result != '0'){
							echo $error." ".$result;
							}elseif(isset($error) && $result == '0'){
								echo $error;
								}elseif(isset($sucess)){
									echo $sucess;
									}?></span><?php
							
					if(isset($employee_edit )){
						foreach($employee_edit as $detail){
							$id = $detail->s_no;
							
							$attributes = array('name' => 'update_form', 'id' => 'update_school');?>
                           
                            <?php echo form_open('update', $attributes);?>
								 <input type="hidden" value="<?php echo $id;?>" name="emp_update" id="emp_update">
                                 <input type="hidden" value="<?php echo $detail->employee_number;?>" name="emp_no" id="emp_no">
                                 <div class="form-group  col-6">
                                    <label for="emp_name">Name<span>*</span></label>
                                    <input type="text" name="emp_name" parsley-trigger="change" placeholder="Enter Employee name" class="form-control" id="emp_name" value="<?php echo $detail->employee_name;?>" required>
                                </div>
                                <div class="form-group  col-6">
                                    <label for="emp_number">Employee Number<span>*</span></label>
                                    <input type="text" name="emp_number" parsley-trigger="change" placeholder="Enter Employee Number" class="form-control" id="emp_number" value="<?php echo $detail->employee_number;?>" required>
                                </div>
                                <div class="form-group  col-6">
                                    <label for="certificate_date" >Date of Birth (Certificate)<span>*</span></label>
                                    <input type="text" name="certificate_date" parsley-trigger="change" placeholder="Date of Birth (Certificate)" class="form-control datepicker"  id="certificate_date" value="<?php $dob_certificate1 = $detail->dob_certificate;
													$dob_certificate2 = explode("-" ,$dob_certificate1);
													$dob_certificate = $dob_certificate2[2]."-".$dob_certificate2[1]."-".$dob_certificate2[0];
													echo $dob_certificate;?>" required>
                                </div>
                                <div class="form-group  col-6">
                                    <label for="celeb_date" >Date of Birth (Celebration)<span>*</span></label>
                                    <input type="text" name="celeb_date" parsley-trigger="change" placeholder="Date of Birth (Celebration)" class="form-control datepicker"  id="celeb_date" value="<?php $dob_celebration1 = $detail->dob_celebration;
													
													$dob_celebration2 = explode("-" ,$dob_celebration1);
													$dob_celebration = $dob_celebration2[2]."-".$dob_celebration2[1]."-".$dob_celebration2[0];
													echo $dob_celebration;?>" required>
                                </div>
                                <div class="form-group  col-6">
                                    <label for="joining_date" >Date of joining<span>*</span></label>
                                    <input type="text" name="joining_date" parsley-trigger="change" placeholder="Date of joining" class="form-control datepicker1"  id="joining_date" value="<?php $date_of_joining1 = $detail->date_of_joining;
													$date_of_joining2 = explode("-" ,$date_of_joining1);
													$date_of_joining = $date_of_joining2[2]."-".$date_of_joining2[1]."-".$date_of_joining2[0];
													echo $date_of_joining;?>" required>
                                </div>
                               <div class="form-group col-6">
                                    <label for="Address Line 1">Address Line 1<span>*</span></label>
                                    <input type="text" name="address_line_1" parsley-trigger="change" placeholder="Enter Employee Address" class="form-control" id="address_line_1" value="<?php echo $detail->address_line_1;?>" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="address_line_1">Address Line 2<span>*</span></label>
                                    <input type="text" name="address_line_2" parsley-trigger="change" placeholder="Enter Employee Address" class="form-control" id="address_line_2" value="<?php echo $detail->address_line_2;?>" required>
                                </div>
                                <div class="form-group col-6">
                                       <label for="city">City<span>*</span></label>
                                       <input type="text" name="city" parsley-trigger="change" placeholder="Enter city" value="<?php echo $detail->employee_city;?>" class="form-control" id="city" required>
                                </div>
                                <div class="form-group col-6">
                                       <label for="region">State<span>*</span></label>
                                        <input type="text" name="region" parsley-trigger="change" placeholder="Enter State" class="form-control" id="region" value="<?php echo $detail->employee_state; ?>" required>
                                </div>
                               <div class="form-group col-6">
                                       <label for="country">country<span>*</span></label>
                                        <input type="text" name="employee_country" parsley-trigger="change" placeholder="Enter Country" class="form-control" id="employee_country" value="<?php echo $detail->employee_country;?>" required>
                                </div>
                                <div class="form-group col-6">
                                       <label for="city">Zipcode<span>*</span></label>
                                       <input type="text" name="pincode" parsley-trigger="change" placeholder="Enter PIN code" class="form-control" id="pincode" value="<?php echo $detail->employee_pincode;?>" required>
                                </div>
                                <div class="form-group  col-6">
                                    <label for="mobile_number">Mobile<span>*</span></label>
                                    <input type="text" name="mobile_number" parsley-trigger="change" placeholder="Enter Employee Mobile Number" class="form-control" id="mobile_number" value="<?php echo $detail->mobile;?>" required>
                                </div>
                                <div class="form-group  col-6">
                                    <label for="alt_number">Alternate no<span>*</span></label>
                                    <input type="text" name="alt_number" parsley-trigger="change" placeholder="Enter Employee Alternate  Number" class="form-control" id="alt_number" value="<?php echo $detail->alternate_no;?>" required>
                                </div>
                                <div class="form-group  col-6">
                                    <label for="p_email">Email id (Personal)<span>*</span></label>
                                    <input type="email" name="p_email" parsley-trigger="change" placeholder="Enter Email id (Personal)" class="form-control" id="p_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  value="<?php echo $detail->	email_personal;?>" required>
                                </div>
                                 <div class="form-group  col-6">
                                    <label for="o_email">Email id (Official)<span>*</span></label>
                                    <input type="email" name="o_email" parsley-trigger="change" placeholder="Enter Email id (Official)" class="form-control" id="o_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  value="<?php echo $detail->email_official;?>" required>
                                </div>
                                <div class="form-group  col-6" style="display:inline-block">
                                <?php $employee_gender = $detail->gender;
								//echo $employee_gender;
								//die();?>
                                              <label class="control-label">Gender<span>*</span> </label>
                                            <div class="radio_button">
                                            <div class="radio-inline">
                                              <input type="radio" name="employee_gender" value="Male" <?php if($employee_gender == "Male"){echo "checked = checked";}?>>Male
                                            </div>
                                            <div class="radio-inline">
                                              <input type="radio" name="employee_gender" value="Female" <?php if($employee_gender == "Female"){echo "checked = checked";}?>required>Female
                                            </div>
                                            </div>
                                                    
                                </div> 
                                <div class="form-group  col-6" id="have_exp">
                                 <?php $experience = $detail->have_experience;?>
                                            <label class="control-label">Have experience<span>*</span> </label>
                                            <div class="radio_button">
                                            <div class="radio-inline">
                                              <input type="radio" name="experience" value="Yes" <?php if($experience == "Yes"){echo "checked";}?> >Yes
                                            </div>
                                            <div class="radio-inline">
                                              <input type="radio" name="experience" value="No" <?php if($experience == "No"){echo "checked";}?>>No
                                            </div>
                                            </div>
                                                    
                                </div>
                                <div class="form-group years  col-6" <?php if($experience == "Yes"){ echo 'style="display:block"';}else{ echo 'style="display:none"';}?> >
                                            <label for="exp_years">Year of experience</label>
                                             <input type="text" name="experience_years" class="form-control" parsley-trigger="change" placeholder="Enter Experience Details" id="years" min="0" value="<?php echo $detail->experience_details; ?>">
                                </div>
                                 <div class="form-group  col-6">
                                    <label for="cert_obt" >Certificate Obtained<span></span></label>
                                    <input type="text" name="cert_obt" parsley-trigger="change" placeholder="Certificate Obtained" class="form-control"  id="cert_obt" value="<?php echo $detail->certificate_obtained;?>" >
                                </div> 
                                <div class="form-group  col-6" id="wk_sts">
                                <?php $wk_sts = $detail->working_status;
								//echo $detail->working_status;?>
                                            <label for="wk_sts">Working Status<span>*</span></label>
                                            <select name="wk_status" class="form-control wk_status" id="wk_status" required>
                                                    <option value="Active" <?php if($wk_sts == "Active"){ echo 'selected="selected"';}?>>Active</option>
                                                    <option value="Disqualified" <?php if($wk_sts == "Disqualified"){ echo 'selected="selected"';}?>>Disqualified </option>
                                                    <option value="Relieved" <?php if($wk_sts == "Relieved"){ echo 'selected="selected"';}?>>Relieved</option>
                                           </select>
                                </div>
                                <div class="form-group cert_dis  col-6" <?php if($wk_sts == "Disqualified"){ echo 'style="display:block"';}else{ echo 'style="display:none"';}?>>
                                    <label for="cert_obt" >Disqualified Date<span></span></label>
                                    <input type="text" name="disqualified_date" parsley-trigger="change" placeholder="Disqualified Date" class="form-control datepicker2"  id="date" <?php if($wk_sts == "Disqualified"){?>value="<?php $disqualified1 = $detail->disqualified;
									if($disqualified1 != "0000-00-00"){
													$disqualified2 = explode("-" ,$disqualified1);
													$disqualified = $disqualified2[2]."-".$disqualified2[1]."-".$disqualified2[0];
													echo $disqualified;}?>"<?php }?>>
                                </div>
                                <div class="form-group cert_reliev  col-6" <?php if($wk_sts == "Relieved"){ echo 'style="display:block"';}else{ echo 'style="display:none"';}?>>
                                    <label for="cert_reliev" >Relieved Date<span></span></label>
                                    <input type="text" name="relieved_date" parsley-trigger="change" placeholder="Relieved Date" class="form-control datepicker2"  id="date" <?php if($wk_sts == "Relieved"){ ?>value="<?php $relieved1 = $detail->relieved;
									if($relieved1 != "0000-00-00"){
											 $relieved2 = explode("-" ,$relieved1);
											$relieved = $relieved2[2]."-".$relieved2[1]."-".$relieved2[0];
											echo $relieved; }?>"<?php }?>>
                                </div> 

                                <div class="form-group col-12 m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit" name="edit_scl">
                                        Submit
                                    </button>
                                </div>

                            <?php echo form_close(); 
						}
				  }?>

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
        <script src="<?php echo base_url('/assets/js/crs.min.js'); ?>"></script>
        
        <script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('form').parsley();
			});
		</script>
        <script>
			jQuery(document).ready(function(){
			 jQuery('.datepicker').datepicker({
				  format: 'dd-mm-yyyy',
				  autoclose: true,
				  endDate: '-18y'
				});
			jQuery('.datepicker1').datepicker({
				  format: 'dd-mm-yyyy',
				  autoclose: true,
				});
			jQuery('.datepicker2').datepicker({
				  format: 'dd-mm-yyyy',
				  todayHighlight: true,
				  autoclose: true,
				});
			
			})

	   </script>
        
			