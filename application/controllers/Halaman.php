<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller {

    public function index()
    {
        
    }

    public function view($halaman = 'dashboard')
    {


        $data['judul'] = 'Daftar PKL';

        $this->load->view('template', $data);
        $this->load->view('daftar_pkl');
        $this->load->view('template_footer');

        
    }

}

/* End of file Controllername.php */


?>