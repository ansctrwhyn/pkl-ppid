<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	//-------------------------------------------LOGIN------------------------------------------------------------
	public function index()
	{
		if (($this->session->userdata('login_admin')) == true) {
			redirect('admin/dashboard');
		}
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data["title"] = "Login | ADMIN PPID WONOGIRI";
			$this->load->view('admin/login', $data);
		}
		$this->_login();
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('admin', ['email' => $email])->row_array();
		//jika user ada
		if ($user) {
			//cek password
			if (md5($password) == $user['password']) {
				$data = [
					'nama' => $user['nama'],
					'email' => $user['email'],
					'login_admin' => true
				];
				$this->session->set_userdata($data);
				redirect('admin/dashboard');
			}
			$this->session->set_flashdata('message', '<div class="alert" role="alert"> Password salah! </div>');
			redirect('admin');
		}
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akses ditolak! Anda bukan Admin! </div>');
		redirect('admin');
	}

	public function check_login()
	{
		if (!$this->session->userdata('login_admin')) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Silakan login terlebih dahulu! </div>');
			redirect('admin');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('login_admin');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Anda berhasil Logout! </div>');
		redirect('admin');
	}

	//-----------------------------------------DASHBOARD-----------------------------------------------------

	public function dashboard()
	{
		$this->check_login();
		$data["title"] = "ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['total_informasi'] = $this->db->get('informasi_publik')->num_rows();
		$data['total_pesan'] = $this->db->get('kotak_saran')->num_rows();
		$data['total_permohonan'] = $this->db->get('permohonan')->num_rows();
		$data['dalamproses'] = $this->Permohonan_model->count_dalamproses();
		$data['ditolak'] = $this->Permohonan_model->count_ditolak();
		$data['selesai'] = $this->Permohonan_model->count_selesai();
		$this->load->view('admin/partisi/header', $data);
		$this->load->view('admin/partisi/navbar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/partisi/sidebar', $data);
		$this->load->view('admin/partisi/footer');
	}

	public function ubah_password()
	{
		$this->check_login();

		$data['title'] = 'Ubah Password | ADMIN PPID WONOGIRI';
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/partisi/header', $data);
			$this->load->view('admin/partisi/navbar', $data);
			$this->load->view('admin/partisi/sidebar', $data);
			$this->load->view('admin/ubah_password', $data);
			$this->load->view('admin/partisi/footer');
		}
		$current_password = md5($this->input->post('current_password'));
		$new_password = md5($this->input->post('new_password1'));
		if ($current_password != $data['admin']['password']) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Currrent Password!</div>');
			redirect('admin/ubah_password');
		}
		if ($current_password == $new_password) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New password cannot be the same as currrent password!</div>');
			redirect('admin/ubah_password');
		}
		$new_password_ = $new_password;

		$this->db->set('password', $new_password_);
		$this->db->where('email', $this->session->userdata('email'));
		$this->db->update('admin');

		// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Changed!</div>');
		$this->session->set_flashdata('password', 'Diubah');
		redirect('admin/dashboard');
	}

	//--------------------------------------------MEMBER-----------------------------------------------------
	function get_ajax_member()
	{
		$list = $this->Member_model->get_datatables();
		$data = array();
		$nomor = @$_POST['start'];
		foreach ($list as $item) {
			$nomor++;
			$row = array();
			$row[] = $nomor . ".";
			$row[] = $item->nama;
			$row[] = $item->no_identitas;
			$row[] = '<a href="' . base_url('assets/image/card/' . $item->image) . '" target="_blank"><img src="' . base_url('assets/image/card/' . $item->image) . '" class="img" style="width:100px"></a>';
			// $row[] = $item->image != null ? '<img src="' . base_url('assets/image/card/' . $item->image) . '" class="img" style="width:100px">' : null;
			$row[] = $item->email;
			$row[] = $item->alamat;
			$row[] = $item->no_telp;
			$row[] = $item->tipe_member;
			$row[] = date('d-m-Y G:i', $item->date_created);
			// add html for action
			$row[] = '<a href="' . base_url('admin/editMember/' . $item->id_member) . '" class="btn btn-warning btn-xs float-center"><i class="fas fa-edit"></i> Edit</a>
                   <a href="' . site_url('admin/deleteMember/' . $item->id_member) . '" class="btn btn-danger btn-xs float-center hapus-member" onclick="return confirm(\'Apakah Anda Yakin?\')"><i class="fas fa-trash-alt"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Member_model->count_all(),
			"recordsFiltered" => $this->Member_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function member()
	{
		$this->check_login();
		$data["title"] = "Data Member | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('admin/partisi/header', $data);
		$this->load->view('admin/partisi/navbar', $data);
		$this->load->view('admin/member', $data);
		$this->load->view('admin/partisi/sidebar', $data);
		$this->load->view('admin/partisi/footer');
	}

	public function addMember()
	{
		$this->check_login();

		$data['title'] = 'Tambah Member | ADMIN PPID WONOGIRI';
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['tipe_member'] = $this->Member_model->getType();

		$this->form_validation->set_rules('tipe_member', 'Tipe Member', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('no_identitas', 'Nomor Identitas', 'required|trim|is_unique[member.no_identitas]', [
			'is_unique' => 'Nomor identitas sudah terdaftar!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[member.email]', [
			'is_unique' => 'Email sudah terdaftar!'
		]);
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');

		if (empty($_FILES['image']['name'])) {
			$this->form_validation->set_rules('image', 'Scan Kartu Identitas', 'required');
			if ($this->form_validation->run() == false) {
				$this->load->view('admin/partisi/header', $data);
				$this->load->view('admin/partisi/navbar', $data);
				$this->load->view('admin/partisi/sidebar', $data);
				$this->load->view('admin/tambah_member', $data);
				$this->load->view('admin/partisi/footer');
			}
		}
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/partisi/header', $data);
			$this->load->view('admin/partisi/navbar', $data);
			$this->load->view('admin/partisi/sidebar', $data);
			$this->load->view('admin/tambah_member', $data);
			$this->load->view('admin/partisi/footer');
		}
		$tipe_member = $this->input->post('tipe_member');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$password = md5($this->input->post('password'));
		$no_identitas = $this->input->post('no_identitas');
		$no_telp = $this->input->post('no_telp');
		$date_created = time();

		$upload_image = $_FILES['image']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']     = '0';
			$config['upload_path'] = './assets/image/card/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('image')) {
				$new_image = $this->upload->data('file_name');
				$this->db->set('image', $new_image);
			}
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
			redirect('admin/addMember');
		}

		$data = [
			'tipe_member' => $tipe_member,
			'nama' => $nama,
			'email' => $email,
			'alamat' => $alamat,
			'password' => $password,
			'no_identitas' => $no_identitas,
			'no_telp' => $no_telp,
			'date_created' => $date_created,
		];

		$this->Member_model->inputMember($data, 'member');
		$this->session->set_flashdata('member', 'Ditambah');
		redirect('admin/member');
	}

	public function editMember($id_member)
	{
		$this->check_login();
		$data["title"] = "Edit Member | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['member'] = $this->Member_model->getMemberById($id_member);
		$data['tipe'] = $this->Member_model->getMemberTypeById($id_member);

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/partisi/header', $data);
			$this->load->view('admin/partisi/navbar', $data);
			$this->load->view('admin/partisi/sidebar', $data);
			$this->load->view('admin/edit_member', $data);
			$this->load->view('admin/partisi/footer');
		}
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$no_telp = $this->input->post('no_telp');

		$this->Member_model->editMember($id_member, $nama, $email, $alamat, $no_telp);
		$this->session->set_flashdata('member', 'Diubah');
		redirect('admin/member');
	}

	public function deleteMember($id_member)
	{
		$data = $this->Member_model->getMemberById($id_member);
		$nama_gambar = './assets/image/card/' . $data['image'];
		if (is_readable($nama_gambar) && unlink($nama_gambar)) {
			$this->Member_model->deleteMember($id_member);
			$this->session->set_flashdata('member', 'Dihapus');
			redirect('admin/member');
		}
		$this->Member_model->deleteMember($id_member);
		$this->session->set_flashdata('member', 'Dihapus');
		redirect('admin/member');
	}

	//--------------------------------------------INFORMASI BERKALA-----------------------------------------------------

	function get_ajax_informasi_berkala()
	{
		$list = $this->Informasi_publik_model->get_datatables_berkala();
		$data = array();
		$nomor = @$_POST['start'];
		foreach ($list as $item) {
			$nomor++;
			$row = array();
			$row[] = $nomor . ".";
			// $row[] = $item->id_informasi;
			$row[] = $item->judul;
			$row[] = $item->kategori;
			$row[] = $item->skpd;
			$row[] = '<a href=" ' . base_url('assets/file/informasi_publik/' . $item->file) . ' " target=" _blank"> ' . $item->file . ' </a>';
			$file_path = FCPATH . 'assets/file/informasi_publik/' . $item->file;
			$size_in_byte = filesize($file_path);
			$size_in_kb = round($size_in_byte / 1024);
			$row[] = $size_in_kb . " KB";
			$row[] = date('d-m-Y G:i', $item->date_upload);
			// add html for action
			$row[] = '<a href="' . base_url('admin/editInformasiBerkala/' . $item->id_informasi) . '" class="btn btn-warning btn-xs float-center"><i class="fas fa-edit"></i> Edit</a>
                   <a href="' . site_url('admin/deleteInformasiBerkala/' . $item->id_informasi) . '" class="btn btn-danger btn-xs float-center hapus-admin" onclick="return confirm(\'Apakah Anda Yakin?\')"><i class="fas fa-trash-alt"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Informasi_publik_model->count_all_berkala(),
			"recordsFiltered" => $this->Informasi_publik_model->count_filtered_berkala(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function informasi_berkala()
	{
		$this->check_login();
		$data["title"] = "Data Informasi Berkala | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('admin/partisi/header', $data);
		$this->load->view('admin/partisi/navbar', $data);
		$this->load->view('admin/informasi_berkala', $data);
		$this->load->view('admin/partisi/sidebar', $data);
		$this->load->view('admin/partisi/footer');
	}

	public function addInformasiBerkala()
	{
		$this->check_login();

		$data['title'] = 'Tambah Informasi Berkala | ADMIN PPID WONOGIRI';
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['jenis'] = $this->Informasi_publik_model->getJenis();
		$data['jenis_info'] = $this->Informasi_publik_model->getJenisBerkala();
		$data['kategori'] = $this->Kategori_model->getKategori();
		$data['skpd'] = $this->Skpd_model->getAllSKPD();

		$this->form_validation->set_rules('judul', 'Judul', 'required|trim');
		$this->form_validation->set_rules('id_jenis', 'jenis', 'required|trim');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('id_skpd', 'SKPD', 'required|trim');

		if (empty($_FILES['file']['name'])) {
			$this->form_validation->set_rules('file', 'Upload File', 'required');
			if ($this->form_validation->run() == false) {
				$this->load->view('admin/partisi/header', $data);
				$this->load->view('admin/partisi/navbar', $data);
				$this->load->view('admin/partisi/sidebar', $data);
				$this->load->view('admin/tambah_informasi_berkala', $data);
				$this->load->view('admin/partisi/footer');
			}
		}
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/partisi/header', $data);
			$this->load->view('admin/partisi/navbar', $data);
			$this->load->view('admin/partisi/sidebar', $data);
			$this->load->view('admin/tambah_informasi_berkala', $data);
			$this->load->view('admin/partisi/footer');
		}
		$judul = $this->input->post('judul');
		$id_jenis = $data['jenis_info']->id_jenis;
		$id_kategori = $this->input->post('id_kategori');
		$id_skpd = $this->input->post('id_skpd');
		$size = $_FILES['file']['size'];
		$date_upload = time();

		$upload_file = $_FILES['file']['name'];

		if ($upload_file) {
			$config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|txt';
			$config['max_size']     = '0';
			$config['upload_path'] = './assets/file/informasi_publik';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file')) {
				$new_file = $this->upload->data('file_name');
				$this->db->set('file', $new_file);
			}
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
			redirect('admin/addInformasiBerkala');
		}

		$data = [
			'judul' => $judul,
			'id_jenis' => $id_jenis,
			'id_kategori' => $id_kategori,
			'id_skpd' => $id_skpd,
			'size' => $size,
			'date_upload' => $date_upload,
		];

		$this->Informasi_publik_model->inputInformasiPublik($data, 'informasi_publik');
		$this->session->set_flashdata('informasi', 'Ditambah');
		redirect('admin/informasi_berkala');
	}

	public function editInformasiBerkala($id_informasi)
	{
		$this->check_login();
		$data["title"] = "Edit Informasi Berkala | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['informasi_berkala'] = $this->Informasi_publik_model->getInformasiPublik($id_informasi);
		$data['all_jenis'] = $this->Informasi_publik_model->getJenis();
		$data['all_kategori'] = $this->Kategori_model->getKategoriInformasi();
		$data['all_skpd'] = $this->Skpd_model->getAllSKPD();
		$data['jenis'] = $this->Informasi_publik_model->getJenisInformasiById($id_informasi);
		$data['kategori'] = $this->Informasi_publik_model->getKategoriInformasiById($id_informasi);
		$data['skpd'] = $this->Informasi_publik_model->getSKPDInformasiById($id_informasi);

		$this->form_validation->set_rules('judul', 'Judul', 'required|trim');
		$this->form_validation->set_rules('id_jenis', 'Jenis', 'required|trim');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('id_skpd', 'SKPD', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/partisi/header', $data);
			$this->load->view('admin/partisi/navbar', $data);
			$this->load->view('admin/partisi/sidebar', $data);
			$this->load->view('admin/edit_informasi_berkala', $data);
			$this->load->view('admin/partisi/footer');
		}
		$judul = $this->input->post('judul');
		$id_jenis = $this->input->post('id_jenis');
		$id_kategori = $this->input->post('id_kategori');
		$id_skpd = $this->input->post('id_skpd');
		$size = $_FILES['file']['size'];
		$date_upload = time();

		$file_lama = $this->Informasi_publik_model->getInformasiPublik($id_informasi);
		$upload_file = $_FILES['file']['name'];

		if ($upload_file) {
			$nama_file = './assets/file/informasi_publik/' . $file_lama['file'];
			if (is_readable($nama_file) && unlink($nama_file)) {
				$config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|txt';
				$config['max_size']     = '0';
				$config['upload_path'] = './assets/file/informasi_publik';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {
					$new_file = $this->upload->data('file_name');
					$this->db->set('file', $new_file);
				}
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
				redirect('admin/editInformasiBerkala/' . $data['informasi_berkala']['id_informasi']);
			}
			$config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|txt';
			$config['max_size']     = '0';
			$config['upload_path'] = './assets/file/informasi_publik';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file')) {
				$new_file = $this->upload->data('file_name');
				$this->db->set('file', $new_file);
			}
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
			redirect('admin/editInformasiBerkala/' . $data['informasi_berkala']['id_informasi']);
		}
		$this->Informasi_publik_model->editInformasiPublik($id_informasi, $judul, $id_jenis, $id_kategori, $id_skpd, $size, $date_upload);
		$this->session->set_flashdata('informasi', 'Diubah');
		redirect('admin/informasi_berkala');
	}

	public function deleteInformasiBerkala($id_informasi)
	{
		$data = $this->Informasi_publik_model->getInformasiPublik($id_informasi);
		$nama_file = './assets/file/informasi_publik/' . $data['file'];

		if (is_readable($nama_file) && unlink($nama_file)) {
			$this->Informasi_publik_model->deleteInformasiPublik($id_informasi);
			$this->session->set_flashdata('informasi', 'Dihapus');
			redirect('admin/informasi_berkala');
		}

		$this->Informasi_publik_model->deleteInformasiPublik($id_informasi);
		redirect('admin/informasi_berkala');
	}

	//--------------------------------------------INFORMASI SERTA MERTA-----------------------------------------------------
	function get_ajax_informasi_serta_merta()
	{
		$list = $this->Informasi_publik_model->get_datatables_serta_merta();
		$data = array();
		$nomor = @$_POST['start'];
		foreach ($list as $item) {
			$nomor++;
			$row = array();
			$row[] = $nomor . ".";
			// $row[] = $item->id_informasi;
			$row[] = $item->judul;
			$row[] = $item->kategori;
			$row[] = $item->skpd;
			$row[] = '<a href=" ' . base_url('assets/file/informasi_publik/' . $item->file) . ' " target=" _blank"> ' . $item->file . ' </a>';
			$file_path = FCPATH . 'assets/file/informasi_publik/' . $item->file;
			$size_in_byte = filesize($file_path);
			$size_in_kb = round($size_in_byte / 1024);
			$row[] = $size_in_kb . " KB";
			$row[] = date('d-m-Y G:i', $item->date_upload);
			// add html for action
			$row[] = '<a href="' . base_url('admin/editInformasiSertaMerta/' . $item->id_informasi) . '" class="btn btn-warning btn-xs float-center"><i class="fas fa-edit"></i> Edit</a>
                   <a href="' . site_url('admin/deleteInformasiSertaMerta/' . $item->id_informasi) . '" class="btn btn-danger btn-xs float-center hapus-admin" onclick="return confirm(\'Apakah Anda Yakin?\')"><i class="fas fa-trash-alt"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Informasi_publik_model->count_all_serta_merta(),
			"recordsFiltered" => $this->Informasi_publik_model->count_filtered_serta_merta(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function informasi_serta_merta()
	{
		$this->check_login();
		$data["title"] = "Data Informasi Serta Merta | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('admin/partisi/header', $data);
		$this->load->view('admin/partisi/navbar', $data);
		$this->load->view('admin/informasi_serta_merta', $data);
		$this->load->view('admin/partisi/sidebar', $data);
		$this->load->view('admin/partisi/footer');
	}

	public function addInformasiSertaMerta()
	{
		$this->check_login();

		$data['title'] = 'Tambah Informasi Serta Merta | ADMIN PPID WONOGIRI';
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['jenis'] = $this->Informasi_publik_model->getJenis();
		$data['jenis_info'] = $this->Informasi_publik_model->getJenisSertaMerta();
		$data['kategori'] = $this->Kategori_model->getKategori();
		$data['skpd'] = $this->Skpd_model->getAllSKPD();

		$this->form_validation->set_rules('judul', 'Judul', 'required|trim');
		$this->form_validation->set_rules('id_jenis', 'Jenis', 'required|trim');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('id_skpd', 'SKPD', 'required|trim');

		if (empty($_FILES['file']['name'])) {
			$this->form_validation->set_rules('file', 'Upload File', 'required');
			if ($this->form_validation->run() == false) {
				$this->load->view('admin/partisi/header', $data);
				$this->load->view('admin/partisi/navbar', $data);
				$this->load->view('admin/partisi/sidebar', $data);
				$this->load->view('admin/tambah_informasi_serta_merta', $data);
				$this->load->view('admin/partisi/footer');
			}
		}
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/partisi/header', $data);
			$this->load->view('admin/partisi/navbar', $data);
			$this->load->view('admin/partisi/sidebar', $data);
			$this->load->view('admin/tambah_informasi_serta_merta', $data);
			$this->load->view('admin/partisi/footer');
		}
		$judul = $this->input->post('judul');
		$id_jenis = $data['jenis_info']->id_jenis;
		$id_kategori = $this->input->post('id_kategori');
		$id_skpd = $this->input->post('id_skpd');
		$size = $_FILES['file']['size'];
		$date_upload = time();

		$upload_file = $_FILES['file']['name'];

		if ($upload_file) {
			$config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|txt';
			$config['max_size']     = '0';
			$config['upload_path'] = './assets/file/informasi_publik';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file')) {
				$new_file = $this->upload->data('file_name');
				$this->db->set('file', $new_file);
			}
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
			redirect('admin/addInformasiSertaMerta');
		}

		$data = [
			'judul' => $judul,
			'id_jenis' => $id_jenis,
			'id_kategori' => $id_kategori,
			'id_skpd' => $id_skpd,
			'size' => $size,
			'date_upload' => $date_upload,
		];

		$this->Informasi_publik_model->inputInformasiPublik($data, 'informasi_publik');
		$this->session->set_flashdata('informasi', 'Ditambah');
		redirect('admin/informasi_serta_merta');
	}

	public function editInformasiSertaMerta($id_informasi)
	{
		$this->check_login();
		$data["title"] = "Edit Informasi Serta Merta | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['informasi_serta_merta'] = $this->Informasi_publik_model->getInformasiPublik($id_informasi);
		$data['all_jenis'] = $this->Informasi_publik_model->getJenis();
		$data['all_kategori'] = $this->Kategori_model->getKategoriInformasi();
		$data['all_skpd'] = $this->Skpd_model->getAllSKPD();
		$data['jenis'] = $this->Informasi_publik_model->getJenisInformasiById($id_informasi);
		$data['kategori'] = $this->Informasi_publik_model->getKategoriInformasiById($id_informasi);
		$data['skpd'] = $this->Informasi_publik_model->getSKPDInformasiById($id_informasi);

		$this->form_validation->set_rules('judul', 'Judul', 'required|trim');
		$this->form_validation->set_rules('id_jenis', 'Jenis', 'required|trim');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('id_skpd', 'SKPD', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/partisi/header', $data);
			$this->load->view('admin/partisi/navbar', $data);
			$this->load->view('admin/partisi/sidebar', $data);
			$this->load->view('admin/edit_informasi_serta_merta', $data);
			$this->load->view('admin/partisi/footer');
		}
		$judul = $this->input->post('judul');
		$id_jenis = $this->input->post('id_jenis');
		$id_kategori = $this->input->post('id_kategori');
		$id_skpd = $this->input->post('id_skpd');
		$size = $_FILES['file']['size'];
		$date_upload = time();

		$file_lama = $this->Informasi_publik_model->getInformasiPublik($id_informasi);
		$upload_file = $_FILES['file']['name'];

		if ($upload_file) {
			$nama_file = './assets/file/informasi_publik/' . $file_lama['file'];
			if (is_readable($nama_file) && unlink($nama_file)) {
				$config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|txt';
				$config['max_size']     = '0';
				$config['upload_path'] = './assets/file/informasi_publik';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {
					$new_file = $this->upload->data('file_name');
					$this->db->set('file', $new_file);
				}
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
				redirect('admin/editInformasiSertaMerta/' . $data['informasi_serta_merta']['id_informasi']);
				$config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|txt';
				$config['max_size']     = '0';
				$config['upload_path'] = './assets/file/informasi_publik';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {
					$new_file = $this->upload->data('file_name');
					$this->db->set('file', $new_file);
				}
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
				redirect('admin/editInformasiSertaMerta' . $data['informasi_serta_merta']['id_informasi']);
			}
		}
		$this->Informasi_publik_model->editInformasiPublik($id_informasi, $judul, $id_jenis, $id_kategori, $id_skpd, $size, $date_upload);
		$this->session->set_flashdata('informasi', 'Diubah');
		redirect('admin/informasi_serta_merta');
	}

	public function deleteInformasiSertaMerta($id_informasi)
	{
		$data = $this->Informasi_publik_model->getInformasiPublik($id_informasi);
		$nama_file = './assets/file/informasi_publik/' . $data['file'];

		if (is_readable($nama_file) && unlink($nama_file)) {
			$this->Informasi_publik_model->deleteInformasiPublik($id_informasi);
			$this->session->set_flashdata('informasi', 'Dihapus');
			redirect('admin/informasi_serta_merta');
		}

		$this->Informasi_publik_model->deleteInformasiPublik($id_informasi);
		redirect('admin/informasi_serta_merta');
	}

	//--------------------------------------------INFORMASI SETIAP SAAT-----------------------------------------------------
	function get_ajax_informasi_setiap_saat()
	{
		$list = $this->Informasi_publik_model->get_datatables_setiap_saat();
		$data = array();
		$nomor = @$_POST['start'];
		foreach ($list as $item) {
			$nomor++;
			$row = array();
			$row[] = $nomor . ".";
			// $row[] = $item->id_informasi;
			$row[] = $item->judul;
			$row[] = $item->kategori;
			$row[] = $item->skpd;
			$row[] = '<a href=" ' . base_url('assets/file/informasi_publik/' . $item->file) . ' " target=" _blank"> ' . $item->file . ' </a>';
			$file_path = FCPATH . 'assets/file/informasi_publik/' . $item->file;
			$size_in_byte = filesize($file_path);
			$size_in_kb = round($size_in_byte / 1024);
			$row[] = $size_in_kb . " KB";
			$row[] = date('d-m-Y G:i', $item->date_upload);
			// add html for action
			$row[] = '<a href="' . base_url('admin/editInformasiSetiapSaat/' . $item->id_informasi) . '" class="btn btn-warning btn-xs float-center"><i class="fas fa-edit"></i> Edit</a>
                   <a href="' . site_url('admin/deleteInformasiSetiapSaat/' . $item->id_informasi) . '" class="btn btn-danger btn-xs float-center hapus-admin" onclick="return confirm(\'Apakah Anda Yakin?\')"><i class="fas fa-trash-alt"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Informasi_publik_model->count_all_setiap_saat(),
			"recordsFiltered" => $this->Informasi_publik_model->count_filtered_setiap_saat(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function informasi_setiap_saat()
	{
		$this->check_login();
		$data["title"] = "Data Informasi Setiap Saat | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('admin/partisi/header', $data);
		$this->load->view('admin/partisi/navbar', $data);
		$this->load->view('admin/informasi_setiap_saat', $data);
		$this->load->view('admin/partisi/sidebar', $data);
		$this->load->view('admin/partisi/footer');
	}

	public function addInformasiSetiapSaat()
	{
		$this->check_login();
		$data['title'] = 'Tambah Informasi Setiap Saat | ADMIN PPID WONOGIRI';
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['jenis'] = $this->Informasi_publik_model->getJenis();
		$data['jenis_info'] = $this->Informasi_publik_model->getJenisSetiapSaat();
		$data['kategori'] = $this->Kategori_model->getKategori();
		$data['skpd'] = $this->Skpd_model->getAllSKPD();

		$this->form_validation->set_rules('judul', 'Judul', 'required|trim');
		$this->form_validation->set_rules('id_jenis', 'jenis', 'required|trim');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('id_skpd', 'SKPD', 'required|trim');

		if (empty($_FILES['file']['name'])) {
			$this->form_validation->set_rules('file', 'Upload File', 'required');
			if ($this->form_validation->run() == false) {
				$this->load->view('admin/partisi/header', $data);
				$this->load->view('admin/partisi/navbar', $data);
				$this->load->view('admin/partisi/sidebar', $data);
				$this->load->view('admin/tambah_informasi_setiap_saat', $data);
				$this->load->view('admin/partisi/footer');
			}
		}
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/partisi/header', $data);
			$this->load->view('admin/partisi/navbar', $data);
			$this->load->view('admin/partisi/sidebar', $data);
			$this->load->view('admin/tambah_informasi_setiap_saat', $data);
			$this->load->view('admin/partisi/footer');
		}
		$judul = $this->input->post('judul');
		$id_jenis = $data['jenis_info']->id_jenis;
		$id_kategori = $this->input->post('id_kategori');
		$id_skpd = $this->input->post('id_skpd');
		$size = $_FILES['file']['size'];
		$date_upload = time();

		$upload_file = $_FILES['file']['name'];

		if ($upload_file) {
			$config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|txt';
			$config['max_size']     = '0';
			$config['upload_path'] = './assets/file/informasi_publik';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file')) {
				$new_file = $this->upload->data('file_name');
				$this->db->set('file', $new_file);
			}
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
			redirect('admin/addInformasiSetiapSaat');
		}
		$data = [
			'judul' => $judul,
			'id_jenis' => $id_jenis,
			'id_kategori' => $id_kategori,
			'id_skpd' => $id_skpd,
			'size' => $size,
			'date_upload' => $date_upload,
		];

		$this->Informasi_publik_model->inputInformasiPublik($data, 'informasi_publik');
		$this->session->set_flashdata('informasi', 'Ditambah');
		redirect('admin/informasi_setiap_saat');
	}

	public function editInformasiSetiapSaat($id_informasi)
	{
		$this->check_login();
		$data["title"] = "Edit Informasi Setiap Saat | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['informasi_setiap_saat'] = $this->Informasi_publik_model->getInformasiPublik($id_informasi);
		$data['all_jenis'] = $this->Informasi_publik_model->getJenis();
		$data['all_kategori'] = $this->Kategori_model->getKategoriInformasi();
		$data['all_skpd'] = $this->Skpd_model->getAllSKPD();
		$data['jenis'] = $this->Informasi_publik_model->getJenisInformasiById($id_informasi);
		$data['kategori'] = $this->Informasi_publik_model->getKategoriInformasiById($id_informasi);
		$data['skpd'] = $this->Informasi_publik_model->getSKPDInformasiById($id_informasi);

		$this->form_validation->set_rules('judul', 'Judul', 'required|trim');
		$this->form_validation->set_rules('id_jenis', 'jenis', 'required|trim');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('id_skpd', 'SKPD', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/partisi/header', $data);
			$this->load->view('admin/partisi/navbar', $data);
			$this->load->view('admin/partisi/sidebar', $data);
			$this->load->view('admin/edit_informasi_setiap_saat', $data);
			$this->load->view('admin/partisi/footer');
		}
		$judul = $this->input->post('judul');
		$id_jenis = $this->input->post('id_jenis');;
		$id_kategori = $this->input->post('id_kategori');
		$id_skpd = $this->input->post('id_skpd');
		$size = $_FILES['file']['size'];
		$date_upload = time();

		$file_lama = $this->Informasi_publik_model->getInformasiPublik($id_informasi);
		$upload_file = $_FILES['file']['name'];

		if ($upload_file) {
			$nama_file = './assets/file/informasi_publik/' . $file_lama['file'];
			if (is_readable($nama_file) && unlink($nama_file)) {
				$config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|txt';
				$config['max_size']     = '0';
				$config['upload_path'] = './assets/file/informasi_publik';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {
					$new_file = $this->upload->data('file_name');
					$this->db->set('file', $new_file);
				}
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
				redirect('admin/editInformasiSetiapSaat/' . $data['informasi_setiap_saat']['id_informasi']);
			}
			$config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|txt';
			$config['max_size']     = '0';
			$config['upload_path'] = './assets/file/informasi_publik';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file')) {
				$new_file = $this->upload->data('file_name');
				$this->db->set('file', $new_file);
			}
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
			redirect('admin/editInformasiSetiapSaat/' . $data['informasi_setiap_saat']['id_informasi']);
		}
		$this->Informasi_publik_model->editInformasiPublik($id_informasi, $judul, $id_jenis, $id_kategori, $id_skpd, $size, $date_upload);
		$this->session->set_flashdata('informasi', 'Diubah');
		redirect('admin/informasi_setiap_saat');
	}

	public function deleteInformasiSetiapSaat($id_informasi)
	{
		$data = $this->Informasi_publik_model->getInformasiPublik($id_informasi);
		$nama_file = './assets/file/informasi_publik/' . $data['file'];

		if (is_readable($nama_file) && unlink($nama_file)) {
			$this->Informasi_publik_model->deleteInformasiPublik($id_informasi);
			$this->session->set_flashdata('informasi', 'Dihapus');
			redirect('admin/informasi_setiap_saat');
		}

		$this->Informasi_publik_model->deleteInformasiPublik($id_informasi);
		redirect('admin/informasi_setiap_saat');
	}

	public function downloadInformasi($id_informasi)
	{
		$fileInfo = $this->Informasi_publik_model->getInformasiPublik($id_informasi);
		$this->db->set('jumlah_unduh', 'jumlah_unduh+1', false);
		$this->db->where('id_informasi', $id_informasi);
		$this->db->update('informasi_publik');
		//download file from directory
		force_download('./assets/file/informasi_publik/' . $fileInfo['file'], null);
	}

	//-------------------------------------------KATEGORI--------------------------------------------
	function get_ajax_kategori()
	{
		$list = $this->Kategori_model->get_datatables();
		$data = array();
		$nomor = @$_POST['start'];
		foreach ($list as $item) {
			$nomor++;
			$row = array();
			$row[] = $nomor . ".";
			$row[] = $item->kategori;
			// add html for action
			$row[] = '<a href="' . base_url('admin/editKategori/' . $item->id_kategori) . '" class="btn btn-warning btn-xs float-center"><i class="fas fa-edit"></i> Edit</a>
                   <a href="' . site_url('admin/deleteKategori/' . $item->id_kategori) . '" class="btn btn-danger btn-xs float-center hapus-admin" onclick="return confirm(\'Apakah Anda Yakin?\')"><i class="fas fa-trash-alt"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Kategori_model->count_all(),
			"recordsFiltered" => $this->Kategori_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function kategori()
	{
		$this->check_login();
		$data["title"] = "Data Kategori | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('admin/partisi/header', $data);
		$this->load->view('admin/partisi/navbar', $data);
		$this->load->view('admin/kategori', $data);
		$this->load->view('admin/partisi/sidebar', $data);
		$this->load->view('admin/partisi/footer');
	}

	public function addKategori()
	{
		$this->check_login();
		$data["title"] = "Tambah Kategori | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('kategori', 'Kategori', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/partisi/header', $data);
			$this->load->view('admin/partisi/navbar', $data);
			$this->load->view('admin/tambah_kategori', $data);
			$this->load->view('admin/partisi/sidebar', $data);
			$this->load->view('admin/partisi/footer');
		}
		$kategori = $this->input->post('kategori');
		$data = [
			'kategori' => $kategori
		];

		$this->Kategori_model->inputKategori($data, 'kategori');
		$this->session->set_flashdata('kategori', 'Ditambah');
		// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Pemesanan Berhasil Ditambahkan!</div>');
		redirect('admin/kategori');
	}

	public function editKategori($id_kategori)
	{
		$this->check_login();
		$data["title"] = "Edit Kategori | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->Kategori_model->getKategoriById($id_kategori);

		$this->form_validation->set_rules('kategori', 'Kategori', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/partisi/header', $data);
			$this->load->view('admin/partisi/navbar', $data);
			$this->load->view('admin/partisi/sidebar', $data);
			$this->load->view('admin/edit_kategori', $data);
			$this->load->view('admin/partisi/footer');
		}
		$kategori = $this->input->post('kategori');

		$this->Kategori_model->editKategori($id_kategori, $kategori);
		$this->session->set_flashdata('kategori', 'Diubah');
		redirect('admin/kategori');
	}

	public function deleteKategori($id_kategori)
	{
		$this->Kategori_model->deleteKategori($id_kategori);
		$this->session->set_flashdata('kategori', 'Dihapus');
		redirect('admin/kategori');
	}

	//-------------------------------------------SKPD--------------------------------------------
	function get_ajax_skpd()
	{
		$list = $this->Skpd_model->get_datatables();
		$data = array();
		$nomor = @$_POST['start'];
		foreach ($list as $item) {
			$nomor++;
			$row = array();
			$row[] = $nomor . ".";
			$row[] = $item->skpd;
			// add html for action
			$row[] = '<a href="' . base_url('admin/editSkpd/' . $item->id_skpd) . '" class="btn btn-warning btn-xs float-center"><i class="fas fa-edit"></i> Edit</a>
                   <a href="' . site_url('admin/deleteSkpd/' . $item->id_skpd) . '" class="btn btn-danger btn-xs float-center hapus-admin" onclick="return confirm(\'Apakah Anda Yakin?\')"><i class="fas fa-trash-alt"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Skpd_model->count_all(),
			"recordsFiltered" => $this->Skpd_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function skpd()
	{
		$this->check_login();
		$data["title"] = "Data SKPD | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('admin/partisi/header', $data);
		$this->load->view('admin/partisi/navbar', $data);
		$this->load->view('admin/skpd', $data);
		$this->load->view('admin/partisi/sidebar', $data);
		$this->load->view('admin/partisi/footer');
	}

	public function addSKPD()
	{
		$this->check_login();
		$data["title"] = "Tambah SKPD | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('skpd', 'SKPD', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/partisi/header', $data);
			$this->load->view('admin/partisi/navbar', $data);
			$this->load->view('admin/tambah_skpd', $data);
			$this->load->view('admin/partisi/sidebar', $data);
			$this->load->view('admin/partisi/footer');
		}
		$skpd = $this->input->post('skpd');
		$data = [
			'skpd' => $skpd
		];

		$this->Skpd_model->inputSKPD($data, 'skpd');
		$this->session->set_flashdata('skpd', 'Ditambah');
		// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Pemesanan Berhasil Ditambahkan!</div>');
		redirect('admin/skpd');
	}

	public function editSKPD($id_skpd)
	{
		$this->check_login();
		$data["title"] = "Edit SKPD | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['skpd'] = $this->Skpd_model->getSKPDById($id_skpd);

		$this->form_validation->set_rules('skpd', 'SKPD', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/partisi/header', $data);
			$this->load->view('admin/partisi/navbar', $data);
			$this->load->view('admin/partisi/sidebar', $data);
			$this->load->view('admin/edit_skpd', $data);
			$this->load->view('admin/partisi/footer');
		}
		$skpd = $this->input->post('skpd');

		$this->Skpd_model->editSKPD($id_skpd, $skpd);
		$this->session->set_flashdata('skpd', 'Diubah');
		redirect('admin/skpd');
	}

	public function deleteSKPD($id_skpd)
	{
		$this->Skpd_model->deleteSKPD($id_skpd);
		$this->session->set_flashdata('skpd', 'Dihapus');
		redirect('admin/skpd');
	}

	//-------------------------------------------BERITA-----------------------------------------------------
	function get_ajax_berita()
	{
		$list = $this->Berita_model->get_datatables();
		$data = array();
		$nomor = @$_POST['start'];
		foreach ($list as $item) {
			$nomor++;
			$row = array();
			$row[] = $nomor . ".";
			$row[] = $item->judul;
			// $row[] = $item->image != null ? '<img src="' . base_url('assets/image/berita/' . $item->image) . '" class="img" style="width:100px">' : null;
			$row[] = '<a href="' . base_url('assets/image/berita/' . $item->image) . '" target="_blank"><img src="' . base_url('assets/image/berita/' . $item->image) . '" class="img" style="width:100px"></a>';
			$row[] = word_limiter($this->typography->auto_typography($item->isi), 15);
			$row[] = date('d-m-Y G:i', $item->date_created);
			$row[] = $item->views;
			// add html for action
			$row[] = '<a href="' . base_url('admin/editBerita/' . $item->id_berita) . '" class="btn btn-warning btn-xs float-center"><i class="fas fa-edit"></i> Edit</a>
                   <a href="' . site_url('admin/deleteBerita/' . $item->id_berita) . '" class="btn btn-danger btn-xs float-center hapus-admin" onclick="return confirm(\'Apakah Anda Yakin?\')"><i class="fas fa-trash-alt"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Berita_model->count_all(),
			"recordsFiltered" => $this->Berita_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function berita()
	{
		$this->check_login();
		$data["title"] = "Data Berita | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('admin/partisi/header', $data);
		$this->load->view('admin/partisi/navbar', $data);
		$this->load->view('admin/berita', $data);
		$this->load->view('admin/partisi/sidebar', $data);
		$this->load->view('admin/partisi/footer');
	}

	public function addBerita()
	{
		$this->check_login();

		$data['title'] = 'Tambah Berita | ADMIN PPID WONOGIRI';
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('judul', 'Judul', 'required|trim');
		$this->form_validation->set_rules('isi', 'Isi', 'required|trim');

		if (empty($_FILES['image']['name'])) {
			$this->form_validation->set_rules('image', 'Gambar', 'required');
			if ($this->form_validation->run() == false) {
				$this->load->view('admin/partisi/header', $data);
				$this->load->view('admin/partisi/navbar', $data);
				$this->load->view('admin/partisi/sidebar', $data);
				$this->load->view('admin/tambah_berita', $data);
				$this->load->view('admin/partisi/footer');
			}
		}
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/partisi/header', $data);
			$this->load->view('admin/partisi/navbar', $data);
			$this->load->view('admin/partisi/sidebar', $data);
			$this->load->view('admin/tambah_berita', $data);
			$this->load->view('admin/partisi/footer');
		}
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$date_created = time();

		$upload_image = $_FILES['image']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']     = '0';
			$config['upload_path'] = './assets/image/berita/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('image')) {
				$new_image = $this->upload->data('file_name');
				$this->db->set('image', $new_image);
			}
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
			redirect('admin/addBerita');
		}

		$data = [
			'judul' => $judul,
			'isi' => $isi,
			'date_created' => $date_created,
		];

		$this->Berita_model->inputBerita($data, 'berita');
		$this->session->set_flashdata('berita', 'Ditambah');
		redirect('admin/berita');
	}

	public function editBerita($id_berita)
	{
		$this->check_login();
		$data["title"] = "Edit Berita | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['berita'] = $this->Berita_model->getBeritaById($id_berita);

		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/partisi/header', $data);
			$this->load->view('admin/partisi/navbar', $data);
			$this->load->view('admin/partisi/sidebar', $data);
			$this->load->view('admin/edit_berita', $data);
			$this->load->view('admin/partisi/footer');
		}
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');

		$file_lama = $this->Berita_model->getBeritaById($id_berita);
		$upload_image = $_FILES['image']['name'];

		if ($upload_image) {
			$nama_file = './assets/image/berita/' . $file_lama['image'];
			if (is_readable($nama_file) && unlink($nama_file)) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '0';
				$config['upload_path'] = './assets/image/berita';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$new_file = $this->upload->data('file_name');
					$this->db->set('image', $new_file);
				}
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
				redirect('admin/editBerita/' . $data['berita']['id_berita']);
			}
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']     = '0';
			$config['upload_path'] = './assets/image/berita';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('image')) {
				$new_file = $this->upload->data('file_name');
				$this->db->set('image', $new_file);
			}
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
			redirect('admin/editBerita/' . $data['berita']['id_berita']);
		}

		$this->Berita_model->editBerita($id_berita, $judul, $isi);
		$this->session->set_flashdata('berita', 'Diubah');
		redirect('admin/berita');
	}

	public function deleteBerita($id_berita)
	{
		$data = $this->Berita_model->getBeritaById($id_berita);
		$nama_gambar = './assets/image/berita/' . $data['image'];

		if (is_readable($nama_gambar) && unlink($nama_gambar)) {
			$this->Berita_model->deleteBerita($id_berita);
			$this->session->set_flashdata('berita', 'Dihapus');
			redirect('admin/berita');
		}

		$this->Berita_model->deleteBerita($id_berita);
		$this->session->set_flashdata('berita', 'Dihapus');
		redirect('admin/berita');
	}

	public function showBerita()
	{
		$this->check_login();
		$data["title"] = "Berita | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$data['berita'] = $this->Berita_model->getBerita();
		$this->load->view('admin/partisi/header', $data);
		$this->load->view('admin/show_berita', $data);
		$this->load->view('admin/partisi/footer');
	}


	//-----------------------------------------KOTAK SARAN---------------------------------------------------
	function get_ajax_kotak_saran()
	{
		$list = $this->Kotak_saran_model->get_datatables();
		$data = array();
		$nomor = @$_POST['start'];
		foreach ($list as $item) {
			$nomor++;
			$row = array();
			$row[] = $nomor . ".";
			$row[] = $item->nama;
			$row[] = $item->email;
			$row[] = $item->no_telp;
			$row[] = $this->typography->auto_typography($item->pesan);
			// $row[] = $item->pesan;
			$row[] = date('d-m-Y G:i', $item->date_created);
			// add html for action
			$row[] = '<a href="' . site_url('admin/deletePesan/' . $item->id_pesan) . '" class="btn btn-danger btn-xs float-center" onclick="return confirm(\'Apakah Anda Yakin?\')"> <i class="fas fa-trash-alt"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Kotak_saran_model->count_all(),
			"recordsFiltered" => $this->Kotak_saran_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function kotak_saran()
	{
		$this->check_login();
		$data["title"] = "Kotak Saran | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		// $data['pesan'] = $this->Kotak_saran_model->getPesan();
		$this->load->view('admin/partisi/header', $data);
		$this->load->view('admin/partisi/navbar', $data);
		$this->load->view('admin/kotak_saran', $data);
		$this->load->view('admin/partisi/sidebar', $data);
		$this->load->view('admin/partisi/footer');
	}

	public function deletePesan($id_pesan)
	{
		$this->Kotak_saran_model->deletePesan($id_pesan);
		$this->session->set_flashdata('pesan', 'Dihapus');
		redirect('admin/kotak_saran');
	}


	//--------------------------------------------PERMOHONAN-----------------------------------------------------
	function get_ajax_permohonan()
	{
		$list = $this->Permohonan_model->get_datatables();
		$data = array();
		$nomor = @$_POST['start'];
		foreach ($list as $item) {
			$nomor++;
			$row = array();
			$row[] = $nomor . ".";
			$row[] = $item->nama;
			$row[] = $item->no_identitas;
			$row[] = $item->rincian;
			$row[] = $item->tujuan;
			$row[] = $item->email;
			$row[] = date('d-m-Y G:i', $item->date_created);
			$row[] = $item->status;
			// add html for action
			if ($item->status == 'Ditolak' || $item->status == 'Selesai') {
				$row[] = '<a href="' . base_url('admin/kirimPermohonan/' . $item->id_permohonan) . '" class="btn btn-success btn-xs float-center" style="display:none"><i class="fas fa-paper-plane"></i> Kirim</a>
				<a href="' . site_url('admin/tolakPermohonan/' . $item->id_permohonan) . '" class="btn btn-warning btn-xs float-center text-white" style="display:none" value="Hide?" onClick="return confirm_hide(this);"><i class="fas fa-times"></i> Tolak</a>
				<a href="' . site_url('admin/deletePermohonan/' . $item->id_permohonan) . '" class="btn btn-danger btn-xs float-center hapus-permohonan" onclick="return confirm(\'Apakah Anda Yakin?\')"><i class="fas fa-trash-alt"></i> Hapus</a>';
			}
			$row[] = '<a href="' . base_url('admin/kirimPermohonan/' . $item->id_permohonan) . '" class="btn btn-success btn-xs float-center"><i class="fas fa-paper-plane"></i> Kirim</a>
				<a href="' . site_url('admin/tolakPermohonan/' . $item->id_permohonan) . '" class="btn btn-warning btn-xs float-center text-white" value="Hide?" onClick="return confirm_hide(this);"><i class="fas fa-times"></i> Tolak</a>
				<a href="' . site_url('admin/deletePermohonan/' . $item->id_permohonan) . '" class="btn btn-danger btn-xs float-center hapus-permohonan" onclick="return confirm(\'Apakah Anda Yakin?\')"><i class="fas fa-trash-alt"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Permohonan_model->count_all(),
			"recordsFiltered" => $this->Permohonan_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function permohonan()
	{
		$this->check_login();
		$data["title"] = "Data Permohonan | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('admin/partisi/header', $data);
		$this->load->view('admin/partisi/navbar', $data);
		$this->load->view('admin/permohonan', $data);
		$this->load->view('admin/partisi/sidebar', $data);
		$this->load->view('admin/partisi/footer');
	}

	public function kirimPermohonan($id_permohonan)
	{
		$this->check_login();
		$data["title"] = "Data Permohonan | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['permohonan'] = $this->Permohonan_model->getPermohonanById($id_permohonan);

		$this->load->view('admin/partisi/header', $data);
		$this->load->view('admin/partisi/navbar', $data);
		$this->load->view('admin/kirim_permohonan', $data);
		$this->load->view('admin/partisi/sidebar', $data);
		$this->load->view('admin/partisi/footer');
	}

	public function deletePermohonan($id_permohonan)
	{
		$this->Permohonan_model->deletePermohonan($id_permohonan);
		$this->session->set_flashdata('permohonan', 'Dihapus');
		redirect('admin/permohonan');
	}

	public function tolakPermohonan($id_permohonan)
	{
		$status = 'Ditolak';
		$this->Permohonan_model->editStatus($id_permohonan, $status);
		$this->session->set_flashdata('permohonan', 'Ditolak');
		redirect('admin/permohonan');
	}


	public function sendFile($id_permohonan)
	{
		$data["title"] = "Data Permohonan | ADMIN PPID WONOGIRI";
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['permohonan'] = $this->Permohonan_model->getPermohonanById($id_permohonan);

		if (empty($_FILES['file']['name'])) {
			$this->form_validation->set_rules('file', 'Upload File', 'required');
			if ($this->form_validation->run() == false) {
				// redirect('admin/kirimPermohonan/' . $data['permohonan']['id_permohonan']);
				$this->load->view('admin/partisi/header', $data);
				$this->load->view('admin/partisi/navbar', $data);
				$this->load->view('admin/kirim_permohonan', $data);
				$this->load->view('admin/partisi/sidebar', $data);
				$this->load->view('admin/partisi/footer');
			}
		}
		$this->load->library('email');
		$status = 'Selesai';

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_user'] = 'pkl.ppidwonogiri@gmail.com';
		$config['smtp_pass'] = 'ppidwonogiri';
		$config['smtp_port'] = 465;
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from('pkl.ppidwonogiri@gmail.com', 'PPID Wonogiri');
		$this->email->to($this->input->post('email'));
		$this->email->subject('Permohonan Informasi ' . $data['permohonan']['rincian']);
		$this->email->message(
			'Hai ' . $data['permohonan']['nama'] . '! <p>
			Kami telah menerima permohonan informasi Anda. Berikut kami lampirkan informasi yang Anda minta.<br>
			Balas email ini jika terdapat kendala atau Anda juga bisa datang langsung ke kantor PPID Wonogiri.<br>
			Terimakasih.</p>'
		);

		$name_of_uploaded_file = basename($_FILES['file']['name']);
		$upload_folder = './assets/file/upload/';
		//copy the temp. uploaded file to uploads folder
		$path_of_uploaded_file = $upload_folder . $name_of_uploaded_file;
		$tmp_path = $_FILES['file']['tmp_name'];

		if (is_uploaded_file($tmp_path)) {
			if (!copy($tmp_path, $path_of_uploaded_file)) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
			}
		}
		$this->email->attach($path_of_uploaded_file);

		if ($this->email->send() && unlink($path_of_uploaded_file)) {
			$this->Permohonan_model->editStatus($id_permohonan, $status);
			$this->session->set_flashdata('dokumen', 'Dikirim');
			redirect('admin/permohonan');
		}
		echo $this->email->print_debugger();
	}
}
