<?php
class Login extends CI_Controller {
        
		//View Controller
		public function __construct()
        {
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library(array('form_validation', 'session', 'email'));
			//$this->load->library('session');
			$this->load->database();
			$this->load->model('Login_model');
			 	
        }
		
		public function view()
        {
			$page = 'login';
			if ( ! file_exists(APPPATH.'views/Login/'.$page.'.php'))
				{
						show_404();
				}
				
				//$data['admin']=$this->Login_model->hm_login();
				if ($this->session->userdata('logged_in'))
				{
					$detail['emp_details']=$this->Login_model->employee_details();
					$detail['profile_data']=$this->Login_model->profile_data();		
					$this->load->view('templates/header');
					$this->load->view('Login/index', $detail);
					$this->load->view('templates/footer');
				}else{
					//$data['title'] = ucfirst($page); // Capitalize the first letter
					$this->load->view('templates/header');
					$this->load->view('Login/login');
					$this->load->view('templates/footer');
				}
	
		}
		
		//Login Controller
		public function login()
		{
			$detail['emp_details']=$this->Login_model->employee_details();
			$detail['profile_data']=$this->Login_model->profile_data();
			if($this->session->userdata('logged_in')){
				 
				$this->load->view('templates/header');
				$this->load->view('Login/index', $detail);
				$this->load->view('templates/footer');
			}elseif(isset($_POST['name']) && isset($_POST['psword'])){
					
				$data = array(
					'username' => $this->input->post('name'),
					'password' => $this->input->post('psword')
				);
				$result["data"] = $this->Login_model->validate($data);
				
				if($result["data"] == "Username not exists!"){
					$data['error'] = "Username not exists!";
					$this->load->view('templates/header');
					$this->load->view('Login/login', $data);
					$this->load->view('templates/footer');
					}elseif($result["data"] == "Password not exists!"){
						$data['error'] = "Password not exists!";
					    $this->load->view('templates/header');
					    $this->load->view('Login/login', $data);
					    $this->load->view('templates/footer');
					}elseif(isset($result["data"][0]["username"]) && $result["data"][0]["username"] !=""){
					$admindata = array(
								'username'  => 'admin',
								'logged_in' => TRUE
							  );

					$this->session->set_userdata($admindata);
					$detail['emp_details']=$this->Login_model->employee_details();
					$this->load->view('templates/header');
					$this->load->view('Login/index', $detail);
					$this->load->view('templates/footer');
				}else{
					$data['error'] = "Please enter valid username or password !";
					$this->load->view('templates/header');
					$this->load->view('Login/login', $data);
					$this->load->view('templates/footer');
				}
						
			}elseif(empty($_POST['name']) && empty($_POST['psword'])){
				$data['error'] = "Please login!";
				$this->load->view('templates/header');
				$this->load->view('Login/login', $data);
				$this->load->view('templates/footer');
				}	
			}
			
