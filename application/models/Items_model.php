<?php 
class Items_model extends CI_model{

	/* SELECT ACTION*/
	function get_items(){
		$this->db->order_by("item_id", "desc");
		$query = $this->db->get('pos_item');
		return $query;
	}

	function get_supplier_inventory($supplier_id){
		$this->db->order_by("item_id", "desc");
		$this->db->where('item_supplier =', $supplier_id);
		$query = $this->db->get('pos_item');
		return $query;
	}

	function get_item_price($item_code) {
		$sql = "SELECT item_price FROM pos_item WHERE item_id='".$item_code."'" ;
		$query = $this->db->query($sql);		
		if($query->num_rows() == 1) {
	        return $query->row();	        
	    }
	    return false;
	}

	function get_item_supplier($item_code){
		$sql = "SELECT item_supplier FROM pos_item WHERE item_id='".$item_code."'" ;
		$query = $this->db->query($sql);		
		if($query->num_rows() == 1) {
	        return $query->row();	        
	    }
	    return false;
	}

	function get_item_stock($item_code){
		$sql = "SELECT item_stock FROM pos_item WHERE item_id='".$item_code."'" ;
		$query = $this->db->query($sql);		
		if($query->num_rows() == 1) {
	        return $query->row();	        
	    }
	    return false;
	}
	
	function item_validation($item_code){
		$sql = "SELECT * FROM pos_item WHERE item_id='".$item_code."'" ;
		$query = $this->db->query($sql);		
		if($query->num_rows() == 1) {
	        return true;
	    } else {
	    	return false;
	    }
	}



	/* INSERT ACTION */
	function add_items($data) {
		$item_data = array(
			'item_id' => '',
			'item_name' => $data['item_name'],
			'item_category' => $data['item_category'],
			'item_price' => $data['item_price'],
			'item_stock' => '0',
			'item_supplier' => $data['item_supplier']
		);
		$this->db->insert('pos_item', $item_data);
	}


	/* UPDATE ACTION */

	function update_stock($item_code, $stock) {
		/*$this->db->update('pos_item', "item_stock=".$stock, "item_id =".$item_code);*/
		$sql = "UPDATE pos_item SET item_stock='".$stock."' WHERE item_id='".$item_code."'" ;
		$this->db->query($sql);	
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