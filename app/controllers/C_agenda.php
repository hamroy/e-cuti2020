<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_agenda extends MY_user {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_agenda');
		$this->load->model('M_master');
	}
	public function index()
	{
		$this->cloginA();
		$d=[
			'judul' => " Agenda Surat Perintah Tugas ",
			'li' => "selected", //menu
			'isi' => "listAgenda/ASPT",
			'sql' => $this->M_agenda->listSuratSPT($this->input->get('strnama')),

		];

		$this->load->view('beranda',$d);
	}
	public function sPenugasan()
	{
		$this->clogin();
		$d=[
			'judul' => " Agenda Surat Penugasan",
			'li' => "selected", //menu
			'isi' => "listAgenda/ASPenugasan",
			'sql' => $this->M_agenda->listSuratSPenugasan($this->input->get('strnama')),

		];

		$this->load->view('beranda',$d);
	}
	
	

}
