<?php 
class Category_model extends CI_model{

	function get_categories(){
		$sql = "SELECT * FROM category";
		$query = $this->db->query($sql);	

		return $query;
	}	

	
}
?>