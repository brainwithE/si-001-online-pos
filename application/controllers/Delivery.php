<?php 

class Delivery extends CI_Controller{
	
	public function index(){

		$this->load->model('Delivery_model');
        
        $delivery_report = $this->Delivery_model->get_delivery_report();  
        $packet['delivery_transaction'] = $delivery_report;
        
        $this->load->view('header');
        $this->load->view('report-delivery', $packet);
        $this->load->view('footer');
	}

	
    /*public function input_delivery_item(){
        $item_code = $this->input->post('item_code');
        $item_quantity = $this->input->post('item_quantity');
        $item_supplier = $this->get_item_supplier($item_code);

        $data = array (
            'del_item_code' => $item_code,
            'del_item_quantity' => $item_quantity,
            'del_supplier' => $item_supplier
        );

        $this->load->model('Delivery_model');
        $this->Delivery_model->add_delivery_transaction($data);  
 
        redirect('report-delivery');
    }*/

    public function add_delivery_transaction(){

        //insert tons of condition here

        $this->load->model('Delivery_model');
        $this->Delivery_model->add_delivery_transaction();  
        /*$this->Delivery_model->add_delivery_transaction($data);  */
 
        redirect('report-delivery');
    }

    public function add_delivery_items(){
        $item_code = $this->input->post('item_code');
        $item_quantity = $this->input->post('item_quantity');
        $dt_id = $this->uri->segment(3);

        /*$data = array (
            'del_item_code' => $item_code,
            'del_item_quantity' => $item_quantity,
            'dt_id' => $dt_id          
        );

        $this->load->model('Delivery_model');
        $this->Delivery_model->add_delivery_items($data);  
 
        redirect('delivery-item-view');*/


    }

    public function view_dt_details(){
        $dt_id = $this->uri->segment(3);
        $data['dt_id'] = $dt_id;
        
        $this->load->view('header');
        $this->load->view('delivery-item-view',$data);
        $this->load->view('footer');
    }
}
?>