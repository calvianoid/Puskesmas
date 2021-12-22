<?php
class Jadwal_Praktek extends CI_CONTROLLER
{   
    public $table_jadwal = 'tbl_jadwal_praktek_dokter';
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

    function list_jadwal_praktek()
    {
        $this->load->library('pagination');
        $data['judul'] = "DATA JADWAL PRAKTEK DOKTER";
        $data['tabel'] = $query = $this->m_utama->ambil_data_jadwal_praktek();
        $this->load->view('jadwal_praktek/list_jadwal_praktek',$data);
    }   

    function tambah_jadwal_praktek()
    {
        $this->load->view('jadwal_praktek/tambah_jadwal_praktek');
    }

    function proses_tambah_jadwal_praktek()
    {
        $this->m_utama->simpan_jadwal_praktek();
        redirect(base_url('jadwal_praktek/list_jadwal_praktek'));
    }

    function ubah_jadwal_praktek($id)
    {
        $data['baris'] = $this->m_utama->ambil_data_jadwal_praktek2($id);
        $this->load->view('jadwal_praktek/ubah_jadwal_praktek',$data);
    }

    function proses_ubah_jadwal_praktek()
    {
        $this->m_utama->ubah_jadwal_praktek();
        redirect(base_url('jadwal_praktek/list_jadwal_praktek'));
    }

    function hapus_jadwal_praktek($id)
    {
        $this->m_utama->hapus_jadwal_praktek($id);
        redirect(base_url('jadwal_praktek/list_jadwal_praktek'));
    }
}