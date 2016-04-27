<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	function add_image($data)
	{
		$this->db->insert('uploads',$data);
	}
	
	function get_image()
	{
		$this->db->select('path');
		$query = $this->db->get('uploads');
		$data = $query->result();
	}

	function get_product_images(){
		$sql = "SELECT * FROM uploads where type = 1";
		$query = $this->db->query($sql);	

		return $query;
	}
	
	/** LYZH **/
	
	function get_specific_product_img($prod_id){
		$sql = "SELECT * FROM uploads where type = 1 and fk_ID=".$prod_id;
		$query = $this->db->query($sql);	

		return $query;
	}
	
	function get_shop_images(){
		$sql = "SELECT * FROM uploads where type = 2";
		$query = $this->db->query($sql);	

		return $query;
	}
	
	/** END LYZH **/
}