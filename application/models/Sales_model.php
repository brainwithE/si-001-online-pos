<?php 
class Sales_model extends CI_model{

	/* SELECT ACTION */
	function get_sales(){
		
		$query = $this->db->get('pos_sales');
		return $query;
	}

	function get_daily_sales(){
		$today = date('Y-m-d');
		$sql = "SELECT * FROM pos_sales WHERE sales_date='".$today."'" ;
		$query = $this->db->query($sql);		
		
	    return $query;
	}

	function get_supplier_sales($supplier_id){
			
		$sql = "SELECT * FROM pos_sales WHERE sales_supplier='".$supplier_id."'" ;
		$query = $this->db->query($sql);		
		
	    return $query;
	}

	function get_sales_certmonth($date_start,$date_end){
		$this->db->order_by("sales_date", "desc");
		$this->db->where('sales_date >=', $date_start);
		$this->db->where('sales_date <=', $date_end);
		$query = $this->db->get('pos_sales');

		return $query;
	}


	/* INSERT ACTION */
	function add_sales_transaction($data){
		$current_date = date('Y-m-d');	
		
		$st_data = array(
			'sales_id' => '',
			'sales_item' => $data['sales_item_code'],			
			'sales_quantity' => $data['sales_item_quantity'],
			'sales_total' => $data['sales_total_price'],
			'sales_discount' => '0',
			'sales_date' => $current_date,
			'sales_supplier' => '201605000000002',
			'sales_st' => '0'

			
		);
		$this->db->insert('pos_sales', $st_data);
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