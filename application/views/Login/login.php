<body>  
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="#" class="logo"><span>Admin</span></a>
              <h5 class="text-muted m-t-0 font-600">&nbsp;</h5>
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Log In</h4>
                </div>
                <?php //echo validation_errors(); 
				$attributes = array('name' => 'login_form', 'id' => 'super_admin', 'class' => 'form-horizontal m-t-20');?>  
                <div class="panel-body">
                  <!--<form class="form-horizontal m-t-20" action="" method="POST">--><?php
				  echo form_open('login', $attributes); ?>
                        <span class="error"><?php if(isset($error)){
							echo $error;
							}?></span>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="name" placeholder="Username" id="name" value="<?php echo set_value('name'); ?>" required><span class="error"> <?php echo form_error('name'); ?></span>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password"  name= "psword" placeholder="Password" id="psword"value="<?php echo set_value('psword'); ?>" required><span class="error"><?php echo form_error('psword'); ?></span>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-custom">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit" name="CatagorySubmit">Log In</button>
                            </div>
                        </div>

                        <div class="form-group m-t-30 m-b-0">
                            <div class="col-sm-12">
                                <?php echo anchor('forget-password', '<i class="fa fa-lock m-r-5"></i> Forgot your password?', array('title'=>'forget-password', 'class'=>'text-muted')); ?>
                            </div>
                            
                        </div>
                        
                    <?php echo form_close(); ?>

                </div>
            </div>
            <!-- end card-box-->

        </div>
        <!-- end wrapper page -->
        

        
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
        <script src="<?php echo base_url('/assets/js/jquery.nicescroll.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.scrollTo.min.js'); ?>"></script>

        <!-- App js -->
        <script src="<?php echo base_url('/assets/js/jquery.core.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.app.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/plugins/jquery-validation/dist/jquery.validate.js'); ?>"></script>
        
        <script type="text/javascript">
			$(document).ready(function() {
				$('form').parsley();
			});
			
					
			$("#super_admin").validate({
				// Specify validation rules
				rules: {
				  name:"required",
				  psword:"required",
				  
				},
				// Specify validation error messages
				messages: {
				  name:"Username is required.",
				 
				  psword:"Password is required.",
				
				},
				// Make sure the form is submitted to the destination defined
				// in the "action" attribute of the form when valid
				submitHandler: function(form) {
				  form.submit();
				}
			  });
			
		</script>
	