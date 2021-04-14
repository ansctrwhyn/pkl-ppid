<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statistik extends CI_Controller
{
	public function index()
	{
		$data["title"] = "Statistik Layanan | PPID WONOGIRI";
		$data['dalamproses'] = $this->Permohonan_model->count_dalamproses();
		$data['ditolak'] = $this->Permohonan_model->count_ditolak();
		$data['selesai'] = $this->Permohonan_model->count_selesai();
		$data['total_info'] = $this->db->get('informasi_publik')->num_rows();
		$data['total_unduh'] = $this->Informasi_publik_model->sumUnduh();
		$data['total_permohonan'] = $this->db->get('permohonan')->num_rows();
		// $this->load->view('partisi/header', $data);
		$this->load->view('statistik/index', $data);
		// $this->load->view('partisi/footer');
	}
}
