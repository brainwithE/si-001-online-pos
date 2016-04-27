<?php 

class Income extends CI_Controller{
	
	public function index(){

		$this->load->model('Income_model');
        
        $income = $this->Income_model->get_income();  
        $packet['income'] = $income;
        
        $this->load->view('header');
        $this->load->view('income-view', $packet);
        $this->load->view('footer');
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