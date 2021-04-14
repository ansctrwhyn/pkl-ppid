<?php
class Skpd_model extends CI_Model
{
	// start datatables
	var $column_order = array(null, 'skpd'); //set column field database for datatable orderable
	var $column_search = array('skpd'); //set column field database for datatable searchable
	var $order = array('skpd' => 'asc'); // default order

	private function _get_datatables_query()
	{
		$this->db->select('*');
		$this->db->from('skpd');
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
		$this->db->from('skpd');
		return $this->db->count_all_results();
	}
	// end datatables

	//------------------------------SKPD-------------------------------------
	public function getSKPD($limit, $start)
	{
		$this->db->select('*');
		return $this->db->get('skpd', $limit, $start)->result();
	}

	public function getAllSKPD()
	{
		return $this->db->get('skpd')->result_array();
	}

	public function countAllSkpd()
	{
		return $this->db->get('skpd')->num_rows();
	}

	public function inputSKPD($data)
	{
		$this->db->insert('skpd', $data);
	}

	public function editSKPD($id_skpd, $skpd)
	{
		$this->db->set('skpd', $skpd);
		$this->db->where('id_skpd', $id_skpd);
		return $this->db->update('skpd');
	}

	public function deleteSKPD($id_skpd)
	{
		$this->db->where('id_skpd', $id_skpd);
		return $this->db->delete('skpd');
	}

	public function getSKPDById($id_skpd)
	{
		return $this->db->get_where('skpd', ['id_skpd' => $id_skpd])->row_array();
	}

	public function cariSkpd()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * from skpd where skpd like '%$cari%' ");
		return $data->result();
	}
}
