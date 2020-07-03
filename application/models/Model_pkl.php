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

	function jumlah_dosen()
	{
		$query = $this->db->get('pkl_mhs_dosen');
		return $query;
	}

	function get_riwayat_bimbingan()
	{
		$query = $this->db->query('SELECT r.id as id, r.judul as judul, r.tanggal as tanggal, m.nama_mhs as nama, r.deskripsi as deskripsi FROM riwayat_bimbingan_pkl r JOIN mahasiswa m ON r.nim = m.nim');
		return $query;
	}

	function tampil_riwayat_bimbingan($id)
	{
		$this->db->select('r.id as id, r.pengirim as pengirim, s.nama as nama, r.deskripsi as deskripsi');
		$this->db->from('riwayat_bimbingan_pkl r');
		$this->db->join('logbook as l', 'l.id = r.id_logbook');
		$this->db->join('pkl_mhs_dosen as p', 'p.kode_pkl = l.pkl_mhs_dosen_kode_pkl');
		$this->db->join('staff as s', 's.nip = p.staff_nip');
		$this->db->where('id_logbook', $id);
		$query = $this->db->get();
		return $query;
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

	function upload_file(){
		$config['upload_path']          = './upload/product/';
		$config['overwrite']			= true;
		$config['max_size']             = 1024;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}

		return NULL;
	}


	function insert_logbook($data)
	{
		$this->db->insert('logbook', $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function get_logbook($id)
	{
		$this->db->where("pkl_mhs_dosen_kode_pkl", $id);
		$query = $this->db->get('logbook');
		return $query;
	}

	function delete_logbook($id)
	{
		$this->db->where("id", $id);
		$this->db->delete("logbook");
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
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


	function get_logbook_pembimbing($id)
	{
		$this->db->select('l.id as id, l.tgl as tgl, l.uraian as uraian, m.nama_mhs as nama');
		$this->db->from('logbook l');
		$this->db->join('pkl_mhs_dosen as p', 'p.kode_pkl = l.pkl_mhs_dosen_kode_pkl');
		$this->db->join('mahasiswa as m', 'm.nim = p.mahasiswa_nim');
		$this->db->where('l.pkl_mhs_dosen_kode_pkl', $id);
		$query = $this->db->get();
		return $query;
	}


	function tampil_riwayat_pembimbing($id)
	{
		$this->db->select('r.id as id, r.pengirim as pengirim, m.nama_mhs as nama, r.deskripsi as deskripsi');
		$this->db->from('riwayat_bimbingan_pkl r');
		$this->db->join('logbook as l', 'l.id = r.id_logbook');
		$this->db->join('pkl_mhs_dosen as p', 'p.kode_pkl = l.pkl_mhs_dosen_kode_pkl');
		$this->db->join('mahasiswa as m', 'm.nim = p.mahasiswa_nim');
		$this->db->where('id_logbook', $id);
		$query = $this->db->get();
		return $query;
	}

	function insert_riwayat_pembimbing($data)
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

	


	//Pembimbing

	function jumlah_mahasiswa_pembimbing($nip)
	{
		$this->db->where('staff_nip', $nip);
		$query = $this->db->get('pkl_mhs_dosen');
		return $query;
	}

	function jumlah_bimbingan_pembimbing($nip)
	{
		$this->db->select('*');
		$this->db->from('logbook l');
		$this->db->join('pkl_mhs_dosen p', 'p.kode_pkl = l.pkl_mhs_dosen_kode_pkl');
		$this->db->where('p.staff_nip', $nip);
		$query = $this->db->get();
		return $query;
	}


	function get_mahasiswa_pembimbing($nip)
	{
		$this->db->select('p.kode_pkl as id, m.nim as nim, m.nama_mhs as nama, CONCAT(k.namaklas," ",jns_kls_nama_jnskls) as kelas , i.nama_perusahaan as industri, p.status as status');
		$this->db->from('pkl_mhs_dosen as p');
		$this->db->join('mahasiswa as m', 'm.nim = p.mahasiswa_nim');
		$this->db->join('kelas as k', 'm.kelas_kodeklas = k.kodeklas');
		$this->db->join('industri as i', 'p.id_industri = i.industri_id');
		$this->db->where('staff_nip', $nip);
		$query = $this->db->get();
		return $query;
	}

	function get_nilai_pembimbing($nip)
	{
		$this->db->select('n.kode_pkl as id, m.nim as nim, m.nama_mhs as nama_mhs, k.namaklas as nama_kelas, n.nilai as nilai');
		$this->db->from('pkl_mhs_dosen as p');
		$this->db->join('mahasiswa as m', 'p.mahasiswa_nim = m.nim');
		$this->db->join('nilai_pkl as n', 'p.kode_pkl = n.kode_pkl');
		$this->db->join('kelas as k', 'm.kelas_kodeklas = k.kodeklas');
		$this->db->where('p.staff_nip', $nip);
		$query = $this->db->get();
		return $query;
	}

	function delete_nilai($id)
	{
		$this->db->where("kode_pkl", $id);
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

	
	function tampil_single_nilai($id)
	{
		$this->db->select('p.mahasiswa_nim as nim, n.nilai as nilai');
		$this->db->from('nilai_pkl n');
		$this->db->join('pkl_mhs_dosen as p', 'n.kode_pkl = p.kode_pkl');
		$this->db->where("n.kode_pkl", $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	function update_nilai($id, $data)
	{
		$this->db->where("kode_pkl", $id);
		$this->db->update("nilai_pkl", $data);

		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	//TUTUP PEMBIMBING







	function get_nilai()
	{
		$this->db->select('n.id as id, m.nim as nim, m.nama_mhs as nama_mhs, k.namaklas as nama_kelas, n.nilai as nilai');
		$this->db->from('mahasiswa as m');
		$this->db->join('nilai_pkl as n', 'm.nim = n.nim');
		$this->db->join('kelas as k', 'm.kelas_kodeklas = k.kodeklas');
		$query = $this->db->get();
		return $query;
	}

	function jumlah_mahasiswa()
	{
		$query = $this->db->get('pkl_mhs_dosen');
		return $query;
	}


	function jumlah_bimbingan($id)
	{
		$this->db->select('*');
		$this->db->from('logbook l');
		$this->db->join('pkl_mhs_dosen p', 'p.kode_pkl = l.pkl_mhs_dosen_kode_pkl');
		$this->db->where('p.kode_pkl', $id);
		$query = $this->db->get();
		return $query;
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

	function insert_dosen_industri($id, $data)
	{
		$this->db->insert('dsn_indstri', $data);

		
		$data = array(
			'dsn_indstri_kd_dsn'  => $this->db->insert_id()
		);

		$this->db->where("kode_pkl", $id);
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

	function update_dosen_industri($id, $data)
	{

		$this->db->where("kd_dsn", $id);
		$this->db->update("dsn_indstri", $data);
		
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
		$this->db->select('p.kode_pkl as id, m.nim as nim, m.nama_mhs as nama, CONCAT(k.namaklas," ",jns_kls_nama_jnskls) as kelas , i.nama_perusahaan as industri, p.status as status');
		$this->db->from('pkl_mhs_dosen as p');
		$this->db->join('mahasiswa as m', 'm.nim = p.mahasiswa_nim');
		$this->db->join('kelas as k', 'm.kelas_kodeklas = k.kodeklas');
		$this->db->join('industri as i', 'p.id_industri = i.industri_id');
		$query = $this->db->get();
		return $query;
	}

	function get_dosen()
	{
		$query = $this->db->get('staff');
		return $query;
	}

	

	function delete_mahasiswa($id)
	{
		$this->db->where("kode_pkl", $id);
		$this->db->delete("pkl_mhs_dosen");
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
		$this->db->select('s.id as id, m.nim as nim, m.nama_mhs as nama, CONCAT(k.namaklas," ",jns_kls_nama_jnskls) as kelas , i.nama_perusahaan as industri');
		$this->db->from('sidang_pkl_mahasiswa as s');
		$this->db->join('pkl_mhs_dosen as p', 's.nim = p.mahasiswa_nim');
		$this->db->join('mahasiswa as m', 'm.nim = p.mahasiswa_nim');
		$this->db->join('kelas as k', 'm.kelas_kodeklas = k.kodeklas');
		$this->db->join('industri as i', 'p.id_industri = i.industri_id');
		$this->db->where("s.id_jadwal", $id);
		$query = $this->db->get();
		return $query;
	}

	function get_sidang_penguji($id)
	{
		$this->db->select('p.id as id, s.nip as nip , s.nama as nama');
		$this->db->from('sidang_pkl_penguji as p');
		$this->db->join('staff as s','p.nip = s.nip');
		$this->db->where("p.id_jadwal", $id);
		$query = $this->db->get();
		return $query;
	}

	function tampil_detail_mahasiswa($id)
	{
		$this->db->select('p.kode_pkl as id, m.nim as nim, m.nama_mhs as nama, CONCAT(k.namaklas," ",jns_kls_nama_jnskls) as kelas , p.status as status , i.nama_perusahaan as industri');
		$this->db->from('pkl_mhs_dosen as p');
		$this->db->join('mahasiswa as m','m.nim = p.mahasiswa_nim');
		$this->db->join('kelas as k','m.kelas_kodeklas = k.kodeklas');
		$this->db->join('industri as i','p.id_industri = i.industri_id');
		$this->db->where("p.kode_pkl", $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	function tampil_detail_perusahaan_mahasiswa($id)
	{
		$this->db->select('i.nama_perusahaan as nama, i.alamat as alamat, i.tlpn_hotline as telp');
		$this->db->from('pkl_mhs_dosen as p');
		$this->db->join('industri as i','p.id_industri = i.industri_id');
		$this->db->where("p.kode_pkl", $id);
		$query = $this->db->get();
		return $query->result_array();
	}


	function get_detail_dosen_industri($id)
	{
		$this->db->select('i.industri_id as id_industri, d.kd_dsn as id_dosen, d.nama as nama, d.email as email, d.no_hp as nohp, i.nama_perusahaan as perusahaan');
		$this->db->from('pkl_mhs_dosen as p');
		$this->db->join('industri as i','p.id_industri = i.industri_id');
		$this->db->join('dsn_indstri as d','p.dsn_indstri_kd_dsn = d.kd_dsn');
		$this->db->where("p.kode_pkl", $id);
		$query = $this->db->get();
		return $query->result_array();
	}


	function get_profile_dosen($nip)
	{
		$this->db->where("nip", $nip);
		$query = $this->db->get("staff");
		return $query->result_array();
	}

	
	function get_detail_dosen_pembimbing($id)
	{
		$this->db->select('s.nip as nip , s.nama as nama, s.email_staff as email, s.tlp_staff as notelp');
		$this->db->from('pkl_mhs_dosen as p');
		$this->db->join('staff as s','s.nip = p.staff_nip');
		$this->db->where("p.kode_pkl", $id);
		$query = $this->db->get();
		return $query->result_array();
	}


	function tampil_nama_mahasiswa($id)
	{
		$this->db->where("nim", $id);
		$query = $this->db->get("mahasiswa");
		return $query->result_array();
	}


	function update_sidang($id, $data)
	{
		$this->db->where("id", $id);
		$this->db->update("sidang_pkl", $data);
	}

	function update_status_mahasiswa($id, $data)
	{
		$this->db->where("kode_pkl", $id);
		$this->db->update("pkl_mhs_dosen", $data);
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
		$this->db->select('p.kode_pkl as id, p.mahasiswa_nim as nim, m.nama_mhs as nama_mhs, s.nama as dosen_pembimbing, i.nama as dosen_industri');
		$this->db->from('pkl_mhs_dosen as p');
		$this->db->join('mahasiswa as m','m.nim = p.mahasiswa_nim');
		$this->db->join('dsn_indstri as i','p.dsn_indstri_kd_dsn = i.kd_dsn','left');
		$this->db->join('staff as s','p.staff_nip = s.nip');
		$query = $this->db->get();
		return $query;
	}

	function tampil_single_dosen_mhs($id)
	{
		$this->db->select('p.kode_pkl as id, p.mahasiswa_nim as nim, m.nama_mhs as nama_mhs, s.nama as dosen_pembimbing, i.nama as dosen_industri');
		$this->db->from('pkl_mhs_dosen as p');
		$this->db->join('mahasiswa as m','m.nim = p.mahasiswa_nim');
		$this->db->join('dsn_indstri as i','p.dsn_indstri_kd_dsn = i.kd_dsn','left');
		$this->db->join('staff as s',' p.staff_nip = s.nip');
		$this->db->where('p.kode_pkl', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	
}
