<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class products extends CI_Controller
{
    function __construct() 
    {
    parent::__construct();
    $this->load->library('form_validation');
    }

    function add_product() {

        $this->load->model('Users_model');
        $shop_id = $this->Users_model->get_shop($this->session->userdata('user_id'));        
            
        $data = array (
        'name' => $this->input->post('product_name'),
        'qty' => $this->input->post('qty'),
        'price' => $this->input->post('price'),
        'desc' => $this->input->post('desc'),
        'shop_id' => $shop_id,
        );

        $this->load->model('Product_model');
        $product_id = $this->Product_model->add_product($data);

        $category = $this->input->post('category');
        $this->Product_model->add_pcat($category,$product_id);

        $data['current_prod'] = $product_id;
        
        $this->session->set_userdata($data);


        $pt_imageupload['query'] = $this->Product_model->get_product($this->session->userdata('current_prod'));             

        $this->load->view('header');
        $this->load->view('shop_menu');
        $this->load->view('addproduct_image',$pt_imageupload);        
        $this->load->view('footer');
    
    }
	
	/**LYZH**/
	
	function view_product($prod_id) {
		
		$this->load->model('Users_model');
        $shop_id = $this->Users_model->get_shop($this->session->userdata('user_id'));
		
		/*?> <script>alert(<?php echo $prod_id ?>);</script> <?php*/
	
		$this->load->model('Product_model');
		$this->load->model('Upload_model');
		$product['query'] = $this->Product_model->get_shop_items($shop_id, $prod_id);
		$product['img_query'] = $this->Upload_model->get_specific_product_img($prod_id); 
		
	
        $this->load->view('header');
        $this->load->view('shop_menu');
        $this->load->view('shop_items', $product);
        $this->load->view('footer');
		
	}
	
	function edit_products($prod_id) {
		
		$this->load->model('Users_model');
        $shop_id = $this->Users_model->get_shop($this->session->userdata('user_id'));
		
		
	
		$this->load->model('Product_model');
//		$this->pass_product_id($prod_id);
		$product['query'] = $this->Product_model->view_shop_products($shop_id, $prod_id);
	
	
	
        $this->load->view('header');
        $this->load->view('shop_menu');
        $this->load->view('product_edit', $product);
        $this->load->view('footer');
		
	} 
	

	
	function update_products($prod_id) {
		
        $this->load->model('Product_model');
        $this->Product_model->update_shop_products($prod_id);
		
		$this->view_product($prod_id);
	}
	/**END LYZH**/
}
?>   
<!-- /* Location: ./application/controllers/Products.php */
/* End of file Main.php */ -->
