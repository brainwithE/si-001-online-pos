<?php 
class Delivery_model extends CI_model{

	/* SELECT ACTIONS */
	function get_delivery_report(){		
		/*$this->db->order_by("dt_id", "desc");
		$this->db->select('dt_id, dt_total_quantity,dt_date, dt_approve_date, dt_status, pos_supplier.supplier_name');
		$this->db->from('pos_delivery_transaction');
		$this->db->join('pos_supplier', 'pos_supplier.supplier_id = pos_delivery_transaction.dt_supplier');

		$query = $this->db->get();
*/

		$this->db->order_by("dt_id", "desc");
		$this->db->select('*');
		$this->db->from('pos_delivery_transaction');
		//$this->db->join('pos_supplier', 'pos_supplier.supplier_id = pos_delivery_transaction.dt_supplier');

		$query = $this->db->get();

		return $query;
	}

	function get_delivery_report_supplier($supplier_id){		
		$this->db->order_by("dt_id", "desc");
		$this->db->select('dt_id, dt_total_quantity,dt_date, dt_approve_date, dt_status, pos_supplier.supplier_name');
		$this->db->from('pos_delivery_transaction');
		$this->db->where('dt_supplier', $supplier_id);
		$this->db->join('pos_supplier', 'pos_supplier.supplier_id = pos_delivery_transaction.dt_supplier');

		$query = $this->db->get();

		return $query;
	}

	function get_specific_delivery($transaction_id){
		
		$this->db->select('*');
		$this->db->from('pos_delivery');
		$this->db->where('delivery_dt', $transaction_id);
		$this->db->join('pos_item', 'pos_item.item_id = pos_delivery.delivery_item');

		$query = $this->db->get();

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



	/* INSERT ACTIONS */

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


	/* UPDATE ACTIONS */

	function approve_pullout($dt_id){
		$current_date = date('Y-m-d');	
		$sql = "UPDATE pos_delivery_transaction SET dt_status='1', dt_approve_date='".$current_date."' WHERE dt_id='".$dt_id."'" ;
		$query = $this->db->query($sql);
		return $query;
	}	
}
?>