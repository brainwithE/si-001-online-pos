<?php 

class Admin extends CI_Controller{
	
	public function index(){


        $this->view_sales_report();
	   
	}

    public function view_sales_report() {
        $this->load->model('Sales_model');
                
        $sale_report = $this->Sales_model->get_sales();  
        $packet['sales'] = $sale_report;        
    
        $this->load->view('header');
        $this->load->view('report-sales', $packet);
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
        
        $this->load->view('header');
        $this->load->view('report-item', $packet);
        $this->load->view('footer');
    }

    public function add_delivery_items(){
        /*$item_code = $this->input->post('item_code');
        $item_quantity = $this->input->post('item_quantity');
        $dt_id = $this->uri->segment(3);*/
        /*$data = array (   
            'del_item_code' => $item_code,
            'del_item_quantity' => $item_quantity,
            'dt_id' => $dt_id          
        );
        $this->load->model('Delivery_model');
        $this->Delivery_model->add_delivery_items($data);  
        redirect('delivery-item-view');*/

        $this->load->model('Delivery_model');
        
        $delivery_report = $this->Delivery_model->get_delivery_report();  
        $packet['delivery_transaction'] = $delivery_report;
        
        $this->load->view('header');
        $this->load->view('delivery-additem-view', $packet);
        $this->load->view('footer');
    }

    public function item_validation() {
        $item_code = '201602000000005'; 

        $this->load->model('Items_model');
        $result = $this->Items_model->item_validation($item_code);

        if($result) {
            echo "i have";
        } else {
            echo "item not existing in the inventory";
        }
    }

    public function view_delivery(){
        $this->load->model('Delivery_model');
        
        $delivery_report = $this->Delivery_model->get_delivery_report();  
        $packet['delivery_transaction'] = $delivery_report;
        
        $this->load->view('header');
        $this->load->view('report-delivery', $packet);
        $this->load->view('footer');
    }

    public function view_pullout(){
        $this->load->model('Pullout_model');
        
        $pullout_list = $this->Pullout_model->get_pullout();  
        $packet['pullout'] = $pullout_list;
        //$packet['supplier_name'] = $this->get_supplier_name($pullout_list);
        
        $this->load->view('header');
        $this->load->view('report-pullout', $packet);
        $this->load->view('footer');
    }

    public function delivery_notification() {
        //insert model and functions here

        $this->load->view('header');
        $this->load->view('delivery-notification');
        $this->load->view('footer');
    }

    /*public function get_item_supplier($item_code) {
        $this->load->model('Items_model');
        $result = $this->Items_model->get_item_supplier($item_code);
        
        return $result->item_supplier;        
    }*/






    /** DISREGARD ? **/

    /*public function add_sales_transaction(){
        $item_code = $this->input->post('item_code');
        $item_quantity = $this->input->post('item_quantity');        
        $sales_total_price = $this->get_total_price($item_code, $item_quantity);
        
        
        
        $data = array (
            'sales_item_code' => $item_code,
            'sales_item_quantity' => $item_quantity,
            'sales_total_price' => $sales_total_price
        );

        $this->load->model('Sales_model');
        $sales_id = $this->Sales_model->add_sales_transaction($data);
        $new_stock = $this->deduct_inv_stock($item_code,$item_quantity);
        $this->update_stock($item_code, $new_stock);
 
        redirect('cashier');
    }

    
    public function get_item_price($item_code) {
        $this->load->model('Items_model');
        $result = $this->Items_model->get_item_price($item_code);
        
        return $result->item_price;        
    }

    public function get_total_price($item_code, $quantity) {
        
        $item_price = $this->get_item_price($item_code);
        $total_price = $item_price * $quantity;
        
        return $total_price;
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




	

    public function filter_sales_date(){
        $this->load->model('Sales_model');       

        $date_start = $this->input->post('filter_start_date');
        $date_end = $this->input->post('filter_end_date');

        $income = $this->Sales_model->get_sales_certmonth($date_start,$date_end);         
        $packet['sales'] = $income;
        
        $this->load->view('header');
        $this->load->view('report-sales', $packet);
        $this->load->view('footer');
    }*/
}
?>