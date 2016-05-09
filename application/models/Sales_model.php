<?php 
class Sales_model extends CI_model{

	/* SELECT ACTION */
	function get_sales(){		
		$this->db->order_by("sales_id", "desc");
		$this->db->select('sales_id, pos_item.item_name, sales_quantity,sales_total, sales_discount, sales_date, sales_supplier, sales_st');
		$this->db->from('pos_sales');
		$this->db->join('pos_item', 'pos_item.item_id = pos_sales.sales_item');

		$query = $this->db->get();

		return $query;
	}

	function get_daily_sales(){
		$today = date('Y-m-d');	

	    $this->db->order_by("sales_id", "desc");
		$this->db->select('sales_id, pos_item.item_name, sales_quantity,sales_total, sales_discount, sales_date, sales_supplier, sales_st');
		$this->db->from('pos_sales');
		$this->db->where('sales_date =', $today);
		$this->db->join('pos_item', 'pos_item.item_id = pos_sales.sales_item');

		$query = $this->db->get();

		return $query;
	}

	function get_supplier_sales($supplier_id){			
		$this->db->order_by("sales_id", "desc");
		$this->db->select('sales_id, pos_item.item_name, sales_quantity,sales_total, sales_discount, sales_date, sales_supplier, sales_st');
		$this->db->from('pos_sales');		
		$this->db->where('sales_supplier =', $supplier_id);		
		$this->db->join('pos_item', 'pos_item.item_id = pos_sales.sales_item');

		$query = $this->db->get();

	    return $query;
	}

	function get_sales_certmonth($date_start,$date_end){
		$this->db->order_by("sales_date", "desc");
		$this->db->select('sales_id, pos_item.item_name, sales_quantity,sales_total, sales_discount, sales_date, sales_supplier, sales_st');
		$this->db->where('sales_date >=', $date_start);
		$this->db->where('sales_date <=', $date_end);
		$this->db->from('pos_sales');
		$this->db->join('pos_item', 'pos_item.item_id = pos_sales.sales_item');
		
		$query = $this->db->get();

		return $query;
	}
	
	function add_sales_transaction($supplier,$qty){
		$current_date = date('Y-m-d');	
		
		$st_data = array(
			'st_id' => '',
			'st_total' => '100',	
			'st_date' => $current_date,		
			'st_cashier' => '2010019576'
		);

		$this->db->insert('pos_sales_transaction', $st_data);
		$last_id = $this->db->insert_id();

		return $last_id;
	}

	function add_sales_items($data){
		$sql = array(); 
		$ctr = 0;
		foreach( $data as $row ) {
			$this->db->insert('pos_sales', $data[$ctr]);
		    $ctr++;
		}

		return true;
	}

}
?>