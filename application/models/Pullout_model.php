<?php 
class Pullout_model extends CI_model{

	/* SELECT ACTIONS */
	function get_pullout(){
		$this->db->order_by("pullout_approved_date", "desc");
		$query = $this->db->get('pos_pullout');
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

	//place functions here
	
	
}
?>