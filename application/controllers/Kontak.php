<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
	public function index()
	{
		$data["title"] = "Kontak Kami | PPID WONOGIRI";
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');
		$this->form_validation->set_rules('pesan', 'Pesan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('partisi/header', $data);
			$this->load->view('kontak/index');
			$this->load->view('partisi/footer');
		}
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$no_telp = $this->input->post('no_telp');
		$pesan = $this->input->post('pesan');
		$date_created = time();

		$data = [
			'nama' => $nama,
			'email' => $email,
			'no_telp' => $no_telp,
			'pesan' => $pesan,
			'date_created' => $date_created,
		];

		$this->Kotak_saran_model->inputPesan($data, 'kotak_saran');
		$this->session->set_flashdata('pesan', 'Dikirim');
		// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Pemesanan Berhasil Ditambahkan!</div>');
		redirect('Kontak');
	}
}
