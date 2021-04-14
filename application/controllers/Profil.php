<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
	public function index()
	{
		$data["title"] = "Profil | PPID WONOGIRI";
		$this->load->view('partisi/header', $data);
		$this->load->view('profil/index');
		$this->load->view('partisi/footer');
	}
}
