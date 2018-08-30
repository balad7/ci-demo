<?php
class Salary_model extends CI_Model {
	
	    var $table = 'salary';

        public function __construct()
        {
            $this->load->database();
        }
		  
	
	public function salary_details(){
		
		$this->db->select('salary_month, salary_year');
		$this->db->group_by('salary_year'); 
		$this->db->order_by('salary_year', 'desc'); 
		$query = $this->db->get('salary');
		return $query->result();
		
		//$query = $this->db->get("salary");
        //return $query->result();
	}
	public function insert_salary_detail($datas, $data) 
    {
		$sal_month = $data['salary_month'];
		$sal_year = $data['salary_year'];
		
		$this->db->select('*'); 
		$this->db->from('salary');
		$this->db->where('salary_month', $sal_month);
		$this->db->where('salary_year', $sal_year);
		$query = $this->db->get();
		$result = $query->num_rows();
		//echo $result;
		//print_r($datas);
		//die();
		if($result == 0){	
			for($i = 0; $i < count($datas["employee_name"]); $i++){
				$batch[] = array( 
				 "employee_name" =>$datas["employee_name"][$i],
				 "salary_month" => $sal_month,
				 "salary_year" => $sal_year,
				 "gross_salary" => $datas["gross_salary"][$i],
				 "basic_salary" => $datas["basic_salary"][$i],
				 "hra" => $datas["hra"][$i],
				 "bonus" => $datas["bonus"][$i],
				 "deduction_label" => $datas["deduction_label"][$i],
				 "deduction_amount" => $datas["deduction_amount"][$i],
				 "total_salary" => $datas["total_salary"][$i],
				 "s_no" => $datas["s_no"][$i] );
			}
			return $this->db->insert_batch('salary', $batch);
		}elseif($result != 0){
			return $data["error"] = "Sorry \"Employee Name\" and \"month & year\" are already exists!"; 
			}
			 
		//return $this->db->insert('salary', $data);  
    }
	public function salary_single($slary_single){
		
			$id = $slary_single;
			$this->db->select('*'); 
            $this->db->from('salary');
            $this->db->where('salary_id', $id);
            $query = $this->db->get();
            return  $query->result();
	}
	public function salary_edit($sal_edit){
		
			$id = $sal_edit;
			$this->db->select('*'); 
            $this->db->from('salary');
            $this->db->where('salary_id', $id);
            $query = $this->db->get();
            return  $query->result();
			
	}
	public function update_salary_detail($where, $data) 
    { 
		$salary_id_1 = $where['salary_id'];
		$salary_name = $where['salary_name'];
		$salary_month = $where['salary_month'];
		$change_name = $data['employee_name'];
		$change_month = $data['month_year'];
		$salary_id = array('salary_id' => $salary_id_1);
		
		if(isset($salary_name) && isset($change_name) && isset($salary_month) && isset($change_month)){
			if($change_name == $salary_name && $salary_month == $change_month){
				$this->db->update($this->table, $data, $salary_id);
				return $this->db->affected_rows(); 
			}elseif($salary_name != $change_name && $salary_month != $change_month || $salary_name != $change_name || $salary_month != $change_month){
				 return $data["error"] = "Sorry you can't change \"Employee Name\" or \"month & year\" !"; 
			}
		}
    }
	public function salary_year($year){
		$this->db->select('salary_month, salary_year');
		$this->db->group_by('salary_month'); 
		$this->db->where('salary_year', $year);  
		$query = $this->db->get('salary');
		return $query->result();
		}
	
}
