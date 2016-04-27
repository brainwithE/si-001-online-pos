<?php 
class Withdrawal_model extends CI_model{
	
	function add_withdrawal($data){
		$current_date = date('Y-m-d');
		$withdrawal_data = array(
			'withdrawal_id' => '',
			'withdrawal_amount' => $data['withdrawal_amount'],
			'withdrawal_name' => $data['withdrawal_name'],
			'withdrawal_date_acquired' => $data['withdrawal_date_acquired'],
			'withdrawal_date_input' => $current_date
		);
		$this->db->insert('overwatch_withdrawal', $withdrawal_data);
	}

	function get_withdrawal(){
		$this->db->order_by("withdrawal_date_acquired", "asc");
		$query = $this->db->get('overwatch_withdrawal');

		return $query;
	}

	function get_withdrawal_month(){
		$this->db->order_by("withdrawal_date_acquired", "asc");
		$this->db->where("month(withdrawal_date_acquired)", date('m'));
		$this->db->where("year(withdrawal_date_acquired)", date('Y'));
		$query = $this->db->get('overwatch_withdrawal');

		return $query;
	}

	function get_withdrawal_certmonth($date_start,$date_end){
		$this->db->order_by("withdrawal_date_acquired", "asc");
		$this->db->where('withdrawal_date_acquired >=', $date_start);
		$this->db->where('withdrawal_date_acquired <=', $date_end);
		$query = $this->db->get('overwatch_withdrawal');

		return $query;
	}
	
}
?>