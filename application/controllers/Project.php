<?php 

class Project extends CI_Controller{
	
	public function index(){

        $this->load->model('Project_model');
        
        $project = $this->Project_model->get_project();
        $packet['project'] = $project;
        
        $this->load->view('header');
        $this->load->view('project-view', $packet);
        $this->load->view('footer');

	}

    public function add_project()
    {
        $data = array (
        'project_name' => $this->input->post('project_name'),
        'project_deadline' => $this->input->post('project_deadline'),
        'project_personnel' => $this->input->post('project_personnel'),
        'project_budget' => $this->input->post('project_budget')
        );

        $this->load->model('Project_model');
        $shop_id = $this->Project_model->add_project($data);  
 
        redirect('project-view');
    }

    public function filter_report_date(){
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
        $this->load->view('project-view', $packet);
        $this->load->view('footer');
    }

	public function add_reporting()
    {
        redirect('/', 'refresh');
    }
	
}
?>