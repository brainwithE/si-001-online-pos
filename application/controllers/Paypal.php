<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Payment extends CI_Controller {
 
    /**
     * Class constructor.
     * Adding libraries for each call.
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('merchant');
        $this->merchant->load('paypal_express');
    }
 
    /**
     * On controller load call function.
     * Initializing paypal settings and make purchase call.
     */
    public function index() {
        // initialize gateway
        $settings = $this->merchant->default_settings();
        $this->initialize_settings();
        // sending values to payment gateway.
        $params = array(
              'amount' => 10,
              'item' => 'myitem',
              'description' => 'Your_item_description',
              'currency' => $this->config->item('currency'),
              'return_url' => base_url() . 'payment/payment_return',
              'cancel_url' => base_url() . 'payment/cancel'
        );
        $response = $this->merchant->purchase($params);
    }
     
    /**
     * Handling return call.
     * Make final payment.
     */
    public function payment_return() {
        $this->initialize_settings();
        $params = array(
              'amount' => 10,
              'item' => 'myitem',
              'description' => 'Your_item_description',
              'currency' => $this->config->item('currency'),
              'cancel_url' => base_url() . 'payment/cancel'
        );
        $response = $this->merchant->purchase_return($params);
        // A complete transaction.
        if ($response->status() == Merchant_response::COMPLETE) {
          // data which is return by payment gateway to use.
          $token = $this->input->get('token');
          $payer_id = $this->input->get('PayerID');
          // Unique id for payment must save it for further payment queries.
          $gateway_reference = ($response->reference() ? $response->reference() : '');
          print_r($response);
          // Do your stuff here db insertion, email etc..
        }
        else{
           //Your payment has been failed redirect with message.
          $message = ($response->message() ? $response->message() :'');
          $this->session->set_flashdata('error','Error processing payment: ' . $message.' Please try again');
          redirect('payment/cancel'); 
        }
    }
    
   /**
     * Handling on payment cancel.
     */
    public function cancel(){
      $this->load->view('your_view_name');
    }
 
    /**
     * Paypal settings initialization.
     */
    public function initialize_settings(){
      $settings = array(
            'username' => $this->config->item('api_username'),
            'password' => $this->config->item('api_password'),
            'signature' => $this->config->item('api_signature'),
            'test_mode' => $this->config->item('test_mode')
      );
      
      $this->merchant->initialize($settings);
    }
}