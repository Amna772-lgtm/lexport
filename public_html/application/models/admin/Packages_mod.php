<?php
class packages_mod extends CI_Model {
	public function packages() //packages display karva mate
	{
		return $this->db->select(['id', 'package_name', 'amount'])->order_by("id", "asc")->get('packages')->result_array();
	}

	public function add_packages($data) {
//package add karva mate
		return $this->db->insert('packages', $data);
	}

	public function find_package($id) {
		//je package edit karva nu che e find karva mate
		return $this->db->get_where('packages', ['id' => $id])->row_array();
	}

	public function edit_package($id, $data) {
//package edit karyu
		return $this->db->where('id', $id)->update('packages', $data);
	}

	public function service() {
		//service select karva mate
		return $this->db->select(['id', 'name'])->get('services')->result_array();
	}

	public function delete_packages($id) //packages ne delete karva mte
	{
		return $this->db->delete('packages', $id);
	}
}
?>