<?php
class Admin_model extends CI_Model
{
	//-----------------ADMIN---------------------------
	// start datatables
	var $column_order = array(null, 'nama', 'no_identitas', 'image', 'email', 'no_telp', 'date_created'); //set column field database for datatable orderable
	var $column_search = array('nama', 'no_identitas', 'email'); //set column field database for datatable searchable
	var $order = array('date_created' => 'desc'); // default order

	private function _get_datatables_query()
	{
		$this->db->select('*');
		$this->db->from('admin');
		$index = 0;
		foreach ($this->column_search as $item) { // loop column
			if (@$_POST['search']['value']) { // if datatable send POST for search
				if ($index === 0) { // first loop
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				$this->db->or_like($item, $_POST['search']['value']);
				if (count($this->column_search) - 1 == $index) {
					$this->db->group_end(); //close bracket
				}
			}
			$index++;
		}

		if (isset($_POST['order'])) { // here order processing
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	function get_datatables()
	{
		$this->_get_datatables_query();
		if (@$_POST['length'] != -1) {
			$this->db->limit(@$_POST['length'], @$_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}
	function count_all()
	{
		$this->db->from('admin');
		return $this->db->count_all_results();
	}
	// end datatables

	public function getAdmin()
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->order_by('admin.date_created', 'desc');
		return $this->db->get()->result();
	}

	public function getAdminPagination($limit, $start)
	{
		$this->db->select('*');
		return $this->db->get('admin', $limit, $start)->result();
	}

	public function countAllAdmin()
	{
		return $this->db->get('admin')->num_rows();
	}

	public function getAdminById($id_admin)
	{
		return $this->db->get_where('admin', ['no_identitas' => $id_admin])->row();
	}

	public function inputAdmin($data)
	{
		$this->db->insert('admin', $data);
	}

	public function editAdmin($id_admin, $nama, $email, $no_telp)
	{
		$this->db->set('nama', $nama);
		$this->db->set('email', $email);
		$this->db->set('no_telp', $no_telp);
		$this->db->where('no_identitas', $id_admin);
		return $this->db->update('admin');
	}

	public function deleteAdmin($id_admin)
	{
		$this->db->where('no_identitas', $id_admin);
		return $this->db->delete('admin');
	}

	public function getUserById($id_admin)
	{
		return $this->db->get_where('admin', ['no_identitas' => $id_admin])->row_array();
	}
}
