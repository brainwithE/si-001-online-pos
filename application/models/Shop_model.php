<?php 
class shop_model extends CI_model{
	
	/*function edit_shop($data){
		$user_data = array(
			'email' => $data['email'],
			'password' => $data['password'],
			'fullname' => $data['fullname'],
			'signup_date' => date('Y-m-d')
		);
	
		$this->db->insert('users', $user_data);
	}*/
	
	function get_shop($user_id){
		$sql = "SELECT * FROM shop WHERE user_id =".$user_id;
		$query = $this->db->query($sql);		
		/*
		foreach($query->result_array() as $row){
			$fullname = $row['fullname'];
		}
		*/
		return $query;
	}

	function get_all_shops(){
		$query = $this->db->query("SELECT * FROM shop");

		return $query;
	}

	function get_indiv_shop($shop_id){
		$sql = "SELECT * FROM shop WHERE id =".$shop_id;
		$query = $this->db->query($sql);

		return $query;
	}

	function get_shop_items($shop_id){
		$sql = "SELECT * FROM product WHERE id =".$shop_id;
		$query = $this->db->query($sql);

		return $query;
	}
	
	/** LYZH **/
	
	
	function view_all_shops(){
		$this->db->select('*');
		$this->db->from('shop');
		$this->db->join('users', 'shop.user_id = users.User_ID');

		$query = $this->db->get();
	
		//$sql = "SELECT * FROM shop order by id asc";
		//$query = $this->db->query($sql);	
		return $query;
	}
	
	function edit_shop($user_id){
		//$sql = "UPDATE shop set name='".$shopname."', description='".$shopdesc."' where user_id=".$user_id;
		//$query = $this->db->query($sql);		
		//return $query;
		
		$name = $this->input->post('shop_name');
		$desc = $this->input->post('shop_desc');
		
		$data = array(				
			'name' => $name,
			'description' => $desc
		);
		
		$this->db->where('user_id', $user_id);
		$this->db->update('shop', $data);
		
		//$sql = "UPDATE shop set name='".$name."', description='".$desc."' where user_id=".$user_id;
		//$query = $this->db->query($sql);		
		
		
	}
	
	
	function get_shop_user($id){
		$sql = "SELECT user_id FROM shop WHERE id = ".$id;
		$query = $this->db->query($sql);	
		foreach($query->result_array() as $row){
			$user_id = $row['user_id'];
		}

		return $user_id;
	}
	
	/** END LYZH**/
	
}
?>