<?php 
class Sales_model extends CI_model{

	/* SELECT ACTION */
	function get_sales(){
		$this->db->order_by("sales_id", "desc");
		$query = $this->db->get('pos_sales');
		return $query;
	}

	function get_daily_sales(){
		$today = date('Y-m-d');	

		$this->db->order_by("sales_id", "desc");
		$this->db->where('sales_date =', $today);		
		$query = $this->db->get('pos_sales');	
		
	    return $query;
	}

	function get_supplier_sales($supplier_id){			
		$this->db->order_by("sales_id", "desc");
		$this->db->where('sales_supplier =', $supplier_id);		
		$query = $this->db->get('pos_sales');

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
	/*function add_sales_transaction($data){
		$current_date = date('Y-m-d');	
		
		$st_data = array(
			'sales_id' => '',
			'sales_item' => $data['sales_item_code'],			
			'sales_quantity' => $data['sales_item_quantity'],
			'sales_total' => $data['sales_total_price'],
			'sales_discount' => '0',
			'sales_date' => $current_date,
			'sales_supplier' => $data['sales_supplier'],
			'sales_st' => '0'

			
		);
		$this->db->insert('pos_sales', $st_data);
	}*/

	function add_sales_transaction($supplier,$qty){
		$current_date = date('Y-m-d');	
		
		$dt_data = array(
			'dt_id' => '',
			'dt_supplier' => '100',	
			'dt_date' => $current_date,		
			'dt_total_quantity' => '2010019576',
		);

		$this->db->insert('pos_sales_transaction', $dt_data);
		$last_id = $this->db->insert_id();

		return $last_id;
	}

	function add_sales_items($data){
		$sql = array(); 
		$ctr = 0;
		foreach( $data as $row ) {
			$this->db->insert('pos_delivery', $data[$ctr]);
		    $ctr++;
		}
	}
	
}
?>