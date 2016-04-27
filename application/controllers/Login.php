<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'lib_login'));
        
    }

    /**
     * facebook login
     *
     * @return void
     * @author appleboy
     **/
    public function facebook()
    {
        $fb_data = $this->lib_login->facebook();

        // check login data
        if (isset($fb_data['me'])) {
            //var_dump($fb_data);
			//echo $fb_data['me']['email'];

            
			$data['login'] = "Success";
			$data['is_logged_in'] = true;
			$data['email'] = $fb_data['me']['email'];
			$data['fullname'] = $fb_data['me']['name'];
			$data['fbid'] = $fb_data['me']['id'];
			
			$this->session->set_userdata($data);

			redirect('fb_logged');
			
			
        } else {
            //echo '<a href="' . $fb_data['loginUrl'] . '">Login</a>';
			redirect($fb_data['loginUrl']);
        }
    }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
