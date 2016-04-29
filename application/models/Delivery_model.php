<?php 
class Delivery_model extends CI_model{


	function get_delivery_report(){
		
		$query = $this->db->get('pos_delivery_transaction');
		return $query;
	}

	function get_supplier_name($supplier_id){
		$sql = "SELECT supplier_name FROM pos_supplier WHERE supplier_id='".$supplier_id."'" ;
		$query = $this->db->query($sql);		
		if($query->num_rows() == 1) {
	        return $query->row();	        
	    }
	    return false;
	}

	//function add_delivery_transaction($data){
	function add_delivery_transaction(){
		$current_date = date('Y-m-d');	
		
		$dt_data = array(
			'dt_id' => '',
			'dt_supplier' => '201605000000002',			
			'dt_total_quantity' => '0',
			'dt_date' => $current_date,
			'dt_approve_date' => $current_date,			
			'dt_status' => '0'

			
		);
		$this->db->insert('pos_delivery_transaction', $dt_data);
		
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