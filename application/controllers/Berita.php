<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Berita PPID Wonogiri';
		$data['keyword'] = $this->input->post('keyword');

		// config
		$this->db->like('judul', $data['keyword']);
		$this->db->from('berita');

		$config['base_url'] = 'http://localhost/ppid/berita/index';
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 6;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['berita'] = $this->Berita_model->getBeritaPagination($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('partisi/header', $data);
		$this->load->view('berita/index', $data);
		$this->load->view('partisi/footer');
	}

	public function readBerita($id_berita)
	{
		$data['title'] = 'PPID Wonogiri';
		$data['berita'] = $this->Berita_model->getBeritaById($id_berita);
		$data['new_berita'] = $this->Berita_model->getNewBerita();
		$this->db->set('views', 'views+1', false);
		$this->db->where('id_berita', $id_berita);
		$this->db->update('berita');

		$this->load->view('partisi/header', $data);
		$this->load->view('berita/read_berita', $data);
		$this->load->view('partisi/footer');
	}
}
