<?php
class Model_pkl extends CI_Model
{

	
	public function __construct()
	{
		$this->load->database();		
	}
	


	//Mahasiswa
	function get_perusahaan()
	{
		$query = $this->db->get('industri');
		return $query;
	}

	function jumlah_industri()
	{
		$query = $this->db->get('industri');
		return $query;
	}

	//Pembimbing
	function get_nilai()
	{
		$query = $this->db->query('SELECT n.id as id, m.nim as nim, m.nama_mhs as nama_mhs, k.namaklas as nama_kelas, n.nilai as nilai FROM mahasiswa m JOIN nilai_pkl n ON m.nim = n.nim JOIN kelas k ON m.kelas_kodeklas = k.kodeklas');
		return $query;
	}

	function jumlah_mahasiswa()
	{
		$query = $this->db->get('mahasiswa');
		return $query;
	}

	function jumlah_bimbingan()
	{
		$query = $this->db->get('riwayat_bimbingan_pkl');
		return $query;
	}

	function insert_nilai($data)
	{
		$this->db->insert('nilai_pkl', $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function insert_perusahaan($data)
	{
		$this->db->insert('industri', $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	//Panitia
	function get_sidang()
	{
		$query = $this->db->get('sidang_pkl');
		return $query;
	}



	// function insert_sidang($data)
	// {
	// 	$this->db->insert('sidang_pkl', $data);
	// 	if($this->db->affected_rows() > 0)
	// 	{
	// 		return true;
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}
	// }

	
	


	function get_mahasiswa()
	{
		$query = $this->db->get('mahasiswa');
		return $query;
	}

	

	function get_riwayat_bimbingan()
	{
		$query = $this->db->query('SELECT r.id as id, r.judul as judul, r.tanggal as tanggal, m.nama_mhs as nama, r.deskripsi as deskripsi FROM riwayat_bimbingan_pkl r JOIN mahasiswa m ON r.nim = m.nim');
		return $query;
	}

	function delete_nilai($id)
	{
		$this->db->where("id", $id);
		$this->db->delete("nilai_pkl");
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function delete_sidang($id)
	{
		$this->db->where("id", $id);
		$this->db->delete("sidang_pkl");
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function tampil_single_nilai($id)
	{
		$this->db->where("id", $id);
		$query = $this->db->get('nilai_pkl');
		return $query->result_array();
	}

	function tampil_data_dosen_mhs($id)
	{
		$query = $this->db->query('SELECT r.id as id, r.nama as nama FROM dsn_indstri r JOIN pkl_mhs_dosen m ON m.staff_nip = m.nip, m.mahasiswa_nim');
	}


	// function fetch_single_user($user_id)
	// {
	// 	$this->db->where("id", $user_id);
	// 	$query = $this->db->get('tbl_sample');
	// 	return $query->result_array();
	// }

	// function update_api($user_id, $data)
	// {
	// 	$this->db->where("id", $user_id);
	// 	$this->db->update("tbl_sample", $data);
	// }
	
	// function delete_single_user($user_id)
	// {
	// 	$this->db->where("id", $user_id);
	// 	$this->db->delete("tbl_sample");
	// 	if($this->db->affected_rows() > 0)
	// 	{
	// 		return true;
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}
	// }
}
