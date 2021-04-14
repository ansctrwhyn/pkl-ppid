<?php
class Kategori_model extends CI_Model
{
	// start datatables
	var $column_order = array(null, 'kategori'); //set column field database for datatable orderable
	var $column_search = array('kategori'); //set column field database for datatable searchable
	var $order = array('kategori' => 'asc'); // default order

	private function _get_datatables_query()
	{
		$this->db->select('*');
		$this->db->from('kategori');
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
		$this->db->from('kategori');
		return $this->db->count_all_results();
	}
	// end datatables

	//---------------------------KATEGORI----------------------------
	public function getKategori()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		return $this->db->get()->result();
	}
	public function getKategoriInformasi()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		return $this->db->get()->result_array();
	}

	public function getKategoriPagination($limit, $start)
	{
		$this->db->select('*');
		return $this->db->get('kategori', $limit, $start)->result();
	}

	public function countAllKategori()
	{
		return $this->db->get('kategori')->num_rows();
	}

	public function inputKategori($data)
	{
		$this->db->insert('kategori', $data);
	}

	public function editKategori($id_kategori, $kategori)
	{
		$this->db->set('kategori', $kategori);
		$this->db->where('id_kategori', $id_kategori);
		return $this->db->update('kategori');
	}

	public function deleteKategori($id_kategori)
	{
		$this->db->where('id_kategori', $id_kategori);
		return $this->db->delete('kategori');
	}

	public function getKategoriById($id_kategori)
	{
		return $this->db->get_where('kategori', ['id_kategori' => $id_kategori])->row_array();
	}
}
