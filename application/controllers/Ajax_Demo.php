<?php
class ajax_demo extends CI_Controller {
  
  function index() {
    $this->load->model('nodes_m');
  
    $data['view'] = 'ajax_index';
    $data['node_list'] = $this->nodes_m->get_node_list();

    $this->load->view('cashier-header');
    $this->load->view('template',$data);
    $this->load->view('footer');
  }
  
  function give_more_data() {
    if (isset($_POST['type'])) {
      $this->load->model('nodes_m');
      $data['ajax_req'] = TRUE;
      $data['node_list'] = $this->nodes_m->get_node_by_type($_POST['type']);

      $this->load->view('cashier-header');
      $this->load->view('ajax_index',$data);
      $this->load->view('footer');
    }
  }

  function suggest_more_data() {
    if (isset($_GET['type'])) {
      $this->load->model('nodes_m');
      $data['ajax_req'] = TRUE;
      $data['node_list'] = $this->nodes_m->get_node_by_name($_GET['type']);

      $this->load->view('cashier-header');
      $this->load->view('ajax_index',$data);
      $this->load->view('footer');
    }
  }
    
}
?>