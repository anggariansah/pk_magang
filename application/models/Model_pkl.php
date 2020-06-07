<?php
class Model_pkl extends CI_Model
{

	
	public function __construct()
	{
		$this->load->database();		
	}
	

	//Pembimbing
	function get_nilai()
	{
		$query = $this->db->get('mahasiswa');
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
