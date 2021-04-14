<?php
class Berita_model extends CI_Model
{
	// start datatables
	var $column_order = array(null, 'judul', 'image', 'isi', 'date_created', 'views'); //set column field database for datatable orderable
	var $column_search = array('judul'); //set column field database for datatable searchable
	var $order = array('date_created' => 'desc'); // default order

	private function _get_datatables_query()
	{
		$this->db->select('*');
		$this->db->from('berita');
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
		$this->db->from('berita');
		return $this->db->count_all_results();
	}
	// end datatables

	public function getNewBerita()
	{
		$this->db->from('berita');
		$this->db->order_by('date_created', 'desc');
		$this->db->limit(3, 0);
		return $this->db->get()->result();
	}

	public function getBerita($limit, $start)
	{
		$this->db->select('*');
		$this->db->order_by('date_created', 'desc');
		return $this->db->get('berita', $limit, $start)->result();
	}

	public function countAllBerita()
	{
		return $this->db->get('berita')->num_rows();
	}

	public function getBeritaTerbaru()
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->order_by('date_created', 'desc');
		$this->db->limit(3, 0);
		return $this->db->get()->result();
	}
	public function inputBerita($data)
	{
		$this->db->insert('berita', $data);
	}

	public function editBerita($id_berita, $judul, $isi)
	{
		$this->db->set('judul', $judul);
		$this->db->set('isi', $isi);
		$this->db->where('id_berita', $id_berita);
		return $this->db->update('berita');
	}

	public function deleteBerita($id_berita)
	{
		$this->db->where('id_berita', $id_berita);
		return $this->db->delete('berita');
	}

	public function getBeritaById($id_berita)
	{
		return $this->db->get_where('berita', ['id_berita' => $id_berita])->row_array();
	}

	public function getBeritaPagination($limit, $start, $keyword)
	{
		$this->db->select('*');
		$this->db->from('berita');
		if ($keyword) {
			$this->db->like('judul', $keyword);
			$this->db->or_like('isi', $keyword);
		}
		$this->db->order_by('date_created', 'desc');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}
}
