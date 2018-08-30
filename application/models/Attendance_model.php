<?php
class Attendance_model extends CI_Model {
	
	    var $table = 'attendance';

        public function __construct()
        {
            $this->load->database();
        }
		  
	
	public function attendance_details(){
		$this->db->select('attendance_month, attendance_year');
		$this->db->group_by('attendance_year'); 
		$this->db->order_by('attendance_year', 'desc'); 
		$query = $this->db->get('attendance');
		return $query->result();
	}
	public function attendance_user_details(){
		$this->db->select('employee_name_id');
		$this->db->group_by('employee_name_id'); 
		//$this->db->order_by('attendance_year', 'desc'); 
		$query = $this->db->get('attendance');
		return $query->result();
	}
	public function insert_atten_detail($datas, $data) 
    { 
	
	$month = $data['attendance_month'];
	$atten_year = $data['attendance_year'];
	$working_days = $data['working_days'];
	
	    $this->db->select('*'); 
		$this->db->from('attendance');
		$this->db->where('attendance_month', $month);
		$this->db->where('attendance_year', $atten_year);
		$query = $this->db->get();
		$result = $query->num_rows();
		if($result == 0){	
			for($i = 0;$i < count($datas["employee_name_id"]); $i++){
				$batch[] = array( "employee_name_id" =>$datas["employee_name_id"][$i],
				 "attendance_month" => $month,
				 "attendance_year" => $atten_year,
				 "working_days" => $working_days,
				 "cl" => $datas["cl"][$i],
				 "unpaid_leaves" => $datas["unpaid_leaves"][$i],
				 "permission" => $datas["permission"][$i],
				 "s_no" => $datas["s_no"][$i] );
			}
			return $this->db->insert_batch('attendance', $batch);

		}elseif($result != 0){
			 return $data["error"] = "Sorry you entered \"month & year\" are already exists!"; 
			}
		
    }
	public function attendance_single($single_year, $single_month){
		$year_id = $single_year;
		$month_id = $single_month;
		$this->db->select('*');
		$this->db->from('attendance');
		$this->db->where('attendance_month', $month_id);
		$this->db->where('attendance_year', $year_id);
	    $query = $this->db->get();  
     	return $query->result();
	}
	public function attendance_edit($edit_year, $edit_month){
		
		$edit_year = $edit_year;
		$edit_month = $edit_month;
		$this->db->select('*');
		$this->db->from('attendance');
		$this->db->where('attendance_month', $edit_month);
		$this->db->where('attendance_year', $edit_year);
	    $query = $this->db->get();  
     	return $query->result();
			
	}
	public function update_atten_detail($where, $datas, $data) 
    { 
		$atten_month = $where['actual_month'];
		$atten_year = $where['actual_year'];
		$editable_month = $data['attendance_month'];
	    $editable_year = $data['attendance_year'];
		$editable_working_days = $data['working_days'];
		//if(isset($atten_month) && isset($editable_month)){
			//if($atten_month == $editable_month && $atten_year == $editable_year){
				//$this->db->update($this->table, $data, $attendance_id);
				for($i = 0;$i < count($datas["employee_name_id"]); $i++){
				$batched[] = array( "attendance_id" =>$datas["attendance_id"][$i],
				"employee_name_id" =>$datas["employee_name_id"][$i],
				 "attendance_month" => $editable_month,
				 "attendance_year" => $editable_year,
				 "working_days" => $editable_working_days,
				 "cl" => $datas["cl"][$i],
				 "unpaid_leaves" => $datas["unpaid_leaves"][$i],
				 "permission" => $datas["permission"][$i],
				 "s_no" => $datas["s_no"][$i] );
			}
			return $this->db->update_batch('attendance', $batched, 'attendance_id');
			//}elseif($atten_month != $editable_month && $atten_year != $editable_year || $atten_month != $editable_month || $atten_year != $editable_year){
						//$rdata["editing_month"] = $atten_month;
						//$rdata["editing_year"] = $atten_year;
						//return $data["error"] = "Sorry you can't change the \"month & year\" !"; 
						//return $rdata;
			//}
		//}
    }
	
	public function attendance_year($year){
		$this->db->select('attendance_month, attendance_year');
		$this->db->group_by('attendance_month'); 
		$this->db->where('attendance_year', $year);  
		$query = $this->db->get('attendance');
		return $query->result();
		}
	public function atten_search($data){
		$min_month = $data['f_month'];
		$min_year = $data['f_year'];
		$max_month = $data['t_month'];
		$max_year = $data['t_year'];
		$employee_name = $data['sch_names'];
		
		$this->db->select('*');
		
		//$this->db->where('attendance_month >=', $min_month);
		//$this->db->where('attendance_month <=', $max_month);
		$this->db->where('attendance_year >=', $min_year);
		$this->db->where('attendance_year <=', $max_year);
		if( $employee_name != "all"){
			$this->db->where('employee_name_id', $employee_name);
		}
		$this->db->order_by('attendance_year, attendance_month', 'desc'); 
		$query = $this->db->get('attendance');
		//return $query->result(); 
		return $query->result_array();
		
		}
}
