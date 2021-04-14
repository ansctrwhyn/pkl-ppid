<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
	public function index()
	{
		$this->check_login();
		$data["title"] = "PPID WONOGIRI";
		$data['member'] = $this->db->get_where('member', ['email' => $this->session->userdata('email_member')])->row_array();
		$this->load->view('member/partisi/header', $data);
		$this->load->view('member/partisi/navbar', $data);
		$this->load->view('member/beranda', $data);
		$this->load->view('member/partisi/sidebar', $data);
		$this->load->view('member/partisi/footer');
	}

	public function check_login()
	{
		if (!$this->session->userdata('login_member')) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
			redirect('auth');
		}
	}

	public function beranda()
	{
		$this->check_login();
		$data["title"] = "PPID WONOGIRI";
		$data['member'] = $this->db->get_where('member', ['email' => $this->session->userdata('email_member')])->row_array();
		$this->load->view('member/partisi/header', $data);
		$this->load->view('member/partisi/navbar', $data);
		$this->load->view('member/beranda', $data);
		$this->load->view('member/partisi/sidebar', $data);
		$this->load->view('member/partisi/footer');
	}

	public function ubah_password()
	{
		$this->check_login();

		$data['title'] = 'Ubah Password | PPID WONOGIRI';
		$data['member'] = $this->db->get_where('member', ['email' => $this->session->userdata('email_member')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('member/partisi/header', $data);
			$this->load->view('member/partisi/navbar', $data);
			$this->load->view('member/partisi/sidebar', $data);
			$this->load->view('member/ubah_password', $data);
			$this->load->view('member/partisi/footer');
		}
		$current_password = md5($this->input->post('current_password'));
		$new_password = md5($this->input->post('new_password1'));
		if ($current_password != $data['member']['password']) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Currrent Password!</div>');
			redirect('member/ubah_password');
		}
		if ($current_password == $new_password) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New password cannot be the same as currrent password!</div>');
			redirect('member/ubah_password');
		}
		$new_password_ = $new_password;

		$this->db->set('password', $new_password_);
		$this->db->where('email', $this->session->userdata('email_member'));
		$this->db->update('member');

		// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Changed!</div>');
		$this->session->set_flashdata('password', 'Diubah');
		redirect('member/beranda');
	}

	function get_ajax_riwayat()
	{
		$list = $this->Permohonan_model->get_riwayat();
		$data = array();
		$nomor = @$_POST['start'];
		foreach ($list as $item) {
			$nomor++;
			$row = array();
			$row[] = $nomor . ".";
			$row[] = $item->rincian;
			$row[] = $item->tujuan;
			$row[] = $item->email;
			$row[] = date('d-m-Y G:i', $item->date_created);
			$row[] = $item->status;
			// add html for action
			// $row[] = '<a href="' . site_url('member/deletePermohonan/' . $item->id_permohonan) . '" class="btn btn-danger btn-xs float-center hapus-permohonan"><i class="fas fa-trash-alt"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Permohonan_model->count_riwayat(),
			"recordsFiltered" => $this->Permohonan_model->count_filtered_riwayat(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function createPermohonan()
	{
		$this->check_login();

		$data['title'] = 'Permohonan Informasi | PPID WONOGIRI';
		$data['member'] = $this->db->get_where('member', ['email' => $this->session->userdata('email_member')])->row_array();

		$this->form_validation->set_rules('rincian', 'Informasi Yang Dibutuhkan', 'required|trim');
		$this->form_validation->set_rules('tujuan', 'Tujuan Penggunaan Informasi', 'required|trim');
		// $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('member/partisi/header', $data);
			$this->load->view('member/partisi/navbar', $data);
			$this->load->view('member/partisi/sidebar', $data);
			$this->load->view('member/buat_permohonan', $data);
			$this->load->view('member/partisi/footer');
		}
		$nama = $data['member']['nama'];
		$no_identitas = $data['member']['no_identitas'];
		$rincian = $this->input->post('rincian');
		$tujuan = $this->input->post('tujuan');
		$email = $data['member']['email'];
		$date_created = time();
		$status = 'Dalam proses';

		$data = [
			'nama' => $nama,
			'no_identitas' => $no_identitas,
			'rincian' => $rincian,
			'tujuan' => $tujuan,
			'email' => $email,
			'date_created' => $date_created,
			'status' => $status
		];

		$this->Permohonan_model->inputPermohonan($data, 'permohonan');
		$this->session->set_flashdata('permohonan', 'Diajukan');
		redirect('member');
	}
}