			//Logout controller 
		public function logout()
			{
				$user_data = $this->session->all_userdata();
				foreach ($user_data as $key => $value) {
					if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
						$this->session->unset_userdata($key);
					}
				}
				$this->session->sess_destroy();
				//redirect('Login/view');
				    $this->load->view('templates/header');
					$this->load->view('Login/login');
					$this->load->view('templates/footer');
			}
			
		public function employee()
		{
			if ( ! file_exists(APPPATH.'views/Login/employee.php'))
			{
				show_404();
			}
			if($this->session->userdata('logged_in')){
				$detail['profile_data']=$this->Login_model->profile_data();
				$detail['emp_details']=$this->Login_model->employee_details();		
				$this->load->view('templates/header');
				$this->load->view('Login/employee', $detail);
				$this->load->view('templates/footer');	
			}else{
				$data['error'] = "Please login!";
				$this->load->view('templates/header', $data);
				$this->load->view('Login/login');
				$this->load->view('templates/footer');
				}
		}
			
			//Data Add
		public function add()
		{
			if ( ! file_exists(APPPATH.'views/Login/emp_add.php'))
			{
				show_404();
			}
		 	if($this->session->userdata('logged_in')){
				$detail['profile_data']=$this->Login_model->profile_data();		
				$this->load->view('templates/header');
				$this->load->view('Login/emp_add', $detail);
				$this->load->view('templates/footer');	
			}else{
				$data['error'] = "Please login!";
				$this->load->view('templates/header', $data);
				$this->load->view('Login/login');
				$this->load->view('templates/footer');
				}
		}
		
		public function insert()
        {
			if($this->session->userdata('logged_in')){
				
				
				$this->form_validation->set_rules('emp_name', 'Name', 'required');
				$this->form_validation->set_rules('emp_number', 'Employee Number', 'required|trim|is_unique[employee.employee_number]');
				$this->form_validation->set_rules('certificate_date', 'certificate_date', 'required|trim');
				$this->form_validation->set_rules('celeb_date', 'celeb_date', 'required|trim');
				$this->form_validation->set_rules('joining_date', 'joining_date', 'required|trim');
				$this->form_validation->set_rules('address_line_1', 'address line 1', 'required|trim');
				$this->form_validation->set_rules('address_line_2', 'address line 2', 'required|trim');
				$this->form_validation->set_rules('city', 'city', 'required|trim');
				$this->form_validation->set_rules('region', 'region', 'required|trim');
				$this->form_validation->set_rules('employee_country', 'employee country', 'required|trim');
				$this->form_validation->set_rules('pincode', 'pincode', 'required|trim');
				$this->form_validation->set_rules('mobile_number', 'mobile_number', 'required|trim');
				$this->form_validation->set_rules('alt_number', 'alt_number', 'required|trim');
				$this->form_validation->set_rules('p_email', 'p_email', 'required|trim');
				$this->form_validation->set_rules('o_email', 'o_email', 'required|trim');
				$this->form_validation->set_rules('employee_gender', 'employee_gender', 'required|trim');
				$this->form_validation->set_rules('experience', 'experience', 'required|trim');
								
				if ($this->form_validation->run() == FALSE)
                {
                    //$detail["error"]="Sorry please ";
					//$detail['emp_details']=$this->Login_model->employee_details();
					$detail['profile_data']=$this->Login_model->profile_data();
					$this->load->view('templates/header');
					$this->load->view('Login/emp_add', $detail);
					$this->load->view('templates/footer');
                }
                else
                {
				$dob_certificate1 = $this->input->post('certificate_date');
				$dob_certificate2 = explode("-" ,$dob_certificate1);
				$dob_certificate = $dob_certificate2[2]."-".$dob_certificate2[1]."-".$dob_certificate2[0];
				
				$dob_celebration1 = $this->input->post('celeb_date');
				$dob_celebration2 = explode("-" ,$dob_celebration1);
				$dob_celebration = $dob_celebration2[2]."-".$dob_celebration2[1]."-".$dob_celebration2[0];
				
				$date_of_joining1 = $this->input->post('joining_date');
				$date_of_joining2 = explode("-" ,$date_of_joining1);
				$date_of_joining = $date_of_joining2[2]."-".$date_of_joining2[1]."-".$date_of_joining2[0];
				
				$certificate_obtained1 = $this->input->post('cert_obt');
				$certificate_obtained2 = explode("-" ,$certificate_obtained1);
				$certificate_obtained = $certificate_obtained2[2]."-".$certificate_obtained2[1]."-".$certificate_obtained2[0];
				
				$disqualified1 = $this->input->post('disqualified_date');
				if(isset($disqualified1) && $disqualified1 != ""){
					$disqualified2 = explode("-" ,$disqualified1);
					$disqualified = $disqualified2[2]."-".$disqualified2[1]."-".$disqualified2[0];
				}else{
					$disqualified = $this->input->post('disqualified_date');
					}
				
				$relieved1 = $this->input->post('relieved_date');
				if(isset($relieved1) && $relieved1 != ""){
					$relieved2 = explode("-" ,$relieved1);
					$relieved = $relieved2[2]."-".$relieved2[1]."-".$relieved2[0];
				}else{
					$relieved = $this->input->post('relieved_date');
					}
				$data = array(
					'employee_name' => $this->input->post('emp_name'),
					'employee_number' => $this->input->post('emp_number'),
					'dob_certificate' => $dob_certificate,
					'dob_celebration' => $dob_celebration,
					'date_of_joining' => $date_of_joining,
					'address_line_1' => $this->input->post('address_line_1'),
					'address_line_2' => $this->input->post('address_line_2'),
					'employee_country' => $this->input->post('employee_country'),
					'employee_state' => $this->input->post('region'),
					'employee_city' => $this->input->post('city'),
					'employee_pincode' => $this->input->post('pincode'),
					'mobile' => $this->input->post('mobile_number'),
					'alternate_no' => $this->input->post('alt_number'),
					'email_personal' => $this->input->post('p_email'),
					'email_official' => $this->input->post('o_email'),
					'gender' => $this->input->post('employee_gender'),
					'have_experience' => $this->input->post('experience'),
					'experience_details' => $this->input->post('experience_years'),
					'certificate_obtained' => $this->input->post('cert_obt'),
					'working_status' => $this->input->post('wk_status'),
					'disqualified' => $disqualified,
					'relieved' => $relieved
				);
				$data["result"] = $this->Login_model->insert_emp($data);
				if(isset($data["result"]) && $data["result"] == 1){
					redirect('employee');
				}
                }
				
				
			}else{
				$data['error'] = "Please login!";
				$this->load->view('templates/header', $data);
				$this->load->view('Login/login');
				$this->load->view('templates/footer');
			}
        }
				
		public function single($page)
		{
		 if ( ! file_exists(APPPATH.'views/Login/single.php'))
			{
				show_404();
			}
			if($this->session->userdata('logged_in')){
				$emp_single = $page;
				$detail['profile_data']=$this->Login_model->profile_data();
				$detail['emp_single']=$this->Login_model->employee_single($emp_single);
				if($detail){
				$this->load->view('templates/header');
				$this->load->view('Login/single', $detail);
				$this->load->view('templates/footer');	
				}
			}else{
				$data['error'] = "Please login!";
				$this->load->view('templates/header');
				$this->load->view('Login/login', $data);
				$this->load->view('templates/footer');
			}
		}	
		public function employee_edit($id)
		{ 
		 if ( ! file_exists(APPPATH.'views/Login/emp_edit.php'))
			{
					show_404();
			}
			if($this->session->userdata('logged_in')){
				$emp_edit = $id;
				$detail['profile_data']=$this->Login_model->profile_data();
				$detail['employee_edit']=$this->Login_model->employee_edit($emp_edit);
				if($detail){
					$this->load->view('templates/header');
					$this->load->view('Login/emp_edit', $detail);
					$this->load->view('templates/footer');	
				}else{
					$this->load->view('templates/header');
					$this->load->view('Login/emp_add', $detail);
					$this->load->view('templates/footer');
				}
			}else{
				$data['error'] = "Please login!";
				$this->load->view('templates/header');
				$this->load->view('Login/login', $data);
				$this->load->view('templates/footer');
			}
		}
		
		public function do_upload()
        {
			
			
			if($this->session->userdata('logged_in')){
				
				$this->form_validation->set_rules('emp_name', 'Name', 'required');
				//$this->form_validation->set_rules('emp_number', 'Employee Number', 'required|trim|is_unique[employee.employee_number]');
				$this->form_validation->set_rules('certificate_date', 'Certificate Date', 'required|trim');
				$this->form_validation->set_rules('celeb_date', 'Celeb Date', 'required|trim');
				$this->form_validation->set_rules('joining_date', 'Joining Date', 'required|trim');
				$this->form_validation->set_rules('address_line_1', 'address line 1', 'required|trim');
				$this->form_validation->set_rules('address_line_2', 'address line 2', 'required|trim');
				$this->form_validation->set_rules('city', 'city', 'required|trim');
				$this->form_validation->set_rules('region', 'region', 'required|trim');
				$this->form_validation->set_rules('pincode', 'pincode', 'required|trim');
				$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|trim');
				$this->form_validation->set_rules('alt_number', 'Alternate number', 'required|trim');
				$this->form_validation->set_rules('p_email', 'Personal Email', 'required|trim');
				$this->form_validation->set_rules('o_email', 'Office Email', 'required|trim');
				$this->form_validation->set_rules('employee_gender', 'Employee Gender', 'required|trim');
				$this->form_validation->set_rules('experience', 'Experience', 'required|trim');
				$this->form_validation->set_rules('cert_obt', 'Certificate obtained', 'required|trim');
				$this->form_validation->set_rules('wk_status', 'Working Status', 'required|trim');
								
				if ($this->form_validation->run() == FALSE)
                {
					$detail['emp_details']=$this->Login_model->employee_details();
					$this->load->view('templates/header');
					$this->load->view('Login/employee', $detail);
					$this->load->view('templates/footer');
                }
                else
                {
					
				
				$dob_certificate1 = $this->input->post('certificate_date');
				$dob_certificate2 = explode("-" ,$dob_certificate1);
				$dob_certificate = $dob_certificate2[2]."-".$dob_certificate2[1]."-".$dob_certificate2[0];
				
				$dob_celebration1 = $this->input->post('celeb_date');
				$dob_celebration2 = explode("-" ,$dob_celebration1);
				$dob_celebration = $dob_celebration2[2]."-".$dob_celebration2[1]."-".$dob_celebration2[0];
				
				$date_of_joining1 = $this->input->post('joining_date');
				$date_of_joining2 = explode("-" ,$date_of_joining1);
				$date_of_joining = $date_of_joining2[2]."-".$date_of_joining2[1]."-".$date_of_joining2[0];
			
				$disqualified1 = $this->input->post('disqualified_date');
				if(isset($disqualified1) && $disqualified1 != ""){
					$disqualified2 = explode("-" ,$disqualified1);
					$disqualified = $disqualified2[2]."-".$disqualified2[1]."-".$disqualified2[0];
				}else{
					$disqualified = $this->input->post('disqualified_date');
					}
				
				$relieved1 = $this->input->post('relieved_date');
				if(isset($relieved1) && $relieved1 != ""){
					$relieved2 = explode("-" ,$relieved1);
					$relieved = $relieved2[2]."-".$relieved2[1]."-".$relieved2[0];
				}else{
					$relieved = $this->input->post('relieved_date');
					}
				$data = array(
					'employee_name' => $this->input->post('emp_name'),
					'employee_number' => $this->input->post('emp_number'),
					'dob_certificate' => $dob_certificate,
					'dob_celebration' => $dob_celebration,
					'date_of_joining' => $date_of_joining,
					'address_line_1' => $this->input->post('address_line_1'),
					'address_line_2' => $this->input->post('address_line_2'),
					'employee_country' => $this->input->post('employee_country'),
					'employee_state' => $this->input->post('region'),
					'employee_city' => $this->input->post('city'),
					'employee_pincode' => $this->input->post('pincode'),
					'mobile' => $this->input->post('mobile_number'),
					'alternate_no' => $this->input->post('alt_number'),
					'email_personal' => $this->input->post('p_email'),
					'email_official' => $this->input->post('o_email'),
					'gender' => $this->input->post('employee_gender'),
					'have_experience' => $this->input->post('experience'),
					'experience_details' => $this->input->post('experience_years'),
					'certificate_obtained' => $this->input->post('cert_obt'),
					'working_status' => $this->input->post('wk_status'),
					'disqualified' => $disqualified,
					'relieved' => $relieved
				);
					$emp_data = array(
							's_no' => $this->input->post('emp_update'),
							'emp_no' => $this->input->post('emp_no')
					); 
					$data["result"] = $this->Login_model->update_employee(array('s_no' => $this->input->post('emp_update'),'emp_no' => $this->input->post('emp_no')), $data);
					
					if(isset($data["result"]) && $data["result"] == 1){
						$emp_edit = $emp_data["s_no"];
						$detail['sucess']="Updated Sucessfully.";
						$detail['employee_edit']=$this->Login_model->employee_edit($emp_edit);
						$detail['profile_data']=$this->Login_model->profile_data();
						$this->load->view('templates/header');
						$this->load->view('Login/emp_edit', $detail);
						$this->load->view('templates/footer');
					}else{
						$emp_edit = $emp_data["s_no"];
						$detail['result'] = $data["result"];
						$detail['error']="Fields are not updated.";
						$detail['employee_edit']=$this->Login_model->employee_edit($emp_edit);
						$detail['profile_data']=$this->Login_model->profile_data();
						$this->load->view('templates/header');
						$this->load->view('Login/emp_edit', $detail);
						$this->load->view('templates/footer');
					}
				}

			}else{
				$data['error'] = "Please login!";
				$this->load->view('templates/header', $data);
				$this->load->view('Login/login');
				$this->load->view('templates/footer');
			}
        }
		
		
		public function emp_delete()
			{
				if($this->session->userdata('logged_in')){
					
					$id = $_POST['id'];
					$data["result"] = $this->Login_model->delete_by_id($id);
					
					if(isset($data["result"]) && $data["result"] == 1){
						echo "sucess";	
					}else{
						echo "failed";
						}
					
				}else{
					$data['error'] = "Please login!";
					$this->load->view('templates/header', $data);
					$this->load->view('Login/login');
					$this->load->view('templates/footer');
				}
			}			
			 /*?>public function employee_delete($id)
			{
				if($this->session->userdata('logged_in')){
					
					//$id = $_POST["id"];
					$data["result"] = $this->Login_model->delete_by_id($id);
					
					if(isset($data["result"]) && $data["result"] == 1){
						$detail['emp_details']=$this->Login_model->employee_details();
						$this->load->view('templates/header');
				        $this->load->view('Login/employee', $detail);
				        $this->load->view('templates/footer');	
					}else{
						echo "failed";
						die();
						}
					
				}else{
					$data['error'] = "Please login!";
					$this->load->view('templates/header', $data);
					$this->load->view('Login/login');
					$this->load->view('templates/footer');
				}
			}<?php */
			public function forget()
			{
				if($this->session->userdata('logged_in')){
					//$this->session->set_flashdata('msg','Please logout and try!');
					$detail['forget_pass']="Please logout and try!";
					$detail['profile_data']=$this->Login_model->profile_data();
					$this->load->view('templates/header');
					$this->load->view('Login/index', $detail);
					$this->load->view('templates/footer');	
					
				}else{
					//$data['error'] = "Please login!";
					$this->load->view('templates/header');
					$this->load->view('Login/forgot');
					$this->load->view('templates/footer');
				}
			}
			public function forget_password()
			{
				if($this->session->userdata('logged_in')){
					    $detail['profile_data']=$this->Login_model->profile_data();
						$this->load->view('templates/header');
				        $this->load->view('Login/index', $detail);
				        $this->load->view('templates/footer');	
					
				}else{
					$this->form_validation->set_rules('forget_pass', 'Email', 'required|trim');
					
					if ($this->form_validation->run() == FALSE)
                		{
							 $this->session->set_flashdata('msg',' Please enter correct email!');
                        	     $this->load->view('templates/header');
								 $this->load->view('Login/forgot');
								 $this->load->view('templates/footer');
                		}
               			else
                		{
							$user_email = $this->input->post('forget_pass');
							$result = $this->Login_model->forgot_validate($user_email);
							if($result){
							date_default_timezone_set('Etc/UTC');
							  $config['protocol'] = 'sendmail';
							  $config['mailpath'] = '/usr/sbin/sendmail';
							  $config['charset'] = 'iso-8859-1';
							  $config['wordwrap'] = TRUE;
							  $this->email->initialize($config);
							  $email = $result['useremail'];
							  $username = $result['username'];
							  if ($email)
								{
									$passwordplain = "";
									$passwordplain  = rand(999999999,9999999999);
									$newpass['password'] = md5($passwordplain);
									$updated_password["result"] = $this->Login_model->sendpassword($result, $newpass);
									if(isset($updated_password["result"]) && $updated_password["result"] == 1){
										$mail_message='Dear '.$username.','. "\r\n";
										$mail_message.='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
										$mail_message.='<br>Please Update your password.';
										$mail_message.='<br>Thanks & Regards';
										$mail_message.='<br>Hexamarvel Technologies Private Limited';        
										
										$this->email->from('admin@test.com', 'Admin');
										$this->email->to($email);
										//$this->email->cc('another@another-example.com');
										//$this->email->bcc('them@their-example.com');
										
										$this->email->subject('Password Reset');
										$this->email->message($mail_message);
										
										$sent_mail = $this->email->send();
									}
									
									if ($sent_mail == "1") {
										$this->session->set_flashdata('msg','Password sent to your email Please login!'); 
										$this->load->view('templates/header');
										$this->load->view('Login/forgot');
										$this->load->view('templates/footer');
									} else {
									   $this->session->set_flashdata('msg','Failed to send password, please try again!');
									   $this->load->view('templates/header');
									   $this->load->view('Login/forgot');
									   $this->load->view('templates/footer');
									}       
									}
							else
								{  
								 $this->session->set_flashdata('msg','Email not found try again!');
								 $this->load->view('templates/header');
								 $this->load->view('Login/forgot');
								 $this->load->view('templates/footer');
								}        
							   }else{
							  $this->session->set_flashdata('msg',' Email not found try again!');
							  $this->load->view('templates/header');
							  $this->load->view('Login/forgot');
							  $this->load->view('templates/footer');
						  }
                		}
				}
			}
			public function profile()
			{
				if ( ! file_exists(APPPATH.'views/Login/profile.php'))
				{
					show_404();
				}
				if($this->session->userdata('logged_in')){
					$detail['profile_data']=$this->Login_model->profile_data();		
					$this->load->view('templates/header');
					$this->load->view('Login/profile', $detail);
					$this->load->view('templates/footer');	
				}else{
					$data['error'] = "Please login!";
					$this->load->view('templates/header', $data);
					$this->load->view('Login/login');
					$this->load->view('templates/footer');
					}
			}	
			public function reset_password()
			{
				if ( ! file_exists(APPPATH.'views/Login/reset.php'))
				{
					show_404();
				}
				if($this->session->userdata('logged_in')){
					$detail['profile_data']=$this->Login_model->profile_data();	
					$this->load->view('templates/header');
					$this->load->view('Login/reset', $detail);
					$this->load->view('templates/footer');	
				}else{
					$data['error'] = "Please login!";
					$this->load->view('templates/header', $data);
					$this->load->view('Login/login');
					$this->load->view('templates/footer');
					}
			}
			public function update_password()
			{
				$this->form_validation->set_rules('reset_pass', 'Reset Password', 'required');
					
				if ($this->form_validation->run() == FALSE)
					{
						 $this->session->set_flashdata('msg','Please enter valid password!');
						 $detail['profile_data']=$this->Login_model->profile_data();
						 $this->load->view('templates/header');
						 $this->load->view('Login/reset', $detail);
						 $this->load->view('templates/footer');
					}
					else
					{
						$reset_pass = $this->input->post('reset_pass');
						$password = md5($reset_pass);
						$data = array(
							'password' => $password
						);
						$result = $this->Login_model->reset_validate($password);
						if($result){
							$this->session->set_flashdata('msg','Please try with new password!');
							$detail['profile_data']=$this->Login_model->profile_data();
							$this->load->view('templates/header');
							$this->load->view('Login/reset', $detail);
							$this->load->view('templates/footer');
							}else{
									$updated_password["result"] = $this->Login_model->update_password(array('s_no' => $this->input->post('user_id')), $data);
									if(isset($updated_password["result"]) && $updated_password["result"] == 1){
										$user_data = $this->session->all_userdata();
										foreach ($user_data as $key => $value) {
											if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
												$this->session->unset_userdata($key);
											}
										}
										$this->session->sess_destroy();
										$data['error'] = "Please login with your new password!";
										$this->load->view('templates/header');
										$this->load->view('Login/login', $data);
										$this->load->view('templates/footer');
									}else{
											$this->session->set_flashdata('msg','Sorry something went wrong!');
											$detail['profile_data']=$this->Login_model->profile_data();
											$this->load->view('templates/header');
											$this->load->view('Login/reset', $detail);
											$this->load->view('templates/footer');
										 }
							}
					}
			}
			
			public function profile_update()
			{
				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 500000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				
				if($this->session->userdata('logged_in')){
					
					$this->form_validation->set_rules('profile_name', 'Profile Name', 'required');
					//$this->form_validation->set_rules('profile_img', 'Profile image', 'required');
					//$img = $this->input->post('profile_img');
					
					
					if ($this->form_validation->run() == FALSE){
					$detail["error"]="Username is required!";
					$detail['profile_data']=$this->Login_model->profile_data();
					$this->load->view('templates/header');
					$this->load->view('Login/profile', $detail);
					$this->load->view('templates/footer');
						
					}else{
					
						$this->load->library('upload', $config);
						$uploaded = $this->upload->do_upload('profile_img');
						$username = $this->input->post('profile_name');
						//if ( $uploaded == "0")
						//{
								//$detail["error"] = $this->upload->display_errors();
								//$detail['profile_data']=$this->Login_model->profile_data();
								//$this->load->view('templates/header');
								//$this->load->view('Login/profile', $detail);
								//$this->load->view('templates/footer');
								
						//}
						if($uploaded == "1" || $username != "" && isset($username))
						{
						//$data["img"] = array('upload_data' => $this->upload->data());
						$upload_data = $this->upload->data();
						$filename = $upload_data['file_name'];
						$path = "uploads/";
						$full_path = $path .$filename;
						$old_photo = $this->input->post('user_photo');
						if(isset($filename) && $filename !=""){
							$data = array(
								'username' => $this->input->post('profile_name'),
								'profile_photo' => $upload_data['file_name']
							);
							$data["result"] = $this->Login_model->update_profile(array('s_no' => $this->input->post('user_id')), $data, $old_photo);
						}else{
							$data = array(
							'username' => $this->input->post('profile_name'),
							);
							$data["result"] = $this->Login_model->update_profile(array('s_no' => $this->input->post('user_id')), $data, "");	
						}
						
						if(isset($data["result"]) && $data["result"] == 1){
							$detail["error"]="Sucessfully updated";
							$detail['profile_data']=$this->Login_model->profile_data();
							$this->load->view('templates/header');
							$this->load->view('Login/profile', $detail);
							$this->load->view('templates/footer');	
						}else{
							$detail["error"]="datas are not updated!";
							$detail['profile_data']=$this->Login_model->profile_data();
							$this->load->view('templates/header');
							$this->load->view('Login/profile', $detail);
							$this->load->view('templates/footer');
							}
						}
						
					}
			}else{
					$data['error'] = "Please login!";
					$this->load->view('templates/header', $data);
					$this->load->view('Login/login');
					$this->load->view('templates/footer');
				}
			}			
	}