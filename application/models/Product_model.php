<?php 
class Product_model extends CI_model{
	
	function add_product($data){
		$product_data = array(
			'name' => $data['name'],
			'price' => $data['price'],
			'quantity' => $data['qty'],
			'desc' => $data['desc'],
			'shop_id' => $data['shop_id']
		);
		$this->db->insert('product', $product_data);

		$insert_id = $this->db->insert_id();

   		return  $insert_id;
	}

	function add_pcat($data, $product_id){
		foreach($data as $row)
		{
			$pcat_data = array(
			'pcat_cat' => $row,
			'pcat_prod' => $product_id
			);
			$this->db->insert('pcat_relat', $pcat_data);			
		}		
	}

	function get_product($id){
		$sql = "SELECT * FROM product WHERE id = ".$id;
		$query = $this->db->query($sql);	

		return $query;
	}

	function get_products($shop_id){
		$sql = "SELECT * FROM product WHERE shop_id = ".$shop_id;
		$query = $this->db->query($sql);	

		return $query;
	}

	function get_all_products(){
		$sql = "SELECT * FROM product";
		$query = $this->db->query($sql);

		return $query;		
	}

	function get_category()
	{
		$sql = "SELECT * FROM category";
		$query = $this->db->query($sql);

		return $query;
	}
	
	/** LYZH **/
	
	function must_see_products(){
		$sql = "SELECT * FROM product order by id desc limit 3";
		$query = $this->db->query($sql);	
		return $query;
	}
	
	function view_all_products(){
		$sql = "SELECT * FROM product order by id desc";
		$query = $this->db->query($sql);	
		return $query;
	}
	
	function update_shop_products($prod_id){
			
		$name = $this->input->post('product_name');
		$desc = $this->input->post('desc');
		$qty = $this->input->post('qty');
		$price = $this->input->post('price');
		
		$data = array(				
			'name' => $name,
			'desc' => $desc,
			'quantity' => $qty,
			'price' => $price
		);
		
		$this->db->where('id', $prod_id);
		$this->db->update('product', $data);
	}
	
	function view_shop_products($shop_id, $prod_id) {
		$sql = "SELECT * FROM product WHERE shop_id = ".$shop_id." and id =".$prod_id;
		$query = $this->db->query($sql);	

		return $query;
	}
	
	function get_shop_items($shop_id, $prod_id) {
		$sql = "SELECT * FROM product WHERE shop_id = ".$shop_id." and id =".$prod_id;
		$query = $this->db->query($sql);	

		return $query;
	}
	
	function get_search($match){
		$sql = "select *, '1' as table_type  from product where name like '%" . $match . "%' union all
					select *, '2' as table_type from shop where name like '%" . $match . "%' ";

		return $this->db->query($sql);	
	}
	
	
	
	/** END LYZH **/
	
}
?>