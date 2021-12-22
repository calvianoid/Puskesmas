<?php
class User extends CI_CONTROLLER
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

    function list_user()
    {
        $this->load->library('pagination');
        $data['judul'] = "DATA USER";
        $data['tabel'] = $query = $this->m_utama->ambil_data_user();
        $this->load->view('user/list_user',$data);
    }   

    function tambah_user()
    {
        $this->load->view('user/tambah_user');
    }

    function proses_tambah_user()
    {
        $this->m_utama->simpan_user();
        redirect(base_url('user/list_user'));
    }

    function ubah_user($id)
    {
        $data['baris'] = $this->m_utama->ambil_data_user2($id);
        $this->load->view('user/ubah_user',$data);
    }

    function proses_ubah_user()
    {
        $this->m_utama->ubah_user();
        redirect(base_url('user/list_user'));
    }

    function hapus_user($id)
    {
        $this->m_utama->hapus_user($id);
        redirect(base_url('user/list_user'));
    }
}