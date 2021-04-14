<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mekanisme extends CI_Controller
{
	public function index()
	{
		$data["title"] = "Form Permohonan Informasi | PPID WONOGIRI";
		$this->load->view('partisi/header', $data);
		$this->load->view('mekanisme/index');
		$this->load->view('partisi/footer');
	}
}
