<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_input extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_master');
		$this->load->model('M_master2');
		$this->load->model('M_input');
		$this->clogin();

		$h = "7";// Hour for time zone goes here e.g. +7 or -4, just remove the + or -
        $hm = $h * 60;
        $ms = $hm * 60;
        $this->tglpc = gmdate('Y-m-d H:i:s', time() + ($ms));
        $this->thn = gmdate('Y', time() + ($ms));
		
	}

	private function clogin()
	{
		if($this->session->userdata('login')==TRUE /*AND $this->session->userdata('lvl_akses')==1*/){
		}else{
			redirect('login/?error=harusdaftarlagi&kode=0');
		}
		$this->id_user=$this->session->userdata('id_user');
	}
	public function index()
	{
		$d=[
			'judul' => " Permintaan Cuti ",
			'in' => "selected", //menu
			'isi' => "input/formPermintaanCuti",
			'sql' => '',
			'ac2' => 'active',

		];

		$this->load->view('beranda',$d);
	}
	public function listCuti()
	{
		$d=[
			'judul' => " Daftar Status Permintaan Cuti ",
			'in' => "selected", //menu
			'isi' => "input/daftarCuti",
			'sql' => '',
			'ac3' => 'active',

		];

		$this->load->view('beranda',$d);
	}

	//==========================

	
	public function SPPDNipEdit($value='')
	{
		$d=[
			'judul' => "EDIT DATA",
		];
		$this->load->view('input/editSPPDNIp',$d);
	}
	
	//[[[[[[[[[[[[[[[[[[[[[[]]]]]]]]]]]]]]]]]]]]]]

	public function inputCuti_save($value='')
	{
		$data=$this->input->post();
		$sdata=$this->session->userdata();
		$tgl=$data['tanggal'];
		$tgl2=$data['tanggalS'];
		$this->nip = $sdata['nip'];
		$this->realisai = $this->rangeTanggal($tgl,$tgl2);
		$this->jatahCuti = $this->M_input->getSisaCuti3Tahun();
		$this->cutiThnNow = $this->M_input->getRealisasiCutiThn($this->thn);
		if ($this->jatahCuti == 0 or $this->jatahCuti < $this->realisai) {
			$this->session->set_flashdata('pesan','Data gagal disimpan, melebihi batas penerimaan cuti');
			redirect('C_input/#'.$_POST['cboklasifikasi']);
		}
		$d=[
			'nip'=>$this->nip,
			'penandatangan'=>$data['atasan'],
			'jenisCuti'=>$data['kdJenisCuti'],
			'status'=>0,
			'tgl_awal'=>$tgl,
			'tgl_akhir'=>$data['tanggalS'],
			'ket'=>$data['alasan'],
			'alamat'=>$data['alamat'],
			'no'=>$data['no'],

			'tgl_i'=>$this->tglpc,
			'range'=>$this->realisai,
			'thn'=>$this->thn,
		];

		$c=$this->M_input->saveTransCuti($d);
		$this->saveRealisasi();
		
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
			redirect('C_input/#'.$_POST['cboklasifikasi']);
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect('C_input');
		//
		
	}

	private function saveRealisasi($value='')
	{
		$d=[
			'nip'=>$this->nip,
			'realisasi'=>$this->cutiThnNow+$this->realisai,
			'thn'=>$this->thn,
		];
		$c=$this->M_input->saveRealisasiCuti($d);
	}

	public function olahTanggalInput()
	{
		
	}

	public function rangeTanggal($tgl,$tgl2)
	{
		$start_date = new DateTime($tgl);
		$end_date = new DateTime($tgl2);
		$interval = $start_date->diff($end_date);
		return $interval->days+1;		
	}

	//========================================

	public function sPPDNipEdit_save($value='')
	{
		$c=$this->M_input->saveEditubahPPDNip();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal disimpan');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil disimpan');
		}
		redirect($this->sPTAb());
	}
	//========================================
	public function sPPDNipDel($value='')
	{
		$c=$this->M_input->saveDelSPPDNip();
		if ($c==0) {
			$this->session->set_flashdata('pesan','Data gagal dihapus');
		}else{
			$this->session->set_flashdata('pesan','Data berhasil dihapus');
		} //*/
		redirect($this->sPTAb());
	}
	//====================================


}
