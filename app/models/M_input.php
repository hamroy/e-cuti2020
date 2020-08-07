<?php
/**
 * 
 */
class M_input extends CI_model
{
	
	function __construct()
	{
		$this->db2=$this->load->database('db2',true);
		$this->nip = $this->session->userdata('nip');
	}

	public function saveTransCuti($d='')
	{
		return $this->db2->insert('tbl_transaksicuti',$d);
	}
	public function saveRealisasiCuti($d='')
	{
		$this->db2->from('tbl_realisasi_cuti');
		$this->db2->where('nip',$d['nip']);
		$this->db2->where('thn',$d['thn']);
		$c = $this->db2->get();

		if ($c->num_rows() > 0) {
		$this->db2->where('nip',$d['nip']);
		$this->db2->where('thn',$d['thn']);
		return $this->db2->update('tbl_realisasi_cuti',$d);		
		}else{
		return $this->db2->insert('tbl_realisasi_cuti',$d);
		}
	}

	public function getJatahThn($t='')
	{
		$this->db2->where('nip',$this->nip);
		$this->db2->where('status',1);
		$this->db2->where('thn',$t);
		$c = $this->db2->get('tbl_distribusicuti');
		$out=0;
		if ($c->num_rows() > 0) {
			$out = $c->row()->jatah;
		}

		return $out;
	}

	public function getRealisasiCutiThn($t='')
	{
		$this->db2->where('nip',$this->nip);
		$this->db2->where('thn',$t);
		$c = $this->db2->get('tbl_realisasi_cuti');
		$out=0;
		if ($c->num_rows() > 0) {
			$out = $c->row()->realisasi;
		}

		return $out;
	}
	public function getRealisasiCuti($t='')
	{
		$this->db2->where('nip',$this->nip);
		// $this->db2->where('thn',$t);
		$c = $this->db2->get('tbl_realisasi_cuti');
		
		return $c;
	}

	public function getSisaCuti3Tahun($value='')
	{
		$thn = $this->M_set->thn;
		$totalSisa=0;		
		for ($i=0; $i < 3 ; $i++) { 
		  $thnC=$thn - $i;
          $jatah = $this->getJatahThn($thnC);
          $rs = $this->getRealisasiCutiThn($thnC);
          $totalSisa += ($jatah-$rs);
		}

		return $totalSisa;

	}

	public function getAllSisaCuti($value='')
	{
		$get = $this->getRealisasiCuti();

		$totalSisa=0;
		foreach ($get->result() as $key) {
			// $jatah = $this->M_input->getJatahThn($key->thn);
			$r = $key->realisasi;
			$totalSisa+=($r);
		}

		return $totalSisa;

	}


	
}