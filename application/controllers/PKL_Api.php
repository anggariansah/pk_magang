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

	function getRiwayatBimbingan()
	{
		$data = $this->model_pkl->get_riwayat_bimbingan();
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

	function tampilSingleNilai()
	{
		if($this->input->post('id'))
		{
			$data = $this->api_model->tampil_single_nilai($this->input->post('id'));
			foreach($data as $row)
			{
				$output['nim'] = $row["nim"];
				$output['nilai'] = $row["nilai"];
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
