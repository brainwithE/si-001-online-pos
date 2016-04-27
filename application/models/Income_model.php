<?php 
class Income_model extends CI_model{
	
	function add_income($data){
		$current_date = date('Y-m-d');
		$income_data = array(
			'income_id' => '',
			'income_amount' => $data['income_amount'],
			'income_name' => $data['income_name'],
			'income_date_acquired' => $data['income_date_acquired'],
			'income_date_input' => $current_date
		);
		$this->db->insert('overwatch_income', $income_data);
	}

	function get_income(){
		$this->db->order_by("income_date_acquired", "asc");
		$query = $this->db->get('overwatch_income');

		return $query;
	}
	
	function get_income_month(){
		$this->db->order_by("income_date_acquired", "asc");
		$this->db->where("month(income_date_acquired)", date('m')); 
		$this->db->where("year(income_date_acquired)", date('Y'));  
		$query = $this->db->get('overwatch_income');

		return $query;
	}

	function get_income_certmonth($date_start,$date_end){
		$this->db->order_by("income_date_acquired", "asc");
		$this->db->where('income_date_acquired >=', $date_start);
		$this->db->where('income_date_acquired <=', $date_end);
		$query = $this->db->get('overwatch_income');

		return $query;
	}
}
?>