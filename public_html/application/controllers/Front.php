<?php
class Front extends MY_Controller
{

	public function __construct()
	{
		ini_set('allow_url_fopen', 1);
		parent::__construct();
		//$this->isClientLogged();
		$this->load->model('front_mod');
		$this->load->model('admin/case_mod');
		$this->load->helper('captcha');
		$this->load->library('user_agent');
		$this->load->model('Admin_model');
		$this->load->model('Sms');
	}

	// public function test_send_sms_to_admins()
	// {
	// 	$admin_phone_numbers = $this->Admin_model->get_all_admin_phone_numbers();

	// 	$message = 'This is a test SMS message from the developer for solving SMS issues, SORRY FOR ANY INCONVENIENCE.';

	// 	$phone_numbers = [];

	// 	foreach ($admin_phone_numbers as $admin) {
	// 		$full_phone_number = $admin['country_code'] . $admin['phone'];
	// 		$phone_numbers[] = $full_phone_number;
	// 	}

	// 	// Alternatively, you can hardcode a specific number for testing
	// 	// $phone_numbers[] = '+966555000304'; // Example phone number
	// 	$phone_numbers[] = '+966544555139'; // Example phone number

	// 	if (!empty($phone_numbers)) {
	// 		$jsonObj = [
	// 			'numbers' => $phone_numbers, // Array of full phone numbers
	// 			'msg' => $message // The message to be sent
	// 		];

	// 		// Send the SMS using the Sms model
	// 		$result = $this->Sms->sendSMS($jsonObj);

	// 		// Handle the result and output it for testing
	// 		if (isset($result['status']) && $result['status'] == 'success') {
	// 			echo "Test message sent successfully to all admins.";
	// 		} else {
	// 			echo "Failed to send test message. Error: " . json_encode($result);
	// 		}
	// 	} else {
	// 		echo "No admin phone numbers found.";
	// 	}
	// }

