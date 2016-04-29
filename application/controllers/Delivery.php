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

	
    public function input_delivery_item(){
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
    }
}
?>