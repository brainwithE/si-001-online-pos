<?php 

class Signed_in extends CI_Controller{
	
	public function index(){
		
			$this->load->view('header');
			$this->load->view('home', $tohome);
			$this->load->view('footer');

		
	}
	
	
	public function is_logged_in(){
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		if(!isset($is_logged_in) || $is_logged_in != true){
			redirect('signup');
		}

	}
	
	public function fb_logged(){
	$data = array();	
	$data['fbid'] = $this->session->userdata('FBID');
	$data['fullname'] = $this->session->userdata('FULLNAME');
	$data['email'] = $this->session->userdata('EMAIL');
	$this->load->view('signed_in', $data);
	}
		
	public function logout(){
		$this->session->sess_destroy();
		redirect('signup');
	}

	public function add_item()
    {
		/*LYZH*/
		$this->load->model('Product_model');
    	$this->load->model('Shop_model');
    	$this->load->model('Upload_model');
	
		$shop_id=$this->session->userdata('shop_id');		
		$user_id = $this->Shop_model->get_shop_user($shop_id);
		
    	$pt_itemlist['query'] = $this->Product_model->get_products($shop_id); 
    	$pt_itemlist['shop_query'] = $this->Shop_model->get_shop($user_id); 
    	$pt_itemlist['img_query'] = $this->Upload_model->get_product_images(); 
 
        $this->load->view('header');
        $this->load->view('shop_menu');
		$this->load->view('additem', $pt_itemlist);
		$this->load->view('footer');
    }

    public function individual_item_edit()
    {
        $toindiv['product'] = $this->product_model->get_product($this->input->post('prodid'));
        $toindiv['shop'] = $this->shop_model->get_indiv_shop($this->input->post('shopid'));
        $toindiv['shop_list'] = $this->shop_model->get_shop_items($this->input->post('shopid'));    
        $toindiv['prod_images'] = $this->upload_model->get_product_images(); 


        $this->load->view('header');
        $this->load->view('individual-item',$toindiv);
        $this->load->view('footer');
    }

    public function add_product()
    {
    	$this->load->model("Product_model");
        $categ = $this->Product_model->get_category();
        $category['category'] = $categ;

        $this->load->view('header');
		$this->load->view('addproduct',$category);
		$this->load->view('footer');
    }

    public function about_shop()
    {
    	$this->load->model('shop_model');
		$query = $this->shop_model->get_shop($this->session->userdata('user_id'));
		
		$data['shop'] = $query;

        $this->load->view('header');
        $this->load->view('shop_menu');
		$this->load->view('shop_about', $data);
		$this->load->view('footer');
    }

    public function contact_shop()
    {
    	$this->load->model('shop_model');
		$query = $this->shop_model->get_shop($this->session->userdata('user_id'));
		
		$data['shop'] = $query;

        $this->load->view('header');
        $this->load->view('shop_menu');
		$this->load->view('shop_about', $data);
		$this->load->view('footer');
    }

	public function wrong(){
		?><script>alert('Wrong username and password!');</script><?php
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function fetch_store() {
		$this->load->model('Upload_model');
		$pt_itemlist['img_query'] = $this->Upload_model->get_product_images();
        $this->load->view('header');
        $this->load->view('shop_menu');
		$this->load->view('item_store', $pt_itemlist);
		$this->load->view('footer');
    }
	
	/**LYZH**/
	
	
	public function edit_shop(){

		$this->load->model('shop_model');
		$query = $this->shop_model->get_shop($this->session->userdata('user_id'));
		
		$data['shop'] = $query;

        $this->load->view('header');
        $this->load->view('shop_menu');
		$this->load->view('shop_edit', $data);
		$this->load->view('footer');    
	}
	
	function update_shop() {

        $this->load->model('Shop_model');
        $this->Shop_model->edit_shop($this->session->userdata('user_id'));
		
        $this->about_shop();
    }
	
}
?>