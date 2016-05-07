<?php 
class Pullout_model extends CI_model{

	/* SELECT ACTIONS */
	function get_pullout(){
		$this->db->order_by("pullout_approved_date", "desc");
		$this->db->select('pullout_id, pullout_item, pullout_quantity,pullout_date, pullout_approved_date, pullout_status, pos_supplier.supplier_name, pos_item.item_name');
		$this->db->from('pos_pullout');
		$this->db->join('pos_supplier', 'pos_supplier.supplier_id = pos_pullout.pullout_supplier');
		$this->db->join('pos_item', 'pos_item.item_id = pos_pullout.pullout_item');
		$query = $this->db->get();

		return $query;
	}

	function get_pullout_supplier($supplier_id){ //request on supplier
		$this->db->order_by("pullout_approved_date", "desc");
		$this->db->select('pullout_id, pullout_item, pullout_quantity,pullout_date, pullout_approved_date, pullout_status, pos_supplier.supplier_name, pos_item.item_name');
		$this->db->from('pos_pullout');
		$this->db->where('pullout_supplier =', $supplier_id);
		$this->db->join('pos_supplier', 'pos_supplier.supplier_id = pos_pullout.pullout_supplier');
		$this->db->join('pos_item', 'pos_item.item_id = pos_pullout.pullout_item');
		$query = $this->db->get();

		return $query;

	}

	function get_pullout_item($pullout_id){
		$sql = "SELECT pullout_item, pullout_quantity FROM pos_pullout WHERE pullout_id='".$pullout_id."'" ;
		$query = $this->db->query($sql);
		return $query;
	}


	/* INSERT ACTIONS */

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


	/* UPDATE ACTIONS*/

	function approve_pullout($pullout_id){
		$current_date = date('Y-m-d');	
		$sql = "UPDATE pos_pullout SET pullout_status='1',pullout_approved_date='".$current_date."' WHERE pullout_id='".$pullout_id."'" ;
		$query = $this->db->query($sql);
		return $query;
	}	
}
?>