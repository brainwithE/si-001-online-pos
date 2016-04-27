<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Dropzone extends CI_Controller {
  
	public function __construct() {
	   parent::__construct();
	   $this->load->helper(array('url','html','form'));
	   $this->is_logged_in();
	}
    
    function is_logged_in(){
        
        $is_logged_in = $this->session->userdata('is_logged_in');
        
        if(!isset($is_logged_in) || $is_logged_in != true){
            redirect('signup');
            die();
        }
   
    }
 
	public function index() 
	{
		?><script> alert(<?php echo $this->session->userdata('user_id'); ?>); </script><?php 
		$this->load->view('header');
		$this->load->view('dropzone_view');
		$this->load->view('footer');
	}

	public function get($id)
		{
		$this->load->model('login_model');
		$data['query'] = $this->login_model->get_UserID($id);
		$fk_ID = $data['query'];
		}

	public function upload() 
	{
		$ds = DIRECTORY_SEPARATOR;
		$storeFolder = 'uploads';
		if (!empty($_FILES)) 
		{
			//$fk_ID = ($query = $this->db->getwhere('users', array('id' => $id )));
			$fk_ID = $this->session->userdata('user_id');
			$config['encrypt_name'] = TRUE; 
			$config['remove_spaces'] = TRUE;
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = $_FILES['file']['name'];
			$targetPath = getcwd() . '/uploads/';
			$ext = pathinfo($fileName, PATHINFO_EXTENSION);
			$fileName = uniqid();
			$targetFile = $targetPath . $fileName.".".$ext;
			move_uploaded_file($tempFile, $targetFile);
			$data = array (
				'img_name' => $fileName,
			 	'ext' => $ext,
			 	'upload_date' => time(),
			 	'fk_ID' => $fk_ID
			 	);

			 $this->load->model('Upload_model');
			 $this->Upload_model->add_image($data);
		}
	// if you want to save in db,where here
	// with out model just for example
	// $this->load->database(); // load database
	// $this->db->insert('file_table',array('file_name' => $fileName));
}

	public function Display_image()
	{
		$this->load->model('Upload_model');
		$data['query']= $this->Upload_model->get_image();
		$this->load->view('dropzone_view',$data);
		
	}
}

 
/* End of file dropzone.js */
/* Location: ./application/controllers/dropzone.php */