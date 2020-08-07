<?php

class M_master2 extends CI_model
{
	var $tbl = 'tbl_distribusicuti';
	function __construct()
	{
		# code...
		$this->db2=$this->load->database('db2',true);
	}

	public function getJenisCuti($nama='')
	{
		$cari = "SELECT * FROM tbl_jcuti";
		return $this->db2->query($cari);
	}

	public function getDistribusi($d='')
	{
		$this->db2->from($this->tbl);
		return $this->db2->get($this->tbl);
	}


	
}

