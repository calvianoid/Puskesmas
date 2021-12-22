<?php
class Pasien2 extends CI_CONTROLLER
{   
    function __construct()
    {
        parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        $this->load->helper(array('form','url'));
        $this->load->database();
        $this->load->helper('form');
        $this->load->model('m_utama');
        
    }

    function index()
    {
        $this->load->view('index_pasien');
    }   

    function tambah_pasien2()
    {
        $this->session->set_userdata('row', $this->uri->segment(7));
        $data['id_pasien'] = $this->m_utama->get_id_pasien();
        $data['error'] = "";    
        $this->load->model('m_utama');  
        $this->load->view('pasien/tambah_pasien2', $data);
    }   

    function proses_tambah_pasien2()
    {
        $this->m_utama->simpan_pasien();
        echo "Data Berhasil Disimpan";
        redirect(base_url('pasien2/index'));
    }
}