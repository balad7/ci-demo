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
                    <h4 class="text-uppercase font-bold m-b-0">Forget Password</h4>
                </div>
                <div class="panel-body"><span class="error"><?php $msg = $this->session->flashdata('msg');
				echo $msg;?></span>
                    <?php  $attributes = array('name' => 'forget_password', 'id' => 'forget_password', 'class' => 'form-horizontal m-t-20');
                   			echo form_open('change-password', $attributes); ?>
					
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" name="forget_pass" placeholder="ENTER YOUR E-MAIL" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required><span class="error"></span>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit" name="submit">Submit</button>
                            </div>
                        </div>
                      
                        <div class="form-group m-t-30 m-b-0">
                            <div class="col-sm-12">
                                <?php echo anchor('home', '<i class="fa fa-lock m-r-5"></i>LOGIN', array('title'=>'login', 'class'=>'text-muted')); ?>
                            </div>
                        </div>
                   <?php echo form_close(); ?>

                </div>
            </div>
            <!-- end card-box-->

           
        </div>
        <!-- end wrapper page -->
