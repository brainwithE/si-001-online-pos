<?php 

class Sales extends CI_Controller{
	
	public function index(){

		$this->load->model('Sales_model');
        
        $sale_report = $this->Sales_model->get_sales();  
        $packet['sales'] = $sale_report;
        
        $this->load->view('header');
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
 
        redirect('report-sales');
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