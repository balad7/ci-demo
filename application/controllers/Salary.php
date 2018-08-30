<?php
class Salary extends CI_Controller {
        
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
        }
			
		public function view()
		{
			if ( ! file_exists(APPPATH.'views/Salary/salary.php'))
			{
				show_404();
			}
			if($this->session->userdata('logged_in')){
				$detail['profile_data']=$this->Login_model->profile_data();
				$detail['salary_details']=$this->Salary_model->salary_details();
				$this->load->view('templates/header');
				$this->load->view('Salary/salary', $detail);
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
			if ( ! file_exists(APPPATH.'views/Salary/salary_add.php'))
			{
				show_404();
			}
		 	if($this->session->userdata('logged_in')){
				$detail['emp_details']=$this->Login_model->employee_details();
				$detail['profile_data']=$this->Login_model->profile_data();					
				$this->load->view('templates/header');
				$this->load->view('Salary/salary_add', $detail);
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
				
				
				$this->form_validation->set_rules('salary_month', 'Salary Month', 'required');
				$this->form_validation->set_rules('salary_year', 'Salary Year', 'required|trim');
				$this->form_validation->set_rules('salary_name[]', 'Salary Name', 'required|trim');
				$this->form_validation->set_rules('salary_id[]', 'Salary ID', 'required|trim');
				$this->form_validation->set_rules('gross_pay[]', 'Gross Salary', 'required|trim');
				$this->form_validation->set_rules('basic_pay[]', 'Basic Salary', 'required|trim');
				$this->form_validation->set_rules('hra[]', 'HRA', 'required|trim');
				$this->form_validation->set_rules('bonus[]', 'Bonus', 'required|trim');
				$this->form_validation->set_rules('deduction_label[]', 'Deduction label', 'required|trim');
				$this->form_validation->set_rules('deduction_amount[]', 'Deduction amount', 'required|trim');
								
				if ($this->form_validation->run() == FALSE)
                {
                    $detail["error"]="Please fill the all details.";
					$detail['profile_data']=$this->Login_model->profile_data();
					$detail['emp_details']=$this->Login_model->employee_details();
					$this->load->view('templates/header');
					$this->load->view('Salary/salary_add', $detail);
					$this->load->view('templates/footer');
                }
                else
                {
				$gross_pay = $this->input->post('gross_pay[]');
				$basic_pay = $this->input->post('basic_pay[]');
				$hra = $this->input->post('hra[]');
				$bonus = $this->input->post('bonus[]');
				//$deduction = $this->input->post('deduction_amount[]');
				$total_salary = array();
				for($i = 0;$i < count($gross_pay); $i++){
					
					$x = $gross_pay[$i]+$basic_pay[$i]+$hra[$i]+$bonus[$i];
					$total_salary[] = $x;
				}
		
				$datas = array(
					    'employee_name' => $this->input->post('salary_name[]'),
						'gross_salary' => $this->input->post('gross_pay[]'),
						'basic_salary' => $this->input->post('basic_pay[]'),
						'hra' => $this->input->post('hra[]'),
						'bonus' => $this->input->post('bonus[]'),
						'deduction_label' => $this->input->post('deduction_label[]'),
						'deduction_amount' => $this->input->post('deduction_amount[]'),
						'total_salary' => $total_salary,
						's_no' => $this->input->post('salary_id[]')
							
					);
				$data = array(
					'salary_month' => $this->input->post('salary_month'),
					'salary_year' => $this->input->post('salary_year')
				);
				$data["result"] = $this->Salary_model->insert_salary_detail($datas, $data);
				if(isset($data["result"]) && $data["result"] != "0"){
					//redirect('salary');
					$detail["sucess"]="Created sucessfully.";
					$detail['salary_details']=$this->Salary_model->salary_details();
					$detail['profile_data']=$this->Login_model->profile_data();
					$this->load->view('templates/header');
					$this->load->view('Salary/salary_add', $detail);
					$this->load->view('templates/footer');
				}else{
					$detail["result"] = $data["result"];
					$detail["error"]="Datas are not created.";
					$detail['profile_data']=$this->Login_model->profile_data();
					$detail['salary_details']=$this->Salary_model->salary_details();
					$this->load->view('templates/header');
					$this->load->view('Salary/salary_add', $detail);
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
			
		public function single($page)
		{
		 if ( ! file_exists(APPPATH.'views/Salary/single.php'))
			{
				show_404();
			}
			if($this->session->userdata('logged_in')){
				$slary_single = $page;
				$detail['salary_single']=$this->Salary_model->salary_single($slary_single);
				$detail['profile_data']=$this->Login_model->profile_data();
				if($detail){
				$this->load->view('templates/header');
				$this->load->view('Salary/single', $detail);
				$this->load->view('templates/footer');	
				}
			}else{
				$data['error'] = "Please login!";
				$this->load->view('templates/header');
				$this->load->view('Login/login', $data);
				$this->load->view('templates/footer');
			}
		}	
		public function salary_edit($id)
		{ 
		 if ( ! file_exists(APPPATH.'views/Salary/salary_edit.php'))
			{
					show_404();
			}
			if($this->session->userdata('logged_in')){
				$sal_edit = $id;
				$detail['salary_edit']=$this->Salary_model->salary_edit($sal_edit);
				$detail['emp_details']=$this->Login_model->employee_details();
				$detail['profile_data']=$this->Login_model->profile_data();	
				if($detail){
					$this->load->view('templates/header');
					$this->load->view('Salary/salary_edit', $detail);
					$this->load->view('templates/footer');	
				}else{
					$this->load->view('templates/header');
					$this->load->view('Salary/salary_add', $detail);
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
				
				
				$this->form_validation->set_rules('emp_name', 'Name', 'required');
				$this->form_validation->set_rules('salary_month', 'Month and Year', 'required|trim');
				$this->form_validation->set_rules('basic_salary', 'Basic Salary', 'required|trim');
				$this->form_validation->set_rules('hra', 'HRA', 'required|trim');
				$this->form_validation->set_rules('bonus', 'Bonus', 'required|trim');
				$this->form_validation->set_rules('deduction', 'Deduction', 'required|trim');
				$this->form_validation->set_rules('total_salary', 'Total Salary', 'required|trim');
								
				if ($this->form_validation->run() == FALSE)
                {
                    $detail["error"]="Please fill the all details.";
					//$detail['emp_details']=$this->Login_model->employee_details();
					$this->load->view('templates/header');
					$this->load->view('Salary/salary_edit', $detail);
					$this->load->view('templates/footer');
                }
                else
                {
				$emp_details = $this->input->post('emp_name');
				$emp_detail =  explode("-" ,$emp_details);
				$emp_name = $emp_detail[0];
				$emp_id = $emp_detail[1];
				$salary_name = $this->input->post('salary_name');
				$salary_month = $this->input->post('edited_month');
				//$salary_month1 = 
				//$salary_month2 = explode("-" ,$salary_month1);
				//$salary_month = $salary_month2[1]."-".$salary_month2[0]."-00";

				$data = array(
					'employee_name' => $emp_name,
					'month_year' => $this->input->post('salary_month'),
					'basic_salary' => $this->input->post('basic_salary'),
					'hra' => $this->input->post('hra'),
					'bonus' => $this->input->post('bonus'),
					'deduction' => $this->input->post('deduction'),
					'total_salary' => $this->input->post('total_salary'),
					's_no' => $emp_id	
				);
				$data["result"] = $this->Salary_model->update_salary_detail(array('salary_id' => $this->input->post('salary_id'), 'salary_name' => $salary_name, 'salary_month' => $salary_month), $data);
				if(isset($data["result"]) && $data["result"] == 1){
					//redirect('salary');
					$detail["sucess"]="Updated sucessfully.";
					$detail['salary_details']=$this->Salary_model->salary_details();
					$detail['profile_data']=$this->Login_model->profile_data();
					$this->load->view('templates/header');
					$this->load->view('Salary/salary', $detail);
					$this->load->view('templates/footer');
				}else{
					$detail["result"] = $data["result"];
					$detail["error"]="Fields are not updated.";
					$detail['profile_data']=$this->Login_model->profile_data();
					$detail['salary_details']=$this->Salary_model->salary_details();
					$this->load->view('templates/header');
					$this->load->view('Salary/salary', $detail);
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
			if ( ! file_exists(APPPATH.'views/Salary/salary_month.php'))
			{
				show_404();
			}
			if($this->session->userdata('logged_in')){
				
				$detail['salary_details']=$this->Salary_model->salary_year($year);
				$detail['emp_details']=$this->Login_model->employee_details();
				$detail['profile_data']=$this->Login_model->profile_data();
				$this->load->view('templates/header');
				$this->load->view('Salary/salary_month', $detail);
				$this->load->view('templates/footer');	
			}else{
				$data['error'] = "Please login!";
				$this->load->view('templates/header', $data);
				$this->load->view('Login/login');
				$this->load->view('templates/footer');
				}
		}
				
	}