<?php
/**
 * 
 */
class M_master extends CI_model
{
	
	function __construct()
	{
		# code...
	}

	public function getKlasisifikasi($nama='')
	{
		$cari = "SELECT kd_klasifikasi, nm_klasifikasi, id, keterangan FROM tbklasifikasi Where nm_klasifikasi like '%$nama%'";
		return $this->db->query($cari);
	}

	public function getInstansi($nama='')
	{
		$cari = "SELECT kd_instansi, nm_instansi FROM tbinstansi Where nm_instansi like '%$nama%'";
		return $this->db->query($cari);
	}

	public function getJsurat($nama='')
	{
		$cari = "SELECT kd_jenis, nm_jenis, id FROM tbjenis_surat Where nm_jenis like '%$nama%'";
		return $this->db->query($cari);
	}

	public function getBidang($nama='')
	{
		$cari = "SELECT kd_bidang, nm_bidang, id FROM tbbidang Where nm_bidang like '%$nama%'";
		return $this->db->query($cari);
	}
	public function getKegiatan($nama='')
	{
		$cari = "SELECT kd_kegiatan, nm_kegiatan, id FROM tbkegiatan Where nm_kegiatan like '%$nama%'";
		return $this->db->query($cari);
	}
	public function getJabatan($nama='')
	{
		$cari = "SELECT idj, nmj FROM tbjabatan Where nmj like '%$nama%' order by idj desc";
		return $this->db->query($cari);
	}
	public function getPangkat($nama='')
	{
		$cari = "SELECT * FROM tbpangkat Where nm_pangkat like '%$nama%' order by id desc";
		return $this->db->query($cari);
	}
	public function getPegawai($nama='')
	{
		$cari = "SELECT nip,nama,nama_jabatan,kd_jk,idj,id_pangkat,kd_pendidikan,id FROM tbpegawai Where nama like '%$nama%' and kd_instansi='BKPSDM'";
		return $this->db->query($cari);
	}

	public function getUser($nama='')
	{
		$cari = "
		SELECT tbuser.id_user, tbuser.id_peg, tbuser.nip, tbuser.pwd, tbuser.lvl_akses,  tbakses.nama_level
		FROM tbuser,tbakses   
		WHERE tbuser.lvl_akses=tbakses.id
		and tbuser.nip like '%$nama%'
		order by tbuser.lvl_akses";
		return $this->db->query($cari);
	}

	//================================================
	public function getKlasisifikasiId($id='')
	{
		$cari = "SELECT kd_klasifikasi, nm_klasifikasi, id, keterangan FROM tbklasifikasi WHERE id='$id'";
		return $this->db->query($cari);
	}
	public function getInstansiId($id='')
	{
		$cari = "SELECT kd_instansi, nm_instansi FROM tbinstansi WHERE kd_instansi='$id'";
		return $this->db->query($cari);
	}
	public function getJsuratId($id='')
	{
		$cari = "SELECT kd_jenis, nm_jenis, id FROM tbjenis_surat WHERE id='$id'";
		return $this->db->query($cari);
	}
	public function getBidangId($id='')
	{
		$cari = "SELECT kd_bidang, nm_bidang, id FROM tbbidang WHERE id='$id'";
		return $this->db->query($cari);
	}
	public function getKegiatanId($id='')
	{
		$cari = "SELECT kd_kegiatan, nm_kegiatan, id FROM tbkegiatan WHERE id='$id'";
		return $this->db->query($cari);
	}
	public function getPegawaiId($id='')
	{
		$cari = "SELECT nip,nama,nama_jabatan,kd_jk,idj,id_pangkat,kd_pendidikan FROM tbpegawai WHERE id='$id'";
		return $this->db->query($cari);
	}
	public function getJabatanId($id='')
	{
		$cari = "SELECT idj, nmj FROM tbjabatan WHERE idj='$id'";
		return $this->db->query($cari);
	}
	public function getPangkatId($id='')
	{
		$cari = "SELECT * FROM tbpangkat WHERE id='$id'";
		return $this->db->query($cari);
	}
	public function getUserId($id='')
	{
		$cari = "SELECT * FROM tbuser WHERE id_user='$id'";
		return $this->db->query($cari);
	}
	//=======================================
	//=====================================

	public function getAkses($id='')
	{
		$cari = "SELECT * from tbakses";
		return $this->db->query($cari);
	}

	public function cekUser($nama='',$pwd='')
	{
		$cari = "SELECT id_user,id_peg,pwd,nip FROM tbuser where nip LIKE '$nama' or pwd LIKE '$pwd'";
		$c=$this->db->query($cari);
		if ($r=$c->row_array()) {
		return 1;
		}else{
		return 0;
		}
	}

	//--------------------------------------

	public function getKdBidang($id='')
	{
		$cari = "SELECT nm_bidang FROM tbbidang WHERE kd_bidang='$id'";
		return $this->db->query($cari);
	}

	public function getKdKlasifikasi($id='')
	{
		$cari = "SELECT nm_klasifikasi FROM tbklasifikasi WHERE kd_klasifikasi='$id'";
		return $this->db->query($cari);
	}
	public function getIdKegiatan($id='')
	{
		$cari = "SELECT nm_kegiatan FROM tbkegiatan WHERE id='$id'";
		return $this->db->query($cari);
	}
	public function getKdJenisSurat($id='')
	{
		$cari = "select kd_jenis, nm_jenis from tbjenis_surat where id='$id' order by id";
		return $this->db->query($cari);
	}
	public function getNipPeg($ttd='')
	{
		$cari = "SELECT idj,nip, nama, nama_jabatan FROM tbpegawai WHERE nip='$ttd'";
		return $this->db->query($cari);
	}
	public function jabatanPeg($ttd='')
	{
		$cari = "SELECT nip, nama_jabatan from tbpegawai 
		WHERE kd_instansi='BKPSDM' and nama_jabatan<>'' and nama_jabatan<>'PTT'";
		return $this->db->query($cari);
	}
	public function jumPersonil($ttd='')
	{
		$cari = "SELECT count(id_nip) as jml FROM tbsurat_spt_dtl WHERE indeks_surat_spt='$ttd'";
		return $this->db->query($cari);
	}
	public function jumPersonilPen($ttd='')
	{
		$cari = "SELECT count(id_nip) as jml FROM tbsurat_penugasan_dtl WHERE indeks_surat_penugasan='$ttd'";
		return $this->db->query($cari);
	}
	public function getpegawaiInput($ttd='')
	{
		$cari = "SELECT tbpegawai.id, nama, tgl_selesai_sppd from tbpegawai LEFT JOIN tbsurat_spt_dtl on tbpegawai.id=tbsurat_spt_dtl.id_nip WHERE tbpegawai.kd_instansi='BKPSDM' and nama_jabatan<>'' order by  tgl_selesai_sppd desc";
		return $this->db->query($cari);
	}

	public function getpegawaiInputPenugasan($ttd='')
	{
		$cari = "SELECT id, nama from tbpegawai WHERE kd_instansi='BKPSDM' and nama_jabatan<>'' order by nama";
		return $this->db->query($cari);
	}
	///========================================
	public function getProfilUser($id='')
	{
		$cari = "
		SELECT tbpegawai.nama, tbpegawai.nip, tbuser.nip as username,tbuser.lvl_akses,tbpegawai.id,nama_jabatan,id_user,img
		FROM tbuser, tbpegawai
		WHERE tbuser.id_peg = tbpegawai.id 
		and tbuser.id_user = '$id'
		";
		return $this->db->query($cari);
	}


}