<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PKL_Dosen extends CI_Controller {

    public function index()
    {
    	$data['title'] = "Dosen";
		$this->load->view('pkl/panitia/template/header');
		$this->load->view('pkl/panitia/template/sidebar', $data);
        $this->load->view('pkl/panitia/pages/dosen');
        $this->load->view('pkl/panitia/template/footer');
    }


    public function add(){
		$namadosen1 = $this->input->post('namadosen1');
		$namadosen2 = $this->input->post('namadosen2');
		$namadosen3 = $this->input->post('namadosen3');
		$namamahasiswa = $this->input->post('namamahasiswa');
 
		$data = array(
			'namadosen' => $namadosen,
			'namamahasiswa' => $namamahasiswa
			);
		$this->m_data->input_data($data,'dosen');
		redirect('PKL_Dosen/index');
	}


	public function edit(){
		$where = array('id' => $id);
		$data['dosen'] = $this->m_data->edit_data($where,'dosen')->result();
		$this->load->view('dosen',$data);
	}


	public function hapus(){
		$where = array('id' => $id);
		$this->m_data->hapus_data($where,'dosen');
		redirect('PKL_Dosen/index');
	}

}
	

?>
