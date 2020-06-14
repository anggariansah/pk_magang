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
		$data = $this->model_pkl->jumlah_bimbingan();
		echo json_encode($data->result_array());
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

	function insertNilai()
	{
		$this->form_validation->set_rules("nim", "nim", "required");
		$this->form_validation->set_rules("nilai", "nilai", "required");
		$array = array();
		if($this->form_validation->run())
		{
			$data = array(
				'nim' => trim($this->input->post('nim')),
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
				'nim' => form_error('nim'),
				'nilai' => form_error('nilai')
			);
		}
		echo json_encode($array, true);
	}


	function insertSidang()
	{
		$this->form_validation->set_rules("tanggal_sidang", "Tanggal Sidang", "required");
		$this->form_validation->set_rules("dosen", "Dosen", "required");
		$this->form_validation->set_rules("ruangan", "Ruangan", "required");
		$this->form_validation->set_rules("mahasiswa", "Mahasiswa", "required");
		$array = array();
		if($this->form_validation->run())
		{
			$data = array(
				'nim' => trim($this->input->post('nim')),
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
				'nim' => form_error('nim'),
				'nilai' => form_error('nilai')
			);
		}
		echo json_encode($array, true);
	}


		

	function updateNilai()
	{
		$this->form_validation->set_rules("nim", "nim", "required");
		$this->form_validation->set_rules("nilai", "nilai", "required");

		$array = array();
		if($this->form_validation->run())
		{
			
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


	function mahasiswa_dosen()
	{
		$data = $this->model_pkl->tampil_data_dosen_mhs();
		echo json_encode($data->result_array());
	}



	
	// MENGHAPUS NILAI
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

	// PANITIA
	function insertMahasiswa()
	{
		$this->form_validation->set_rules("nama_mhs", "nim", "required");
		$this->form_validation->set_rules("nilai", "nilai", "required");
		$array = array();
		if($this->form_validation->run())
		{
			$data = array(
				'nim' => trim($this->input->post('nim')),
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
				'nim' => form_error('nim'),
				'nilai' => form_error('nilai')
			);
		}
		echo json_encode($array, true);
	}


	// MENGHAPUS MAHASISWA
	function deleteMahasiswa()
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
		if($this->input->post('nim'))
		{
			$data = $this->model_pkl->tampil_detail_mahasiswa($this->input->post('nim'));
			foreach($data as $row)
			{
				$output['nama'] = $row["nama"];
			}
			echo json_encode($output);
		}
	}


	// function fetch_single()
	// {
	// 	if($this->input->post('id'))
	// 	{
	// 		$data = $this->api_model->fetch_single_user($this->input->post('id'));
	// 		foreach($data as $row)
	// 		{
	// 			$output['first_name'] = $row["first_name"];
	// 			$output['last_name'] = $row["last_name"];
	// 		}
	// 		echo json_encode($output);
	// 	}
	// }

	// function update()
	// {
	// 	$this->form_validation->set_rules("first_name", "First Name", "required");
	// 	$this->form_validation->set_rules("last_name", "Last Name", "required");
	// 	$array = array();
	// 	if($this->form_validation->run())
	// 	{
	// 		$data = array(
	// 			'first_name' => trim($this->input->post('first_name')),
	// 			'last_name'  => trim($this->input->post('last_name'))
	// 		);
	// 		$this->api_model->update_api($this->input->post('id'), $data);
	// 		$array = array(
	// 			'success'  => true
	// 		);
	// 	}else{
	// 		$array = array(
	// 			'error'    => true,
	// 			'first_name_error' => form_error('first_name'),
	// 			'last_name_error' => form_error('last_name')
	// 		);
	// 	}
	// 	echo json_encode($array, true);
	// }

	
	
}
