<?php
class front_mod extends CI_Model
{
	public function select_services()
	{
		return $this->db->get('services')->result_array();
	}
	public function case_type()
	{
		$ct = $this->db->select(['id', 'name'])
			->get('case_type');
		return $ct->result_array();
	}
	public function login_check($email, $password) //login check karva mate
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		} else {
			if (strlen($email) >= 10) {
				$email = ltrim($email, '0');
			}
		}
		/*   $q = $this->db->select(['customers_id'])
			->where('case_number', $email)
			->get('c_case')
			->row_array(); 

		if ($q) { 
			//jyare case number thi login thai tyare if true thai
			 $this->session->set_userdata('case_number', $email);
			return $this->db->select('*')
				->where('id', $q['customers_id'])
				->where('password', md5($password))
				->where(['role_id' => 3, 'is_delete' => 0])
				->get('users')
				->row_array(); // print_r($q['customers_id']); exit;
				
		} else {
		 */
		$a = $this->db->select('*')
			->where("(email='$email' OR phone='$email')", NULL, FALSE)
			->get('users')
			->row_array();
		if ($a['status'] == 0) {
			echo "block";
			return false;
		}
		if ($a['password'] == md5($password) && $a['role_id'] == 3 && $a['is_delete'] == 0) {
			$array = $this->db->select('*')
				->where("(email='$email' OR phone='$email' )", NULL, FALSE)
				->get('users')
				->row_array();

			if ($array['id']) {
				$digits_needed = 4;

				$random_number = ''; // set up a blank string

				$count = 0;

				while ($count < $digits_needed) {
					$random_digit = mt_rand(0, 9);

					$random_number .= $random_digit;
					$count++;
				}

				$this->db->where('id', $array['id'])->update('users', ['otp' => $random_number]);
				if ($this->session->userdata('site_lang') == "arabic") {

					$msg = "شريكنا العزيز: مرحبًا بك في منصة نصر

للدخول يرجى إضافة رمز التفعيل" . $random_number;
				} else {
					$msg = "Dear Partner: Welcome to “Nassr” platform\nPlease enter your activation code: " . $random_number;
				}
				$jsonObj = array(
					// 'mobile' => '0595557384',                        
					// 'password' => 'Om5762fa',                      
					'apiKey' => 'c05990df25f97ddda831392752f7eb0b',
					'sender' => 'Nassr APP',
					'numbers' => $a['country_code'] . $a['phone'],
					'msg' => $msg,
					'msgId' => rand(1, 99999),
					'timeSend' => '0',
					'dateSend' => '0',
					'deleteKey' => '55348',
					'lang' => '3',
					'applicationType' => 68,
				);
				//$result = $this->Sms->sendSMS_2($jsonObj);
				// print_r($result);
				$users = $this->db->select('*')->where('id', $array['id'])->get('users')->row_array();
				$email = $users['email'];
				$name = $users['name'];

				$config = array(
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'priority' => '1',
				);
				$this->load->library('email', $config);
				$new = ['to_email' => $email, 'sub' => 'otp', 'role_id' => 3, 'otp' => $random_number];
				$from_email = constant("FROM_EMAIL");
				$to_email = $email;
				$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
				$this->email->set_header('Content-type', 'text/html');
				$this->email->from($from_email, constant("SENDER_NAME"));
				$this->email->to($to_email);
				$this->email->subject($this->lang->line('OTP_For_Login'));
				$body = $this->load->view('email.php', $new, true);

				$this->email->message($body);
				$this->email->send();
				$array['otp'] = $random_number;
				$array['otpphone'] = $a['phone'];
			}
			return $array;
		}
		//}
	}
	public function otp_verify($otp, $user_id)
	{
		$array =  $this->db->select('*')
			->where("(otp='$otp' AND id='$user_id' )")
			->get('user_temp')
			->row_array();

		if ($array) {
			//$this->db->where('id', $array['id'])->update('user_temp', ['otp' => '0']);
			return $array;
		} else {
			$data =  $this->db->select('*')
				->where("(otp='$otp' AND id='$user_id' )")
				->get('users')
				->row_array();
			if ($data) {
				//	$this->db->where('id', $array['id'])->update('users', ['otp' => '0']);
				$data['is_login'] = true;
				return $data;
			}
		}
		return false;
	}
	public function check()
	{
		//je user login che te no case case temp ma che ke nthi te check krva mate
		$case_number = $this->session->userdata('case_number');
		return $this->db->select('case_number')->where('case_number', $case_number)->get('case_temp');
	}
	public function store_details($user)
	{
		//case store karva mate
		$user['status'] = 1;
		$this->db->insert('user_temp', $user);
		$id = $this->db->insert_id();
		$this->session->set_userdata('user_id', $id);
		//$array = '';	
		if ($id) {
			$digits_needed = 4;

			$random_number = ''; // set up a blank string

			$count = 0;

			while ($count < $digits_needed) {
				$random_digit = mt_rand(0, 9);

				$random_number .= $random_digit;
				$count++;
			}
			$this->db->where('id', $id)->update('user_temp', ['otp' => $random_number]);
			if ($this->session->userdata('site_lang') == "arabic") {
				$msg = "شريكنا العزيز:                                                 

شكرًا لتسجيلكم في منصة  نصر

نتطلع دومًا لخدمتكم باحترافية ولإنجاز أعمالكم بمهنيَّة.

نرجو إضافة رمز التفعيل:

" . $random_number;
			} else {
				$msg = 'Dear Partner, Thank you for registering in "“Nassr”"\n We look forward to serving you professionally and to finalizing your works perfectly.\n Please enter your activation code:' . $random_number;
			}
			$jsonObj = array(
				// 'mobile' => '0595557384',                        
				// 'password' => 'Om5762fa',                      
				'apiKey' => 'c05990df25f97ddda831392752f7eb0b',
				'sender' => 'Nassr APP',
				'numbers' => $user['country_code'] . $user['phone'],
				'msg' => $msg,
				'msgId' => rand(1, 99999),
				'timeSend' => '0',
				'dateSend' => '0',
				'deleteKey' => '55348',
				'lang' => '3',
				'applicationType' => 68,
			);
			$result = $this->Sms->sendSMS($jsonObj);
			$users = $this->db->select('*')->where('id', $id)->get('user_temp')->row_array();
			$email = $users['email'];
			$name = $users['name'];

			$config = array(
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'priority' => '1',
			);
			$this->load->library('email', $config);

			$new = ['to_email' => $email, 'sub' => 'otp', 'role_id' => 3, 'otp' => $random_number];
			$from_email = constant("FROM_EMAIL");
			$to_email = $email;
			$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
			$this->email->set_header('Content-type', 'text/html');
			$this->email->from($from_email, constant("SENDER_NAME"));
			$this->email->to($to_email);
			$this->email->subject($this->lang->line('OTP_For_Registration'));

			$body = $this->load->view('email.php', $new, true);


			$this->email->message($body);
			$this->email->send();
			$array['otp'] = $random_number;
			$array['id'] = $id;
		}
		return $array;
	}

	public function index_news()
	{
		//index par je news che te display mate
		return $this->db->select(['id', 'title', 'discription', 'image'])->order_by('id', "desc")->limit('3')->get('news')->result_array();
	}
	public function insert_password($password)
	{
		//password insert karva mate
		$id = $this->session->userdata('user_id');
		$this->db->where('user_id', $id)->update('user_temp', ['password' => $password]);
		return $this->db->where('id', $id)->update('users', ['password' => $password]);
	}
	public function check_forgotpassword($email, $pass) //password forgot thia tyare
	{
		return $this->db->where("(email='$email' OR phone='$email')", NULL, FALSE)
			->update('users', ['password' => md5($pass)]);
	}

	public function index_team()
	{
		//dashboard par team display krva mate
		return $this->db->order_by('id', "asc")->limit(3)->get('team_members')->result_array();
	}

	public function index_clients()
	{
		//dashboard upar clients display krva mate
		return $this->db->get('clients')->result_array();
	}

	public function save_employment($data)
	{

		if ($data['employment'] == 'job') {
			$query = $this->db->insert('job_employment', $data);
			return true;
		} else if ($data['employment'] == 'training') {
			unset($data['work_experience']);
			$query = $this->db->insert('training_employment', $data);
			return true;
		}
		return false;
	}
}
