<?php
class Pembayaran extends CI_CONTROLLER
{   
    public $table_pembayaran = 'tbl_detail_pembayaran';
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

    function list_pembayaran()
    {
        $this->load->library('pagination');
        $data['judul'] = "DATA PEMBAYARAN OBAT";
        $data['tabel'] = $query = $this->m_utama->ambil_data_pembayaran();
        $this->load->view('pembayaran/list_pembayaran',$data);
    }   

    function tambah_pembayaran()
    {
        $this->session->set_userdata('row', $this->uri->segment(8));
        $data['kode_transaksi'] = $this->m_utama->get_kode_pembayaran();
        $data['error'] = "";    

        $data['obat'] = $this->db->get('tbl_obat');
        $data['antrian'] = $this->db->get('tbl_pendaftaran');
        $this->load->view('pembayaran/tambah_pembayaran',$data);
    }

    function proses_tambah_pembayaran()
    {
        $kode_transaksi = $this->input->post('kode_transaksi');
        $tanggal_transaksi = $this->input->post('tanggal_transaksi');
        $kode_antrian = $this->input->post('kode_antrian');
        $nama_user = $this->input->post('nama_user');
        $total_bayar = $this->input->post('total_bayar');
        $kode_obat = $this->input->post('kode_obat');
        $nama_obat = $this->input->post('nama_obat');
        $harga_obat = $this->input->post('harga_obat');
        $jumlah_obat = $this->input->post('jumlah_obat');

        $data = array(
            'kode_transaksi'=>$kode_transaksi,
            'tanggal_transaksi'=>$tanggal_transaksi,
            'kode_antrian'=>$kode_antrian,
            'nama_user'=>$nama_user,
            'total_bayar'=>$total_bayar,
        );

        $data2 = array(
            'kode_transaksi'=>$kode_transaksi,
            'kode_obat'=>$kode_obat,
            'nama_obat'=>$nama_obat,
            'harga_obat'=>$harga_obat,
            'jumlah_obat'=>$jumlah_obat,
            'total_harga'=>$total_bayar,
        );

        $pembayaran = $this->m_utama->create('tbl_pembayaran',$data);
        $detail_pembayaran = $this->m_utama->create('tbl_detail_pembayaran',$data2);
        $this->m_utama->simpan_perubahan_dataobat();
        redirect(base_url('pembayaran/list_pembayaran'));
    }

    function ubah_pembayaran($id)
    {
        $data['baris'] = $this->m_utama->ambil_data_pembayaran2($id);
        $this->load->view('pembayaran/ubah_pembayaran',$data);
    }

    function proses_ubah_pembayaran()
    {
        $this->m_utama->ubah_pembayaran();
        echo "Data Berhasil Diubah";
        redirect(base_url('pembayaran/list_pembayaran'));
    }

    function cari(){
        $kode_obat = $_GET['kode_obat'];
        $cari = $this->m_utama->cari($kode_obat)->result();
        echo json_encode($cari);
    }

    function cari2(){
        $kode_antrian = $_GET['kode_antrian'];
        $cari = $this->m_utama->cari1($kode_antrian)->result();
        echo json_encode($cari);
    }
    function hapus_pembayaran($id)
    {
        $this->m_utama->hapus_pembayaran($id);
        $this->m_utama->hapus_detail_pembayaran($id);
        echo "Data Berhasil Dihapus";
        redirect(base_url('pembayaran/list_pembayaran'));
    }

    function pdf($kode_transaksi){

        $this->load->library('cfpdf');
        $pdf = new FPDF('P','mm',array(105,148));
        $pdf->AddPage();
        
        $pdf->SetFont('Arial','B',20);
        $pdf->Image('assets/images/icon/logo_puskesmas_antrian.png',8.5,10);
        $pdf->Cell(10,30,'',0,1,'C');

        $this->load->model('m_utama');
		$pembayaran 	= $this->m_utama->ambil_kode_transaksi($kode_transaksi);
        $pdf->SetFont('Arial','',10);
        foreach ($pembayaran as $row){
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(88,6.5,'KODE TRANSAKSI',0,1,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(88,6,$row->kode_antrian,0,1,'C');
            $pdf->Cell(10,3,'',0,1);
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(88,6,'TANGGAL TRANSAKSI',0,1,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(88,6,$row->tanggal_transaksi,0,1,'C');
            $pdf->Cell(10,3,'',0,1);
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(88,6,'KODE ANTRIAN',0,1,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(88,6,$row->kode_antrian,0,1,'C');
        }
        $pdf->Cell(10,3,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(23,6,'NAMA OBAT',1,0);
        $pdf->Cell(20,6,'HARGA',1,0);
        $pdf->Cell(19,6,'JUMLAH',1,0);
        $pdf->Cell(20,6,'SUBTOTAL',1,1);
        $pdf->SetFont('Arial','',10);
        $detail_pembayaran 	= $this->m_utama->ambil_kode_transaksi2($kode_transaksi);
        foreach($detail_pembayaran as $hasil){
            $pdf->Cell(23,6,$hasil->nama_obat,1,0);
            $pdf->Cell(20,6,$hasil->harga_obat,1,0);
            $pdf->Cell(19,6,$hasil->jumlah_obat,1,0);
            $pdf->Cell(20,6,$hasil->total_harga,1,1);
        }
        $pdf->Cell(10,3,'',0,1);
        foreach ($pembayaran as $row){
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(140,6.5,'TOTAL BAYAR',0,1,'C');
            $pdf->SetFont('Arial','B',15);
            $pdf->Cell(140,6,$row->total_bayar,0,1,'C');
        }
        $pdf->Output();
    }

    
}