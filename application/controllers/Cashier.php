<?php 

class Cashier extends CI_Controller{


    public function __construct() {
        parent::__construct();

        $user_type =  $this->session_type();

        if($user_type!=3){
            redirect('restricted');            
        }        
    }
	
	public function index(){      
        $this->view_sales_report();
    }

    public function session_type(){        
        return $this->session->userdata('type');    
    }

    public function session_name(){
        return $this->session->userdata('name'); 
    }

    public function view_sales_report() {
        $account=2; //place account type here

        $this->load->model('Sales_model');
                
        $sale_report = $this->Sales_model->get_daily_sales();  
        $packet['sales'] = $sale_report;        

        $data['sessions'] = $this->session_name();
    
        $this->load->view('cashier-header',$data);
        $this->load->view('cashier-report-sales', $packet);
        $this->load->view('footer');    
    }

    public function add_sales(){
        $this->load->model('Sales_model');
        
        $sales_report = $this->Sales_model->get_sales();  
        $packet['sales_transaction'] = $sales_report;
        
        $data['sessions'] = $this->session_name();

        $this->load->view('cashier-header', $data);
        $this->load->view('sales-add-view', $packet);
        $this->load->view('footer');
    }

    public function add_sales_transaction(){
        $supplier = '201605000000001'; //enter supplier type here 
        $current_date = date('Y-m-d');

        $items = $this->input->post('data');
        $quant = $this->input->post('qty');

        $data=array();  

        $this->load->model('Items_model');

        foreach($items as $key => $csm)
        {
            $icode = $items[$key]['ItemName'];
            $iqty = $items[$key]['ItemQuantity'];
            $idisc = $items[$key]['ItemDiscount'];

            
            $result = $this->Items_model->get_item_price($icode);
            $assprice = $result->item_price;

            $actuald = $idisc/100;

            $totalprice = $assprice - ($assprice * $actuald); 

            $data[$key]['sales_id'] = '';
            $data[$key]['sales_item'] = $icode;
            $data[$key]['sales_quantity'] = $iqty;
            $data[$key]['sales_total'] = $totalprice;
            $data[$key]['sales_discount'] = $idisc;
            $data[$key]['sales_date'] = $current_date;
            $data[$key]['sales_supplier'] = $supplier;
            $data[$key]['sales_st'] = '0';
        }

        $this->load->model('Sales_model');
        $this->Sales_model->add_sales_items($data);
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

    public function filter_sales_month(){
            $this->load->model('Sales_model');       

            $date_start = $this->input->post('filter_start_date');
            $date_end = $this->input->post('filter_end_date');

            $income = $this->Sales_model->get_sales_certmonth($date_start,$date_end);         
            $packet['sales'] = $income;
            $packet['fro'] = $date_start;
            $packet['to'] = $date_end;

            $data['sessions'] = $this->session_name();
            
            $this->load->view('cashier-header', $data);
            $this->load->view('cashier-report-sales-f-month', $packet);
            $this->load->view('footer');
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

    function sales_more_data() {
        if (isset($_POST['type'])) {
          $this->load->model('nodes_m');
          $data['node_exists'] = $this->nodes_m->get_node_exists($_POST['type']);
          
            if($data['node_exists']){
                $data['ajax_req'] = TRUE;
                $data['node_list'] = $this->nodes_m->get_node_by_spec_code($_POST['type']);

                $this->load->view('ajax_add_sales_items',$data);
            }
            else{
                $data['ajax_req'] = TRUE;
                $data['node_list'] = $this->nodes_m->get_node_by_spec_code($_POST['type']);
            }
        }
    }

    public function view_delivery(){
        $this->load->model('Delivery_model');
        
        $delivery_report = $this->Delivery_model->get_delivery_report();  
        $packet['delivery_transaction'] = $delivery_report;

        $data['sessions'] = $this->session_name();
        
        $this->load->view('cashier-header',$data);
        $this->load->view('cashier-report-delivery', $packet);
        $this->load->view('footer');
    }

    public function view_pullout(){
        $this->load->model('Pullout_model');
        
        $pullout_list = $this->Pullout_model->get_pullout();  
        $packet['pullout'] = $pullout_list;
        //$packet['supplier_name'] = $this->get_supplier_name($pullout_list);
        
        $data['sessions'] = $this->session_name();

        $this->load->view('cashier-header', $data);
        $this->load->view('cashier-report-pullout', $packet);
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
        

        redirect('cashier/report-pullout');

    }

    public function get_pullout_item($pullout_id){
        $this->load->model('Pullout_model');
        $query = $this->Pullout_model->get_pullout_item($pullout_id);

        return $query;
    }

     public function approved_delivery(){
        $dt_id = $this->uri->segment(3);        

        $this->load->model('Delivery_model');
        
        $pullout = $this->Delivery_model->approve_pullout($dt_id); 
        
        /*$new_stock = $this->deduct_inv_stock($item_code,$item_quantity);
        $this->update_stock($item_code, $new_stock); */
        

        redirect('cashier/report-delivery');

    }
}
?>

