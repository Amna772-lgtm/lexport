<?php
class packages extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/packages_mod');
	}
	public function packages() //packages display karva mate ane add mate
	{
		$data = $this->packages_mod->packages();
		$service = $this->packages_mod->service();
		$this->load->view('admin/packages_view', ['data' => $data, 'service' => $service, 'info' => '']);
	}

	public function add_packages() {
		//package add karva mate
		$data = $this->input->post();
		if ($this->form_validation->run('add_packages')) {

			if ($data['id']) {
				$duration = ['0' => $data['duration'], '1' => $data['distance']];
				$dur = implode(' ', $duration);
				$id = $data['id'];
				unset($data['duration']);
				unset($data['distance']);
				unset($data['id']);
				$data['duration'] = $dur;

				$this->packages_mod->edit_package($id, $data);
				return redirect('admin/packages/packages');
			} else {
				$duration = ['0' => $data['duration'], '1' => $data['distance']];
				$dur = implode(' ', $duration);
				unset($data['duration']);
				unset($data['distance']);
				$data['duration'] = $dur;
				$this->packages_mod->add_packages($data);
				return redirect('admin/packages/packages');
			}
		} else {
			if ($data['id']) {
				$info = $this->packages_mod->find_package($data['id']);
				$data = $this->packages_mod->packages();
				$service = $this->packages_mod->service();
				$this->load->view('admin/packages_view', ['data' => $data, 'service' => $service, 'info' => $info]);
			} else {
				$data = $this->packages_mod->packages();
				$service = $this->packages_mod->service();
				$this->load->view('admin/packages_view', ['data' => $data, 'service' => $service, 'info' => '']);
			}
		}
	}

	public function find_package($id) {
		//je package edit karva nu cher e find karva mate
		$info = $this->packages_mod->find_package($id);
		$data = $this->packages_mod->packages();
		$service = $this->packages_mod->service();
		$this->load->view('admin/packages_view', ['data' => $data, 'service' => $service, 'info' => $info]);
	}

	public function delete_packages() //packages ne delete karva mate
	{
		$id = $this->input->post();
		$this->packages_mod->delete_packages($id);
		echo json_encode('delete successful');
	}
}

?>