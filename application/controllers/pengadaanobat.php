<?php
class PengadaanObat extends CI_CONTROLLER
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

    function list_pengadaanobat()
    {
        $this->load->library('pagination');
        $data['judul'] = "DATA PENGADAAN OBAT";
        $data['tabel'] = $query = $this->m_utama->ambil_data_pengadaanobat();
        $this->load->view('pengadaanobat/list_pengadaanobat',$data);
    }   

    public function tambah_pengadaanobat()
    {
        $this->session->set_userdata('row', $this->uri->segment(4));
        $data['kode_pengadaan'] = $this->m_utama->get_kode_pengadaan();
        $data['error'] = "";    
        $this->load->model('m_utama');

        $data['sp'] = $this->db->get('tbl_supplier');
        $data['o'] = $this->db->get('tbl_obat');
		$data['ambil_data_obat3']	=	$this->m_utama->ambil_data_obat3();
        $this->load->view("pengadaanobat/tambah_pengadaanobat",$data);			
    }

    public function simpan_pengadaanobat()
    {
        $data = array(

            'kode_pengadaan'		=> $this->input->post("kode_pengadaan"),
            'nama_supplier'			=> $this->input->post("nama_supplier"),
            'kode_obat'				=> $this->input->post("kode_obat"),
            'harga_obat'			=> $this->input->post("harga_obat"),
            'total_harga'	        => $this->input->post("total_harga"),
            'jumlah_beli'			=> $this->input->post("jumlah_beli"),
            'total'	                => $this->input->post("total_obat"),
            'tgl_transaksi'			=> $this->input->post("tgl_transaksi"),

        );

        $this->m_utama->simpan_pengadaanobat($data);
		$this->m_utama->simpan_perubahan_dataobat();
        redirect('pengadaanobat/list_pengadaanobat');			

    }

    function hapus_pengadaanobat($id)
    {
        $this->m_utama->hapus_pengadaanobat($id);
        redirect(base_url('pengadaanobat/list_pengadaanobat'));
    }

    function cari(){
        $kode_obat = $_GET['kode_obat'];
        $cari = $this->m_utama->cari($kode_obat)->result();
        echo json_encode($cari);
    }
}