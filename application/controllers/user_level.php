<?php
class User_Level extends CI_CONTROLLER
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

    function list_user_level()
    {
        $this->load->library('pagination');
        $data['judul'] = "DATA LEVEL USER";
        $data['tabel'] = $query = $this->m_utama->ambil_data_user_level();
        $this->load->view('user_level/list_user_level',$data);
    }   

    function tambah_user_level()
    {
        $this->load->view('user_level/tambah_user_level');
    }

    function proses_tambah_user_level()
    {
        $this->m_utama->simpan_user_level();
        redirect(base_url('user_level/list_user_level'));
    }

    function ubah_user_level($id)
    {
        $data['baris'] = $this->m_utama->ambil_data_user_level2($id);
        $this->load->view('user_level/ubah_user_level',$data);
    }

    function proses_ubah_user_level()
    {
        $this->m_utama->ubah_user_level();
        redirect(base_url('user_level/list_user_level'));
    }

    function hapus_user_level($id)
    {
        $this->m_utama->hapus_user_level($id);
        redirect(base_url('user_level/list_user_level'));
    }
}