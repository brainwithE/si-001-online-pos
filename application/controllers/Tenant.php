<?php 

class Tenant extends CI_Controller{
	
	public function index(){
        $this->view_sales_report();
	}

     public function view_sales_report() {
        $supplier_id = $this->get_supplier_id();       
        
        $this->load->model('Sales_model');
                
        $sale_report = $this->Sales_model->get_supplier_sales($supplier_id);  
        $packet['sales'] = $sale_report;        
    
        $this->load->view('tenant-header');
        $this->load->view('report-sales', $packet);
        $this->load->view('footer');
    }
    
    public function get_supplier_id(){  // add action to get the supplier id of the user
        $supplier_id='201605000000001'; //static supplier id
        return $supplier_id; 
    }

    public function add_items()
    {
        $supplier_id = $this->get_supplier_id();

        $data = array (
        'item_name' => $this->input->post('item_name'),
        'item_price' => $this->input->post('item_price'),
        'item_category' => $this->input->post('item_category'),
        'item_supplier' => $supplier_id
        );

        $this->load->model('Items_model');
        $item_id = $this->Items_model->add_items($data);  
 
        redirect('tenant/report-inventory');
    }

    public function view_inventory(){
        $this->load->model('Items_model');
        $supplier_id = $this->get_supplier_id();
        
        $item_list = $this->Items_model->get_supplier_inventory($supplier_id);  
        $packet['item'] = $item_list;
        
        $this->load->view('tenant-header');
        $this->load->view('report-item', $packet);
        $this->load->view('footer');
    }

    public function add_delivery(){
        /*$item_code = $this->input->post('item_code');
        $item_quantity = $this->input->post('item_quantity');
        $dt_id = $this->uri->segment(3);*/
        /*$data = array (
            'del_item_code' => $item_code,
            'del_item_quantity' => $item_quantity,
            'dt_id' => $dt_id          
        );
        $this->load->model('Delivery_model');
        $this->Delivery_model->add_delivery_items($data);  
        redirect('delivery-item-view');*/

        $this->load->model('Delivery_model');
        
        $delivery_report = $this->Delivery_model->get_delivery_report();  
        $packet['delivery_transaction'] = $delivery_report;
        
        $this->load->view('tenant-header');
        $this->load->view('delivery-additem-view', $packet);
        $this->load->view('footer');
    }

    public function add_delivery_transaction(){
        //insert tons of condition here

        $supplier = '201605000000003'; //enter supplier type here 

        $items = $this->input->post('data');
        $quant = $this->input->post('qty');

        $this->load->model('Delivery_model');
        $last_id = $this->Delivery_model->add_delivery_transaction($supplier, $quant); 

        foreach( $data as $row ) {
            $this->db->insert('pos_delivery', $data[$ctr]);
            $ctr++;
        }

        $data=array();  

        foreach($items as $key => $csm)
        {
            $data[$key]['delivery_id'] = '';
            $data[$key]['delivery_item'] = $items[$key]['ItemName'];
            $data[$key]['delivery_quantity'] = $items[$key]['ItemQuantity'];
            $data[$key]['delivery_dt'] = $last_id;
        }

        /*$this->Delivery_model->add_delivery_transaction($data);  */
        $this->Delivery_model->add_delivery_items($data);
        redirect('report-delivery');
    }

    public function item_validation() {
        $item_code = '201602000000005'; 

        $this->load->model('Items_model');
        $result = $this->Items_model->item_validation($item_code);

        if($result) {
            echo "i have";
        } else {
            echo "item not existing in the inventory";
        }
    }

    public function view_delivery(){
        $this->load->model('Delivery_model');
        
        $delivery_report = $this->Delivery_model->get_delivery_report();  
        $packet['delivery_transaction'] = $delivery_report;
        
        $this->load->view('tenant-header');
        $this->load->view('tenant-report-delivery', $packet);
        $this->load->view('footer');
    }

    public function view_pullout(){        
        $supplier_id = $this->get_supplier_id();       

        $this->load->model('Pullout_model');
        
        $pullout_list = $this->Pullout_model->get_pullout_supplier($supplier_id);  
        $packet['pullout'] = $pullout_list;        
        
        $this->load->view('tenant-header');
        $this->load->view('tenant-report-pullout', $packet);
        $this->load->view('footer');
    }
    
    public function approved_pullout(){
        $pullout_id = $this->uri->segment(3);
        $data['pullout_id'] = $pullout_id;

        $this->load->model('Pullout_model');
        
        $pullout = $this->Pullout_model->approve_pullout($data['pullout_id']); 
        
        /*$new_stock = $this->deduct_inv_stock($item_code,$item_quantity);
        $this->update_stock($item_code, $new_stock); */
        

        redirect('tenant/view_pullout');

    }

    public function deduct_inv_stock($item_code, $item_quantity){
        $current_stock = $this->get_item_stock($item_code);

        if($current_stock != 0) {
            $stock = $current_stock - $item_quantity;
        } else {
            echo "no more stock available";
        }

       return $stock;
    }

    public function get_item_stock($item_code){
        $this->load->model('Items_model');
        $result = $this->Items_model->get_item_stock($item_code);

        return $result->item_stock;
    }

    public function update_stock($item_code, $stock){
        $this->load->model('Items_model');
        $current_stock = $this->Items_model->update_stock($item_code, $stock);
    }


    /*public function get_item_supplier($item_code) {
        $this->load->model('Items_model');
        $result = $this->Items_model->get_item_supplier($item_code);
        
        return $result->item_supplier;        
    }*/


    public function view_dt_details(){
        $dt_id = $this->uri->segment(3);
        $data['dt_id'] = $dt_id;

        $this->load->model('Delivery_model');
        
        $delivery_report = $this->Delivery_model->get_specific_delivery($data['dt_id']);  
        $data['delivery_transaction'] = $delivery_report;
        
        $this->load->view('tenant-header');
        $this->load->view('delivery-item-view',$data);
        $this->load->view('footer');
    }

    

}
?>