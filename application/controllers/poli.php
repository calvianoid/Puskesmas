<?php
class Poli extends CI_CONTROLLER
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

    function list_poli()
    {
        $this->load->library('pagination');
        $data['judul'] = "DATA POLI";
        $data['tabel'] = $query = $this->m_utama->ambil_data_poli();
        $this->load->view('poli/list_poli',$data);
    }   

    function tambah_poli()
    {
        
        $this->load->view('poli/tambah_poli');
    }

    function proses_tambah_poli()
    {
        $this->m_utama->simpan_poli();
        redirect(base_url('poli/list_poli'));
    }

    function ubah_poli($id)
    {
        $data['baris'] = $this->m_utama->ambil_data_poli2($id);
        $this->load->view('poli/ubah_poli',$data);
    }

    function proses_ubah_poli()
    {
        $this->m_utama->ubah_poli();
        redirect(base_url('poli/list_poli'));
    }

    function hapus_poli($id)
    {
        $this->m_utama->hapus_poli($id);
        redirect(base_url('poli/list_poli'));
    }
}