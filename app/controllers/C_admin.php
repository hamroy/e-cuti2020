<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_admin extends MY_admin {

	function __construct()
	{
		parent::__construct();
		$this->clogin();
		$this->load->model('M_set');
		$this->load->model('M_master');
		$this->load->model('M_master2');
		$this->cud = new MY_crud();
		$this->cud->setTblBy('tbl_distribusicuti'); //tbl
		
	}
	

	public function index()
	{

		$d=[
			'judul' => "Daftar Pegawai Penerima Cuti",
			'isi' => "admin/penerimaCuti",
			'ac2' => 'active',
			'sql' => $this->cud->readAllBy(),
		];

		$this->load->view('beranda',$d);
	}

	public function simpanPenerima($value='')
	{
		# code...
		
		$jatah=$this->input->post('jatah');
		$thn=$this->input->post('thn');
		$nip=$this->input->post('nip');

		$value=[
			'nip'=>$nip,
			'thn'=>$thn,
			'jatah'=>$jatah,
			'tgl'=>$this->M_set->tglpc(),
		];
		

		$this->cud->createBy($value);
		$this->session->set_flashdata('pesan',"Sukses");
		redirect('C_admin');
	}

	public function delDistribusiId($id='')
	{
		# code...

		$this->cud->setIdBy('idtbl_distribusicuti',$id);
		$this->cud->deleteBy();
		$this->session->set_flashdata('pesan',"Hapus data Sukses");
		redirect('C_admin');
	}

	public function distribusiId($id='')
	{
		# code...
		$id=$this->input->get('modal_id');
		$this->cud->setIdBy('idtbl_distribusicuti',$id);
		$gid=$this->cud->getIdBy()->row();

		$d=[
			'judulModal' => "Edit Penerima Cuti",
			'thn' => $gid->thn,
			'jatah' => $gid->jatah,
			'id' => $id,
		];

		$this->load->view('admin/upPenerimaCuti',$d);
	}


	public function simpanUpPenerima($id='')
	{
		# code...
		$jatah=$this->input->post('jatah');
		$thn=$this->input->post('thn');
		$id=$this->input->post('id');

		$value=[
			'thn'=>$thn,
			'jatah'=>$jatah,
			'tgl'=>$this->M_set->tglpc(),
		];

		$this->cud->setIdBy('idtbl_distribusicuti',$id);
		$this->cud->updateBy($value);
		$this->session->set_flashdata('pesan',"Edit data Sukses");
		redirect('C_admin');
	}
}
