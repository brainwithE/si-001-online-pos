<?php 

class Cashier extends CI_Controller{
	
	public function index(){      

        $user_type =  $this->session_type();

        if ($user_type == 3){
            $this->view_sales_report();
        } elseif ($user_type == 1) {
             redirect('admin');
        } elseif ($user_type == 2) {
             redirect('tenant');
        }

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
        $this->load->view('report-sales', $packet);
        $this->load->view('footer');    
    }

    public function add_sales(){
        /*$item_code = $this->input->post('item_code');
        $item_quantity = $this->input->post('item_quantity');        
        $sales_total_price = $this->get_total_price($item_code, $item_quantity);
        
        $this->load->model('Items_model');
        $result = $this->Items_model->get_item_supplier($item_code);
        $item_supplier = $result->item_supplier;
        
        $data = array (
            'sales_item_code' => $item_code,
            'sales_item_quantity' => $item_quantity,
            'sales_total_price' => $sales_total_price,
            'sales_supplier' => $item_supplier
        );

        $this->load->model('Sales_model');
        $sales_id = $this->Sales_model->add_sales_transaction($data);
        $new_stock = $this->deduct_inv_stock($item_code,$item_quantity);
        $this->update_stock($item_code, $new_stock);
        redirect('cashier');*/

        $this->load->model('Sales_model');
        
        $sales_report = $this->Sales_model->get_sales();  
        $packet['sales_transaction'] = $sales_report;
        
        $data['sessions'] = $this->session_name();

        $this->load->view('header', $data);
        $this->load->view('sales-add-view', $packet);
        $this->load->view('footer');
    }

    public function add_sales_transaction(){

        $supplier = '201605000000003'; //enter supplier type here 
        $current_date = date('Y-m-d');

        $items = $this->input->post('data');
        $quant = $this->input->post('qty');

        $this->load->model('Sales_model');
        $last_id = $this->Sales_model->add_sales_transaction($supplier, $quant); 

        foreach( $data as $row ) {
            $this->db->insert('pos_sales_transaction', $data[$ctr]);
            $ctr++;
        }

        $data=array();  

        foreach($items as $key => $csm)
        {
            $icode = $items[$key]['ItemName'];
            $iqty = $items[$key]['ItemQuantity'];

            $item_price = $this->get_item_price($icode);
            $total_price = $this->get_total_price($icode,$iqty);

            $data[$key]['sales_id'] = '';
            $data[$key]['sales_item'] = $icode;
            $data[$key]['sales_quantity'] = $iqty;
            $data[$key]['sales_total'] = $total_price;
            $data[$key]['sales_discount'] = '0';
            $data[$key]['sales_date'] = $current_date;
            $data[$key]['sales_supplier'] = '2010019576';
            $data[$key]['sales_st'] = $last_id;
        }

        /*$this->Delivery_model->add_delivery_transaction($data);  */
        $this->Sales_model->add_sales_items($data);
        redirect('cashier');

        /*line*/

        /*$item_code = $this->input->post('item_code');
        $item_quantity = $this->input->post('item_quantity');        
        $sales_total_price = $this->get_total_price($item_code, $item_quantity);
        
        
        $data = array (
            'sales_item_code' => $item_code,
            'sales_item_quantity' => $item_quantity,
            'sales_total_price' => $sales_total_price
        );

        $this->load->model('Sales_model');
        $sales_id = $this->Sales_model->add_sales_transaction($data);*/  
 
        redirect('cashier/report-sales');
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



}
?>