	public function test_email()
	{
		$config = array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1',
		);
		$this->load->library('email', $config);
		$from_email = constant("FROM_EMAIL");
		$new = ['to_email' => $email, 'sub' => 'new', 'role_id' => 3];
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
		$this->email->set_header('Content-type', 'text/html');
		$this->email->from($from_email, constant("SENDER_NAME"));
		$this->email->to('ass.wajjad@gmail.com');
		$this->email->subject('Welcome to Albarakati Law - ' . constant("SENDER_NAME"));
		$body = $this->load->view('email.php', $new, true);
		$this->email->message($body);
		$this->email->send();

		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: ' . constant("SENDER_NAME") . '<' . $from_email . '>' . "\r\n";
		$subject = 'Welcome to Albarakati Law - ' . constant("SENDER_NAME");
		$to = 'ass.wajjad@gmail.com';
		//mail($to,$subject,$body,$headers);

	}
	public function ajax_case_type()
	{
		$id = $this->input->post('id');
		$qury = $this->db->select('*')
			->where('service_id', $id)
			->get('case_type')->result_array();
		echo "<option value=''>Select E-Service Type</option>";
		foreach ($qury as $q) {
			echo "<option value='" . $q['id'] . "'>" . $q['name'] . "</option>";
		}
	}
	public function newsletter()
	{
		$post = $this->input->post('n-email');
		$post1['n-email'] = $post;
		$this->db->insert('newsletter', $post1);
		//    	return true;
	}
	public function chat()
	{
		$post = $this->input->post();
		if ($post) {
			$post['role_id'] =  3;
			$post['user_id'] =  $this->session->userdata('user_id');
			$post['send_from'] =  $this->session->userdata('user_id');
			$this->db->insert('chat', $post);
			return redirect('front/chat');
		}
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('chat');
		$chat = array_reverse($query->result_array());
		$this->load->view('chat', ['chat' => $chat,]);
	}
	public function payment($id = '')
	{
		$post = $this->input->post();
		if ($post) {
			$config = [
				'upload_path' => './uploads/payment',
				'allowed_types' => 'jpg|gif|png|jpeg|pdf|doc',
			];
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('image')) {
				$data = $this->upload->data();
			}
			if ($post['via'] == "cheque") {
				$json['name'] = $post['name'];
				$json['number'] = $post['number'];
				$json['note'] = $post['note'];
				$payment['extra_details'] = json_encode($json);
			}
			$payment['receipt'] = $data['file_name'];
			$payment['payment_method'] = $post['via'];
			$payment['sub_invoice_id'] = $id;
			$payment['customer_id'] =  $this->session->userdata('user_id');
			$payment['create_date'] = date("Y-m-d G:i:s");
			$this->db->where('id', $id)->update('invoice_details', ['payment_status' => 'process']);
			$this->db->insert('transaction', $payment);
		}
		$this->load->view('payment');
	}
	function pay_pal($id)
	{
		$this->load->library('paypal_lib');
		$id = intval($id);
		$row1 = $this->db->where('id', $id)->get('invoice_details')->row();
		$row2 = $this->db->where('id', $row1->invoice_id)->get('invoice')->row();
		if ($row2->customers_id == $this->session->userdata('user_id')) {

			$returnURL = base_url() . 'paypal/success';
			$cancelURL = base_url() . 'paypal/cancel';
			$notifyURL = base_url() . 'paypal/ipn';

			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', getCaseNumber($row2->case_id) . " Paypal Payment");
			$this->paypal_lib->add_field('custom', $this->session->userdata('user_id'));
			$this->paypal_lib->add_field('item_number',  $id);
			$this->paypal_lib->add_field('amount',  $row1->total);

			// Render paypal form
			$this->paypal_lib->paypal_auto_form();
		} else
			show_404();
	}
	function telr($id)
	{
		if ($this->session->userdata('site_lang') == "arabic") {
			$LAN = 'AR';
		} else {
			$LAN = 'EN';
		}
		$id = intval($id);
		$row1 = $this->db->where('id', $id)->get('invoice_details')->row();
		$row2 = $this->db->where('id', $row1->invoice_id)->get('invoice')->row();
		$people_data = $this->db->where('id', $this->session->userdata('user_id'))->get('users')->row();
		if ($row2->customers_id == $this->session->userdata('user_id')) {
			$return_url = base_url('telr/success/' . $id);
			$cancel_url = base_url('telr/cancel/' . $id);

			$data = array(
				'ivp_method'      => "create",
				'ivp_store'       => "22463",
				'ivp_authkey'     => "HMJZz~96N7T^6BxH",
				'ivp_cart'        => rand(),
				'ivp_test'        => "0",
				'ivp_framed'      => "",
				'bill_custref'   => $this->session->userdata('user_id'),
				'ivp_amount'      => $row1->total,
				'ivp_lang'        => $LAN,
				'ivp_currency'    => 'SAR',
				'ivp_desc'        => getCaseNumber($row2->case_id) . " E-Service Payment",
				'return_auth'     => $return_url,
				'return_can'      => $cancel_url,
				'return_decl'     => $cancel_url,
				'bill_fname'      => $people_data->name,
				'bill_sname'      => "",
				'bill_addr1'      => $people_data->address,
				'bill_addr2'      => "",
				'bill_city'       => $people_data->city,
				'bill_region'     => "",
				'bill_zip'        => "",
				'bill_country'    => "SA",
				'bill_email'      => $people_data->email,
				'bill_tel'        => $people_data->phone,

			);

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://secure.telr.com/gateway/order.json');
			curl_setopt($ch, CURLOPT_POST, count($data));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
			$results = curl_exec($ch);
			curl_close($ch);
			$results = json_decode($results, true);
			$this->session->set_userdata('order_resf', $results['order']['ref']);

			$this->load->view('telr_payment', array('results' => $results, 'payable_amount' => $data['ivp_amount'], 'currency' => $data['ivp_currency']));
		} else
			show_404();
	}
	function paypal_success_order($id)
	{
		//   $this->master->save('orders',array('paid'=>1),$id);
		//	$this->send_order_email($id);
		$payment['payment_method'] = "Paypal";
		$payment['sub_invoice_id'] = $id;
		$payment['customer_id'] =  $this->session->userdata('user_id');
		$payment['create_date'] = date("Y-m-d G:i:s");
		$this->db->where('id', $id)->update('invoice_details', ['payment_status' => 'process']);
		$this->db->insert('transaction', $payment);
		return redirect(base_url('bank_transfer'));
	}
	public function generate_invoice($id)
	{
		$invoice = $this->db->select("
			invoice.*,invoice_details.id as iid,invoice_details.*,
			c_case.id as case_id,
			c_case.client_file_number,
			c_case.client_name,
			c_case.service_types,
			c_case.case_number,
			c_case.contact_number,
			c_case.note")
			->join('c_case', "c_case.id = invoice.case_id")
			->join('invoice_details', "invoice_details.invoice_id = invoice.id", 'left')
			->where("invoice.id=invoice_details.invoice_id")
			->where("invoice_details.id=$id")
			->get('invoice')->row();
		//print_r($invoice);

		$invoice_id = $invoice->invoice_no;

		$filename = "Invoice_$invoice_id.pdf";
		ob_start();
		$this->load->library('m_pdf');
		$html = $this->load->view('admin/generate_invoice', ['case_data' => $invoice], true);
		ERROR_REPORTING(0);
		$this->m_pdf->pdf->WriteHTML($html);
		$this->m_pdf->pdf->Output($filename, "D");
	}
	public function index()
	{
		$news = $this->front_mod->index_news();
		$news1 = $this->front_mod->index_news();
		$team = $this->front_mod->index_team();
		$clients = $this->front_mod->index_clients();

		$this->load->view('index', ['news' => $news, 'news1' => $news1, 'team' => $team, 'clients' => $clients]);
	}
	public function all_news()
	{
		$news = $this->front_mod->index_news();
		$this->load->view('all_news', ['news' => $news]);
	}
	public function read_notification_status()
	{
		$id = $this->input->post('id');
		//if(isset($id)){
		$this->db->where('id', $id)->update('notification', ['read_status' => 1]);
		//}
		$count = $this->db
			->where('customer_id', $this->session->userdata('user_id'))
			->where('read_status', 0)
			->get('notification')->num_rows();

		echo $count;
	}
	public function login()
	{
		//login karva mate
		$this->load->view('login');
	}
	public function change_mobile()
	{
		$phone = $this->input->post('update_no');
		$phone1['phone'] = $phone;
		$this->db->where('id',  $this->session->userdata('user_id'))->update('users', $phone1);
		return redirect('front/modify_case');
	}
	public function check_otp_verify()
	{
		$otp = $this->session->userdata('update_otp');
		$getotp = $this->input->post('getotp');
		if ($otp == $getotp) {
			echo "true";
		}
		echo "true";
	}
	public function resend_otp()
	{

		$phone = $this->db->where('id', $this->session->userdata('user_id'))->get('user_temp')->row();
		if ($this->session->userdata('site_lang') == "arabic") {
			$msg =	 'إِعادة تَعيين كلمة المرور يُرْجَى إدخال رمز التفعيل: ' . $this->session->userdata('otp');
		} else {
			$msg =	 'Dear Partner: Welcome to “Nassr” program. Please enter your activation code: ' . $this->session->userdata('otp');
		}
		$jsonObj = array(
			'apiKey' => 'c05990df25f97ddda831392752f7eb0b',
			'sender' => 'Nassr APP',
			'numbers' => $phone->country_code . $phone->phone,
			'msg' => $msg,
			'msgId' => rand(1, 99999),
			'timeSend' => '0',
			'dateSend' => '0',
			'deleteKey' => '55348',
			'lang' => '3',
			'applicationType' => 68,
		);
		return $result = $this->Sms->sendSMS($jsonObj);
	}
	public function update_otp_verify()
	{
		$digits_needed = 4;
		$phone_no = $this->input->post('phone');
		$random_number = ''; // set up a blank string

		$count = 0;

		while ($count < $digits_needed) {
			$random_digit = mt_rand(0, 9);

			$random_number .= $random_digit;
			$count++;
		}
		$phone = $this->db->where('id', $this->session->userdata('user_id'))->get('users')->row();
		if ($this->session->userdata('site_lang') == "arabic") {
			$txtmsg = "شريكنا العزيز
لإعادة تعيين كلمة المرور الخاصة بك، من فضلك أدخل كود التفعيل";
		} else {
			$txtmsg = "To reset your password, please enter the activation code:";
		}
		$jsonObj = array(
			// 'mobile' => '0595557384',                        
			// 'password' => 'Om5762fa',                      
			'apiKey' => 'c05990df25f97ddda831392752f7eb0b',
			'sender' => 'Nassr APP',
			'numbers' => $phone->country_code . $phone_no,
			'msg' => $txtmsg . $random_number,
			'msgId' => rand(1, 99999),
			'timeSend' => '0',
			'dateSend' => '0',
			'deleteKey' => '55348',
			'lang' => '3',
			'applicationType' => 68,
		);
		$result = $this->Sms->sendSMS($jsonObj);
		$this->session->set_userdata('update_otp', $random_number);
		$result['otp'] = $random_number;
		$result['otpphone'] = $phone;
		echo json_encode($result);
	}
	public function live_streaming()
	{
		$this->load->view('live_streaming');
	}

	public function entrepreneurs_guide()
	{
		$this->load->view('entrepreneurs_guide');
	}
	public function articals()
	{
		$this->load->view('articals');
	}
	public function nidam()
	{
		$this->load->view('nidam');
	}
	public function mobile_app()
	{
		$this->load->view('mobile_app');
	}
	public function map()
	{
		$this->load->view('map');
	}
	public function archive_list()
	{
		$case_data = $this->db->where('customers_id', $this->session->userdata('user_id'))->get('c_case')->result_array();
		$file_type = $this->input->post();
		$uids = $this->session->userdata('user_id');
		if ($file_type) {
			$catid = $file_type['file_type'];
			$case_id = $file_type['case_id'];

			if ($catid && $case_id) {
				$where = "customer_id=$uids AND temp_app_id='$case_id' AND cat_id=$catid";
			} else if ($case_id) {
				$where = "customer_id=$uids AND temp_app_id='$case_id'";
			} else if ($catid) {
				$where = "customer_id=$uids  AND cat_id=$catid";
			} else {
				$where = "customer_id=$uids";
			}
			$data = $this->db->select('*')
				->where("($where)", NULL, FALSE)
				->order_by("id", "desc")
				->get('document')
				->result_array();
		} else {

			$data = $this->db->select('*')
				->where('customer_id', $this->session->userdata('user_id'))->order_by("id", "desc")
				->get('document')
				->result_array();
		}
		$action_log['customer_id'] = $this->session->userdata('user_id');
		$action_log['action_type'] = 'archive';
		$action_log['status_type'] = 'view';
		$action_log['create_date'] = date("Y-m-d G:i:s");
		$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
		$action_log['device'] = getDeviceName();
		$this->db->insert('action_log', $action_log);
		$this->load->view('archive_list', ['data' => $data, 'case_data' => $case_data]);
	}
	public function delete_front_archive($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('document');
		$action_log['customer_id'] = $this->session->userdata('user_id');
		$action_log['action_type'] = 'archive';
		$action_log['status_type'] = 'delete';
		$action_log['create_date'] = date("Y-m-d G:i:s");
		$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
		$action_log['device'] = getDeviceName();

		$this->db->insert('action_log', $action_log);
		return redirect('front/archive_list');
	}
	public function about_us()
	{
		//login karva mate
		$this->load->view('about_us');
	}
	public function referrals()
	{
		//login karva mate
		$this->load->view('referrals');
	}
	public function alert()
	{
		//login karva mate

		$id = $this->session->userdata('user_id');
		if ($id) {
			$data = $this->db->select('*')
				->where("(customers_id = $id OR status= 'all')", NULL, FALSE)->order_by("id", "desc")
				->get('user_message')
				->result_array();
		}
		$this->load->view('alert', ['data' => $data]);
	}
	public function services()
	{
		//login karva mate
		$this->load->view('services');
	}
	public function jobs()
	{
		$data = $this->db->get('job')->result_array();
		$this->load->view('jobs', ['data' => $data]);
	}
	public function article()
	{
		$this->load->library('pagination');

		$config['base_url'] = 'http://example.com/index.php/test/page/';
		$config['total_rows'] = 200;
		$config['per_page'] = 20;
		$data = $this->db->order_by("id", "desc")->get('articles')->result_array();
		$this->load->view('articles', ['data' => $data]);
	}
	public function job_details($id)
	{
		//job ni details display krva mate
		$data = $this->db->where('id', $id)->get('job')->row_array();
		$this->load->view('job_details', ['data' => $data]);
	}
	public function article_details($id)
	{
		//job ni details display krva mate
		$data = $this->db->where('id', $id)->get('articles')->row_array();
		$SQLN = "select * from articles where id = (select min(id) from articles where id > $id)";
		$next = $this->db->query($SQLN)->row()->id;

		$SQL = "select * from articles where id = (select max(id) from articles where id < $id)";
		$prev = $this->db->query($SQL)->row()->id;
		$this->load->view('article_details', ['data' => $data, 'next' => $next, 'prev' => $prev]);
	}
	public function evidence_details($id)
	{
		//job ni details display krva mate
		$data = $this->db->where('id', $id)->get('evidence_list')->row_array();
		$SQLN = "select * from evidence_list where id = (select min(id) from evidence_list where id > $id)";
		$next = $this->db->query($SQLN)->row()->id;

		$SQL = "select * from evidence_list where id = (select max(id) from evidence_list where id < $id)";
		$prev = $this->db->query($SQL)->row()->id;
		$this->load->view('evidence_details', ['data' => $data, 'next' => $next, 'prev' => $prev]);
	}
	public function training_details($id)
	{
		//job ni details display krva mate
		$data = $this->db->where('id', $id)->get('training')->row_array();
		$this->load->view('training_detail', ['data' => $data]);
	}
	public function job_employment()
	{
		$this->load->view('employment', array('job_id' => $this->uri->segment(4), 'employment' => $this->uri->segment(3)));
	}
	public function employment_data()
	{
		$this->load->library('upload');

		$data = $this->input->post();
		$recaptchaResponse = $data['g-recaptcha-response'];

		$secret = $this->recaptchaSecret();
		$url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response;=" . $recaptchaResponse;
		$response = $this->curl->simple_get($url);
		$status = json_decode($response, true);
		if ($data['g-recaptcha-response']) {
			unset($data['g-recaptcha-response']);

			$file = $_FILES['resume']['name'];

			$imagePath = realpath(APPPATH . '../uploads/resumes/');
			$_FILES['userfile']['name']     = $file;
			$_FILES['userfile']['type']     = $_FILES['resume']['type'];
			$_FILES['userfile']['tmp_name'] = $_FILES['resume']['tmp_name'];
			$_FILES['userfile']['error']    = $_FILES['resume']['error'];
			$_FILES['userfile']['size']     = $_FILES['resume']['size'];

			$config = array(
				'file_name'     => time() . "_" . $_FILES['userfile']['name'],
				'allowed_types' => 'pdf|doc|docx|docm',
				'max_size'      => 30000,
				'overwrite'     => FALSE,
				'upload_path'	=> $imagePath
			);

			$this->upload->initialize($config);
			$errCount = 0;
			if (!$this->upload->do_upload()) {
				$this->load->library('session');
				$this->session->set_flashdata('error', 'Somthing Wrong. Please Upload file pdf,doc and docx.');
				return redirect("front/job_employment/" . $data['employment'] . "/" . $data['job_id']);
			} else {
				$uploadData = $this->upload->data();
				$filename = array('filename' => $uploadData['file_name']);
			}

			$form_data = array('first_name' => $data['first_name'], 'last_name' => $data['last_name'], 'email' => $data['email'], 'phone' => $data['phone'], 'education' => $data['education'], 'work_experience' => $data['work_experience'], 'job_id' => $data['job_id'], 'employment' => $data['employment'], 'resume' => $filename['filename']);

			$result = $this->front_mod->save_employment($form_data);
			if ($result == true) {
				$this->load->library('session');
				$this->session->set_flashdata('success', 'Data Save Successfully.');
				return redirect('front/job_employment');
			}
		} else {
			$this->session->set_flashdata('flashSuccess', 'Sorry Google Recaptcha Unsuccessful!!');
			$this->load->view('employment');
		}
	}
	public function privacy()
	{
		//login karva mate
		$data = $this->db->where('id', 2)->get('pages')->row();
		//login karva mate
		$this->load->view('privacy', ['data' => $data]);
	}

	public function training()
	{
		//login karva mate
		$data = $this->db->get('training')->result_array();

		$this->load->view('training', ['data' => $data]);
	}
	public function pagen_not_found()
	{
		//login karva mate
		$this->load->view('404');
	}
	public function tandc()
	{
		$data = $this->db->where('id', 3)->get('pages')->row();
		//login karva mate
		$this->load->view('tandc', ['data' => $data]);
	}
	public function tandcapp()
	{
		//login karva mate
		$data = $this->db->where('id', 3)->get('pages')->row();
		$this->load->view('tandcapp', ['data' => $data]);
	}
	public function ourteam()
	{

		$data = $this->db->get('team_members')->result_array();
		$this->load->view('team', ['data' => $data]);
	}
	public function list_writings_appoinment()
	{
		$id = $this->session->userdata('user_id');

		$data =  $this->db->select("writing_misssion.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
			->join('c_case', "c_case.id = writing_misssion.case_id", 'left')
			->where("(c_case.customers_id = $id  AND status=0)", NULL, FALSE)->where("writing_misssion.sub_mission_id", 0)
			->get('writing_misssion')
			->result_array();
		foreach ($data as $cd) {
			$misssion[$cd['case_id']][$cd['id']] = $cd;
		}
		$action_log['customer_id'] = $this->session->userdata('user_id');
		$action_log['action_type'] = 'writing_misssion';
		$action_log['status_type'] = 'list_view';
		$action_log['create_date'] = date("Y-m-d G:i:s");
		$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
		$action_log['device'] = getDeviceName();

		$this->db->insert('action_log', $action_log);
		$this->load->view('list_writings_appoinment', ['data' => $misssion]);
	}
	public function list_general_misssion()
	{
		$id = $this->session->userdata('user_id');

		$data =  $this->db->select("general_mission.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
			->join('c_case', "c_case.id = general_mission.case_id", 'left')
			->where("(c_case.customers_id = $id  AND status=0)", NULL, FALSE)->where("general_mission.sub_mission_id", 0)
			->get('general_mission')
			->result_array();
		foreach ($data as $cd) {
			$misssion[$cd['case_id']][$cd['id']] = $cd;
		}
		$action_log['customer_id'] = $this->session->userdata('user_id');
		$action_log['action_type'] = 'general_mission';
		$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
		$action_log['device'] = getDeviceName();

		$action_log['status_type'] = 'list_view';
		$action_log['create_date'] = date("Y-m-d G:i:s");
		$this->db->insert('action_log', $action_log);
		$this->load->view('list_general_appoinment', ['data' => $misssion]);
	}
	public function list_visiting_appoinment()
	{
		$id = $this->session->userdata('user_id');

		$data =  $this->db->select("visiting_mission.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
			->join('c_case', "c_case.id = visiting_mission.case_id", 'left')
			->where("(c_case.customers_id = $id  AND status=0)", NULL, FALSE)->where("visiting_mission.sub_mission_id", 0)
			->get('visiting_mission')
			->result_array();
		foreach ($data as $cd) {
			$misssion[$cd['case_id']][$cd['id']] = $cd;
		}
		$action_log['role'] = '3';
		$action_log['customer_id'] = $this->session->userdata('user_id');
		$action_log['action_type'] = 'visiting_mission';
		$action_log['status_type'] = 'list_view';
		$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
		$action_log['create_date'] = date("Y-m-d G:i:s");
		$action_log['device'] = getDeviceName();

		$this->db->insert('action_log', $action_log);
		$this->load->view('list_visiting_appoinment', ['data' => $misssion]);
	}
	public function list_session_appoinment()
	{
		$id = $this->session->userdata('user_id');

		$data =  $this->db->select("session_mission.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
			->join('c_case', "c_case.id = session_mission.case_id", 'left')
			->where("(c_case.customers_id = $id  AND status=0)", NULL, FALSE)->where("session_mission.sub_mission_id", 0)
			->get('session_mission')
			->result_array();

		foreach ($data as $cd) {
			$misssion[$cd['case_id']][$cd['id']] = $cd;
		}

		$action_log['role'] = '3';
		$action_log['customer_id'] = $this->session->userdata('user_id');
		$action_log['action_type'] = 'session_mission';
		$action_log['status_type'] = 'list_view';
		$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
		$action_log['create_date'] = date("Y-m-d G:i:s");
		$action_log['device'] = getDeviceName();

		$this->db->insert('action_log', $action_log);
		$this->load->view('list_session_appoinment', ['data' => $misssion]);
	}
	public function list_consultation_appoinment()
	{
		$id = $this->session->userdata('user_id');

		$data =  $this->db->select("consultation_mission.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
			->join('c_case', "c_case.id = consultation_mission.case_id", 'left')
			->where("(c_case.customers_id = $id AND status=0)", NULL, FALSE)->where("consultation_mission.sub_mission_id", 0)
			->get('consultation_mission')
			->result_array();
		foreach ($data as $cd) {
			$misssion[$cd['case_id']][$cd['id']] = $cd;
		}
		$action_log['role'] = '3';
		$action_log['customer_id'] = $this->session->userdata('user_id');
		$action_log['action_type'] = 'consultation_mission';
		$action_log['status_type'] = 'list_view';
		$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
		$action_log['create_date'] = date("Y-m-d G:i:s");
		$action_log['device'] = getDeviceName();

		$this->db->insert('action_log', $action_log);
		$this->load->view('list_consultation_appoinment', ['data' => $misssion]);
	}
	public function dashboard()
	{
		$this->db->select('c_case.*,case_temp.case_id,case_temp.is_reject');
		$this->db->from('c_case');
		$this->db->join('case_temp', 'case_temp.case_id=c_case.id', 'left');
		$this->db->where('c_case.customers_id', $this->session->userdata('user_id'));
		$this->db->order_by("c_case.id", "desc");
		$data =  $query = $this->db->get()->result_array();
		$this->load->view('dashboard', ['data' => $data]);
	}
	public function home()
	{

		$data = $this->db->get('marketing_banner')->result_array();
		$this->load->view('home', ['data' => $data]);
	}

	public function view_clients()
	{
		//clients display karva mate
		$data = $this->db->get('clients')->result_array();
		$this->load->view('clients', ['data' => $data]);
	}
	public function otp_verify()
	{

		$otp = $this->input->post('otp');
		$regsucc = $this->input->post('regsucc');
		if ($this->input->post('user_id')) {
			$user_id = $this->input->post('user_id');
		} else {
			$user_id =  $this->session->userdata('user_id');
		}
		$data = $this->front_mod->otp_verify($otp, $user_id);
		$tm['last_login_time'] = date("Y-m-d G:i:s");
		$tm['ip'] = $_SERVER['REMOTE_ADDR'];
		$this->db->where('id', $this->session->userdata('user_id'))->update('users', $tm);

		if ($data['is_login']) {
			$this->session->set_userdata('verify', 'true');
			$this->session->set_userdata('user_id', $data['id']);

			$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
			$action_log['device'] = getDeviceName();
			$action_log['role'] = '3';
			$action_log['customer_id'] = $this->session->userdata('user_id');
			$action_log['action_type'] = 'otp_verify';
			$action_log['status_type'] = 'success';
			$this->db->insert('action_log', $action_log);
			$ua = getBrowser();
			$ua['device'] = getDeviceName();
			$noti['customer_id'] = $this->session->userdata('user_id');
			$noti['notification_type'] = 'user';
			$noti['status_type'] = 'login';

			$noti['login_ip'] = $_SERVER['REMOTE_ADDR'];
			$noti['device_log'] = json_encode($ua);
			$noti['create_date'] = date("Y-m-d G:i:s");
			$this->db->insert('notification', $noti);
			echo "true";
			return true;
		}

		if ($data) {
			//  print_r($data);
			//$this->session->set_userdata('user_id', $user_id);
			$this->session->set_userdata('verify', 'true');
			if ($regsucc == "true") {
				$users = $this->db->select('*')->where('id', $user_id)->get('user_temp')->row_array();
				unset($users['id']);
				$this->db->insert('users', $users);
				$id = $this->db->insert_id();
				$this->session->userdata('verify');
				$this->session->set_userdata('user_id', $id);
				$sessionid['session_id'] = rand(100000, 9999999);
				$this->session->set_userdata('session_id', $sessionid['session_id']);
				$this->db->where('id', $this->session->userdata('user_id'))->update('users', $sessionid);
				$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
				$action_log['device'] = getDeviceName();
				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = 'otp_verify';
				$action_log['status_type'] = 'success';
				$this->db->insert('action_log', $action_log);
				$ua = getBrowser();
				$ua['device'] = getDeviceName();
				$noti['customer_id'] = $this->session->userdata('user_id');
				$noti['notification_type'] = 'user';
				$noti['status_type'] = 'register';
				$noti['login_ip'] = $_SERVER['REMOTE_ADDR'];
				$noti['device_log'] = json_encode($ua);
				$noti['create_date'] = date("Y-m-d G:i:s");
				$this->db->insert('notification', $noti);
				$email = $users['email'];
				$name = $users['name'];
				$phone = $users['phone'];

				$config = array(
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'priority' => '1',
				);
				$this->load->library('email', $config);

				$new = ['to_email' => $email, 'sub' => 'new', 'role_id' => 3];

				$from_email = constant("FROM_EMAIL");
				$to_email = $email;
				$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
				$this->email->set_header('Content-type', 'text/html');
				$this->email->from($from_email, constant("SENDER_NAME"));
				$this->email->to($to_email);
				$this->email->subject($this->lang->line('Welcome_to_Albarakati_Law'));
				$body = $this->load->view('email.php', $new, true);
				$this->email->message($body);
				$this->email->send();
				if ($this->session->userdata('site_lang') == "arabic") {
					$lan = "ar";
				} else {
					$lan = "en";
				}
				$adminuser = $this->db->select('email')->where('role_id', 1)->get('users')->result_array();
				foreach ($adminuser as $adminuser) {
					$new = ['email' => $email, 'sub' => 'admin_email', 'role_id' => 3, 'name' => $name, 'phone' => $phone, 'lan' => $lan];
					$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
					$this->email->set_header('Content-type', 'text/html');
					$this->email->from($from_email, constant("SENDER_NAME"));
					//	$this->email->to($adminuser['email']);
					$this->email->subject($this->lang->line('New_user_register'));
					$body = $this->load->view('email.php', $new, true);
					$this->email->message($body);
					$this->email->send();
				}
			}
			//return redirect('front/dashboard');
			echo "true";
		} else {
			$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
			$action_log['device'] = getDeviceName();
			$action_log['role'] = '3';
			$action_log['customer_id'] = $this->session->userdata('user_id');
			$action_log['action_type'] = 'otp_verify';
			$action_log['status_type'] = 'faild';
			$action_log['create_date'] = date("Y-m-d G:i:s");
			//$this->db->insert('action_log', $action_log);
			//$this->load->view('otp_password'); 
			echo "true";
		}
	}
	public function otp_password()
	{
		$this->load->view('otp_password');
	}
	public function news()
	{
		//news disoplay karva mate
		$data = $this->db->get('news')->result_array();
		$this->load->view('news', ['data' => $data]);
	}

	public function news_details($id)
	{
		//news ni details display krva mate
		$data = $this->db->where('id', $id)->get('news')->row_array();

		$SQLN = "select * from news where id = (select min(id) from news where id > $id)";
		$next = $this->db->query($SQLN)->row()->id;

		$SQL = "select * from news where id = (select max(id) from news where id < $id)";
		$prev = $this->db->query($SQL)->row()->id;
		$this->load->view('news_details', ['data' => $data, 'next' => $next, 'prev' => $prev]);
	}
	public function refresh()
	{
		// Captcha configuration
		$config = array(
			'img_path'      => 'uploads/',
			'img_url'       => base_url() . 'uploads/',
			'font_path'     =>  base_url() . 'system/fonts/texb.ttf',
			'img_width'     => '160',
			'img_height'    => 50,
			'word' => rand(1000, 9999),
			'word_length'   => 4,
			'font_size'     => 20
		);
		$captcha = create_captcha($config);

		// Unset previous captcha and set new captcha word
		$this->session->unset_userdata('captchaCode');
		$this->session->set_userdata('captchaCode', $captcha['word']);

		// Display captcha image
		echo $captcha['image'];
	}
	public function login_check()
	{
		$email = $this->input->post('email');

		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		} else {
			if (strlen($email) >= 10) {
				$email = ltrim($email, '0');
			}
		}
		$password = $this->input->post('password');
		$this->session->set_userdata('verify', 'false');
		$captcha = $this->input->post('captcha');
		
		$a = $this->db->select('*')
			->where("(email='$email' OR phone='$email')", NULL, FALSE)
			->get('users')
			->row();

		if (!$a) {
			return "false";
		}
		$data = $this->front_mod->login_check($email, $password);
		if ($data) {
			$this->session->set_userdata('user_id', $data['id']);
			$this->session->set_userdata('otp', $data['otp']);
			$action_log['role'] = '3';
			$action_log['customer_id'] = $this->session->userdata('user_id');
			$action_log['action_type'] = 'login';
			$action_log['status_type'] = 'customer';
			$action_log['create_date'] = date("Y-m-d G:i:s");
			$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
			$action_log['device'] = getDeviceName();
			$this->db->insert('action_log', $action_log);
			$ua = getBrowser();
			$ua['device'] = getDeviceName();
			$noti['customer_id'] = $this->session->userdata('user_id');
			$noti['notification_type'] = 'user';
			$noti['status_type'] = 'login';
			$noti['login_ip'] = $_SERVER['REMOTE_ADDR'];
			$noti['create_date'] = date("Y-m-d G:i:s");
			$noti['device_log'] = json_encode($ua);
			//	$this->db->insert('notification', $noti);
			$datah['otp'] =  $data['otp'];
			$datah['phone'] = $data['otpphone'];
			$sessionid['session_id'] = rand(100000, 9999999);
			$this->session->set_userdata('session_id', $sessionid['session_id']);
			$this->db->where('id', $this->session->userdata('user_id'))->update('users', $sessionid);
			echo json_encode($datah);
		} else {
			return "false";
		}
	}

	public function terms()
	{
		$this->load->view('terms');
	}

	public function select_services()
	{
		//services select karva mate
		$service = $this->front_mod->select_services();
		$this->load->view('select_services', ['services' => $service]);
	}

	public function Selected_services($mode, $id)
	{
		$ser = $this->db->select('name')->where('id', $id)->get('services')->row_array();
		$this->session->set_userdata('service', $ser['name']);
		$this->load->view('law_suite');
	}



	public function law_suite_password()
	{
		//password enter karva mate
		if ($this->session->userdata('case_number')) {
			$this->load->view('law_suite_password');
		} else {
			return redirect('front');
		}
	}

	public function forgotPassword()
	{
		//password forgot karva mate
		$this->load->view('forgotpassword');
	}

	public function check_forgotpassword()
	{
		//password forgot thai tyare
		if ($this->form_validation->run('forgotpassword')) {

			$email = $this->input->post('email');
			$pass = random_string('alnum', 6);
			$data = $this->front_mod->check_forgotpassword($email, $pass);
			/*	if($this->session->userdata('site_lang')=="arabic") {
						$msg = "شريكنا العزيز 
لقد قمت مؤخرًا بطلب نسيان كلمة المرور الخاصة بك. لقد تلقينا طلبك وتم تغيير كلمة المرور الخاصة بك. كلمة المرور الجديدة هي:".$pass;
						} else {
							  $msg = "Dear Partner, You recently requested a forgot password. We've received the request and your password has been changed.  Your new password is ".$pass;
						}
					$jsonObj = array(
						// 'mobile' => '0595557384',                        
						// 'password' => 'Om5762fa',                      
						'apiKey' => 'c05990df25f97ddda831392752f7eb0b',
						'sender'=>'Nassr APP',                        
						'numbers' => $data['country_code'].$data['phone'],
						'msg' => $msg,
						'msgId' => rand(1,99999),           
						'timeSend' => '0',                     
						'dateSend' => '0',               
						'deleteKey' => '55348',           
						'lang' => '3',               
						'applicationType' => 68,                             
				  	);
			//	$result = $this->Sms->sendSMS($jsonObj);*/
			if ($data) {

				$config = array(
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'priority' => '1',
				);
				$this->load->library('email', $config);

				$new = ['role_id' => 3, 'sub' => 'forgot', 'to_email' => $email, 'password' => $pass];
				$from_email = constant("FROM_EMAIL");
				$to_email = $email;
				$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
				$this->email->set_header('Content-type', 'text/html');
				$this->email->from($from_email, constant("SENDER_NAME"));
				$this->email->to($to_email);
				$this->email->subject($this->lang->line('forgot_password_email'));
				$body = $this->load->view('email.php', $new, true);
				$this->email->message($body);

				$this->email->send();
				return redirect('front/forgotpassword?status=true');
			}
		} else {
			$this->load->view('forgotpassword');
		}
	}

	public function file_upload()
	{
		//file uploading karva mate
		if ($this->session->userdata('case_number')) {
			$this->load->view('file_upload');
		} else {
			return redirect('front');
		}
	}

	public function law_suite_view()
	{
		if ($this->session->userdata('case_number')) {
			$id = $this->session->userdata('user_id');
			$case_number = $this->session->userdata('case_number');
			$data = $this->db->select('case_number')->where('case_number', $case_number)->get('case_temp')->row_array();
			if ($data) {
				$request = $this->db->select(['u.name', 'u.phone', 'u.city', 'u.id_type', 'u.id_numbers', 'u.email', 'u.address', 'c.service_types', 'c.case_title', 'c.case_status', 'c.identification_types', 'c.createdate'])->from('users u')->join('case_temp c', 'u.id=c.customers_id')->where('u.id', $id)->get()->row_array();
			} else {
				$request = $this->db->select(['u.name', 'u.phone', 'u.city', 'u.id_type', 'u.id_numbers', 'u.email', 'u.address', 'c.service_types', 'c.case_title', 'c.case_status', 'c.identification_types', 'c.updatedate', 'c.createdate'])->from('users u')->join('c_case c', 'u.id=c.customers_id')->where('u.id', $id)->get()->row_array();
			}

			$doc = $this->db->select('name')->where('case_number', $this->session->userdata('case_number'))->get('document')->result_array();

			$this->load->view('law_suite_view', ['request' => $request, 'doc' => $doc]);
		} else {
			return redirect('front');
		}
	}

	public function previous_request()
	{
		//case ni detail display karva mate
		$id = $this->session->userdata('user_id');
		$request = $this->db->select(['u.name', 'u.id_type', 'u.id_numbers', 'u.image', 'u.city', 'u.phone', 'u.email', 'u.address', 'c.service_types', 'c.identification_types', 'c.case_title'])->from('users u')->join('c_case c', 'u.id=c.user_id')->where('u.id', $id)->get()->row_array();
		$doc = $this->db->select('name')->where('case_number', $this->session->userdata('case_number'))->get('document')->result_array();
		if ($request) {
			$config = array(
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'priority' => '1',
			);
			$this->load->library('email', $config);

			$new = ['role_id' => 3, 'sub' => 'new', 'to_email' => $request['email'], 'case_number' => $this->session->userdata('case_number')];
			$from_email = constant("FROM_EMAIL");
			$to_email = $request['email'];
			$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
			$this->email->set_header('Content-type', 'text/html');
			$this->email->from($from_email, constant("SENDER_NAME"));
			$this->email->to($to_email);
			$this->email->subject('new joining');
			$body = $this->load->view('email.php', $new, true);

			$this->email->message($body);

			$this->email->send();
		}
		$this->load->view('previous_request', ['request' => $request, 'doc' => $doc]);
	}
	public function email_check()
	{
		$users = $this->db->select('email')->where('email', $_POST['email'])->get('users')->row_array();
		if ($users) {
			echo "false";
		} else {
			echo "true";
		}
	}
	public function id_numbers_check()
	{
		$users = $this->db->select('id_numbers')->where('id_numbers', $_POST['id_numbers'])->get('users')->row_array();
		if ($users) {
			echo "false";
		} else {
			echo "true";
		}
	}
	public function store_details()
	{
		//case ni details store karva mat
		$info = $this->input->post();
		$this->load->helper('string');
		$rand = random_string('alnum', 5);
		$config['encrypt_name'] = TRUE;
		$config = [
			'upload_path'	=> './uploads/profile/',
			'allowed_types'	=> 'jpg|gif|png|jpeg',
			'file_name'	=> $rand,
		];
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$info['image'] = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';
		echo htmlspecialchars($info['image'], ENT_QUOTES, 'UTF-8');
		if ($info['image']) {
			$fname = $rand . "." . strtolower(pathinfo($info['image'], PATHINFO_EXTENSION));
		} else {
			$fname = '';
		}
		if ($this->upload->do_upload('image')) {
			$data = $this->upload->data();
		}

		$name = $info['firstname'];
		$cccode = str_replace(' ', '', $info['ctcode']);
		if ($cccode == "+966" && strlen($info['phone']) == 10) {
			$phone_no = ltrim($info['phone'], '0');
		} else {
			$phone_no = $info['phone'];
		}
		$user = [
			'name' => $name,
			'email' => $info['email'],
			//	'id_type'=>$info['id_type'],
			//	'id_numbers'=>$info['id_numbers'], 
			'country_code' => $cccode,
			'phone' => $phone_no,
			'image' => $fname,
			'password' => md5($info['password']),
			'role_id' => 3,
		];
		$captcha = $this->input->post('captcha');
	
		$this->form_validation->set_rules('firstname', 'firstname', 'callback_alpha_Ar');
		if ($this->form_validation->run() == FALSE) {
			echo "fnamelost";
			return false;
		}
		$opponent_phone = $this->db->select('*')->where(['opponent_phone' => $info['phone']])->get('c_case')->row();
		if ($opponent_phone) {
			echo "opnamefound";
			return false;
		}
		$data = $this->front_mod->store_details($user);
		$this->session->set_userdata('user_id', $data['id']);
		$this->session->set_userdata('otp', $data['otp']);
		$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
		$action_log['device'] = getDeviceName();

		$action_log['role'] = '3';
		//$action_log['customer_id'] = $this->session->userdata('user_id');
		$action_log['action_type'] = 'register';
		$action_log['status_type'] = '';
		$action_log['create_date'] = date("Y-m-d G:i:s");
		$this->db->insert('action_log', $action_log);
		//return redirect('front/dashboard');
		//return redirect('front/otp_password');
		$datah['user_id'] =  $data['id'];
		$datah['otp'] =  $data['otp'];
		//$datah['phone'] = substr($info['phone'], 0, 3).'-XXX-XXX-'.substr($info['phone'], 3, 2);
		$datah['phone'] = $info['phone'];
		echo json_encode($datah);
	}

	public function new_file()
	{
		$data = file_get_contents($_FILES['file']['tmp_name']);
		$audio_name = $_POST['audio_name'];
		$type = $_POST['type'];
		$audioid = isset($_POST['audioid']) ? $_POST['audioid'] : '0';
		if (isset($_FILES['file'])) {
			$audio = file_get_contents($_FILES['file']['tmp_name']);
			$this->load->helper('string');
			$rand = random_string('alnum', 5);
			$filename = $audio_name . "_" . $rand . ".mp3";
			if ($audio_name == '') {
				$filename = $rand . ".mp3";
			}
			$aid = $_POST['aid'];
			$sessionid = $_POST['sessionid'];
			write_file("uploads/audio/$filename", $audio);
			$this->db->insert('uploads', ['user_id' => $sessionid, 'case_id' => $aid, 'audio' => $filename, 'type' => $type, 'audioid' => $audioid]);
			$insert_id = $this->db->insert_id();
			$audio = $this->db->select('*')->where(['id' => $insert_id])->get('uploads')->row();

			$timestamp = strtotime($audio->create_date);
			$date  =   date("d M Y G:i", $timestamp); ?>
			<div class="docloopa">
				<?php echo "<b>" . $audio->audio . "</b>"; ?>
				<?php echo "<small>&nbsp;&nbsp; " . $this->lang->line('Upoded_By') . getEmployeeName($audio->user_id) . "</small>"; ?>
				<?php echo "<small>&nbsp;&nbsp;" . $date . "</small>"; ?>
				<span class="dwndelbtn">
					<a href="<?= base_url('uploads/audio/' . $audio->audio); ?>" class='btn btn-success btn-sm' download><?php echo $this->lang->line('Download') ?></a>
					<!--<a href="<?= base_url('front/delete_audio_files/' . $audio->audio . '/' . $case_id); ?>" class='btn btn-danger  btn-sm'>Delete</a>-->
				</span>
			</div> <?php
					//	$action_log['role'] = '3'; 
					//	$action_log['customer_id'] = $this->session->userdata('user_id');
					//	$action_log['action_type'] = 'audio';
					//	$action_log['status_type'] = 'add';
					//	$this->db->insert('action_log', $action_log); 
				}
			}
			public function delete_audio_files($name, $case_number)
			{
				$img = $this->db->delete('uploads', ['case_id' => $case_number, 'audio' => $name]);
				if ($img) {
					unlink("uploads/audio/" . $name);
				}
				$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
				$action_log['device'] = getDeviceName();

				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = 'audio';
				$action_log['status_type'] = 'delete';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$action_log['action_id'] = $case_number;
				$this->db->insert('action_log', $action_log);
				return redirect("front/add_case/$case_number");
			}
			public function delete_upload_files($name, $case_number)
			{
				//files delete karva mate

				$img = $this->db->delete('document', ['case_number' => $case_number, 'name' => $name]);

				if ($img) {
					unlink("uploads/case_file/" . $name);
				}
				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = 'fileupload';
				$action_log['action_id'] = $case_number;
				$action_log['status_type'] = 'delete';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$this->db->insert('action_log', $action_log);
				return redirect("front/view_case/$case_number");
			}
			public function insert_password()
			{
				//password insert kare tyare

				$this->form_validation->set_rules('password', 'password', 'required|min_length[4]');
				$this->form_validation->set_rules('confirm_password', 'confirm_password', 'required|min_length[4]|matches[password]');
				if ($this->form_validation->run()) {
					$info = $this->input->post();
					$pass = md5($info['password']);
					$this->front_mod->insert_password($pass);
					return redirect('front/file_upload');
				} else {
					$this->load->view('law_suite_password');
				}
			}

			public function upload_file()
			{
				//file uploading thai tyare
				$config = [
					'upload_path' => './uploads',
					'allowed_types' => 'jpg|gif|png|jpeg|pdf|doc|docx|txt',
				];
				$this->load->library('upload', $config);

				$name = $_FILES['image']['name'];
				$insert = ['name' => $name, 'customer_id' => $this->session->userdata('user_id'), 'case_number' => $this->session->userdata('case_number')];
				$this->db->insert('document', $insert);
				$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
				$action_log['device'] = getDeviceName();

				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = 'file';
				$action_log['status_type'] = 'add';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$this->db->insert('action_log', $action_log);
				if ($this->upload->do_upload('image')) {
					$data = $this->upload->data();
				}
			}

			public function modify_upload_file()
			{

				$fid = $_POST['fid'];
				$cat_id = $_POST['cat_id'];
				$name1 = $_FILES['image']['name'];
				$ext = pathinfo($name1, PATHINFO_EXTENSION);
				$fname = "Case_" . time();
				$name = $fname . "_" . $cat_id . "_" . $fid . "_" . $this->session->userdata('user_id') . "." . $ext;

				$files = $this->db->select('*')->where("(name = '$name1' AND cat_id = $cat_id AND temp_app_id='$fid')", NULL, FALSE)->get('document')->row();
				if (isset($files->name)) {
					$name = $files->name;
				}
				$config = [
					'upload_path' => './uploads/case_file',
					'allowed_types' => 'jpg|gif|png|jpeg|pdf|doc|docx|txt',
					'overwrite' => true,
					'file_name'	=> $name,
				];

				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (isset($files->name)) {
					//$this->db->where('id', $files->id)->update('users','name' => $name, );
					if ($this->upload->do_upload('image')) {
						$data = $this->upload->data();
					}
				} else {
					$insert = ['name' => $name, 'created' => date("Y-m-d G:i:s"), 'customer_id' => $this->session->userdata('user_id'),  'uploaded_by' => $this->session->userdata('user_id'), 'temp_app_id' => "$fid", 'cat_id' => $cat_id];
					$this->db->insert('document', $insert);
					if ($this->upload->do_upload('image')) {

						$data = $this->upload->data();
					}
					$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
					$action_log['device'] = getDeviceName();

					$action_log['role'] = '3';
					$action_log['customer_id'] = $this->session->userdata('user_id');
					$action_log['action_id'] = $fid;
					$action_log['action_type'] = 'file';
					$action_log['status_type'] = 'add';
					$action_log['create_date'] = date("Y-m-d G:i:s");
					$this->db->insert('action_log', $action_log);
					$noti['customer_id'] = $this->session->userdata('user_id');
					$noti['case_id'] = $fid;
					$noti['notification_type'] = 'e-service';
					$noti['create_date'] = date("Y-m-d G:i:s");
					$noti['status_type'] = 'file';
					//	$this->db->insert('notification', $noti);
				}
				$ret['name'] = $name;
				echo json_encode($ret);
			}

			public function modify_case()
			{

				$user_id = $this->session->userdata('user_id');

				$request = $this->db->select(['*'])
					->where('id', $user_id)
					->get('users')
					->row_array();
				$info = $this->input->post();
				if ($info) {
					$case_id = $this->db->select(['id', 'id_numbers'])->where('id', $user_id)->get('users')->row_array();

					if ($case_id['id_numbers'] == '') {
						//  $this->form_validation->set_rules('id_numbers','ID number','required|numeric|min_length[10]|max_length[10]|is_unique[users.id_numbers]');

					}

					$user_id = $this->session->userdata('user_id');

					$this->db->where('id', $user_id)->update('users', $info);
					$action_log['role'] = '3';
					$action_log['customer_id'] = $this->session->userdata('user_id');
					$action_log['action_type'] = 'profile';
					$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
					$action_log['device'] = getDeviceName();

					$action_log['status_type'] = 'edit';
					$action_log['create_date'] = date("Y-m-d G:i:s");
					$this->db->insert('action_log', $action_log);


					return redirect('front/modify_case?success=true');
					exit;
					if ($case_id['id_numbers'] == '' && $this->form_validation->run() == false) {
						return $this->load->view('modify_case', ['request' => $request]);
						exit;
					} else {

						/*
			$user_id = $this->session->userdata('user_id');
			
			$this->db->where('id', $user_id)->update('users',$info);
			$action_log['role'] = '3'; $action_log['customer_id'] = $this->session->userdata('user_id');
			$action_log['action_type'] = 'profile';
			$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
			$action_log['device'] = getDeviceName();

			$action_log['status_type'] = 'edit';
			$action_log['create_date'] = date("Y-m-d G:i:s");
			$this->db->insert('action_log', $action_log);
		 
 
			return redirect('front/modify_case?success=true');*/
					}
				}
				$this->load->view('modify_case', ['request' => $request]);
				$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
				$action_log['device'] = getDeviceName();

				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = 'profile';
				$action_log['status_type'] = 'view';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$this->db->insert('action_log', $action_log);
			}

			public function modify_case_data()
			{



				$user_id = $this->session->userdata('user_id');

				$case_id = $this->db->select(['id', 'id_numbers'])->where('id', $user_id)->get('users')->row_array();

				if ($case_id['id_numbers'] == '') {
					$this->form_validation->set_rules('id_numbers', 'ID number', 'required|numeric|min_length[10]|max_length[10]|is_unique[users.id_numbers]');
				}

				if ($case_id['id_numbers'] == '' && $this->form_validation->run() == false) {
					return $this->load->view('modify_case');
					exit;
				} else {

					//case  thai tyare
					$fname = '';
					if ($_FILES['image']['name']) {
						$rand = random_string('alnum', 5);
						$config['encrypt_name'] = TRUE;
						$config = [
							'upload_path'	=> './uploads/profile/',
							'allowed_types'	=> 'jpg|gif|png|jpeg',
							'file_name'	=> $rand,
						];
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						$post['image'] = $_FILES['image']['name'];
						$fname = $rand . "." . pathinfo($post['image'], PATHINFO_EXTENSION);
						if ($this->upload->do_upload('image')) {
							$data = $this->upload->data();
						}
					}
					$info = $this->input->post();
					$user_id = $this->session->userdata('user_id');
					$case_number = $this->session->userdata('case_number');
					$case_id = $this->db->select(['id', 'customers_id'])->where('customers_id', $user_id)->get('c_case')->row_array();
					$d1 = $this->front_mod->check(); //case_temp ma case che ke nahi te check karva mate

					if ($d1) {
						$this->db->delete('case_temp', ['case_number' => $case_number]);
					}


					/*	if($fname)
			{
				
				$user=['name'=>$info['name'],'id_type'=>$info['id_type'],'id_numbers'=>$info['id_numbers'],'city'=>$info['city'],'image'=>$fname,'email'=>$info['email'],'address'=>$info['address'],'phone'=>$info['phone']];
			}
			else
			{
				$user=['name'=>$info['name'],'district'=>$info['district'],'id_type'=>$info['id_type'],'id_numbers'=>$info['id_numbers'],'city'=>$info['city'],'email'=>$info['email'],'address'=>$info['address'],'phone'=>$info['phone']];	
			}*/

					// print_r($user);exit;
					//$case_temp=['case_id'=>$case_id['id'],'customers_id'=>$case_id['customers_id'],'case_number'=>$case_number,'service_types'=>$info['service_type'],'identification_types'=>$info['case_title'],'identification_types'=>$info['identification_types']];

					$this->db->where('id', $user_id)->update('users', $info);
					$action_log['role'] = '3';
					$action_log['customer_id'] = $this->session->userdata('user_id');
					$action_log['action_type'] = 'profile';
					$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
					$action_log['device'] = getDeviceName();

					$action_log['status_type'] = 'edit';
					$action_log['create_date'] = date("Y-m-d G:i:s");
					$this->db->insert('action_log', $action_log);
					//$this->db->insert('case_temp', $case_temp); 

					if ($info['mode'] == 'edit') {
						return redirect('front/law_suite_password');
					} else {
						return redirect('front/modify_case?success=true');
					}
				}
			}

			public function attach_files()
			{
				//attach files display karva mate
				$files = $this->db->select('name')->where('case_number', $this->session->userdata('case_number'))->get('document')->result_array();
				$this->load->view('add_case', ['files' => $files]);
			}

			public function change_password_view()
			{
				//password change karva mate
				$this->load->view('change_password');
			}

			public function change_password()
			{
				//password change thai tyare

				if ($this->form_validation->run('change_password')) {
					$pass = $this->db->select(['email', 'password'])->where('id', $this->session->userdata('user_id'))->get('users')->row_array();
					$data = $this->input->post();
					if ($pass['password'] != md5($data['current_password'])) {
						echo "failed";
						//return redirect('front/modify_case/?pwd=faild');
					}
					//return TRUE;
					if ($pass['password'] == md5($data['current_password'])) {
						$this->db->where('id', $this->session->userdata('user_id'))->update('users', ['password' => md5($data['new_password'])]);
						$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
						$action_log['device'] = getDeviceName();

						$action_log['role'] = '3';
						$action_log['customer_id'] = $this->session->userdata('user_id');
						$action_log['action_type'] = 'change_password';
						$action_log['status_type'] = 'customer';
						$action_log['create_date'] = date("Y-m-d G:i:s");
						$this->db->insert('action_log', $action_log);
						$config = array(
							'mailtype' => 'html',
							'charset' => 'utf-8',
							'priority' => '1',
						);
						$this->load->library('email', $config);
						$passwd = $data['new_password'];
						$new = ['role_id' => 3, 'sub' => 'change', 'to_email' => $pass['email'], 'password' => $data['new_password']];
						$from_email = constant("FROM_EMAIL");
						$to_email = $pass['email'];
						$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
						$this->email->set_header('Content-type', 'text/html');
						$this->email->from($from_email, constant("SENDER_NAME"));
						$this->email->to($to_email);
						$this->email->subject($this->lang->line('Your_change_password'));
						$body = $this->load->view('email.php', $new, true);

						$this->email->message($body);

						$this->email->send();


						if ($this->session->userdata('site_lang') == "arabic") {
							$msg =  "شريكنا العزيز
لقد قمت مؤخرًا بطلب تغيير كلمة المرور الخاصة بك. لقد تم استلام الطلب وتم تغيير كلمة المرور. كلمة المرور الجديدة الخاصة بك هي:" . $passwd;
						} else {
							$msg = "Dear Partner,\nYou recently requested changing your password. We've received the request and your password has been changed.  Your new password is " . $passwd;
						}
						$jsonObj = array(
							// 'mobile' => '0595557384',                        
							// 'password' => 'Om5762fa',                      
							'apiKey' => 'c05990df25f97ddda831392752f7eb0b',
							'sender' => 'Nassr APP',
							'numbers' => $data['country_code'] . $data['phone'],
							'msg' => $msg,
							'msgId' => rand(1, 99999),
							'timeSend' => '0',
							'dateSend' => '0',
							'deleteKey' => '55348',
							'lang' => '3',
							'applicationType' => 68,
						);
						$result = $this->Sms->sendSMS($jsonObj);
						//return redirect('front/logout');
					} else {
						//return redirect('front/modify_case');
					}
				} else {
					$this->load->view('modify_case');
				}
			}

			public function appoinment()
			{
				//appoinment book karva mate
				$this->load->view('appoinment');
			}

			public function appoinment_data()
			{
				//appoinment na data fetch karva mate
				if ($this->form_validation->run('front_contact_us')) {
					$data = $this->input->post();
					$recaptchaResponse = $data['g-recaptcha-response'];

					$secret = $this->recaptchaSecret();
					$url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response;=" . $recaptchaResponse;
					$response = $this->curl->simple_get($url);
					$status = json_decode($response, true);
					if ($data['g-recaptcha-response']) {
						unset($data['g-recaptcha-response']);
						$this->db->insert('appoinment', $data);
						$action_log['role'] = '3';
						$action_log['customer_id'] = $this->session->userdata('user_id');
						$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
						$action_log['device'] = getDeviceName();

						$action_log['action_type'] = 'appointment inquery';
						$action_log['status_type'] = 'customer';
						$action_log['create_date'] = date("Y-m-d G:i:s");
						$this->db->insert('action_log', $action_log);

						return redirect('front/thanks');
					} else {
						$this->session->set_flashdata('flashSuccess', 'Sorry Google Recaptcha Unsuccessful!!');
						$this->load->view('appoinment');
					}


					//if ($status['success']) {
					//	 $this->db->insert('appoinment', $data);
					//	return redirect('front/thanks');
					//	} else {
					//	$this->session->set_flashdata('flashSuccess', 'Sorry Google Recaptcha Unsuccessful!!');
					//		$this->load->view('appoinment');
					//	}


				} else {
					$this->load->view('appoinment');
				}
			}

			public function contact_us()
			{
				//contact us display karva mate
				$this->load->view('contact_us');
			}

			public function contact_us_data()
			{
				//contact us na data receive karya
				if ($this->form_validation->run('front_contact_us')) {
					$data = $this->input->post();
					$recaptchaResponse = $data['g-recaptcha-response'];

					$secret = $this->recaptchaSecret();
					$url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response;=" . $recaptchaResponse;
					$response = $this->curl->simple_get($url);
					$status = json_decode($response, true);
					if ($data['g-recaptcha-response']) {
						unset($data['g-recaptcha-response']);
						$this->db->insert('contact_us', $data);
						return redirect('front/thanks');
					} else {
						$this->session->set_flashdata('flashSuccess', 'Sorry Google Recaptcha Unsuccessful!!');
						$this->load->view('contact_us');
					}
					//if ($status['success']) {
					//	 $this->db->insert('contact_us', $data);
					//	return redirect('front/thanks');
					//	} else {
					//	$this->session->set_flashdata('flashSuccess', 'Sorry Google Recaptcha Unsuccessful!!');
					//		$this->load->view('contact_us');
					//	}

				} else {
					$this->load->view('contact_us');
				}
			}
			public function home_contact_us_data()
			{
				//contact us na data receive karya
				$data = $this->input->post();
				if ($data) {
					$recaptchaResponse = $data['g-recaptcha-response'];
					// $secret = '6Le4PCMUAAAAAKsHlCmpoDmFhYlpN4pY52GIbIkd';
					$secret = $this->recaptchaSecret();
					$url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response;=" . $recaptchaResponse;
					$response = $this->curl->simple_get($url);
					$status = json_decode($response, true);
					if ($data['g-recaptcha-response']) {
						unset($data['g-recaptcha-response']);
						$this->db->insert('contact_us', $data);
						return redirect('front/thanks');
					} else {
						$this->session->set_flashdata('flashSuccess', 'Sorry Google Recaptcha Unsuccessful!!');
						$this->load->view('index');
					}
				}
			}
			public function thanks()
			{
				$this->load->view('thanks');
			}

			public function bank_transfer()
			{
				$data = $this->db->select("
			invoice.*,invoice_details.*,
			c_case.id as case_id,
			c_case.customers_id, 
			c_case.user_id,
			c_case.identification_number,
			c_case.identification_types,
			c_case.other_identification_types,
			c_case.client_file_number,
			c_case.client_name,
			c_case.branch,
			c_case.service_types,
			c_case.case_code,
			c_case.case_type,
			c_case.case_number,
			c_case.case_title,
			c_case.case_date,
			c_case.case_start_date,
			c_case.contact_number,
			c_case.opponent_full_name,
			c_case.opponent_lawyer,
			c_case.case_status,
			c_case.note")

					->join('c_case', "c_case.id = invoice.case_id")
					->join('invoice_details', "invoice_details.invoice_id = invoice.id", 'left')
					->where('invoice.id=invoice_details.invoice_id')
					->where('c_case.customers_id', $this->session->userdata('user_id'))
					->where('invoice_details.is_approve', 0)
					->where('invoice_details.is_reject', 0)
					->order_by("invoice.id", "desc")
					->get('invoice')->result_array();

				$this->load->view('bank_transfer', ['data' => $data]);
			}
			public function logout()
			{
				$this->db->where('id', $this->session->userdata('user_id'))->update('users', ['session_id' => 0]);
				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = 'logout';
				$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
				$action_log['device'] = getDeviceName();
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$action_log['status_type'] = 'customer';
				$this->db->insert('action_log', $action_log);
				$ua = getBrowser();
				$ua['device'] = getDeviceName();
				$noti['customer_id'] = $this->session->userdata('user_id');
				$noti['notification_type'] = 'user';
				$noti['status_type'] = 'logout';
				$noti['login_ip'] = $_SERVER['REMOTE_ADDR'];
				$noti['device_log'] = json_encode($ua);
				$noti['create_date'] = date("Y-m-d G:i:s");
				$this->db->insert('notification', $noti);
				session_destroy();
				return redirect('front');
			}

			// case add  13-09-2018
			public function get_reject_case_reason()
			{

				$id = $this->input->post('id');
				$files = $this->db->select('reject_note')->where('case_id', $id)->get('case_temp')->row();
				echo '<div class="bootbox-body"><h4>' . $this->lang->line('Reject_Reason') . '</h4><hr>' . $files->reject_note . '</div>';
			}
			public function case_list()
			{
				$this->db->select('c_case.*,case_temp.case_id,case_temp.is_reject');
				$this->db->from('c_case');
				$this->db->join('case_temp', 'case_temp.case_id=c_case.id', 'left');
				$this->db->where('c_case.customers_id', $this->session->userdata('user_id'));
				$this->db->order_by('c_case.id', 'DESC');
				$data =  $query = $this->db->get()->result_array();

				$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
				$action_log['device'] = getDeviceName();

				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = 'e-service';
				$action_log['status_type'] = 'list';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$this->db->insert('action_log', $action_log);
				// 		$data=$this->db->where('customers_id',$this->session->userdata('user_id'))->get('c_case')->result_array();
				$this->load->view('case_list', ['data' => $data]);
			}

			public function add_case() //new case karva mate je design display thai ena mate
			{
				if ($this->session->userdata('site_lang') == "arabic") {
					$lan = "ar";
				} else {
					$lan = "en";
				}
				$ser = $this->case_mod->dis_services($lan);

				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = 'e-service';
				$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
				$action_log['device'] = getDeviceName();

				$action_log['status_type'] = 'add view';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$this->db->insert('action_log', $action_log);
				$case_type = $this->case_mod->case_type($lan);
				$this->load->view('add_case', ['case_type' => $case_type, 'service' => $ser, 'data' => '']);
			}

			public function store_case() //navo case store thai ena mate
			{

				if ($this->session->userdata('user_id') == '') {
					return redirect(base_url());
				}
				$this->isClientLogged();
				$post = $this->input->post();

				$id = $post['id'];
				$case_id = $post['case_id'];
				unset($post['otp']);
				$post['customers_id'] = $this->session->userdata('user_id');
				$post['note'] =  $this->input->post('note');
				unset($post['id']);
				if ($post['case_start_date']) {
					if ($this->session->userdata('site_lang') == "arabic") {
						$case_start_date = $post['case_start_date'];
						unset($post['case_start_date']);
						$case_start_date = explode('/', $case_start_date);
						$r = Hijri2Greg($case_start_date[0], $case_start_date[1], $case_start_date[2], true);
						$post['case_start_date'] = $r;
					}
				}
				if ($id) {
					$post['add_edit'] = 1;
					$post = $this->security->xss_clean($post);
					$this->case_mod->edit_case_cust($id, $post);
					$action_log['role'] = '3';
					$action_log['customer_id'] = $this->session->userdata('user_id');
					$action_log['action_id'] = $id;
					$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
					$action_log['device'] = getDeviceName();

					$action_log['action_type'] = 'e-service';
					$action_log['status_type'] = 'edit e-service';
					$action_log['create_date'] = date("Y-m-d G:i:s");
					$this->db->insert('action_log', $action_log);
					return redirect('front/case_list');
				} else {
					$post['active_inactive'] = 1;
					$post = $this->security->xss_clean($post);
					$insert_id = $this->case_mod->store_case($post);
					//$insert_id = $this->db->insert_id();
					$action_log['role'] = '3';
					$action_log['customer_id'] = $this->session->userdata('user_id');
					$action_log['action_id'] = $insert_id;
					$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
					$action_log['device'] = getDeviceName();

					$action_log['action_type'] = 'e-service';
					$action_log['status_type'] = 'add new';
					$action_log['create_date'] = date("Y-m-d G:i:s");
					$this->db->insert('action_log', $action_log);
					return redirect('front/case_list');
				}
			}

			public function find_case($id)
			{
				$data = $this->case_mod->find_case_cus($id); //cuse na data
				$ser = $this->case_mod->dis_services(); //service display mate
				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = 'e-service';
				$action_log['action_id'] = $id;
				$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
				$action_log['device'] = getDeviceName();

				$action_log['status_type'] = 'edit view';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$this->db->insert('action_log', $action_log);
				$case_type = $this->case_mod->case_type();

				$this->load->view('add_case', ['case_type' => $case_type, 'service' => $ser, 'data' => $data]);
			}

			public function delete_case()
			{
				$id = $this->input->post('id');
				$this->case_mod->delete_case_tmp($id);
				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = 'e-service';
				$action_log['action_id'] = $id;
				$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
				$action_log['device'] = getDeviceName();

				$action_log['status_type'] = 'delete';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$this->db->insert('action_log', $action_log);
				echo json_encode('delete case successfully');
			}

			public function view_case($id) //je case edit karva no 6e te find karva mate
			{
				$data = $this->case_mod->find_case($id); //cuse na data
				$ser = $this->case_mod->dis_services(); //service display mate
				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = 'e-service';
				$action_log['action_id'] = $id;
				$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
				$action_log['device'] = getDeviceName();

				$action_log['status_type'] = 'view';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$this->db->insert('action_log', $action_log);


				$session =  $this->db->select("session_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = session_mission.case_id", 'left')
					->where("session_mission.case_id", $id)->where("session_mission.sub_mission_id", 0)
					->get('session_mission')
					->result_array();

				//$writings=$this->db->select('*')->where('client_file_number',$client_file_number)->get('writing_misssion')->result_array(); 

				$writings =  $this->db->select("writing_misssion.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = writing_misssion.case_id", 'left')
					->where("writing_misssion.case_id", $id)->where("writing_misssion.sub_mission_id", 0)
					->get('writing_misssion')
					->result_array();


				//$consultation=$this->db->select('*')->where('client_file_number',$client_file_number)->get('consultation_mission')->result_array();

				$consultation =  $this->db->select("consultation_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = consultation_mission.case_id", 'left')
					->where("consultation_mission.case_id", $id)->where("consultation_mission.sub_mission_id", 0)
					->get('consultation_mission')
					->result_array();

				//$general=$this->db->select('*')->where('client_file_number',$client_file_number)->get('general_mission')->result_array();

				$general =  $this->db->select("general_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = general_mission.case_id", 'left')
					->where("general_mission.case_id", $id)->where("general_mission.sub_mission_id", 0)
					->get('general_mission')
					->result_array();

				//$visiting=$this->db->select('*')->where('client_file_number',$client_file_number)->get('visiting_mission')->result_array(); 

				$visiting =  $this->db->select("visiting_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = visiting_mission.case_id", 'left')
					->where("visiting_mission.case_id", $id)->where("visiting_mission.sub_mission_id", 0)
					->get('visiting_mission')
					->result_array();


				$this->load->view('view_case', ['service' => $ser, 'data' => $data, 'session' => $session, 'writings' => $writings, 'consultation' => $consultation, 'visiting' => $visiting, 'general'=>$general]);
			}

			function print_case_pdf($id)
			{
				$filename = time() . "_order.pdf";
				$data = $this->case_mod->find_case($id);
				$pdfFilePath = "output_pdf_name.pdf";
				$this->load->library('m_pdf');
				$stylesheet = file_get_contents('assets/scss/style.scss');
				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = 'e-service';
				$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
				$action_log['device'] = getDeviceName();

				$action_log['action_id'] = $id;
				$action_log['status_type'] = 'pdf';
				$this->db->insert('action_log', $action_log);
				$html = $this->load->view('print_case_pdf', ['data' => $data], true);
				$this->m_pdf->pdf->WriteHTML($stylesheet, 1);
				$this->m_pdf->pdf->WriteHTML($html);
				$this->m_pdf->pdf->Output($pdfFilePath, "D");
			}
			public function view_appoinment($id)
			{
				/* 		$data = $this->db->select('*')->from('session_mission')->where('id', $id)->get()->
		first_row(); */
				$data =  $this->db->select("session_mission.*,c_case.id as case_id,
			c_case.customers_id, 
			c_case.user_id,
			c_case.identification_number,
			c_case.identification_types,
			c_case.other_identification_types,
			c_case.client_file_number,
			c_case.client_name,
			c_case.branch,
			c_case.contract_number,
			c_case.service_types,
			c_case.other_service_types,
			c_case.case_code,
			c_case.case_type,
			c_case.case_number,
			c_case.case_title,
			c_case.case_date,
			c_case.case_start_date,
			c_case.contact_number,
			c_case.opponent_full_name,
			c_case.opponent_note,
			c_case.opponent_phone,
			c_case.court_name,
			c_case.court_number,
			c_case.court_address,
			c_case.judge_name,
			c_case.opponent_lawyer,
			c_case.referral_number,
			c_case.referral_title,
			c_case.referral_date,
			c_case.verdict_number,
			c_case.verdict_date,
			c_case.objection_number,
			c_case.objection_date,
			c_case.case_status")
					->join('c_case', "c_case.id = session_mission.case_id", 'left')
					->where("(session_mission.id = $id)", NULL, FALSE)
					->get('session_mission')
					->row();

				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = 'session_mission';
				$action_log['action_id'] = $id;
				$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
				$action_log['device'] = getDeviceName();

				$action_log['status_type'] = 'view';
				$this->db->insert('action_log', $action_log);
				$this->load->view('view_appoinment', ['data' => $data]);
			}
			public function view_writings_appoinment($id)
			{

				$data =  $this->db->select("writing_misssion.*,c_case.id as case_id,
			c_case.customers_id, 
			c_case.user_id,
			c_case.identification_number,
			c_case.identification_types,
			c_case.other_identification_types,
			c_case.client_file_number,
			c_case.client_name,
			c_case.branch,
			c_case.contract_number,
			c_case.service_types,
			c_case.other_service_types,
			c_case.case_code,
			c_case.case_type,
			c_case.case_number,
			c_case.case_title,
			c_case.case_date,
			c_case.case_start_date,
			c_case.contact_number,
			c_case.opponent_full_name,
			c_case.opponent_note,
			c_case.opponent_phone,
			c_case.court_name,
			c_case.court_number,
			c_case.court_address,
			c_case.judge_name,
			c_case.opponent_lawyer,
			c_case.referral_number,
			c_case.referral_title,
			c_case.referral_date,
			c_case.verdict_number,
			c_case.verdict_date,
			c_case.objection_number,
			c_case.objection_date,
			c_case.case_status")
					->join('c_case', "c_case.id =writing_misssion.case_id", 'left')
					->where("(writing_misssion.id = $id)", NULL, FALSE)
					->get('writing_misssion')
					->row();

				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = 'writing_misssion';
				$action_log['action_id'] = $id;
				$action_log['status_type'] = 'view';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
				$action_log['device'] = getDeviceName();

				$this->db->insert('action_log', $action_log);
				$this->load->view('view_writings_appoinment', ['data' => $data]);
			}
			public function view_consultation_appoinment($id)
			{

				$data =  $this->db->select("consultation_mission.*,c_case.id as case_id,
			c_case.customers_id, 
			c_case.user_id,
			c_case.identification_number,
			c_case.identification_types,
			c_case.other_identification_types,
			c_case.client_file_number,
			c_case.client_name,
			c_case.branch,
			c_case.contract_number,
			c_case.service_types,
			c_case.other_service_types,
			c_case.case_code,
			c_case.case_type,
			c_case.case_number,
			c_case.case_title,
			c_case.case_date,
			c_case.case_start_date,
			c_case.contact_number,
			c_case.opponent_full_name,
			c_case.opponent_note,
			c_case.opponent_phone,
			c_case.court_name,
			c_case.court_number,
			c_case.court_address,
			c_case.judge_name,
			c_case.opponent_lawyer,
			c_case.referral_number,
			c_case.referral_title,
			c_case.referral_date,
			c_case.verdict_number,
			c_case.verdict_date,
			c_case.objection_number,
			c_case.objection_date,
			c_case.case_status")
					->join('c_case', "c_case.id = consultation_mission.case_id", 'left')
					->where("(consultation_mission.id = $id)", NULL, FALSE)
					->get('consultation_mission')
					->row();

				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = 'consultation_mission';
				$action_log['action_id'] = $id;
				$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
				$action_log['device'] = getDeviceName();

				$action_log['status_type'] = 'view';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$this->db->insert('action_log', $action_log);
				$this->load->view('view_consultation_appoinment', ['data' => $data]);
			}
			public function view_visiting_appoinment($id)
			{

				$data =  $this->db->select("visiting_mission.*,c_case.id as case_id,
			c_case.customers_id, 
			c_case.user_id,
			c_case.identification_number,
			c_case.identification_types,
			c_case.other_identification_types,
			c_case.client_file_number,
			c_case.client_name,
			c_case.branch,
			c_case.contract_number,
			c_case.service_types,
			c_case.other_service_types,
			c_case.case_code,
			c_case.case_type,
			c_case.case_number,
			c_case.case_title,
			c_case.case_date,
			c_case.case_start_date,
			c_case.contact_number,
			c_case.opponent_full_name,
			c_case.opponent_note,
			c_case.opponent_phone,
			c_case.court_name,
			c_case.court_number,
			c_case.court_address,
			c_case.judge_name,
			c_case.opponent_lawyer,
			c_case.referral_number,
			c_case.referral_title,
			c_case.referral_date,
			c_case.verdict_number,
			c_case.verdict_date,
			c_case.objection_number,
			c_case.objection_date,
			c_case.case_status")
					->join('c_case', "c_case.id = visiting_mission.case_id", 'left')
					->where("(visiting_mission.id = $id)", NULL, FALSE)
					->get('visiting_mission')
					->row();
				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = '	visiting_mission';
				$action_log['action_id'] = $id;
				$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
				$action_log['device'] = getDeviceName();

				$action_log['status_type'] = 'view';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$this->db->insert('action_log', $action_log);
				$this->load->view('view_visiting_appoinment', ['data' => $data]);
			}
			public function view_general_appoinment($id)
			{

				$data =  $this->db->select("general_mission.*,c_case.id as case_id,
			c_case.customers_id, 
			c_case.user_id,
			c_case.identification_number,
			c_case.identification_types,
			c_case.other_identification_types,
			c_case.client_file_number,
			c_case.client_name,
			c_case.branch,
			c_case.contract_number,
			c_case.service_types,
			c_case.other_service_types,
			c_case.case_code,
			c_case.case_type,
			c_case.case_number,
			c_case.case_title,
			c_case.case_date,
			c_case.case_start_date,
			c_case.contact_number,
			c_case.opponent_full_name,
			c_case.opponent_note,
			c_case.opponent_phone,
			c_case.court_name,
			c_case.court_number,
			c_case.court_address,
			c_case.judge_name,
			c_case.opponent_lawyer,
			c_case.referral_number,
			c_case.referral_title,
			c_case.referral_date,
			c_case.verdict_number,
			c_case.verdict_date,
			c_case.objection_number,
			c_case.objection_date,
			c_case.case_status")
					->join('c_case', "c_case.id = general_mission.case_id", 'left')
					->where("(general_mission.id = $id)", NULL, FALSE)
					->get('general_mission')
					->row();
				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = '	general_mission';
				$action_log['action_id'] = $id;
				$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
				$action_log['device'] = getDeviceName();

				$action_log['status_type'] = 'view';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$this->db->insert('action_log', $action_log);
				$this->load->view('view_general_appoinment', ['data' => $data]);
			}
			function print_writings_pdf($id)
			{
				$filename = time() . "_writings.pdf";
				$data =  $this->db->select("writing_misssion.*,c_case.id as case_id,
			c_case.customers_id, 
			c_case.user_id,
			c_case.identification_number,
			c_case.identification_types,
			c_case.other_identification_types,
			c_case.client_file_number,
			c_case.client_name,
			c_case.branch,
			c_case.contract_number,
			c_case.service_types,
			c_case.other_service_types,
			c_case.case_code,
			c_case.case_type,
			c_case.case_number,
			c_case.case_title,
			c_case.case_date,
			c_case.case_start_date,
			c_case.contact_number,
			c_case.opponent_full_name,
			c_case.opponent_note,
			c_case.opponent_phone,
			c_case.court_name,
			c_case.court_number,
			c_case.court_address,
			c_case.judge_name,
			c_case.opponent_lawyer,
			c_case.referral_number,
			c_case.referral_title,
			c_case.referral_date,
			c_case.verdict_number,
			c_case.verdict_date,
			c_case.objection_number,
			c_case.objection_date,
			c_case.case_status")
					->join('c_case', "c_case.id = writing_misssion.case_id", 'left')
					->where("(writing_misssion.id = $id)", NULL, FALSE)
					->get('writing_misssion')
					->row();
				$this->load->library('m_pdf');
				$stylesheet = file_get_contents('assets/scss/style.scss');
				$html = $this->load->view('print_writings_appoinment', ['data' => $data], true);
				$this->m_pdf->pdf->WriteHTML($stylesheet, 1);
				$this->m_pdf->pdf->WriteHTML($html);
				$this->m_pdf->pdf->Output($filename, "D");
			}
			function print_session_pdf($id)
			{
				$filename = time() . "_session.pdf";
				$data =  $this->db->select("session_mission.*,c_case.id as case_id,
			c_case.customers_id, 
			c_case.user_id,
			c_case.identification_number,
			c_case.identification_types,
			c_case.other_identification_types,
			c_case.client_file_number,
			c_case.client_name,
			c_case.branch,
			c_case.total_of_case_number,
			c_case.service_types,
			c_case.other_service_types,
			c_case.case_code,
			c_case.case_type,
			c_case.case_number,
			c_case.case_title,
			c_case.case_date,
			c_case.case_start_date,
			c_case.contact_number,
			c_case.opponent_full_name,
			c_case.opponent_note,
			c_case.opponent_phone,
			c_case.court_name,
			c_case.court_number,
			c_case.court_address,
			c_case.judge_name,
			c_case.opponent_lawyer,
			c_case.referral_number,
			c_case.referral_title,
			c_case.referral_date,
			c_case.verdict_number,
			c_case.verdict_date,
			c_case.objection_number,
			c_case.objection_date,
			c_case.case_status")
					->join('c_case', "c_case.id = session_mission.case_id", 'left')
					->where("(session_mission.id = $id)", NULL, FALSE)
					->get('session_mission')
					->row();
				$this->load->library('m_pdf');
				$stylesheet = file_get_contents('assets/scss/style.scss');
				$html = $this->load->view('print_writings_appoinment', ['data' => $data], true);
				$this->m_pdf->pdf->WriteHTML($stylesheet, 1);
				$this->m_pdf->pdf->WriteHTML($html);
				$this->m_pdf->pdf->Output($filename, "D");
			}
			function print_visting_pdf($id)
			{
				$filename = time() . "_visiting.pdf";
				$data =  $this->db->select("visiting_mission.*,c_case.id as case_id,
			c_case.customers_id, 
			c_case.user_id,
			c_case.identification_number,
			c_case.identification_types,
			c_case.other_identification_types,
			c_case.client_file_number,
			c_case.client_name,
			c_case.branch,
			c_case.total_of_case_number,
			c_case.service_types,
			c_case.other_service_types,
			c_case.case_code,
			c_case.case_type,
			c_case.case_number,
			c_case.case_title,
			c_case.case_date,
			c_case.case_start_date,
			c_case.contact_number,
			c_case.opponent_full_name,
			c_case.opponent_note,
			c_case.opponent_phone,
			c_case.court_name,
			c_case.court_number,
			c_case.court_address,
			c_case.judge_name,
			c_case.opponent_lawyer,
			c_case.referral_number,
			c_case.referral_title,
			c_case.referral_date,
			c_case.verdict_number,
			c_case.verdict_date,
			c_case.objection_number,
			c_case.objection_date,
			c_case.case_status")
					->join('c_case', "c_case.id = visiting_mission.case_id", 'left')
					->where("(visiting_mission.id = $id)", NULL, FALSE)
					->get('visiting_mission')
					->row();
				$this->load->library('m_pdf');
				$stylesheet = file_get_contents('assets/scss/style.scss');
				$html = $this->load->view('print_writings_appoinment', ['data' => $data], true);
				$this->m_pdf->pdf->WriteHTML($stylesheet, 1);
				$this->m_pdf->pdf->WriteHTML($html);
				$this->m_pdf->pdf->Output($filename, "D");
			}
			function print_consultation_pdf($id)
			{
				$filename = time() . "_consultation.pdf";
				$data =  $this->db->select("consultation_mission.*,c_case.id as case_id,
			c_case.customers_id, 
			c_case.user_id,
			c_case.identification_number,
			c_case.identification_types,
			c_case.other_identification_types,
			c_case.client_file_number,
			c_case.client_name,
			c_case.branch,
			c_case.total_of_case_number,
			c_case.service_types,
			c_case.other_service_types,
			c_case.case_code,
			c_case.case_type,
			c_case.case_number,
			c_case.case_title,
			c_case.case_date,
			c_case.case_start_date,
			c_case.contact_number,
			c_case.opponent_full_name,
			c_case.opponent_note,
			c_case.opponent_phone,
			c_case.court_name,
			c_case.court_number,
			c_case.court_address,
			c_case.judge_name,
			c_case.opponent_lawyer,
			c_case.referral_number,
			c_case.referral_title,
			c_case.referral_date,
			c_case.verdict_number,
			c_case.verdict_date,
			c_case.objection_number,
			c_case.objection_date,
			c_case.case_status")
					->join('c_case', "c_case.id = consultation_mission.case_id", 'left')
					->where("(consultation_mission.id = $id)", NULL, FALSE)
					->get('consultation_mission')
					->row();
				$this->load->library('m_pdf');
				$stylesheet = file_get_contents('assets/scss/style.scss');
				$html = $this->load->view('print_writings_appoinment', ['data' => $data], true);
				$this->m_pdf->pdf->WriteHTML($stylesheet, 1);
				$this->m_pdf->pdf->WriteHTML($html);
				$this->m_pdf->pdf->Output($filename, "D");
			}
			function print_general_pdf($id)
			{
				$filename = time() . "_general.pdf";
				$data =  $this->db->select("general_mission.*,c_case.id as case_id,
			c_case.customers_id, 
			c_case.user_id,
			c_case.identification_number,
			c_case.identification_types,
			c_case.other_identification_types,
			c_case.client_file_number,
			c_case.client_name,
			c_case.branch,
			c_case.total_of_case_number,
			c_case.service_types,
			c_case.other_service_types,
			c_case.case_code,
			c_case.case_type,
			c_case.case_number,
			c_case.case_title,
			c_case.case_date,
			c_case.case_start_date,
			c_case.contact_number,
			c_case.opponent_full_name,
			c_case.opponent_note,
			c_case.opponent_phone,
			c_case.court_name,
			c_case.court_number,
			c_case.court_address,
			c_case.judge_name,
			c_case.opponent_lawyer,
			c_case.referral_number,
			c_case.referral_title,
			c_case.referral_date,
			c_case.verdict_number,
			c_case.verdict_date,
			c_case.objection_number,
			c_case.objection_date,
			c_case.case_status")
					->join('c_case', "c_case.id = general_mission.case_id", 'left')
					->where("(general_mission.id = $id)", NULL, FALSE)
					->get('general_mission')
					->row();
				$this->load->library('m_pdf');
				$stylesheet = file_get_contents('assets/scss/style.scss');
				$html = $this->load->view('print_writings_appoinment', ['data' => $data], true);
				$this->m_pdf->pdf->WriteHTML($stylesheet, 1);
				$this->m_pdf->pdf->WriteHTML($html);
				$this->m_pdf->pdf->Output($filename, "D");
			}
			function calendar()
			{
				$id = $this->session->userdata('user_id');
				$data =  $this->db->select("visiting_mission.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
					->join('c_case', "c_case.id = visiting_mission.case_id", 'left')
					->where("(c_case.customers_id = $id  AND status=0)", NULL, FALSE)->where("visiting_mission.sub_mission_id", 0)
					->get('visiting_mission')
					->result_array();
				foreach ($data as $cd) {
					$misssion[$cd['case_id']][$cd['id']] = $cd;
				}
				$action_log['role'] = '3';
				$action_log['customer_id'] = $this->session->userdata('user_id');
				$action_log['action_type'] = 'visiting_mission';
				$action_log['status_type'] = 'list_view';
				$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$action_log['device'] = getDeviceName();

				$this->db->insert('action_log', $action_log);
				$this->load->view('calendar', ['data' => $misssion]);
			}

			function all_activities(){
				$this->load->view('all_activities');
			}
		}


					?>