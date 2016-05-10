<?php 
class Items_model extends CI_model{

	/* SELECT ACTION*/
	function get_items(){		
		$this->db->order_by("item_id", "desc");
		$this->db->select('item_id, item_name, item_category,item_price, item_stock, pos_supplier.supplier_name');
		$this->db->from('pos_item');
		$this->db->join('pos_supplier', 'pos_supplier.supplier_id = pos_item.item_supplier');
		$query = $this->db->get();

		return $query;
	}

	function get_specific_item($item_id){		
		$this->db->order_by("item_id", "desc");
		$this->db->select('item_id, item_name, item_category,item_price, item_stock, pos_supplier.supplier_name');
		$this->db->from('pos_item');
		$this->db->where('item_id =', $item_id);
		$this->db->join('pos_supplier', 'pos_supplier.supplier_id = pos_item.item_supplier');
		$query = $this->db->get();

		return $query;
	}

	function get_supplier_inventory($supplier_id){
		$this->db->order_by("item_id", "desc");
		$this->db->select('item_id, item_name, item_category,item_price, item_stock, item_supplier');
		$this->db->from('pos_item');
		$this->db->where('item_supplier =', $supplier_id);
		$query = $this->db->get();

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

	function get_item_name($item_code) {
		$sql = "SELECT item_name FROM pos_item WHERE item_id='".$item_code."'" ;
		$query = $this->db->query($sql);		
		if($query->num_rows() == 1) {
	        return $query->row();	        
	    }
	    return false;
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
		$sql = "UPDATE pos_item SET item_stock='".$stock."' WHERE item_id='".$item_code."'" ;
		$this->db->query($sql);	
	}	

	function edit_item($data){
		$item_data = array(
			'item_name' => $data['item_name'],
			'item_category' => $data['item_category'],
			'item_price' => $data['item_price'],
		);

		$item_id=$data['item_id'];

		$this->db->where('item_id', $item_id);
		$this->db->update('pos_item', $data); 
	}
}
?>