<?php
class Supplier extends CI_CONTROLLER
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

    function list_supplier()
    {
        $this->load->library('pagination');
        $data['judul'] = "DATA SUPPLIER";
        $data['tabel'] = $query = $this->m_utama->ambil_data_supplier();
        $this->load->view('supplier/list_supplier',$data);
    }   

    function tambah_supplier()
    {
        $this->load->view('supplier/tambah_supplier');
    }

    function proses_tambah_supplier()
    {
        $this->m_utama->simpan_supplier();
        redirect(base_url('supplier/list_supplier'));
    }

    function ubah_supplier($id)
    {
        $data['baris'] = $this->m_utama->ambil_data_supplier2($id);
        $this->load->view('supplier/ubah_supplier',$data);
    }

    function proses_ubah_supplier()
    {
        $this->m_utama->ubah_supplier();
        redirect(base_url('supplier/list_supplier'));
    }

    function hapus_supplier($id)
    {
        $this->m_utama->hapus_supplier($id);
        redirect(base_url('supplier/list_supplier'));
    }
}