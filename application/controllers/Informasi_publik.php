<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi_publik extends CI_Controller
{
	public function index()
	{
		$data["title"] = "Informasi Publik | PPID WONOGIRI";
		$data['jenis'] = $this->Informasi_publik_model->getJenis();
		$data['kategori'] = $this->Kategori_model->getKategori();
		$data['skpd'] = $this->Skpd_model->getAllSKPD();

		$data['keyword'] = $this->input->post('keyword');

		// config
		$this->db->like('judul', $data['keyword']);
		$this->db->from('informasi_publik');


		//config pagination
		$config['base_url'] = 'http://localhost/ppid/informasi_publik/index';
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 10;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['informasi'] = $this->Informasi_publik_model->getAllInformasiPagination($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('partisi/header', $data);
		$this->load->view('informasi_publik/index', $data);
		$this->load->view('partisi/footer');
	}

	public function showDetail($id_informasi)
	{
		$data["title"] = "Detail Informasi Publik | PPID WONOGIRI";
		$data['informasi'] = $this->Informasi_publik_model->getInformasiPublik($id_informasi);
		$data['jenis'] = $this->Informasi_publik_model->getJenisInformasiById($id_informasi);
		$data['kategori'] = $this->Informasi_publik_model->getKategoriInformasiById($id_informasi);
		$data['skpd'] = $this->Informasi_publik_model->getSKPDInformasiById($id_informasi);

		$this->load->view('partisi/header', $data);
		$this->load->view('informasi_publik/detail');
		$this->load->view('partisi/footer');
	}
}
