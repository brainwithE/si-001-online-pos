<?php 

class Cashier extends CI_Controller{
	
	public function index(){

        $account=2; //place account type here

		$this->load->model('Sales_model');
                
        $sale_report = $this->Sales_model->get_daily_sales();  
        $packet['sales'] = $sale_report;        
    
        $this->load->view('cashier-header');
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
        
        $this->load->view('header');
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
        $sales_id = $this->Sales_model->add_sales_transaction($data);  
 
        redirect('admin/report-sales');*/
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




	
/*
    public function filter_income_date(){
        $this->load->model('Income_model');
        $this->load->model('Expense_model');
        $this->load->model('Withdrawal_model');

        $date_start = $this->input->post('filter_start_date');
        $date_end = $this->input->post('filter_end_date');

        $income = $this->Income_model->get_income_certmonth($date_start,$date_end);  
        $expense = $this->Expense_model->get_expense_certmonth($date_start,$date_end);
        $withdrawal = $this->Withdrawal_model->get_withdrawal_certmonth($date_start,$date_end);
        $packet['income'] = $income;
        $packet['expense'] = $expense;
        $packet['withdrawal'] = $withdrawal;
        
        $this->load->view('header');
        $this->load->view('income-view', $packet);
        $this->load->view('footer');
    }*/
}
?>