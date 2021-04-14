<?php
class Member_model extends CI_Model
{
	// start datatables
	var $column_order = array(null, 'nama', 'no_identitas', 'image', 'email', 'alamat', 'no_telp', 'tipe_member', 'date_created'); //set column field database for datatable orderable
	var $column_search = array('nama', 'no_identitas', 'email'); //set column field database for datatable searchable
	var $order = array('date_created' => 'desc'); // default order

	private function _get_datatables_query()
	{
		$this->db->select('member.*, member_type.type as tipe_member ');
		$this->db->from('member');
		$this->db->join('member_type', 'member.tipe_member = member_type.id_type');
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
		$this->db->from('member');
		return $this->db->count_all_results();
	}
	// end datatables

	//---------------------MEMBER------------------------
	public function getMember()
	{
		$this->db->select('member.*, member_type.type as tipe_member ');
		$this->db->from('member');
		$this->db->join('member_type', 'member.tipe_member = member_type.id_type');
		$this->db->order_by('member.date_created', 'desc');
		return $this->db->get()->result();
	}

	public function getMemberPagination($limit, $start)
	{
		$this->db->select('member.*, member_type.type as tipe_member ');
		$this->db->from('member');
		$this->db->join('member_type', 'member.tipe_member = member_type.id_type');
		$this->db->order_by('member.date_created', 'desc');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	public function countAllMember()
	{
		return $this->db->get('member')->num_rows();
	}

	public function inputMember($data)
	{
		$this->db->insert('member', $data);
	}

	public function editMember($id_member, $nama, $email, $alamat, $no_telp)
	{
		$this->db->set('nama', $nama);
		$this->db->set('email', $email);
		$this->db->set('alamat', $alamat);
		$this->db->set('no_telp', $no_telp);
		$this->db->where('id_member', $id_member);
		return $this->db->update('member');
	}

	public function deleteMember($id_member)
	{
		$this->db->where('id_member', $id_member);
		return $this->db->delete('member');
	}

	public function getType()
	{
		$this->db->select('*');
		$this->db->from('member_type');
		return $this->db->get()->result_array();
	}

	public function getMemberById($id_member)
	{
		return $this->db->get_where('member', ['id_member' => $id_member])->row_array();
	}

	function getMemberTypeById($id_member)
	{
		$this->db->select('member_type.id_type, member_type.type');
		$this->db->from('member');
		$this->db->join('member_type', 'member_type.id_type = member.tipe_member');
		$this->db->where('id_member', $id_member);
		return $this->db->get()->row_array();
	}
}
