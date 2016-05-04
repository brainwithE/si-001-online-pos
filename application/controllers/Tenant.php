<?php 

class Tenant extends CI_Controller{
	
	public function index(){

        $supplier_id='201605000000001'; 

		$this->load->model('Sales_model');
                
        $sale_report = $this->Sales_model->get_supplier_sales($supplier_id);  
        $packet['sales'] = $sale_report;        
    
        $this->load->view('tenant-header');
        $this->load->view('report-sales', $packet);
        $this->load->view('footer');    
	}

    public function add_sales_transaction(){
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
        
        $packet['income'] = $income;
        
        $this->load->view('header');
        $this->load->view('report-sales', $packet);
        $this->load->view('footer');
    }
}
?>