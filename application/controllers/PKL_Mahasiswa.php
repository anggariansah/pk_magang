<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PKL_Mahasiswa extends CI_Controller {

    public function index()
    {
		$data['title'] = "Dashboard";
		$this->load->view('pkl/mahasiswa/template/header');
		$this->load->view('pkl/mahasiswa/template/sidebar', $data);
        $this->load->view('pkl/mahasiswa/pages/dashboard');
        $this->load->view('pkl/mahasiswa/template/footer');
	}

	public function dashboard(){
		$data['title'] = "Dashboard";
		$this->load->view('pkl/mahasiswa/template/header');
		$this->load->view('pkl/mahasiswa/template/sidebar',$data);
        $this->load->view('pkl/mahasiswa/pages/dashboard');
        $this->load->view('pkl/mahasiswa/template/footer');
	}

	
	public function daftar(){
		$data['title'] = "Daftar PKL";
		$this->load->view('pkl/mahasiswa/template/header');
		$this->load->view('pkl/mahasiswa/template/sidebar',$data);
        $this->load->view('pkl/mahasiswa/pages/daftar');
        $this->load->view('pkl/mahasiswa/template/footer');
	}

	public function list_perusahaan(){
		$data['title'] = "List Perusahaan";
		$this->load->view('pkl/mahasiswa/template/header');
		$this->load->view('pkl/mahasiswa/template/sidebar', $data);
        $this->load->view('pkl/mahasiswa/pages/list_perusahaan');
        $this->load->view('pkl/mahasiswa/template/footer');
	}

	public function riwayat_bimbingan(){
		$data['title'] = "Riwayat Bimbingan";
		$this->load->view('pkl/mahasiswa/template/header');
		$this->load->view('pkl/mahasiswa/template/sidebar', $data);
        $this->load->view('pkl/mahasiswa/pages/riwayat_bimbingan');
		$this->load->view('pkl/mahasiswa/template/footer');
	}

	public function jadwalsidang(){
		$data['title'] = "Jadwal Sidang";
		$this->load->view('pkl/mahasiswa/template/header');
		$this->load->view('pkl/mahasiswa/template/sidebar',$data);
        $this->load->view('pkl/mahasiswa/pages/jadwalsidang');
        $this->load->view('pkl/mahasiswa/template/footer');
	}

	public function dosen_industri(){
		$data['title'] = "Dosen Industri";
		$this->load->view('pkl/mahasiswa/template/header');
		$this->load->view('pkl/mahasiswa/template/sidebar',$data);
        $this->load->view('pkl/mahasiswa/pages/dosen_industri');
        $this->load->view('pkl/mahasiswa/template/footer');
	}

}

/* End of file Controllername.php */


?>
