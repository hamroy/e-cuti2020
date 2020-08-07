<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_crud extends CI_model {
	var $id=0;
	function __construct()
	{
		
		$this->db2=$this->load->database('db2',true);

	}


	public function setTblBy($tbl)
	{
		$this->tbl=$tbl;
	}
	public function setIdBy($col,$id)
	{
		$this->id=$id;
		$this->col=$col;
	}

	public function getIdBy()
	{
		$this->db2->where($this->col,$this->id);
		return $this->db2->get($this->tbl);
	}

	public function readAllBy()
	{
		return $this->db2->get($this->tbl);
	}

	public function createBy($d)
	{
		return $this->db2->insert($this->tbl,$d);
	}

	public function updateBy($d)
	{

		$this->db2->where($this->col,$this->id);
		return $this->db2->update($this->tbl,$d);
	}

	public function deleteBy()
	{
		$this->db2->where($this->col,$this->id);
		return $this->db2->delete($this->tbl);
	}
	
	

}

