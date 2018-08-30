<?php
class Login_model extends CI_Model {
	
	    var $table = 'employee';

        public function __construct()
        {
            $this->load->database();
        }
	
		public function hm_login()  
		  {   
			 $query1 = $this->db->get('user');  
			 return $query1->result_array(); 
		  }  
		  
		public function validate($data){
			if(isset($data)){
				$username = $data['username'];
				$password = md5($data['password']);
			}
			
			$this->db->select('*'); 
            $this->db->from('user');
            $this->db->where('username', $username);
            $query = $this->db->get();
            $result = $query->result_array();
			if(empty($result)){
				return $data["error"] = "Username not exists!";
			}else{
				 //$username =  $result[0]["username"];
				 $this->db->select('*'); 
					$this->db->from('user');
					//$this->db->where('username', $username);
					$this->db->where('password', $password);
					$query1 = $this->db->get();
					$result1 = $query1->result_array();
					if(empty($result1)){
						return $data["error"] = "Password not exists!";
					}else{
						$this->db->select('*'); 
						$this->db->from('user');
						$this->db->where('username', $username);
						$this->db->where('password', $password);
						$query2 = $this->db->get();
						return $query2->result_array();
						}
			}
			
			
    }
	
	public function employee_details(){
		
		$query = $this->db->get("employee");
        return $query->result();
	}
	
	public function insert_emp($data) 
    { 
		return $this->db->insert('employee', $data);  
    }
	
	public function employee_single($emp_single){
		if(isset($emp_single)){
			$id = $emp_single;
			$this->db->select('*'); 
            $this->db->from('employee');
            $this->db->where('s_no', $id);
            $query = $this->db->get();
            return  $query->result();
			
			}
	}
	
	public function employee_edit($emp_edit){
		if(isset($emp_edit)){
			$id = $emp_edit;
			$this->db->select('*'); 
            $this->db->from('employee');
            $this->db->where('s_no', $id);
			//$this->db->where('hm_password', $password);
            $query = $this->db->get();
            return  $query->result();
			
			}
	}
	
	public function update_employee($where, $data) 
    {  
		//print_r( $data);
		//die();
		//$where_emp = $where['emp_no'];
		//$emp_no = $data['employee_number'];
		$where_s_no = $where['s_no'];
		$s_no = array('s_no' => $where_s_no);
	
			
			$this->db->update($this->table, $data, $s_no);
			return $this->db->affected_rows();  
		
    }
	
	public function delete_by_id($id)
	{
		return $this->db->delete('employee', array('s_no' => $id));
	}
	public function forgot_validate($data){
			$useremail = $data;
			$this->db->select('*'); 
            $this->db->from('user');
            $this->db->where('useremail', $useremail);
            $query = $this->db->get();
            $result = $query->row_array();
            return $result;
    }
	 public function sendpassword($data, $newpass)
	{
		$email['useremail'] = $data['useremail'];
		$this->db->update('user', $newpass, $email);
		return $this->db->affected_rows();
			
	}
	public function profile_data(){
		
		$query = $this->db->get("user");
        return $query->result();
	}
	public function reset_validate($password){
			$new_password = $password;
			$this->db->select('*'); 
            $this->db->from('user');
            $this->db->where('password', $new_password);
            $query = $this->db->get();
            $result = $query->row_array();
            return $result;
    }
	public function update_password($where, $data){
			//$s_no['s_no'] = $s_no;
			//$password['password'] = ;
			//$passwords = array('password' => $password);
			//$this->db->update($this->table, $data, $s_no);
			$this->db->update('user', $data, $where);
			return $this->db->affected_rows();
    }
	public function update_profile($where, $data, $old_photo){
			
			$this->db->update('user', $data, $where);
			if(isset($old_photo) && $old_photo != ""){
				unlink("uploads/".$old_photo);
			}
			return $this->db->affected_rows();
    }

}