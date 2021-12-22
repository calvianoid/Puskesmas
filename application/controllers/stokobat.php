<?php
class StokObat extends CI_CONTROLLER
{   
    public $table_stokobat = 'tbl_stok_obat';
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

    function list_stok_obat()
    {
        $this->load->library('pagination');
        $data['judul'] = "DATA STOK OBAT";
        $data['tabel'] = $query = $this->m_utama->ambil_data_obat();
        $this->load->view('stokobat/list_stok_obat',$data);
    }   
}