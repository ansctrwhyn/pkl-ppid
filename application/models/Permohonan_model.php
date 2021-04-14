          <?php
			class Permohonan_model extends CI_Model
			{
				// start datatables
				var $column_order = array(null, 'nama', 'no_identitas', 'rincian', 'tujuan', 'email', 'date_created', 'status'); //set column field database for datatable orderable
				var $column_search = array('nama', 'no_identitas', 'rincian', 'tujuan', 'email'); //set column field database for datatable searchable
				var $order = array('date_created' => 'desc'); // default order

				private function _get_datatables_query()
				{
					$this->db->select('*');
					$this->db->from('permohonan');
					$index = 0;
					foreach ($this->column_search as $item) { // loop column
						if (@$_POST['search']['value']) { // if datatable send POST for search
							if ($index === 0) { // first loop
								$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
								$this->db->like($item, $_POST['search']['value']);
							}
							$this->db->or_like($item, $_POST['search']['value']);
							if (count($this->column_search) - 1 == $index) {
								$this->db->group_end();
							}
							$index++;
						}
					}

					if (isset($_POST['order'])) { // here order processing
						$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
					} else if (isset($this->order)) {
						$order = $this->order;
						$this->db->order_by(key($order), $order[key($order)]);
					}
				}

				private function _get_datatables_riwayat()
				{
					$id_member = $this->session->userdata('no_identitas_member'); // dapatkan id user yg login
					$this->db->select('*');
					$this->db->where('no_identitas', $id_member); //
					$this->db->from('permohonan');
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
				function get_riwayat()
				{
					$this->_get_datatables_riwayat();
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
				function count_filtered_riwayat()
				{
					$this->_get_datatables_riwayat();
					$query = $this->db->get();
					return $query->num_rows();
				}
				function count_all()
				{
					$this->db->from('permohonan');
					return $this->db->count_all_results();
				}
				function count_riwayat()
				{
					$id_member = $this->session->userdata('no_identitas'); // dapatkan id user yg login
					$this->db->select('*');
					$this->db->where('no_identitas', $id_member); //
					$this->db->from('permohonan');
					return $this->db->count_all_results();
				}
				// end datatables

				public function inputPermohonan($data)
				{
					$this->db->insert('permohonan', $data);
				}

				public function deletePermohonan($id_permohonan)
				{
					$this->db->where('id_permohonan', $id_permohonan);
					return $this->db->delete('permohonan');
				}

				public function getPermohonanById($id_permohonan)
				{
					return $this->db->get_where('permohonan', ['id_permohonan' => $id_permohonan])->row_array();
				}

				public function editStatus($id_permohonan, $status)
				{
					$this->db->set('status', $status);
					$this->db->where('id_permohonan', $id_permohonan);
					return $this->db->update('permohonan');
				}

				function getRiwayat($id_member)
				{
					$id_member = $this->session->userdata['no_identitas'];
					$this->db->SELECT('*');
					$this->db->from('permohonan');
					$this->db->where('user2.id', $id_member);

					$this->db->join('kegiatan_dosen', 'kegiatan_dosen.id = user2.id');

					$query = $this->db->get();
					if ($query->num_rows() != 0) {
						return $query->result_array();
					}
				}

				function count_dalamproses()
				{
					$this->db->select('*');
					$this->db->where('permohonan.status', 'Dalam Proses');
					$this->db->from('permohonan');
					return $this->db->count_all_results();
				}

				function count_ditolak()
				{
					$this->db->select('*');
					$this->db->where('permohonan.status', 'Ditolak');
					$this->db->from('permohonan');
					return $this->db->count_all_results();
				}

				function count_selesai()
				{
					$this->db->select('*');
					$this->db->where('permohonan.status', 'Selesai');
					$this->db->from('permohonan');
					return $this->db->count_all_results();
				}
			}
