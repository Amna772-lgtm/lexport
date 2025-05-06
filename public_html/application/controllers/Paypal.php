<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends MY_Controller {
    
     function  __construct(){
        parent::__construct();
        if (intval($this->session->userdata('user_id'))<1) {
            redirect('admin/login', 'refresh');
            exit;
        }
        // Load paypal library & product model
        $this->load->library('paypal_lib');
        
     }
     
    function success(){
        // Get the transaction data
        $paypalInfo = $this->input->post();

        $data['item_name']      = $paypalInfo['item_name'];
        $data['item_number']    = $paypalInfo['item_number'];
        $data['txn_id']         = $paypalInfo["txn_id"];
        $data['payment_amt']    = $paypalInfo["mc_gross"];
        $data['currency_code']  = $paypalInfo["mc_currency"];
        $data['status']         = $paypalInfo["payment_status"];
        //print_r($data);
		$payment['extra_details'] = json_encode($data);
		$payment['payment_method'] = "Paypal";
		$payment['sub_invoice_id'] = $data['item_number'] ;
		$payment['customer_id'] =  $this->session->userdata('user_id');
		$payment['create_date']=date("Y-m-d G:i:s");
		$this->db->where('id', $data['item_number'])->update('invoice_details',['payment_status' => 'process']);
		$this->db->insert('transaction', $payment);
	 
		$this->session->set_flashdata('payment_msg', '<div class="alert alert-success "><strong>Success!</strong>Your Payment successfully process. We will update you soon</div>.');
		redirect('bank_transfer', 'refresh');
	//	$this->send_order_email($data['item_number']);
        // Pass the transaction data to view
      //  $this->load->view('paypal/success', $data);
    }
   
     
     function cancel(){
        // Load payment failed view
        $this->load->view('paypal/cancel');
     }
   
     function ipn(){
        // Paypal posts the transaction data
        $paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            // Validate and get the ipn response
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);

            // Check whether the transaction is valid
            if($ipnCheck){
                // Insert the transaction data in the database
                $data['user_id']        = $paypalInfo["custom"];
                $data['product_id']        = $paypalInfo["item_number"];
                $data['txn_id'] = $paypalInfo["txn_id"];
                $data['payment_gross']    = $paypalInfo["mc_gross"];
                $data['currency_code']    = $paypalInfo["mc_currency"];
                $data['payer_email']    = $paypalInfo["payer_email"];
                $data['payment_status'] = $paypalInfo["payment_status"];

			
            }
        }
    }
}