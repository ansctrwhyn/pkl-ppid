<?php
class Informasi_publik_model extends CI_Model
{

	// start datatables
	var $column_order = array(null, 'judul', 'kategori', 'skpd', 'file', 'size', 'date_upload'); //set column field database for datatable orderable
	var $column_search = array('judul', 'kategori', 'skpd'); //set column field database for datatable searchable
	var $order = array('date_upload' => 'desc'); // default order

	private function _get_datatables_query_berkala()
	{
		$this->db->select('informasi_publik.*, jenis_informasi.jenis AS jenis, kategori.kategori AS kategori, skpd.skpd AS skpd');
		$this->db->where('informasi_publik.id_jenis = 1');
		$this->db->from('informasi_publik');
		$this->db->join('jenis_informasi', 'informasi_publik.id_jenis = jenis_informasi.id_jenis');
		$this->db->join('kategori', 'informasi_publik.id_kategori = kategori.id_kategori');
		$this->db->join('skpd', 'informasi_publik.id_skpd = skpd.id_skpd');
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
	function get_datatables_berkala()
	{
		$this->_get_datatables_query_berkala();
		if (@$_POST['length'] != -1) {
			$this->db->limit(@$_POST['length'], @$_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered_berkala()
	{
		$this->_get_datatables_query_berkala();
		$query = $this->db->get();
		return $query->num_rows();
	}
	function count_all_berkala()
	{
		$this->db->select('*');
		$this->db->where('informasi_publik.id_jenis = 1');
		$this->db->from('informasi_publik');
		return $this->db->count_all_results();
	}

	private function _get_datatables_query_serta_merta()
	{
		$this->db->select('informasi_publik.*, jenis_informasi.jenis AS jenis, kategori.kategori AS kategori, skpd.skpd AS skpd');
		$this->db->where('informasi_publik.id_jenis = 2');
		$this->db->from('informasi_publik');
		$this->db->join('jenis_informasi', 'informasi_publik.id_jenis = jenis_informasi.id_jenis');
		$this->db->join('kategori', 'informasi_publik.id_kategori = kategori.id_kategori');
		$this->db->join('skpd', 'informasi_publik.id_skpd = skpd.id_skpd');
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
	function get_datatables_serta_merta()
	{
		$this->_get_datatables_query_serta_merta();
		if (@$_POST['length'] != -1) {
			$this->db->limit(@$_POST['length'], @$_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered_serta_merta()
	{
		$this->_get_datatables_query_serta_merta();
		$query = $this->db->get();
		return $query->num_rows();
	}
	function count_all_serta_merta()
	{
		$this->db->select('*');
		$this->db->where('informasi_publik.id_jenis = 1');
		$this->db->from('informasi_publik');
		return $this->db->count_all_results();
	}

	private function _get_datatables_query_setiap_saat()
	{
		$this->db->select('informasi_publik.*, jenis_informasi.jenis AS jenis, kategori.kategori AS kategori, skpd.skpd AS skpd');
		$this->db->where('informasi_publik.id_jenis = 3');
		$this->db->from('informasi_publik');
		$this->db->join('jenis_informasi', 'informasi_publik.id_jenis = jenis_informasi.id_jenis');
		$this->db->join('kategori', 'informasi_publik.id_kategori = kategori.id_kategori');
		$this->db->join('skpd', 'informasi_publik.id_skpd = skpd.id_skpd');
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
	function get_datatables_setiap_saat()
	{
		$this->_get_datatables_query_setiap_saat();
		if (@$_POST['length'] != -1) {
			$this->db->limit(@$_POST['length'], @$_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered_setiap_saat()
	{
		$this->_get_datatables_query_setiap_saat();
		$query = $this->db->get();
		return $query->num_rows();
	}
	function count_all_setiap_saat()
	{
		$this->db->select('*');
		$this->db->where('informasi_publik.id_jenis = 1');
		$this->db->from('informasi_publik');
		return $this->db->count_all_results();
	}
	// end datatables

	//---------------------INFOMASI PUBLIK------------------------
	public function getTopInfo()
	{
		$this->db->from('informasi_publik');
		$this->db->join('skpd', 'skpd.id_skpd = informasi_publik.id_skpd');
		$this->db->join('jenis_informasi', 'jenis_informasi.id_jenis = informasi_publik.id_jenis');
		$this->db->order_by('jumlah_unduh', 'desc');
		$this->db->limit(3, 0);
		return $this->db->get()->result();
	}

	public function getNewInfo()
	{
		$this->db->from('informasi_publik');
		$this->db->join('skpd', 'skpd.id_skpd = informasi_publik.id_skpd');
		$this->db->join('jenis_informasi', 'jenis_informasi.id_jenis = informasi_publik.id_jenis');
		$this->db->order_by('date_upload', 'desc');
		$this->db->limit(3, 0);
		return $this->db->get()->result();
	}

	public function sumUnduh()
	{
		$this->db->select_sum('jumlah_unduh');
		$query = $this->db->get('informasi_publik')->row();
		return $query->jumlah_unduh;
	}

	public function countAllInformasi()
	{
		return $this->db->get('informasi_publik')->num_rows();
	}

	public function getInformasiBerkala()
	{
		$this->db->select('informasi_publik.*, jenis_informasi.jenis AS jenis, kategori.kategori AS kategori, skpd.skpd AS skpd');
		$this->db->where('informasi_publik.id_jenis = 1');
		$this->db->from('informasi_publik');
		$this->db->join('jenis_informasi', 'informasi_publik.id_jenis = jenis_informasi.id_jenis');
		$this->db->join('kategori', 'informasi_publik.id_kategori = kategori.id_kategori');
		$this->db->join('skpd', 'informasi_publik.id_skpd = skpd.id_skpd');
		$this->db->order_by('informasi_publik.date_upload', 'desc');
		return $this->db->get()->result();
	}

	public function getInformasiBerkalaPagination($limit, $start)
	{
		$this->db->select('informasi_publik.*, jenis_informasi.jenis AS jenis, kategori.kategori AS kategori, skpd.skpd AS skpd');
		$this->db->where('informasi_publik.id_jenis = 1');
		$this->db->from('informasi_publik');
		$this->db->join('jenis_informasi', 'informasi_publik.id_jenis = jenis_informasi.id_jenis');
		$this->db->join('kategori', 'informasi_publik.id_kategori = kategori.id_kategori');
		$this->db->join('skpd', 'informasi_publik.id_skpd = skpd.id_skpd');
		$this->db->order_by('informasi_publik.date_upload', 'desc');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	public function countAllInformasiBerkala()
	{
		$this->db->select('*');
		$this->db->where('informasi_publik.id_jenis = 1');
		$this->db->from('informasi_publik');
		return $this->db->get()->num_rows();
	}


	public function getInformasiSertaMerta()
	{
		$this->db->select('informasi_publik.*, jenis_informasi.jenis AS jenis, kategori.kategori AS kategori, skpd.skpd AS skpd');
		$this->db->where('informasi_publik.id_jenis = 2');
		$this->db->from('informasi_publik');
		$this->db->join('jenis_informasi', 'informasi_publik.id_jenis = jenis_informasi.id_jenis');
		$this->db->join('kategori', 'informasi_publik.id_kategori = kategori.id_kategori');
		$this->db->join('skpd', 'informasi_publik.id_skpd = skpd.id_skpd');
		$this->db->order_by('informasi_publik.date_upload', 'desc');
		return $this->db->get()->result();
	}

	public function getInformasiSertaMertaPagination($limit, $start)
	{
		$this->db->select('informasi_publik.*, jenis_informasi.jenis AS jenis, kategori.kategori AS kategori, skpd.skpd AS skpd');
		$this->db->where('informasi_publik.id_jenis = 2');
		$this->db->from('informasi_publik');
		$this->db->join('jenis_informasi', 'informasi_publik.id_jenis = jenis_informasi.id_jenis');
		$this->db->join('kategori', 'informasi_publik.id_kategori = kategori.id_kategori');
		$this->db->join('skpd', 'informasi_publik.id_skpd = skpd.id_skpd');
		$this->db->order_by('informasi_publik.date_upload', 'desc');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	public function countAllInformasiSertaMerta()
	{
		$this->db->select('*');
		$this->db->where('informasi_publik.id_jenis = 2');
		$this->db->from('informasi_publik');
		return $this->db->get()->num_rows();
	}

	public function getInformasiSetiapSaat()
	{
		$this->db->select('informasi_publik.*, jenis_informasi.jenis AS jenis, kategori.kategori AS kategori, skpd.skpd AS skpd');
		$this->db->where('informasi_publik.id_jenis = 3');
		$this->db->from('informasi_publik');
		$this->db->join('jenis_informasi', 'informasi_publik.id_jenis = jenis_informasi.id_jenis');
		$this->db->join('kategori', 'informasi_publik.id_kategori = kategori.id_kategori');
		$this->db->join('skpd', 'informasi_publik.id_skpd = skpd.id_skpd');
		$this->db->order_by('informasi_publik.date_upload', 'desc');
		return $this->db->get()->result();
	}

	public function getInformasiSetiapSaatPagination($limit, $start)
	{
		$this->db->select('informasi_publik.*, jenis_informasi.jenis AS jenis, kategori.kategori AS kategori, skpd.skpd AS skpd');
		$this->db->where('informasi_publik.id_jenis = 3');
		$this->db->from('informasi_publik');
		$this->db->join('jenis_informasi', 'informasi_publik.id_jenis = jenis_informasi.id_jenis');
		$this->db->join('kategori', 'informasi_publik.id_kategori = kategori.id_kategori');
		$this->db->join('skpd', 'informasi_publik.id_skpd = skpd.id_skpd');
		$this->db->order_by('informasi_publik.date_upload', 'desc');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	public function countAllInformasiSetiapSaat()
	{
		$this->db->select('*');
		$this->db->where('informasi_publik.id_jenis = 3');
		$this->db->from('informasi_publik');
		return $this->db->get()->num_rows();
	}

	public function inputInformasiPublik($data)
	{
		$this->db->insert('informasi_publik', $data);
	}

	public function editInformasiPublik($id_informasi, $judul, $id_jenis, $id_kategori, $id_skpd,  $size, $date_upload)
	{
		$this->db->set('judul', $judul);
		$this->db->set('id_jenis', $id_jenis);
		$this->db->set('id_kategori', $id_kategori);
		$this->db->set('id_skpd', $id_skpd);
		$this->db->set('size', $size);
		$this->db->set('date_upload', $date_upload);
		$this->db->where('id_informasi', $id_informasi);
		return $this->db->update('informasi_publik');
	}

	public function deleteInformasiPublik($id_informasi)
	{
		$this->db->where('id_informasi', $id_informasi);
		return $this->db->delete('informasi_publik');
	}


	public function getJenis()
	{
		$this->db->select('*');
		$this->db->from('jenis_informasi');
		return $this->db->get()->result_array();
	}

	public function getJenisBerkala()
	{
		$this->db->from('jenis_informasi');
		$this->db->where('id_jenis', 1);
		return $this->db->get()->row();
	}

	public function getJenisSertaMerta()
	{
		$this->db->from('jenis_informasi');
		$this->db->where('id_jenis', 2);
		return $this->db->get()->row();
	}

	public function getJenisSetiapSaat()
	{
		$this->db->from('jenis_informasi');
		$this->db->where('id_jenis', 3);
		return $this->db->get()->row();
	}

	public function getInformasiPublik($id_informasi)
	{
		return $this->db->get_where('informasi_publik', ['id_informasi' => $id_informasi])->row_array();
	}

	public function getInfoPublik($id_informasi)
	{
		return $this->db->get_where('informasi_publik', ['id_informasi' => $id_informasi])->row_array();
	}

	public function getAllInformasiPublik()
	{
		$this->db->select('informasi_publik.*, jenis_informasi.jenis AS jenis, kategori.kategori AS kategori, skpd.skpd AS skpd');
		$this->db->from('informasi_publik');
		$this->db->join('jenis_informasi', 'informasi_publik.id_jenis = jenis_informasi.id_jenis');
		$this->db->join('kategori', 'informasi_publik.id_kategori = kategori.id_kategori');
		$this->db->join('skpd', 'informasi_publik.id_skpd = skpd.id_skpd');
		$this->db->order_by('informasi_publik.date_upload', 'desc');
		return $this->db->get()->result();
	}

	public function getAllInformasiPagination($limit, $start, $keyword)
	{
		$this->db->select('*');
		$this->db->select('informasi_publik.*, jenis_informasi.jenis AS jenis, kategori.kategori AS kategori, skpd.skpd AS skpd');
		$this->db->from('informasi_publik');
		$this->db->join('jenis_informasi', 'informasi_publik.id_jenis = jenis_informasi.id_jenis');
		$this->db->join('kategori', 'informasi_publik.id_kategori = kategori.id_kategori');
		$this->db->join('skpd', 'informasi_publik.id_skpd = skpd.id_skpd');
		if ($keyword) {
			$this->db->like('judul', $keyword);
			$this->db->or_like('jenis', $keyword);
			$this->db->or_like('kategori', $keyword);
			$this->db->or_like('skpd', $keyword);
		}
		$this->db->order_by('informasi_publik.date_upload', 'desc');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	function getJenisInformasiById($id_informasi)
	{
		$this->db->select('jenis_informasi.id_jenis, jenis_informasi.jenis');
		$this->db->from('informasi_publik');
		$this->db->join('jenis_informasi', 'jenis_informasi.id_jenis = informasi_publik.id_jenis');
		$this->db->where('id_informasi', $id_informasi);
		return $this->db->get()->row_array();
	}
	function getKategoriInformasiById($id_informasi)
	{
		$this->db->select('kategori.id_kategori, kategori.kategori');
		$this->db->from('informasi_publik');
		$this->db->join('kategori', 'kategori.id_kategori = informasi_publik.id_kategori');
		$this->db->where('id_informasi', $id_informasi);
		return $this->db->get()->row_array();
	}

	function getSKPDInformasiById($id_informasi)
	{
		$this->db->select('skpd.id_skpd, skpd.skpd');
		$this->db->from('informasi_publik');
		$this->db->join('skpd', 'skpd.id_skpd = informasi_publik.id_skpd');
		$this->db->where('id_informasi', $id_informasi);
		return $this->db->get()->row_array();
	}
}
