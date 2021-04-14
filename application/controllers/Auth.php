<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		if (($this->session->userdata('login_member')) == true) {
			redirect('member');
		}
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login | PPID WONOGIRI';
			$this->load->view('partisi/header', $data);
			$this->load->view('auth/login');
			$this->load->view('partisi/footer');
		}
		$this->_login();
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('member', ['email' => $email])->row_array();
		//jika user ada
		if ($user) {
			//jika usernya aktif
			if ($user['is_active'] == 1) {
				//cek password
				if (md5($password) == $user['password']) {
					$data = [
						'nama_member' => $user['nama'],
						'email_member' => $user['email'],
						'no_identitas_member' => $user['no_identitas'],
						'login_member' => true
					];
					$this->session->set_userdata($data);
					redirect('member');
					// }
				}
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password salah! </div>');
				redirect('auth');
			}
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Maaf, email Anda belum aktif. </div>');
			redirect('auth');
		}
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Maaf, email Anda belum terdaftar. </div>');
		redirect('auth');
	}

	public function check_login()
	{
		if (!$this->session->userdata('login_member')) {
			$this->session->set_flashdata('message', '<div class="alert" role="alert"> Silakan login terlebih dahulu! </div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email_member');
		$this->session->unset_userdata('nama_member');
		$this->session->unset_userdata('no_identitas_member');
		$this->session->unset_userdata('login_member');
		// $this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Anda berhasil Logout! </div>');
		redirect('auth');
	}

	public function daftar_individu()
	{
		if ($this->session->userdata('email_member')) {
			redirect('member');
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('no_identitas', 'Nomor Identitas', 'required|trim|is_unique[member.no_identitas]', [
			'is_unique' => 'Nomor Identitas sudah terdaftar!'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[member.email]', [
			'is_unique' => 'Email sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
			'matches' => 'Password tidak cocok',
			'min_length' => 'Password terlalu pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[4]|matches[password1]');

		if (empty($_FILES['image']['name'])) {
			$this->form_validation->set_rules('image', 'Scan Kartu Identitas', 'required');
			if ($this->form_validation->run() == false) {
				$data['title'] = 'Daftar | PPID WONOGIRI';
				$this->load->view('partisi/header', $data);
				$this->load->view('auth/daftar_individu', $data);
				$this->load->view('partisi/footer');
			}
		}
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Daftar | PPID WONOGIRI';
			$this->load->view('partisi/header', $data);
			$this->load->view('auth/daftar_individu', $data);
			$this->load->view('partisi/footer');
		}
		$email = $this->input->post('email', true);
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
			redirect('admin/daftar_individu');
		}

		$data = [
			'nama' => htmlspecialchars($this->input->post('nama', true)),
			'no_identitas' => $this->input->post('no_identitas'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => htmlspecialchars($email),
			'password' => md5($this->input->post('password1')),
			'date_created' => time(),
			'tipe_member' => 1,
			'is_active' => 0,
		];

		//menyiapkan token
		$token = base64_encode(random_bytes(32));
		$user_token = [
			'email' => $email,
			'token' => $token,
			'date_created' => time()
		];

		$this->db->insert('member', $data);
		$this->db->insert('user_token', $user_token);
		$this->_sendEmail($token, 'verify');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Anda berhasil registrasi akun. Silakan cek email Anda untuk aktivasi akun.</div>');
		redirect('auth');
	}

	public function daftar_kelompok()
	{
		if ($this->session->userdata('email_member')) {
			redirect('member');
		}

		$this->form_validation->set_rules('nama', 'Nama Organisasi', 'required|trim');
		$this->form_validation->set_rules('no_identitas', 'Nomor Surat Pendirian', 'required|trim|is_unique[member.no_identitas]', [
			'is_unique' => 'Nomor Surat Pendirian sudah terdaftar!'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[member.email]', [
			'is_unique' => 'Email sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
			'matches' => 'Password tidak cocok',
			'min_length' => 'Password terlalu pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[4]|matches[password1]');

		if (empty($_FILES['image']['name'])) {
			$this->form_validation->set_rules('image', 'Scan Surat Pendirian', 'required');
			if ($this->form_validation->run() == false) {
				$data['title'] = 'Daftar | PPID WONOGIRI';
				$this->load->view('partisi/header', $data);
				$this->load->view('auth/daftar_kelompok');
				$this->load->view('partisi/footer');
			}
		}
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Daftar | PPID WONOGIRI';
			$this->load->view('partisi/header', $data);
			$this->load->view('auth/daftar_kelompok');
			$this->load->view('partisi/footer');
		}
		$email = $this->input->post('email', true);

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
			redirect('admin/daftar_individu');
		}
		$data = [
			'nama' => htmlspecialchars($this->input->post('nama_organisasi', true)),
			'no_identitas' => $this->input->post('no_identitas'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => htmlspecialchars($email),
			'password' => md5($this->input->post('password1')),
			'date_created' => time(),
			'tipe_member' => 2,
			'is_active' => 0,
		];

		//menyiapkan token
		$token = base64_encode(random_bytes(32));
		$user_token = [
			'email' => $email,
			'token' => $token,
			'date_created' => time()
		];
		$this->db->insert('user_token', $user_token);
		$this->_sendEmail($token, 'verify');
		$this->db->insert('member', $data);
		// $this->_sendEmail($token, 'verify');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Anda berhasil registrasi akun. Silakan cek email Anda untuk aktivasi akun.</div>');
		redirect('auth');
	}

	private function _sendEmail($token, $type)
	{
		$this->load->library('email');
		$config = array();
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
		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
		}
		if ($this->email->send()) {
			return true;
		}
		echo $this->email->print_debugger();
		// die;
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$user = $this->db->get_where('member', ['email' => $email])->row_array();
		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('member');
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat akun Anda sudah aktif. Silakan Login!</div>');
					redirect('auth');
				}
				$this->db->delete('member', ['email' => $email]);
				$this->db->delete('user_token', ['email' => $email]);
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
				redirect('auth');
			}
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
			redirect('auth');
		}
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
		redirect('auth');
	}
}
