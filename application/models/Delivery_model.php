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
	/*NOTE: STATIC ADD DELIVERY TRANSACTION BELOW*/
	function add_delivery_transaction($supplier,$qty){
		$current_date = date('Y-m-d');	
		
		$dt_data = array(
			'dt_id' => '',
			'dt_supplier' => $supplier,			
			'dt_total_quantity' => $qty,
			'dt_date' => $current_date,
			'dt_approve_date' => '',			
			'dt_status' => '0'	
		);

		$this->db->insert('pos_delivery_transaction', $dt_data);
		$last_id = $this->db->insert_id();

		return $last_id;
		/*mysql_query('INSERT INTO pos_delivery_transaction (dt_id, dt_supplier, dt_total_quantity, dt_date, dt_approve_date, dt_status) VALUES '.implode(',', $sql));*/
		/*$this->db->insert('pos_delivery_transaction', $dt_data);*/
		
	}

	function add_delivery_items($data){

		$sql = array(); 
		$ctr = 0;
		foreach( $data as $row ) {
			$this->db->insert('pos_delivery', $data[$ctr]);
		    $ctr++;
		    /*$sql[] = '('.$row['dt_id'].', '.$row['dt_supplier'].', '.$row['dt_total_quantity'].', '.$row['dt_date'].', '.$row['dt_approve_date'].', '.$row['dt_status'].')';*/
		}

		/*$sql = array(); 
		foreach( $data as $row ) {
		    $sql[] = '("'.mysql_real_escape_string($row['text']).'", '.$row['category_id'].')';
		}

		mysql_query('INSERT INTO table (text, category) VALUES '.implode(',', $sql));*/
		/*	$data = array(
			'delivery_id' => '',
			'delivery_item' => $data['del_item_code'],
			'delivery_quantity' => $data['del_item_quantity'],
			'delivery_dt' => $data['dt_id']
			
		);
		$this->db->insert('pos_delivery', $data);	*/	
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