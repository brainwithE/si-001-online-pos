<?php 
class Nodes_m extends CI_Model {
   private $table = "pos_user";
  
  function get_node_list() {
    $this->db->select('user_id,user_username');
    $this->db->order_by('user_id','DESC');
    $this->db->limit(30,0);
    $query = $this->db->get($this->table);
  
    return $query->result();
  }
  
  function get_node_by_type($type) {
    $this->db->select('user_id,user_username');
    $this->db->where('user_type',$type,'=');
    $this->db->order_by('user_id','DESC');
    $query = $this->db->get($this->table);
  
    return $query->result();
  }

  function get_node_by_name($user){
  	$this->db->select('user_id,user_username');
    $this->db->like('user_username',$user,'=');
    $this->db->order_by('user_id','DESC');
  	$query = $this->db->get($this->table);
  
    return $query->result();
  }
}
?>