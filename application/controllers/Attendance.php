<?php
class Attendance extends CI_Controller {
        
		//View Controller
		public function __construct()
        {
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->database();
			$this->load->model('Salary_model');  
			$this->load->model('Login_model');
			$this->load->model('Attendance_model');   	
        }
			
		public function view()
		{
			if ( ! file_exists(APPPATH.'views/Attendance/attendance.php'))
			{
				show_404();
			}
			if($this->session->userdata('logged_in')){
				$detail['attendance_details']=$this->Attendance_model->attendance_details();
				$detail['attendance_user_details']=$this->Attendance_model->attendance_user_details();
				$detail['emp_details']=$this->Login_model->employee_details();
				$detail['profile_data']=$this->Login_model->profile_data();
				$this->load->view('templates/header');
				$this->load->view('Attendance/attendance', $detail);
				$this->load->view('templates/footer');	
			}else{
				$data['error'] = "Please login!";
				$this->load->view('templates/header', $data);
				$this->load->view('Login/login');
				$this->load->view('templates/footer');
				}
		}
		public function add()
		{
			if ( ! file_exists(APPPATH.'views/Attendance/attendance_add.php'))
			{
				show_404();
			}
		 	if($this->session->userdata('logged_in')){
				$detail['emp_details']=$this->Login_model->employee_details();
				$detail['profile_data']=$this->Login_model->profile_data();					
				$this->load->view('templates/header');
				$this->load->view('Attendance/attendance_add', $detail);
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
				
				
				$this->form_validation->set_rules('emp_name[en][]', 'Name', 'required');
				$this->form_validation->set_rules('emp_id[id][]', 'Emp ID', 'required');
				$this->form_validation->set_rules('atten_month[]', 'Attendance Month', 'required|trim');
				$this->form_validation->set_rules('atten_year[]', 'Attendance Year', 'required|trim');
				$this->form_validation->set_rules('wking_days[]', 'Working Days', 'required|trim');
				$this->form_validation->set_rules('cl[cl][]', 'CL', 'required|trim');
				$this->form_validation->set_rules('unpaid_leaves[ul][]', 'Loss of Pay', 'required|trim');
				$this->form_validation->set_rules('permission[pm][]', 'Permission', 'required|trim');
								
				if ($this->form_validation->run() == FALSE)
                {
					$detail["result"] = "";
                    $detail["error"]="Please fill the all details.";
					$detail['emp_details']=$this->Login_model->employee_details();
					$detail['profile_data']=$this->Login_model->profile_data();
					$detail['attendance_details']=$this->Attendance_model->attendance_details();
					$this->load->view('templates/header');
					$this->load->view('Attendance/attendance_add', $detail);
					$this->load->view('templates/footer');
                }
                else
                {
					
					$emp_details = $this->input->post('emp_name[en][]');
					$emp_id = $this->input->post('emp_id[id][]');
					$cl = $this->input->post('cl[cl][]');
					$unpaid_leaves = $this->input->post('unpaid_leaves[ul][]');
					$permission = $this->input->post('permission[pm][]');
	
					$datas = array(
					    'employee_name_id' => $emp_details,
						'cl' => $cl,
						'unpaid_leaves' => $unpaid_leaves,
						'permission' => $permission,
						's_no' => $emp_id	
					);
					$data = array(
						'attendance_month' => $this->input->post('atten_month'),
						'attendance_year' => $this->input->post('atten_year'),
						'working_days' => $this->input->post('wking_days')
					);
					$data["result"] = $this->Attendance_model->insert_atten_detail($datas, $data);
					
					if(isset($data["result"]) && $data["result"] != "0"){
						$detail["sucess"] = "Created sucessfully."; 
						$detail['attendance_details']=$this->Attendance_model->attendance_details();
						$detail['emp_details']=$this->Login_model->employee_details();
						$detail['profile_data']=$this->Login_model->profile_data();
						$this->load->view('templates/header');
						$this->load->view('Attendance/attendance_add', $detail);
						$this->load->view('templates/footer');
					}else{
						$detail["result"] = $data["result"]; 
						$detail["error"]="Datas are not Created.";
						$detail['attendance_details']=$this->Attendance_model->attendance_details();
						$detail['emp_details']=$this->Login_model->employee_details();
						$detail['profile_data']=$this->Login_model->profile_data();
						$this->load->view('templates/header');
						$this->load->view('Attendance/attendance_add', $detail);
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
		public function single()
		{
		 if ( ! file_exists(APPPATH.'views/Attendance/single.php'))
			{
				show_404();
			}
			if($this->session->userdata('logged_in')){
				$single_year =  $this->uri->segment(3);
 				$single_month =  $this->uri->segment(4);
				$detail['attendance_single']=$this->Attendance_model->attendance_single($single_year, $single_month);
				//print_r($detail);
				//die();
				$detail['profile_data']=$this->Login_model->profile_data();
				if($detail){
				$this->load->view('templates/header');
				$this->load->view('Attendance/single', $detail);
				$this->load->view('templates/footer');	
				}
			}else{
				$data['error'] = "Please login!";
				$this->load->view('templates/header');
				$this->load->view('Login/login', $data);
				$this->load->view('templates/footer');
			}
		}
		public function Attendance_edit($id)
		{ 
		 if ( ! file_exists(APPPATH.'views/Attendance/attendance_edit.php'))
			{
					show_404();
			}
			if($this->session->userdata('logged_in')){
				$edit_year =  $this->uri->segment(3);
 				$edit_month =  $this->uri->segment(4);
				$detail['profile_data']=$this->Login_model->profile_data();
				//$detail['emp_details']=$this->Login_model->employee_details();			
				$detail['attendance_edit']=$this->Attendance_model->attendance_edit($edit_year, $edit_month);
				$detail['profile_data']=$this->Login_model->profile_data();
				if($detail){
					$this->load->view('templates/header');
					$this->load->view('Attendance/attendance_edit', $detail);
					$this->load->view('templates/footer');	
				}else{
					$this->load->view('templates/header');
					$this->load->view('Attendance/attendance_add');
					$this->load->view('templates/footer');
				}
			}else{
				$data['error'] = "Please login!";
				$this->load->view('templates/header');
				$this->load->view('Login/login', $data);
				$this->load->view('templates/footer');
			}
		}	
		
		public function update()
        {
			if($this->session->userdata('logged_in')){
				$this->form_validation->set_rules('emp_name[en][]', 'Name', 'required');
				$this->form_validation->set_rules('emp_id[id][]', 'Emp ID', 'required');
				$this->form_validation->set_rules('attendence_edit_id[aten_id][]', 'Attendance ID', 'required');
				$this->form_validation->set_rules('atten_month[]', 'Attendance Month', 'required|trim');
				$this->form_validation->set_rules('atten_year[]', 'Attendance Year', 'required|trim');
				$this->form_validation->set_rules('wking_days[]', 'Working Days', 'required|trim');
				$this->form_validation->set_rules('cl[cl][]', 'CL', 'required|trim');
				$this->form_validation->set_rules('unpaid_leaves[ul][]', 'Loss of Pay', 'required|trim');
				$this->form_validation->set_rules('permission[pm][]', 'Permission', 'required|trim');
								
				if ($this->form_validation->run() == FALSE)
                {
                    $detail["result"] = "";
                    //$detail["error"]="Please fill the all details.";
					$detail['emp_details']=$this->Login_model->employee_details();
					$detail['profile_data']=$this->Login_model->profile_data();
					$detail['attendance_details']=$this->Attendance_model->attendance_details();
					$this->load->view('templates/header');
					$this->load->view('Attendance/attendance', $detail);
					$this->load->view('templates/footer');
                }
                else
                {
					$atten_id = $this->input->post('attendence_edit_id[aten_id][]');
					$emp_details = $this->input->post('emp_name[en][]');
					$emp_id = $this->input->post('emp_id[id][]');
					$cl = $this->input->post('cl[cl][]');
					$unpaid_leaves = $this->input->post('unpaid_leaves[ul][]');
					$permission = $this->input->post('permission[pm][]');
	
					$datas = array(
						'attendance_id' => $atten_id,
					    'employee_name_id' => $emp_details,
						'cl' => $cl,
						'unpaid_leaves' => $unpaid_leaves,
						'permission' => $permission,
						's_no' => $emp_id	
					);
					$data = array(
						'attendance_month' => $this->input->post('atten_month'),
						'attendance_year' => $this->input->post('atten_year'),
						'working_days' => $this->input->post('wking_days')
					);
					$data_error = array(
								'actual_month' => $this->input->post('actual_month'),
								'actual_year' =>$this->input->post('actual_year')
					);
					//$data["result"] = $this->Attendance_model->insert_atten_detail($datas, $data);
					$data["result"] = $this->Attendance_model->update_atten_detail(array('actual_month' => $this->input->post('actual_month'), 'actual_year' =>$this->input->post('actual_year')), $datas, $data);
					if(isset($data["result"]) && $data["result"] != 0){
						$edit_month = $data['attendance_month'];
						$edit_year = $data['attendance_year'];
						$detail["sucess"]="Sucessfully updated.";
						$detail['attendance_edit']=$this->Attendance_model->attendance_edit($edit_year, $edit_month);
						//$detail['attendance_details']=$this->Attendance_model->attendance_details();
						$detail['profile_data']=$this->Login_model->profile_data();
						$this->load->view('templates/header');
						$this->load->view('Attendance/attendance_edit', $detail);
						$this->load->view('templates/footer');
						
						
					}else{
						$detail["result"] = $data["result"]; 
						$detail["error"]="Fields are not updated.";
						$edit_month = $data_error['actual_month'];
						$edit_year = $data_error['actual_year'];
						$detail['attendance_edit']=$this->Attendance_model->attendance_edit($edit_year, $edit_month);
						$detail['attendance_details']=$this->Attendance_model->attendance_details();
						$detail['profile_data']=$this->Login_model->profile_data();
								$this->load->view('templates/header');
								$this->load->view('Attendance/attendance_edit', $detail);
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
			
		public function year($year)
		{
			if ( ! file_exists(APPPATH.'views/Attendance/attendance.php'))
			{
				show_404();
			}
			if($this->session->userdata('logged_in')){
				
				$detail['attendance_details']=$this->Attendance_model->attendance_year($year);
				//print_r($detail);
				//die();
				$detail['emp_details']=$this->Login_model->employee_details();
				$detail['profile_data']=$this->Login_model->profile_data();
				$this->load->view('templates/header');
				$this->load->view('Attendance/attendance_month', $detail);
				$this->load->view('templates/footer');	
			}else{
				$data['error'] = "Please login!";
				$this->load->view('templates/header', $data);
				$this->load->view('Login/login');
				$this->load->view('templates/footer');
				}
		}
		public function search()
		{
			if($this->session->userdata('logged_in')){
				$this->form_validation->set_rules('f_year', '"From Year"', 'required');
				$this->form_validation->set_rules('t_year', '"To Year"', 'required');
				$this->form_validation->set_rules('sch_names', 'sch_names', 'required');
								
				if ($this->form_validation->run() == FALSE)
                {
					$data=array(
					'f_year'=>form_error('f_year'),
					't_year'=>form_error('t_year'),
					);
                $detail['attendance_details']=$this->Attendance_model->attendance_details();
				$detail['emp_details']=$this->Login_model->employee_details();
				$detail['profile_data']=$this->Login_model->profile_data();
				$this->load->view('templates/header');
				$this->load->view('Attendance/attendance', $detail);
				$this->load->view('templates/footer');	
                }
                else
                {
					$f_month = $this->input->post('f_month');
					$f_year = $this->input->post('f_year');
					$t_month = $this->input->post('t_month');
					$t_year = $this->input->post('t_year');
					$sch_names = $this->input->post('sch_names');
					
	
					$data = array(
					'f_month' => $this->input->post('f_month'),
					'f_year' => $this->input->post('f_year'),
					't_month' => $this->input->post('t_month'),
					't_year' => $this->input->post('t_year'),
					'sch_names' => $this->input->post('sch_names')
					);
					
					$data["result"] = $this->Attendance_model->atten_search($data);
					//print_r($data);
					//die();
					if(isset($data["result"]) && $data["result"] != 0 && !empty($data["result"])){
						
						//$detail['attendance_edit']=$this->Attendance_model->attendance_edit($edit_year, $edit_month);
						//$detail['attendance_details']=$this->Attendance_model->attendance_details();
						$detail['attendance_search']=$data;
						$detail['profile_data']=$this->Login_model->profile_data();
						$this->load->view('templates/header');
						$this->load->view('Attendance/attendance_search', $detail);
						$this->load->view('templates/footer');
						
						
					}else{
						$detail['attendance_search']= "0 Results";
						$detail['profile_data']=$this->Login_model->profile_data();
						$this->load->view('templates/header');
						$this->load->view('Attendance/attendance_search', $detail);
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
			
		
		
				
	}