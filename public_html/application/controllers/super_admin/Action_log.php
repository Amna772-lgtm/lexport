 <?php
class action_log extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
            if (intval($this->session->userdata('admin_id'))<1) {
            redirect('super_admin/login', 'refresh');
            exit;
        }
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('pagination');
        $this->load->model('super_admin/action_log_mod');
    }

    public function index()
    {
        $log =  $_GET['log'];
        if($log != ''){
	    $this->session->set_userdata('_log', $log);
        }
	    $log =$this->session->userdata('_log');
		if($log == "service"){
			 $ct = $this->db->select('*')->where('action_type',"$log")->get('action_log')->num_rows(); 
		} else if($log == "mission"){
			$ct = $this->db->select('*')
			->where('action_type',"consultation_mission")
			->or_where('action_type',"visiting_mission")
			->or_where('action_type',"writing_mission")
			->or_where('action_type',"session_mission")
			->or_where('action_type',"general_mission")
			->get('action_log')->num_rows(); 
		}else if($log == "emp"){
			$ct = $this->db->select('*')->where('role',"2")->get('action_log')->num_rows(); 
		}else if($log == "clt"){
			$ct = $this->db->select('*')->where('role',"3")->get('action_log')->num_rows(); 
		}
		$this->db->count_all('action_log');
        //pagination settings
        $config['base_url'] = site_url('super_admin/action_log/index');
        $config['total_rows'] = $ct;
        $config['per_page'] = "100";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"]/$config["per_page"];
        $config['use_page_numbers'] = TRUE;
        $config["num_links"] =10;

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '«';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $start= (int)$this->uri->segment(4) * $config['per_page']+1;
        $end = ($this->uri->segment(3) == floor($config['total_rows']/ $config['per_page']))? $config['total_rows'] : (int)$this->uri->segment(4) * $config['per_page'] + $config['per_page'];
        $qwe = 100;
        if(floor($start/$qwe) == 0){
           $qwert=1;
        } else { $qwert = floor($start/$qwe);} 
        $data['result_count']= "Showing 1 - ".$qwert." of ".round($config['total_rows']/$qwe)." Results";
        $this->pagination->initialize($config);
        
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        
        // get books list
        $data['posts'] = $this->action_log_mod->get_action_log($config["per_page"], $data['page'], NULL,$log);
        
        $data['pagination'] = $this->pagination->create_links();

        // load view
        $this->load->view('super_admin/action_log_sep',$data);
    }

    function search()
    {
        // get search string
		$search = ($this->input->post("role"))? $this->input->post("role") : "NIL";

        $search = ($this->uri->segment(4)) ? $this->uri->segment(4) : $search;

        // pagination settings
        $config = array();
        $config['base_url'] = site_url("super_admin/action_log/search/$search");
        $config['total_rows'] = $this->action_log_mod->get_books_count($search);
        $config['per_page'] = "50";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = floor($choice);

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        // get books list
         $data['posts'] = $this->action_log_mod->get_action_log($config["per_page"], $data['page'], $search);

        $data['pagination'] = $this->pagination->create_links();

        //Load view
        $this->load->view('super_admin/action_log_sep',$data);
    }
}
?>