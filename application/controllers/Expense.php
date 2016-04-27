<?php 

class Expense extends CI_Controller{
	
	public function index(){

		$this->load->model('Expense_model');
        
        $expense = $this->Expense_model->get_expense();  
        $packet['expense'] = $expense;
        
        $this->load->view('header');
        $this->load->view('expense-view', $packet);
        $this->load->view('footer');

	}

	public function add_expense()
    {
        $data = array (
        'expense_amount' => $this->input->post('expense_amount'),
        'expense_name' => $this->input->post('expense_name'),
        'expense_category' => $this->input->post('expense_category'),
        'expense_date_acquired' => $this->input->post('expense_date_acquired')
        );

        $this->load->model('Expense_model');
        $shop_id = $this->Expense_model->add_expense($data);  
 
        redirect('expense-view');
    }
	
    public function filter_expense_date(){
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
        $this->load->view('expense-view', $packet);
        $this->load->view('footer');
    }
}
?>