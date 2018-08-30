<body>
<div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <?php echo anchor('home', '<span>Pay<span>Roll</span></span><i class="zmdi zmdi-layers"></i>', array('title'=>'home','class'=>'logo'));?> 
              <h5 class="text-muted m-t-0 font-600">&nbsp;</h5>
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Reset Password</h4>
                </div>
                <div class="panel-body"><span class="error"><?php $msg = $this->session->flashdata('msg');
				echo $msg;?></span>
                    <?php  $attributes = array('name' => 'reset_password', 'id' => 'reset_password', 'class' => 'form-horizontal m-t-20');
                   			echo form_open('reset-password', $attributes); ?>
					
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="reset_pass" placeholder="ENTER YOUR NEW PASSWORD"><span class="error"></span>
                            </div>
                        </div><?php
                         if(isset($profile_data)){
										 foreach($profile_data as $detail){ ?>
										 <input class="form-control" type="hidden" name="user_id"  value="<?php echo $detail->s_no;?>" >
											<?php }
											}?>
                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit" name="submit">Submit</button>
                            </div>
                        </div>
                   <?php echo form_close(); ?>

                </div>
            </div>
            <!-- end card-box-->
        </div>
        <!-- end wrapper page -->
