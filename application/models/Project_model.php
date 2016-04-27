<?php 
class Project_model extends CI_model{
	
	function add_project($data){
		$current_date = date('Y-m-d');
		$income_data = array(
			'project_id' => '',
			'project_name' => $data['project_name'],
			'project_deadline' => $data['project_deadline'],
			'project_personnel' => $data['project_personnel'],
			'project_budget' => $data['project_budget'],
			'project_input' => $current_date
		);
		$this->db->insert('overwatch_project', $income_data);
	}

	function get_project(){
		$this->db->order_by("project_deadline", "asc");
		$query = $this->db->get('overwatch_project');

		return $query;
	}
	
}
?>