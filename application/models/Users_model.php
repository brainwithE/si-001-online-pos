<?php 
class users_model extends CI_model{
	
	function add_user($data){
		$user_data = array(
			'email' => $data['email'],
			'password' => $data['password'],
			'fullname' => $data['fullname'],
			'signup_date' => date('Y-m-d')
		);
	
		$this->db->insert('users', $user_data);

		$insert_id = $this->db->insert_id();
	
		$store_data = array(
			'name' => 'unnamed store',
			'description' => 'empty',
			'location' => '',
			'contact' => '',
			'user_id' => $insert_id
		);
	
		$this->db->insert('shop', $store_data);
	}
	
	function add_user_fb($data){
		$user_data = array(
			'email' => $data['email'],
			'fullname' => $data['fullname'],
			'signup_date' => date('Y-m-d'),
			'fbid' => $_SESSION['fbid']
		);
	
		$this->db->insert('users', $user_data);
	}
	
	function user_info(){
		$sql = "SELECT * FROM users WHERE email = ?";
		
		$q = $this->db->query($sql, array($this->session->userdata('email')));
		
		if($q->num_rows() >0){
			foreach($q->result() as $row){
				$data[] = $row;
			}
			
			return $data;
		}
	}
	
	function user_check(){
		$sql = "SELECT * FROM users WHERE fbid = ?";
		$query = $this->db->query($sql, array($_SESSION['fbid']));		

		if($query->num_rows() > 0 ){
			return 1;
		}
		else{
			return 0;
		}
	}

	function get_shop($id){
		$sql = "SELECT * FROM shop WHERE user_id = ".$id;
		$query = $this->db->query($sql);	

		foreach($query->result_array() as $row){
			$shop_id = $row['id'];
		}

		return $shop_id;
	}
	
}
?>