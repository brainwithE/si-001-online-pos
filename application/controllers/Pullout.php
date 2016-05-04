<?php 

class Pullout extends CI_Controller{
	
	public function index(){

		$this->load->model('Pullout_model');
        
        $pullout_list = $this->Pullout_model->get_pullout();  
        $packet['pullout'] = $pullout_list;
        //$packet['supplier_name'] = $this->get_supplier_name($pullout_list);
        
        $this->load->view('header');
        $this->load->view('report-pullout', $packet);
        $this->load->view('footer');
	}

    public function input_pullout_item(){
        $item_code = $this->input->post('item_code');
        $item_quantity = $this->input->post('item_quantity');
        $item_supplier = $this->get_item_supplier($item_code);

        $data = array (
            'pullout_item_code' => $item_code,
            'pullout_item_quantity' => $item_quantity,
            'pullout_supplier' => $item_supplier
        );

        $this->load->model('Pullout_model');
        $sales_id = $this->Pullout_model->add_pullout_item($data);  
 
        redirect('report-pullout');

    }

    
    public function get_item_supplier($item_code) {
        $this->load->model('Items_model');
        $result = $this->Items_model->get_item_supplier($item_code);
        
        return $result->item_supplier;        
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