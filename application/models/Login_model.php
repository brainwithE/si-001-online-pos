<?php 
class Login_model extends CI_model{
	
	function check_login(){
		
		$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
		$query = $this->db->query($sql, array($this->input->post('email'), md5($this->input->post('password'))));		

		if($query->num_rows() > 0 ){
			return 1;
		}
		else{
			return 0;
		}
	}

	function get_id(){
		$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
		$query = $this->db->query($sql, array($this->input->post('email'), md5($this->input->post('password'))));		

			foreach($query->result_array() as $row){
				$id = $row['User_ID'];
			}
		return $id;
	}

	function get_username(){
		$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
		$query = $this->db->query($sql, array($this->input->post('email'), md5($this->input->post('password'))));		

			foreach($query->result_array() as $row){
				$fullname = $row['fullname'];
			}
		return $fullname;
	}
}
?>