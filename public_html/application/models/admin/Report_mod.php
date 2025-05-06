<?php 
class report_mod extends CI_Model
{
public function by_employees($post)
{
	   //$this->db->where('DATE(create_date) BETWEEN "'.$tglmin.'" AND "'.$tglmax.'"', '',false);
	if($post['employee_type'])
	{
	$where=['u.role_id'=>2,'e.monthly_salary >='=>(int)$post['monthly_salary'],'employee_type'=>$post['employee_type']];
	}
	else
	{
		$where=['u.role_id'=>2,'e.monthly_salary >='=>(int)$post['monthly_salary']];
	}
	
	return $this->db->select(['u.name','u.dob','u.address','u.email','u.phone','e.branch','e.bank_accounts','e.bank_name','e.amount','d.d_name','e.employee_type','e.monthly_salary','u.created'])
						->from('employee e')
						->join('users u','e.user_id=u.id')
						->join('department d','e.department_id=d.id')
						->where('u.created  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"')
						->where($where)
						->get()
						->result_array();
}


//*******************------------------by_payment----------------------******************************
public function by_payment($post)
{
	return	$invoice = $this->db->select("
		users.*,invoice_details.*,
		invoice.*")
		->join('invoice_details', "invoice_details.id = transaction.sub_invoice_id")
		->join('invoice', "invoice.id = invoice_details.invoice_id", 'left')
		->join('users', "users.id = invoice.created_by")
		->where('invoice.create_date  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"')
		->where('invoice_details.payment_status',$post['type'])
	//	->order_by("users.id", "desc")
		->get('transaction')->result_array();
}
//*******************------------------by time----------------------******************************
public function by_time($post) 
{
	if($post['type']=='employee')
	{  
		return $this->db->select(['u.name','u.dob','u.address','u.email','u.phone','e.branch','e.bank_accounts','e.bank_name','e.amount','e.employee_type','e.monthly_salary','u.created'])
					->from('employee e')
					->join('users u','e.user_id=u.id')
					->where('u.created  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"')
					->where('role_id',2)
					->get()
					->result_array();
	}
	if($post['type']=='case')
	{
		return $this->db->select(['c.case_number','c.customer_name','c.customer_dob','c.address','c.email','c.service_type','c.amount','c.discount','c.case_total_amount','c.case_situation','c.final_decision','u.name','d.d_name','c.power_of_attorney','c.lawyer','c.judge_name','c.court_name','c.reference','p.package_name','c.agent','c.branch','c.start_date','c.end_date','c.created'])
					->from('c_case c')
					->join('users u','c.employee_id=u.id','left')
					->join('department d','c.department_id=d.id','left')
					->join('packages p','c.package_id=p.id','left')
					->where('c.created  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"')
					->get()
					->result_array();
	}
}

//*****************-------------------------by evaluation-------------------------------******************************

public function department() 
{
	return $this->db->select(['id','d_name'])
									->get('department')
									->result_array();
}
 
public function employee() 
{
	return $this->db->select(['id','name'])
	->where(['role_id'=>2,'status'=>1,'is_delete'=>0])
	->get('users')
	->result_array();
}

public function branch()//branch  
{
	return $this->db->select('branch')
									->distinct()
									->get('employee')
									->result_array();
}

public function by_evaluation($post) 
{
	if($post['employee'])  
	{
		$emp=['e.user_id'=>$post['employee']];
	}
	else
	{
		$emp=[''];
	}

	if($post['department'])// 
	{
		$dep=['e.department_id'=>$post['department']];
	}
	else
	{
		$dep=[''];
	}
	if($post['branch'])// 
	{
		$branch=['e.branch'=>$post['branch']];
	}
	else
	{
		$branch=[''];
	}
	if($post['submit']=='daily')
	{
			date_default_timezone_set('Asia/Kolkata');
			$cur_date=date('Y-m-d');
			$mon_date=date('Y-m-d',strtotime("+1 day"));
			$date=('e.created  BETWEEN "'.$cur_date.'" AND "'.$mon_date.'"');
		
	}
	if($post['submit']=='monthly') 
	{
				date_default_timezone_set('Asia/Kolkata');
				$cur_date=date('Y-m-d');
				$mon_date=date('Y-m-d',strtotime("-1 month"));
				$date=('e.created  BETWEEN "'.$mon_date.'" AND "'.$cur_date.'"');
	}
	if($post['submit']=='weekly') 
	{
				date_default_timezone_set('Asia/Kolkata');
				$cur_date=date('Y-m-d');
				$mon_date=date('Y-m-d',strtotime("-1 week"));
				$date=('e.created  BETWEEN "'.$mon_date.'" AND "'.$cur_date.'"');
	}
	
	$q=$this->db->select(['u.name','u.address','d.d_name','e.branch','e.bank_accounts','e.bank_name','e.employee_type','e.amount','e.monthly_salary'])
										->from('employee e')
										->join('users u','e.user_id=u.id','left')
										->join('department d','e.department_id=d.id','left')
										->where($emp)
										->where($dep)
										->where($branch)
										->where($date)
										->get();
				return 	$q->result_array();
			
}

}
?>