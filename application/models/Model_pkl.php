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

	function get_riwayat_bimbingan()
	{
		$query = $this->db->query('SELECT r.id as id, r.judul as judul, r.tanggal as tanggal, m.nama_mhs as nama, r.deskripsi as deskripsi FROM riwayat_bimbingan_pkl r JOIN mahasiswa m ON r.nim = m.nim');
		return $query;
	}

	function tampil_riwayat_bimbingan($id)
	{
		$this->db->where("id", $id);
		$query = $this->db->get('riwayat_bimbingan_pkl');
		return $query->result_array();
	}

	function insert_riwayat($data)
	{
		$this->db->insert('riwayat_bimbingan_pkl', $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function update_nilai($id, $data)
	{
		$this->db->where("id", $id);
		$this->db->update("nilai_pkl", $data);
	}

	

	function delete_riwayat($id)
	{
		$this->db->where("id", $id);
		$this->db->delete("riwayat_bimbingan_pkl");
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
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

	function insert_pendaftaran($data)
	{
		$this->db->insert('pkl_mhs_dosen', $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function insert_sidang($data)
	{
		$this->db->insert('sidang_pkl', $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function insert_mahasiswa($data)
	{
		$this->db->insert('mahasiswa', $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function insert_penguji($data)
	{
		$this->db->insert('sidang_pkl_penguji', $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function insert_mahasiswa_sidang($data)
	{
		$this->db->insert('sidang_pkl_mahasiswa', $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function insert_dosen_pembimbing($id, $data)
	{
		$this->db->where("mahasiswa_nim", $id);
		$this->db->update("pkl_mhs_dosen", $data);
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


	function get_mahasiswa()
	{
		$query = $this->db->query('SELECT m.nim as nim, m.nama_mhs as nama, CONCAT(k.namaklas," ",jns_kls_nama_jnskls) as kelas , i.nama_perusahaan as industri FROM pkl_mhs_dosen p JOIN mahasiswa m ON m.nim = p.mahasiswa_nim JOIN kelas k ON m.kelas_kodeklas = k.kodeklas JOIN industri i ON p.id_industri = i.industri_id');
		return $query;
	}

	function get_dosen()
	{
		$query = $this->db->get('staff');
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

	function delete_mahasiswa($id)
	{
		$this->db->where("id", $id);
		$this->db->delete("mahasiswa");
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


	function delete_sidang_mahasiswa($id)
	{
		$this->db->where("id", $id);
		$this->db->delete("sidang_pkl_mahasiswa");
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function delete_sidang_penguji($id)
	{
		$this->db->where("id", $id);
		$this->db->delete("sidang_pkl_penguji");
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function delete_perusahaan($id)
	{
		$this->db->where("industri_id", $id);
		$this->db->delete("industri");
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

	function tampil_single_perusahaan($id)
	{
		$this->db->where("industri_id", $id);
		$query = $this->db->get('industri');
		return $query->result_array();
	}

	function get_single_sidang($id)
	{
		$this->db->where("id", $id);
		$query = $this->db->get('sidang_pkl');
		return $query->result_array();
	}

	function get_sidang_mahasiswa($id)
	{
		$this->db->where("id_jadwal", $id);
		$query = $this->db->query('SELECT s.id as id, m.nim as nim, m.nama_mhs as nama, CONCAT(k.namaklas," ",jns_kls_nama_jnskls) as kelas , i.nama_perusahaan as industri FROM sidang_pkl_mahasiswa s JOIN pkl_mhs_dosen p ON s.nim = p.mahasiswa_nim JOIN mahasiswa m ON m.nim = p.mahasiswa_nim JOIN kelas k ON m.kelas_kodeklas = k.kodeklas JOIN industri i ON p.id_industri = i.industri_id where s.id_jadwal');
		return $query;
	}

	function get_sidang_penguji($id)
	{
		$this->db->where("id_jadwal", $id);
		$query = $this->db->query('SELECT p.id as id, s.nip as nip , s.nama as nama FROM sidang_pkl_penguji p JOIN staff s ON p.nip = s.nip');
		return $query;
	}

	function tampil_detail_mahasiswa($nim)
	{
		$this->db->where("nim", $nim);
		$query = $this->db->get('mahasiswa');
		return $query->result_array();
	}


	function update_sidang($id, $data)
	{
		$this->db->where("id", $id);
		$this->db->update("sidang_pkl", $data);
	}

	function update_perusahaan($id, $data)
	{
		$this->db->where("industri_id", $id);
		$this->db->update("industri", $data);
	}

	function delete_dosen_pembimbing($id, $data)
	{
		$this->db->where("kode_pkl", $id);
		$this->db->update("pkl_mhs_dosen", $data);
	}

	function tampil_data_dosen_mhs()
	{
		$query = $this->db->query('SELECT p.kode_pkl as id, p.mahasiswa_nim as nim, m.nama_mhs as nama_mhs, s.nama as dosen_pembimbing, i.nama as dosen_industri FROM pkl_mhs_dosen p JOIN mahasiswa m ON m.nim = p.mahasiswa_nim LEFT JOIN dsn_indstri i ON p.dsn_indstri_kd_dsn = i.kd_dsn JOIN staff s ON p.staff_nip = s.nip');
		return $query;
	}

	function tampil_single_dosen_mhs($id)
	{
		$this->db->where("kode_pkl", $id);
		$query = $this->db->query('SELECT p.kode_pkl as id, p.mahasiswa_nim as nim, m.nama_mhs as nama_mhs, s.nama as dosen_pembimbing, i.nama as dosen_industri FROM pkl_mhs_dosen p JOIN mahasiswa m ON m.nim = p.mahasiswa_nim LEFT JOIN dsn_indstri i ON p.dsn_indstri_kd_dsn = i.kd_dsn JOIN staff s ON p.staff_nip = s.nip');
		return $query->result_array();
	}

	
	
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
