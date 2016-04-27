<?php 

class Withdrawal extends CI_Controller{
	
	public function index(){

		$this->load->model('Withdrawal_model');
        
        $withdrawal = $this->Withdrawal_model->get_withdrawal();  
        $packet['withdrawal'] = $withdrawal;
        
        $this->load->view('header');
        $this->load->view('withdrawal-view', $packet);
        $this->load->view('footer');

	}

	public function add_withdrawal()
    {
        $data = array (
        'withdrawal_amount' => $this->input->post('withdrawal_amount'),
        'withdrawal_name' => $this->input->post('withdrawal_name'),
        'withdrawal_date_acquired' => $this->input->post('withdrawal_date_acquired')
        );

        $this->load->model('Withdrawal_model');
        $shop_id = $this->Withdrawal_model->add_withdrawal($data);  
 
        redirect('withdrawal-view');
    }

    public function filter_withdrawal_date(){
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
        $this->load->view('withdrawal-view', $packet);
        $this->load->view('footer');
    }
	
}
?>