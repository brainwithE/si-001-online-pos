<?php 
class Pullout_model extends CI_model{


	function get_pullout(){
		
		$query = $this->db->get('pos_pullout');
		return $query;
	}

	function add_pullout_item($data){
		$current_date = date('Y-m-d');	
		
		$po_data = array(
			'pullout_id' => '',
			'pullout_item' => $data['pullout_item_code'],			
			'pullout_quantity' => $data['pullout_item_quantity'],
			'pullout_supplier' => $data['pullout_supplier'],
			'pullout_date' => $current_date,
			'pullout_approved_date' => $current_date,
			'pullout_status' => '0',
			
			
		);
		$this->db->insert('pos_pullout', $po_data);
	}




	/*
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
	}*/
	
	
}
?>