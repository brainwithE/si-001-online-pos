<?php 
class Expense_model extends CI_model{
	
	function add_expense($data){
		$current_date = date('Y-m-d');
		$expense_data = array(
			'expense_id' => '',
			'expense_amount' => $data['expense_amount'],
			'expense_name' => $data['expense_name'],
			'expense_category' => $data['expense_category'],
			'expense_date_acquired' => $data['expense_date_acquired'],
			'expense_date_input' => $current_date
		);
		$this->db->insert('overwatch_expense', $expense_data);
	}

	function get_expense(){
		$this->db->order_by("expense_date_acquired", "asc");
		$query = $this->db->get('overwatch_expense');

		return $query;
	}

	function get_expense_month(){
		$this->db->order_by("expense_date_acquired", "asc");
		$this->db->where("month(expense_date_acquired)", date('m'));  
		$this->db->where("year(expense_date_acquired)", date('Y'));  
		$query = $this->db->get('overwatch_expense');

		return $query;
	}

	function get_expense_certmonth($date_start,$date_end){
		$this->db->order_by("expense_date_acquired", "asc");
		$this->db->where('expense_date_acquired >=', $date_start);
		$this->db->where('expense_date_acquired <=', $date_end);
		$query = $this->db->get('overwatch_expense');

		return $query;
	}
}
?>