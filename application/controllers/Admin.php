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

        $this->load->view('admin-header', $data);
        $this->load->view('admin-report-item', $packet);
        $this->load->view('footer');
    }

    public function view_delivery(){
        $this->load->model('Delivery_model');
        
        $delivery_report = $this->Delivery_model->get_delivery_report();  
        $packet['delivery_transaction'] = $delivery_report;

        $data['sessions'] = $this->session_name();
        
        $this->load->view('admin-header',$data);
        $this->load->view('admin-report-delivery', $packet);
        $this->load->view('footer');
    }

    public function view_pullout(){
        $this->load->model('Pullout_model');
        
        $pullout_list = $this->Pullout_model->get_pullout();  
        $packet['pullout'] = $pullout_list;
        //$packet['supplier_name'] = $this->get_supplier_name($pullout_list);
        
        $data['sessions'] = $this->session_name();

        $this->load->view('admin-header', $data);
        $this->load->view('admin-report-pullout', $packet);
        $this->load->view('footer');
    }

    public function approved_pullout(){
        $pullout_id = $this->uri->segment(3);
        $pull_data = $this->get_pullout_item($pullout_id);

        foreach($pull_data->result_array() as $row){ 
            $item_code = $row['pullout_item'];
            $item_quantity = $row['pullout_quantity'];
        }


        $this->load->model('Pullout_model');
        
        $pullout = $this->Pullout_model->approve_pullout($pullout_id); 
        
        $new_stock = $this->deduct_inv_stock($item_code,$item_quantity);
        $this->update_stock($item_code, $new_stock);
        

        redirect('admin/view_pullout');

    }

    public function reject_pullout(){
        $pullout_id = $this->uri->segment(3);
        $this->load->model('Pullout_model');
        $pullout = $this->Pullout_model->reject_pullout($pullout_id);

        redirect('admin/view_pullout');
    }

    public function deduct_inv_stock($item_code, $item_quantity){
        $current_stock = $this->get_item_stock($item_code);

        if($current_stock != 0) {
            $stock = $current_stock - $item_quantity;
        } else {
            echo "no more stock available";
        }

       return $stock;
    }

    public function get_item_stock($item_code){
        $this->load->model('Items_model');
        $result = $this->Items_model->get_item_stock($item_code);

        return $result->item_stock;
    }

    public function update_stock($item_code, $stock){
        $this->load->model('Items_model');
        $current_stock = $this->Items_model->update_stock($item_code, $stock);
    }

    public function get_pullout_item($pullout_id){
        $this->load->model('Pullout_model');
        $query = $this->Pullout_model->get_pullout_item($pullout_id);

        return $query;
    }

    public function delivery_notification() {
        //insert model and functions here

        $data['sessions'] = $this->session_name();

        $this->load->view('header', $data);
        $this->load->view('delivery-notification');
        $this->load->view('footer');
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
        
        $pullout = $this->Delivery_model->approve_delivery($dt_id); 
        
        /*$new_stock = $this->deduct_inv_stock($item_code,$item_quantity);
        $this->update_stock($item_code, $new_stock); */
        

        redirect('admin/view_delivery');

    }

    public function reject_delivery(){
        $dt_id = $this->uri->segment(3);
        $this->load->model('Delivery_model');
        $pullout = $this->Delivery_model->reject_delivery($dt_id);

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

    public function view_item_category_list(){
        $this->load->model('Items_model');

        $data['category_list'] = $this->Items_model->get_item_category();

        $data['sessions'] = $this->session_name();
        
        $this->load->view('header', $data);
        $this->load->view('report-item-category',$data);
        $this->load->view('footer');
    }

    public function add_item_category(){
        $category_name = $this->input->post('item_category');

        $this->load->model('Items_model');
        
        
        $this->form_validation->set_rules('item_category', 'Item Category', 'alpha');
        $this->form_validation->set_rules('item_category', 'Item Category', 'required|alpha|is_unique[pos_category.category_name]');
        

        if ($this->form_validation->run() == FALSE)
        {
            $this->view_item_category_list();
        }
        else
        {
            
            $this->Items_model->add_item_category($category_name);
            redirect('admin/report-item-category');
        }


        //$this->view_item_category_list();

    }

    public function activate_category(){
        $category_id = $this->uri->segment(3);

        $this->load->model('Items_model');
        $this->Items_model->activate_category($category_id);

        redirect('admin/report-item-category');

    }

    public function deactivate_category(){
        $category_id = $this->uri->segment(3);

        $this->load->model('Items_model');
        $this->Items_model->deactivate_category($category_id);

        redirect('admin/report-item-category');
    }

    public function delete_category(){
        $category_id = $this->uri->segment(3);
        $this->load->model('Items_model');
        $this->Items_model->delete_category($category_id);

        redirect('admin/report-item-category');
    }

   /* public function input_pullout_item(){
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
    }*/
}
?>