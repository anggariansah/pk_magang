<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PKL_Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_pkl');
		$this->load->helper('url_helper');
		$this->load->library('form_validation');
	}

	//Mahasiswa
	function getPerusahaan()
	{
		$data = $this->model_pkl->get_perusahaan();
		echo json_encode($data->result_array());
	}

	function jumlahIndustri()
	{
		$data = $this->model_pkl->jumlah_industri();
		echo json_encode($data->result_array());
	}

	function jumlahDosen()
	{
		$data = $this->model_pkl->jumlah_dosen();
		echo json_encode($data->result_array());
	}

	function insertPerusahaan()
	{
		$this->form_validation->set_rules("nama_perusahaan", "nama_perusahaan", "required");
		$this->form_validation->set_rules("alamat", "alamat", "required");
		$this->form_validation->set_rules("tlpn_hotline", "tlpn_hotline", "required");
		$array = array();
		if($this->form_validation->run())
		{
			$data = array(
				'nama_perusahaan' => trim($this->input->post('nama_perusahaan')),
				'alamat'  => trim($this->input->post('alamat')),
				'tlpn_hotline'  => trim($this->input->post('tlpn_hotline'))
			);
			$this->model_pkl->insert_perusahaan($data);
			$array = array(
				'success'  => true
			);
		}
		else
		{
			$array = array(
				'error'    => true,
				'nama_perusahaan' => form_error('nama_perusahaan'),
				'alamat' => form_error('alamat'),
				'tlpn_hotline' => form_error('tlpn_hotline')
			);
		}
		echo json_encode($array, true);
	}

	function getRiwayatBimbingan()
	{
		$data = $this->model_pkl->get_riwayat_bimbingan();

		echo json_encode($data->result_array());
	}
 

	function insertRiwayat()
	{
		$this->form_validation->set_rules("judul", "judul", "required");
		$this->form_validation->set_rules("date", "date", "required");
		$this->form_validation->set_rules("nim", "nim", "required");
		$this->form_validation->set_rules("nip", "nip", "required");
		$this->form_validation->set_rules("deskripsi", "deskripsi", "required");
		$array = array();
		if($this->form_validation->run())
		{
			$data = array(
				'judul' => trim($this->input->post('judul')),
				'date' => trim($this->input->post('date')),
				'nim' => trim($this->input->post('nim')),
				'nip' => trim($this->input->post('nip')),
				'deskripsi'  => trim($this->input->post('deskripsi'))
			);
			$this->model_pkl->insert_riwayat($data);
			$array = array(
				'success'  => true
			);
		}
		else
		{
			$array = array(
				'error'    => true,
				'judul' => form_error('judul'),
				'date' => form_error('date'),
				'nim' => form_error('nim'),
				'nip' => form_error('nip'),
				'deskripsi' => form_error('deskripsi')
			);
		}
		echo json_encode($array, true);
	}

	function tampilRiwayatBimbingan()
	{
		if($this->input->post('id'))
		{
			$data = $this->model_pkl->tampil_riwayat_bimbingan($this->input->post('id'));
			foreach($data as $row)
			{
				$output['judul'] = $row["judul"];
				$output['date'] = $row["date"];
				$output['nim'] = $row["nim"];
				$output['nip'] = $row["nip"];
				$output['deskripsi'] = $row["deskripsi"];
			}
			echo json_encode($output);
		}
	}

	function updateRiwayat()
	{
		$this->form_validation->set_rules("judul", "judul", "required");
		$this->form_validation->set_rules("date", "date", "required");
		$this->form_validation->set_rules("nim", "nim", "required");
		$this->form_validation->set_rules("nip", "nip", "required");
		$this->form_validation->set_rules("deskripsi", "deskripsi", "required");

		$array = array();
		if($this->form_validation->run())
		{
			$data = array(

				'judul' => trim($this->input->post('judul')),
				'date' => trim($this->input->post('date')),
				'nim' => trim($this->input->post('nim')),
				'nip' => trim($this->input->post('nip')),
				'deskripsi'  => trim($this->input->post('deskripsi'))
			);
		
			$this->model_pkl->update_riwayat($this->input->post('id'), $data);

			$array = array(
				'success'  => true
			);
		}
		else
		{
			$array = array(
				'error'    => true,
				'judul' => form_error('judul'),
				'date' => form_error('date'),
				'nim' => form_error('nim'),
				'nip' => form_error('nip'),
				'deskripsi' => form_error('deskripsi')

			);
		}
		echo json_encode($array, true);
	}

	function deleteRiwayat()
	{
		if($this->input->post('id'))
		{
			if($this->model_pkl->delete_riwayat($this->input->post('id')))
			{
				$array = array(
				'success' => true
				);
			}
			else
			{
				$array = array(
				'error' => true
				);
			}
			echo json_encode($array);
		}
	}



	//Pembimbing


	function jumlahMahasiswaPembimbing()
	{

		if($this->input->post('nip'))
		{
			$data = $this->model_pkl->jumlah_mahasiswa_pembimbing($this->input->post('nip'));
			echo json_encode($data->result_array());
		}
	}

	function jumlahBimbinganPembimbing()
	{
		if($this->input->post('nip'))
		{
			$data = $this->model_pkl->jumlah_bimbingan_pembimbing($this->input->post('nip'));
			echo json_encode($data->result_array());
		}
	}

	function getMahasiswaPembimbing()
	{
		if($this->input->post('nip'))
		{
			$data = $this->model_pkl->get_mahasiswa_pembimbing($this->input->post('nip'));
			echo json_encode($data->result_array());
		}
	}


	function getProfileDosen()
	{
		if($this->input->post('nip'))
		{
			$data = $this->model_pkl->get_profile_dosen($this->input->post('nip'));
			foreach($data as $row)
			{
				$output['nama'] = $row["nama"];
			}
			echo json_encode($output);
		}
	}


	function getNilaiPembimbing()
	{
		if($this->input->post('nip'))
		{
			$data = $this->model_pkl->get_nilai_pembimbing($this->input->post('nip'));
			echo json_encode($data->result_array());
		}
	}


	function deleteNilai()
	{
		if($this->input->post('id'))
		{
			if($this->model_pkl->delete_nilai($this->input->post('id')))
			{
				$array = array(
				'success' => true
				);
			}
			else
			{
				$array = array(
				'error' => true
				);
			}
			echo json_encode($array);
		}
	}

	function insertNilai()
	{
		$this->form_validation->set_rules("nim", "nim", "required");
		$this->form_validation->set_rules("nilai", "nilai", "required");
		$array = array();
		if($this->form_validation->run())
		{
			$data = array(
				'kode_pkl' => trim($this->input->post('nim')),
				'nilai'  => trim($this->input->post('nilai'))
			);
			$this->model_pkl->insert_nilai($data);
			$array = array(
				'success'  => true
			);
		}
		else
		{ 
			$array = array(
				'error'    => true,
				'kode_pkl' => form_error('nim'),
				'nilai' => form_error('nilai')
			);
		}
		echo json_encode($array, true);
	}

	function tampilSingleNilai()
	{
		if($this->input->post('id'))
		{
			$data = $this->model_pkl->tampil_single_nilai($this->input->post('id'));
			foreach($data as $row)
			{
				$output['nim'] = $row["nim"];
				$output['nilai'] = $row["nilai"];
			}
			echo json_encode($output);
		}
	}

	function updateNilai()
	{
		$this->form_validation->set_rules("nim", "nim", "required");
		$this->form_validation->set_rules("nilai", "nilai", "required");

		$array = array();
		if($this->form_validation->run())
		{
			$data = array(
				'nilai' => trim($this->input->post('nilai'))
			);
			
			$this->model_pkl->update_nilai($this->input->post('nim'), $data);
			$array = array(
				'success'  => true
			);
		}
		else
		{
			$array = array(
				'error'    => true,

				'nim' => form_error('nim'),
				'nilai' => form_error('nilai')
			);
		}
		echo json_encode($array, true);
	}


	//TUTUP PEMBIMBING





	function getNilai()
	{
		$data = $this->model_pkl->get_nilai();
		echo json_encode($data->result_array());
	}

	function jumlahMahasiswa()
	{
		$data = $this->model_pkl->jumlah_mahasiswa();
		echo json_encode($data->result_array());
	}


	function jumlahBimbingan()
	{
		if($this->input->post('id'))
		{
			$data = $this->model_pkl->jumlah_bimbingan($this->input->post('id'));
			echo json_encode($data->result_array());
		}
		
	}

	function getMahasiswa()
	{
		$data = $this->model_pkl->get_mahasiswa();
		echo json_encode($data->result_array());
	}


	function getSidang()
	{
		$data = $this->model_pkl->get_sidang();
		echo json_encode($data->result_array());

	}


	function insertPendaftaran()
	{
		$this->form_validation->set_rules("mahasiswa_nim", "mahasiswa_nim", "required");
		$this->form_validation->set_rules("id_industri", "id_industri", "required");
		$array = array();
		if($this->form_validation->run())
		{
			$data = array(
				'mahasiswa_nim' => trim($this->input->post('mahasiswa_nim')),
				'id_industri'  => trim($this->input->post('id_industri'))
			);
			$this->model_pkl->insert_pendaftaran($data);
			$array = array(
				'success'  => true
			);
		}
		else
		{ 
			$array = array(
				'error'    => true,
				'mahasiswa_nim' => form_error('mahasiswa_nim'),
				'id_industri' => form_error('id_industri')
			);
		}
		echo json_encode($array, true);
	}

	// PANITIA

	function insertSidang()
	{
		$this->form_validation->set_rules("tanggal_sidang", "Tanggal Sidang", "required");
		$this->form_validation->set_rules("waktu_sidang", "waktu_sidang", "required");
		$this->form_validation->set_rules("ruangan", "Ruangan", "required");
		$array = array();
		if($this->form_validation->run())
		{
			$data = array(
				'tanggal_sidang' => trim($this->input->post('tanggal_sidang')),
				'jam'  => trim($this->input->post('waktu_sidang')),
				'ruangan'  => trim($this->input->post('ruangan')),
			);
			$this->model_pkl->insert_sidang($data);
			$array = array(
				'success'  => true
			);
		}
		else
		{ 
			$array = array(
				'error'    => true,
				'tanggal_sidang' => form_error('tanggal_sidang'),
				'waktu_sidang' => form_error('waktu_sidang'),
				'ruangan' => form_error('ruangan'),
			);
		}
		echo json_encode($array, true);
	}


	function insertDosenPembimbing()
	{
		$this->form_validation->set_rules("mahasiswa_nim", "Tanggal Sidang", "required");
		$this->form_validation->set_rules("dosen", "waktu_sidang", "required");
		$array = array();
		if($this->form_validation->run())
		{
			$data = array(
				'staff_nip'  => trim($this->input->post('dosen'))
			);
			$this->model_pkl->insert_dosen_pembimbing($this->input->post('mahasiswa_nim'),$data);
			$array = array(
				'success'  => true
			);
		}
		else
		{ 
			$array = array(
				'error'    => true,
				'mahasiswa_nim' => form_error('mahasiswa_nim'),
				'staff_nip' => form_error('dosen'),
			);
		}
		echo json_encode($array, true);
	}


	function insertDosenIndustri()
	{
		$this->form_validation->set_rules("nama", "Nama", "required");
		$this->form_validation->set_rules("email", "Email", "required");
		$this->form_validation->set_rules("telepon", "Telepon", "required");
		$this->form_validation->set_rules("id_industri", "id_industri", "required");

		$array = array();
		if($this->form_validation->run())
		{
			$data = array(
				'nama'  => trim($this->input->post('nama')),
				'email'  => trim($this->input->post('email')),
				'no_hp'  => trim($this->input->post('telepon')),
				'industri_industri_id'  => trim($this->input->post('id_industri'))
			);
			$this->model_pkl->insert_dosen_industri($this->input->post('id'), $data);
			$array = array(
				'success'  => true
			);
		}
		else
		{ 
			$array = array(
				'error'    => true,
				'nama' => form_error('nama'),
				'email' => form_error('email')
			);
		}
		echo json_encode($array, true);
	}

	function updateDosenIndustri()
	{
		$this->form_validation->set_rules("nama", "Nama", "required");
		$this->form_validation->set_rules("email", "Email", "required");
		$this->form_validation->set_rules("telepon", "Telepon", "required");
		$this->form_validation->set_rules("id_industri", "id_industri", "required");

		$array = array();
		if($this->form_validation->run())
		{
			$data = array(
				'nama'  => trim($this->input->post('nama')),
				'email'  => trim($this->input->post('email')),
				'no_hp'  => trim($this->input->post('telepon')),
				'industri_industri_id'  => trim($this->input->post('id_industri'))
			);
			$this->model_pkl->update_dosen_industri($this->input->post('id'), $data);
			$array = array(
				'success'  => true
			);
		}
		else
		{ 
			$array = array(
				'error'    => true,
				'nama' => form_error('nama'),
				'email' => form_error('email')
			);
		}
		echo json_encode($array, true);
	}


	function insertPenguji()
	{
		$this->form_validation->set_rules("dosen", "dosen", "required");
		$this->form_validation->set_rules("id_jadwal_dosen", "id_jadwal_dosen", "required");
		$array = array();
		if($this->form_validation->run())
		{
			$data = array(
				'nip'  => trim($this->input->post('dosen')),
				'id_jadwal'  => trim($this->input->post('id_jadwal_dosen'))
			);
			$this->model_pkl->insert_penguji($data);
			$array = array(
				'success'  => true
			);
		}
		else
		{ 
			$array = array(
				'error'    => true,
				'nip' => form_error('dosen'),
				'id_jadwal_dosen' => form_error('id_jadwal_dosen'),
			);
		}
		echo json_encode($array, true);
	}

	function insertMahasiswaSidang()
	{
		$this->form_validation->set_rules("mahasiswa_nim", "mahasiswa_nim", "required");
		$this->form_validation->set_rules("id_jadwal_mhs", "id_jadwal_mhs", "required");
		$array = array();
		if($this->form_validation->run())
		{
			$data = array(
				'nim'  => trim($this->input->post('mahasiswa_nim')),
				'id_jadwal'  => trim($this->input->post('id_jadwal_mhs'))
			);
			$this->model_pkl->insert_mahasiswa_sidang($data);
			$array = array(
				'success'  => true
			);
		}
		else
		{ 
			$array = array(
				'error'    => true,
				'mahasiswa_nim' => form_error('mahasiswa_nim'),
				'id_jadwal_mhs' => form_error('id_jadwal_mhs'),
			);
		}
		echo json_encode($array, true);
	}


	function updateSidang()
	{
		$this->form_validation->set_rules("tanggal_sidang", "Tanggal Sidang", "required");
		$this->form_validation->set_rules("dosen", "Dosen", "required");
		$this->form_validation->set_rules("ruangan", "Ruangan", "required");
		$this->form_validation->set_rules("mahasiswa", "Mahasiswa", "required");

		$array = array();
		if($this->form_validation->run())
		{
			$data = array(
				'tanggal_sidang' => trim($this->input->post('tanggal_sidang')),
				'dosen'  => trim($this->input->post('dosen')),
				'ruangan'  => trim($this->input->post('ruangan')),
				'mahasiswa'  => trim($this->input->post('mahasiswa'))
			);
			$this->api_model->update_sidang($this->input->post('id'), $data);

			$array = array(
				'success'  => true
			);
		}
		else

		{ 
			$array = array(
				'error'    => true,
				'tanggal_sidang' => form_error('tanggal_sidang'),
				'dosen' => form_error('dosen'),
				'ruangan' => form_error('ruangan'),
				'mahasiswa' => form_error('mahasiswa')


			);
		}
		echo json_encode($array, true);
	}


	function updatePerusahaan()
	{
		$this->form_validation->set_rules("nama_perusahaan", "Nama Perusahaan", "required");
		$this->form_validation->set_rules("alamat", "Alamat", "required");
		$this->form_validation->set_rules("tlpn_hotline", "Telpon Hotline", "required");

		$array = array();
		if($this->form_validation->run())
		{
			$data = array(
				'nama_perusahaan' => trim($this->input->post('nama_perusahaan')),
				'alamat'  => trim($this->input->post('alamat')),
				'tlpn_hotline'  => trim($this->input->post('tlpn_hotline'))
			);
			$this->model_pkl->update_perusahaan($this->input->post('industri_id'), $data);

			$array = array(
				'success'  => true
			);
		}
		else
		{ 
			$array = array(
				'error'    => true,
				'nama_perusahaan' => form_error('nama_perusahaan'),
				'alamat' => form_error('alamat'),
				'tlpn_hotline' => form_error('tlpn_hotline')
			);
		}
		echo json_encode($array, true);
	}

	function updateStatusMahasiswa()
	{
		$this->form_validation->set_rules("status", "status", "required");

		$array = array();
		if($this->form_validation->run())
		{
			$data = array(
				'status'  => trim($this->input->post('status')),
			);
			$this->model_pkl->update_status_mahasiswa($this->input->post('id_mahasiswa'), $data);

			$array = array(
				'success'  => true
			);
		}
		else
		{ 
			$array = array(
				'error'    => true,
				'status' => form_error('status'),
			);
		}
		echo json_encode($array, true);
	}



	function deleteDosenPembimbing()
	{
		$this->form_validation->set_rules("id", "id", "required");

		$array = array();
		if($this->form_validation->run())
		{

			$data = array(
				'staff_nip' => NULL,
			);
			
			$this->model_pkl->delete_dosen_pembimbing($this->input->post('id'), $data);
			$array = array(
				'success'  => true
			);
		}
		else
		{
			$array = array(
				'error'    => true
			);
		}
		echo json_encode($array, true);
	}


	function mahasiswa_dosen()
	{
		$data = $this->model_pkl->tampil_data_dosen_mhs();
		echo json_encode($data->result_array());
	}

	function getDosen()
	{
		$data = $this->model_pkl->get_dosen();
		echo json_encode($data->result_array());
	}



	
	// MENGHAPUS NILAI
	


	function deleteSidang()
	{
		if($this->input->post('id'))
		{
			if($this->model_pkl->delete_sidang($this->input->post('id')))
			{
				$array = array(
				'success' => true
				);
			}
			else
			{
				$array = array(
				'error' => true
				);
			}
			echo json_encode($array);
		}
	}

	function deleteSidangMahasiswa()
	{
		if($this->input->post('id'))
		{
			if($this->model_pkl->delete_sidang_mahasiswa($this->input->post('id')))
			{
				$array = array(
				'success' => true
				);
			}
			else
			{
				$array = array(
				'error' => true
				);
			}
			echo json_encode($array);
		}
	}

	function deleteSidangPenguji()
	{
		if($this->input->post('id'))
		{
			if($this->model_pkl->delete_sidang_penguji($this->input->post('id')))
			{
				$array = array(
				'success' => true
				);
			}
			else
			{
				$array = array(
				'error' => true
				);
			}
			echo json_encode($array);
		}
	}


	// PANITIA
	// 


	// MENGHAPUS MAHASISWA
	function deleteMahasiswa()
	{
		if($this->input->post('id'))
		{
			if($this->model_pkl->delete_mahasiswa($this->input->post('id')))
			{
				$array = array(
				'success' => true
				);
			}
			else
			{
				$array = array(
				'error' => true
				);
			}
			echo json_encode($array);
		}
	}



	function tampilSinglePerusahaan()
	{
		if($this->input->post('id'))
		{
			$data = $this->model_pkl->tampil_single_perusahaan($this->input->post('id'));
			foreach($data as $row)
			{
				$output['nama_perusahaan'] = $row["nama_perusahaan"];
				$output['alamat'] = $row["alamat"];
				$output['tlpn_hotline'] = $row["tlpn_hotline"];
			}
			echo json_encode($output);
		}
	}


	function getSingleSidang()
	{
		if($this->input->post('id'))
		{
			$data = $this->model_pkl->get_single_sidang($this->input->post('id'));
			foreach($data as $row)
			{
				$output['tanggal_sidang'] = $row["tanggal_sidang"];
				$output['jam'] = $row["jam"];
				$output['ruangan'] = $row["ruangan"];
			}
			echo json_encode($output);
		}
	}

	function tampilSingleDosenMahasiswa()
	{
		if($this->input->post('id'))
		{
			$data = $this->model_pkl->tampil_single_dosen_mhs($this->input->post('id'));
			foreach($data as $row)
			{
				$output['nim'] = $row["nim"];
				$output['nama'] = $row["nama_mhs"];
				$output['dosen'] = $row["dosen_pembimbing"];
			}
			echo json_encode($output);
		}
	}



	function getSidangMahasiswa()
	{
		if($this->input->post('id'))
		{
			$data = $this->model_pkl->get_sidang_mahasiswa($this->input->post('id'));
			echo json_encode($data->result_array());
		}
	}

	function getSidangPenguji()
	{
		if($this->input->post('id'))
		{
			$data = $this->model_pkl->get_sidang_penguji($this->input->post('id'));
			echo json_encode($data->result_array());
		}
	}



	function deletePerusahaan()
	{
		if($this->input->post('id'))
		{
			if($this->model_pkl->delete_perusahaan($this->input->post('id')))
			{
				$array = array(
				'success' => true
				);
			}
			else
			{
				$array = array(
				'error' => true
				);
			}
			echo json_encode($array);
		}
	}


	function tampilDetailMahasiswa()
	{
		if($this->input->post('id'))
		{
			$data = $this->model_pkl->tampil_detail_mahasiswa($this->input->post('id'));

			if(count($data) > 0){
				foreach($data as $row)
				{
					$output['error'] = "false";

					$output['nim'] = $row["nim"];
					$output['nama'] = $row["nama"];
					$output['kelas'] = $row["kelas"];
					$output['status'] = $row["status"];
				}
			}else {
					$output['error'] = "true";
			}
			
			echo json_encode($output);
		}
	}

	function getDetailPerusahaanMahasiswa()
	{
		if($this->input->post('id'))
		{
			$data = $this->model_pkl->tampil_detail_perusahaan_mahasiswa($this->input->post('id'));

			if(count($data) > 0){
				foreach($data as $row)
				{
					$output['error'] = "false";

					$output['nama'] = $row["nama"];
					$output['alamat'] = $row["alamat"];
					$output['telp'] = $row["telp"];
				}
			}else {
					$output['error'] = "true";
			}
			
			echo json_encode($output);
		}
	}


	function getDetailDosenIndustri()
	{
		if($this->input->post('id'))
		{
			$data = $this->model_pkl->get_detail_dosen_industri($this->input->post('id'));

			if(count($data) > 0){
				foreach($data as $row)
				{
					$output['error'] = "false";

					$output['id'] = $row["id_industri"];
					$output['iddosen'] = $row["id_dosen"];
					$output['nama'] = $row["nama"];
					$output['email'] = $row["email"];
					$output['nohp'] = $row["nohp"];
					$output['perusahaan'] = $row["perusahaan"];
				}
			}else {
					$output['error'] = "true";

					$output['id'] = "-";
					$output['iddosen'] = "-";
					$output['nama'] = "-";
					$output['email'] = "-";
					$output['nohp'] = "-";
					$output['perusahaan'] = "-";
			}
			
			echo json_encode($output);
		}
	}

	function getDetailDosenPembimbing()
	{
		if($this->input->post('id'))
		{
			$data = $this->model_pkl->get_detail_dosen_pembimbing($this->input->post('id'));

			if(count($data) > 0){
				foreach($data as $row)
				{
					$output['error'] = "false";

					$output['nip'] = $row["nip"];
					$output['nama'] = $row["nama"];
					$output['email'] = $row["email"];
					$output['notelp'] = $row["notelp"];
				}
			}else {
					$output['error'] = "true";
					
					$output['nip'] = "-";
					$output['nama'] = "-";
					$output['email'] = "-";
					$output['notelp'] = "-";
			}
			
			echo json_encode($output);
		}
	}

	function tampilNamaMahasiswa()
	{
		if($this->input->post('nim'))
		{
			$data = $this->model_pkl->tampil_nama_mahasiswa($this->input->post('nim'));

			if(count($data) > 0){
				foreach($data as $row)
				{
					$output['error'] = "false";

					$output['nama'] = $row["nama_mhs"];
					$output['telp'] = $row["tlp_mhs"];
					$output['email'] = $row["email_mhs"];
				}
			}else {
					$output['error'] = "true";
			}
			
			echo json_encode($output);
		}
	}
	
}
	

