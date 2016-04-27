<?php 
class Cart_Model extends CI_model{

	function retrieve_products(){
		$query = $this->db->get('products');
		return $query->result_array();
	}

	function validate_update_cart(){
		$total = $this->cart->total_items();

		$item = $this->input->post('rowid');
		$qty = $this->input->post('qty');

		for($i=0; $i<$total; $i++){
			$data = array(
				'rowid' => $item[$i],
				'qty' => $qty[$i]
			);

			$this->cart->update($data);
		}
	}

	function validate_add_cart_item(){
		$id = $this->input->post('product_id');
		$qty = $this->input->post('quantity');
		/*?><script>alert("ID"+<?php echo $id; ?>);</script><?php*/
		$this->db->where('id', $id);
		$query = $this->db->get('product',1);
		/*?><script>alert("ID"+<?php echo $query->num_rows(); ?>);</script><?php*/
		if($query->num_rows() > 0){

			foreach($query->result() as $row){
				$data = array(
					'id' => $id,
					'qty' => $qty,
					'price' => $row->price,
					'name' => $row->name,
					'product_code' => $row->product_code,
					'product_desc' => $row->product_desc
				);

				$this->cart->insert($data);
			
				return TRUE;
			}

		}
		else{
			return FALSE;
		}
	}

	function getProduct($code){
		
		$sql = "SELECT product_name, product_desc, price FROM products WHERE product_code='$code' LIMIT 1";
		$results = $this->db->query($sql);

		return $results->result_array();
	}
}
?>