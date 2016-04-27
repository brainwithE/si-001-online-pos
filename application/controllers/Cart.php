<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('cart_model');
        $this->load->model('product_model');
        $this->load->model('upload_model');
    }

    function index(){
        $indivpass['images'] = $this->upload_model->get_product_images();

        $this->load->view('header');
        $this->load->view('cart/cart', $indivpass);
        $this->load->view('footer');
    }

    function update_cart(){
        $this->cart_model->validate_update_cart();
        $this->show_cart();
    }

    function empty_cart(){
        $this->cart->destroy();
        redirect('cart');
    }

    function show_cart(){
        $indivpass['images'] = $this->upload_model->get_product_images();

        $this->load->view('header');
        $this->load->view('cart/cart', $indivpass);
        $this->load->view('footer');
    }

    function add_cart_item(){
       
        if($this->cart_model->validate_add_cart_item() == TRUE){             
            // Check if user has javascript enabled
            if($this->input->post('ajax') != '1'){
                    redirect('cart'); // If javascript is not enabled, reload the page with new data
            }else{
                    echo 'true'; // If javascript is enabled, return true, so the cart gets updated
                    /*$data['products'] = $this->cart_model->retrieve_products();*/
                    /*print_r($data['products']);*/

                    /*$this->load->view('header');
                    $this->load->view('cart',$data);
                    $this->load->view('footer');*/
            }
        }

    }

}
?>