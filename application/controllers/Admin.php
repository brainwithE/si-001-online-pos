<?php 

class Admin extends CI_Controller{
	
     public function __construct() {
        parent::__construct();
        $user_type =  $this->session_type();

        if($user_type!=1){
            redirect('restricted');            
        }        
    }


	public function index(){      
        /*echo "<pre>";
        print_r($this->session->all_userdata());*/

        if($this->session->userdata('loggedin')==1 ){
            $this->view_sales_report();
        }         
    }

    public function session_type(){        
        return $_SESSION["type"];       
    }

    public function session_name(){
        return $this->session->userdata('name'); 
    }

    public function view_sales_report() {
        $this->load->model('Sales_model');
                
        $sale_report = $this->Sales_model->get_sales();  
        $packet['sales'] = $sale_report;        

        $data['sessions'] = $this->session_name();
    
        $this->load->view('admin-header', $data);
        $this->load->view('admin-report-sales', $packet);
        $this->load->view('footer');
    }

    public function filter_sales_month(){
            $this->load->model('Sales_model');       

            $date_start = $this->input->post('filter_start_date');
            $date_end = $this->input->post('filter_end_date');

            $income = $this->Sales_model->get_sales_certmonth($date_start,$date_end);         
            $packet['sales'] = $income;
            $packet['fro'] = $date_start;
            $packet['to'] = $date_end;

            $data['sessions'] = $this->session_name();
            
            $this->load->view('admin-header', $data);
            $this->load->view('admin-report-sales-f-month', $packet);
            $this->load->view('footer');
    }

    
    public function get_supplier_id(){  // add action to get the supplier id of the user
        $supplier_id='201605000000001'; //static supplier id
        return $supplier_id; 
    }

    public function add_items()
    {
        $supplier_id = $this->get_supplier_id();

        $data = array (
        'item_name' => $this->input->post('item_name'),
        'item_price' => $this->input->post('item_price'),
        'item_category' => $this->input->post('item_category'),
        'item_supplier' => $supplier_id
        );

        $this->load->model('Items_model');
        $item_id = $this->Items_model->add_items($data);  
 
        redirect('report-inventory');
    }

    public function view_inventory(){
        $this->load->model('Items_model');
        $supplier_id = $this->get_supplier_id();
        
        $item_list = $this->Items_model->get_items();  
        $packet['item'] = $item_list;
        
        $data['sessions'] = $this->session_name();

        $this->load->view('header', $data);
        $this->load->view('report-item', $packet);
        $this->load->view('footer');
    }

    public function view_delivery(){
        $this->load->model('Delivery_model');
        
        $delivery_report = $this->Delivery_model->get_delivery_report();  
        $packet['delivery_transaction'] = $delivery_report;

        $data['sessions'] = $this->session_name();
        
        $this->load->view('header',$data);
        $this->load->view('report-delivery', $packet);
        $this->load->view('footer');
    }

    public function view_pullout(){
        $this->load->model('Pullout_model');
        
        $pullout_list = $this->Pullout_model->get_pullout();  
        $packet['pullout'] = $pullout_list;
        //$packet['supplier_name'] = $this->get_supplier_name($pullout_list);
        
        $data['sessions'] = $this->session_name();

        $this->load->view('header', $data);
        $this->load->view('report-pullout', $packet);
        $this->load->view('footer');
    }

    public function delivery_notification() {
        //insert model and functions here

        $data['sessions'] = $this->session_name();

        $this->load->view('header', $data);
        $this->load->view('delivery-notification');
        $this->load->view('footer');
    }

    public function input_pullout_item(){
        $item_code = $this->input->post('item_code');
        $item_quantity = $this->input->post('item_quantity');


        if ($this->form_validation->run() == TRUE) {            
            $item_supplier = $this->get_item_supplier($item_code);

            $data = array (
                'pullout_item_code' => $item_code,
                'pullout_item_quantity' => $item_quantity,
                'pullout_supplier' => $item_supplier
            );

            $this->load->model('Pullout_model');
            $sales_id = $this->Pullout_model->add_pullout_item($data);  
     
            redirect('admin/report-pullout');
        }

        

    }

    
    public function get_item_supplier($item_code) {
        $this->load->model('Items_model');
        $result = $this->Items_model->get_item_supplier($item_code);
        
        return $result->item_supplier;        
    }

    public function edit_item(){

        $data = array (
        'item_id' => $this->input->post('item_code'),
        'item_name' => $this->input->post('item_name'),
        'item_price' => $this->input->post('item_price'),
        'item_category' => $this->input->post('item_category'),
        
        );

        $this->load->model('Items_model');
        $this->Items_model->edit_item($data);  
 
        redirect('admin/report-inventory');


    }

    public function approved_delivery(){
        $dt_id = $this->uri->segment(3);        

        $this->load->model('Delivery_model');
        
        $pullout = $this->Delivery_model->approve_pullout($dt_id); 
        
        /*$new_stock = $this->deduct_inv_stock($item_code,$item_quantity);
        $this->update_stock($item_code, $new_stock); */
        

        redirect('admin/view_delivery');

    }

    public function view_dt_details(){
        $dt_id = $this->uri->segment(3);
        $data['dt_id'] = $dt_id;

        $this->load->model('Delivery_model');
        
        $delivery_report = $this->Delivery_model->get_specific_delivery($data['dt_id']);  
        $data['delivery_transaction'] = $delivery_report;

        $data['sessions'] = $this->session_name();
        
        $this->load->view('header', $data);
        $this->load->view('delivery-item-view',$data);
        $this->load->view('footer');
    }

}
?>