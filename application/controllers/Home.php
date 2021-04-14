<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$data["title"] = "PPID WONOGIRI";
		$data["top_info"] = $this->Informasi_publik_model->getTopInfo();
		$data["new_info"] = $this->Informasi_publik_model->getNewInfo();
		$data['total_info'] = $this->db->get('informasi_publik')->num_rows();
		$data['total_unduh'] = $this->Informasi_publik_model->sumUnduh();
		$data['total_permohonan'] = $this->db->get('permohonan')->num_rows();
		$data['berita'] = $this->Berita_model->getBeritaTerbaru();

		$this->load->view('partisi/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('partisi/footer');
	}
}
