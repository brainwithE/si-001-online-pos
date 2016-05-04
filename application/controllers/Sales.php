<?php 

class Sales extends CI_Controller{
	
	public function index(){

        $account=2; //place account type here

		$this->load->model('Sales_model');
        
        $sale_report = $this->Sales_model->get_sales();  
        $packet['sales'] = $sale_report;
        

        //create an if else statement to redirect to the correct view as per account type
        if($account==1){
            $this->load->view('header');
            $this->load->view('report-sales', $packet);
            $this->load->view('footer');
        }
        elseif ($account==2) {
            $this->load->view('header');
            $this->load->view('report-sales', $packet);
            $this->load->view('footer');
        }
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
            $data[$key]['sales_id'] = '';
            $data[$key]['sales_item'] = $items[$key]['ItemName'];
            $data[$key]['sales_quantity'] = $items[$key]['ItemQuantity'];
            $data[$key]['sales_total'] = '1000';
            $data[$key]['sales_discount'] = '10';
            $data[$key]['sales_date'] = $current_date;
            $data[$key]['sales_supplier'] = '2010019576';
            $data[$key]['sales_st'] = $last_id;
        }

        /*$this->Delivery_model->add_delivery_transaction($data);  */
        $this->Sales_model->add_sales_items($data);
        redirect('admin/report-sales');

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

    public function add_delivery_items(){
        $this->load->model('Delivery_model');
        
        $delivery_report = $this->Delivery_model->get_delivery_report();  
        $packet['delivery_transaction'] = $delivery_report;
        
        $this->load->view('header');
        $this->load->view('delivery-additem-view', $packet);
        $this->load->view('footer');
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

	public function add_income()
    {
        $data = array (
        'income_amount' => $this->input->post('income_amount'),
        'income_name' => $this->input->post('income_name'),
        'income_date_acquired' => $this->input->post('income_date_acquired')
        );

        $this->load->model('Income_model');
        $shop_id = $this->Income_model->add_income($data);  
 
        redirect('income-view');
    }

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
    }
}
?>