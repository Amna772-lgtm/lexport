<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Telr extends MY_Controller {
    
     function  __construct(){
        parent::__construct();
        if (intval($this->session->userdata('user_id'))<1) {
            redirect('admin/login', 'refresh');
            exit;
        }
        // Load paypal library & product model
    
        
     }
     function success1221()
    {
        	  
		$store_id = $this->uri->segment(3);
	    $return_url = base_url('telr/success_new/'.$store_id);
        echo "<script>window.top.location.href = '".$return_url."'; </script>";
     }
     
    function success()
    {
   
        	  
	 	$store_id = $this->uri->segment(3);
 
     		
		$data = array(
            'ivp_method'      => "check",
            'ivp_store'       => "22463" ,
            'ivp_authkey'     => "HMJZz~96N7T^6BxH",
            'order_ref'=>$this->session->userdata('order_resf'),
        );
       // print_r($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://secure.telr.com/gateway/order.json');
        curl_setopt($ch, CURLOPT_POST, count($data));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        $results = curl_exec($ch);
        curl_close($ch);
        $results = json_decode($results, true);
        $payment['extra_details'] = json_encode($results);
		$payment['payment_method'] = "Terl";
		
		$payment['sub_invoice_id'] = $store_id ;
		$payment['customer_id'] =  $this->session->userdata('user_id');
		$payment['create_date']=date("Y-m-d G:i:s");
		$this->db->where('id', $store_id)->update('invoice_details',['payment_status' => 'process']);
		$this->db->insert('transaction', $payment);
		$this->session->set_userdata('order_resf', '');
		
		
		$row1 = $this->db->where('id',$store_id)->get('invoice_details')->row();
		$row2 = $this->db->where('id',$row1->invoice_id)->get('invoice')->row();
        $noti['customer_id'] = $this->session->userdata('user_id'); 
        $noti['appointment_id'] = $store_id;
        $noti['notification_type'] = 'payment';
        $noti['status_type'] = 'success';
        $noti['case_id'] = $row2->case_id;
        $noti['create_date']=date("Y-m-d G:i:s");
        $this->db->insert('notification', $noti);
		
	    	
		$users=$this->db->select('*')->where('id',$this->session->userdata('user_id'))->get('users')->row_array(); 
        $email = $users['email'];
        $phone = $users['phone'];
        $name = $users['name']; 
		$config = Array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1',
		);
		
		$this->load->library('email', $config);
		 if($this->session->userdata('site_lang')=="arabic") { 
		 
		     $lan = "ar";
		 }else{
		     $lan = "en";
		 }
		$new = ['to_email' => $email,'case_id' => $row1->invoice_no, 'notification_type' => $noti['notification_type'], 'status_type' => $noti['status_type'], 'name' => $name,'lan'=>$lan];

		$from_email = constant("FROM_EMAIL");
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
		$this->email->set_header('Content-type', 'text/html');
		$this->email->from($from_email, constant("SENDER_NAME"));
		$this->email->to($email);
		$this->email->subject($this->lang->line('payment_is_successful').$row1->invoice_no);
		$body = $this->load->view('email.php', $new, true);
		$this->email->message($body);
		$this->email->send();
		$json_data['case_id'] =$noti['case_id'];
		$json_data['misssion_id'] =$store_id;
		$json_data['invoice_no'] =$row2->invoice_no;
	//	insertActionLog($json_data,$this->session->userdata('user_id'),"payment","success");
if($this->session->userdata('site_lang')=="arabic") { 
 $msg='
:شريكنا العزيز  نفيدكم بأنه تمت عملية الدفع بنجاح للفاتورة رقم  '.$row1->invoice_no.'
كما سيباشر الفريق المختص على إجراءات تقديم الخدمة القانونية 
نسعد بخدمتكم، وممتنون لثقتكم';
    
 		} else { 
		    $msg ='Dear partner:
We hope that "nassr service have fulfilled your expectations" we received your payment successfully for invoice #'.$row1->invoice_no.'  and we process your legal E-service to the initiated appropriate team.
"We are happy to serve you and we are grateful for your trust"';
 		}
		sendSMSProcess($phone,$msg);
		echo "<h2 style='text-align: center; color: green;'>".$this->lang->line('successfully_completed')."</h2>";
		
      }
    function successpp(){
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
 
    }
   
     
     function cancel(){
        // Load payment failed view
        $this->load->view('cancel');
     }
   
 
}