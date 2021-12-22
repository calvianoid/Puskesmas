<?php
class Pendaftaran extends CI_CONTROLLER
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

    function list_pendaftaran()
    {
        $this->load->library('pagination');
        $data['judul'] = "DATA PENDAFTARAN";
        $data['tabel'] = $query = $this->m_utama->ambil_data_pendaftaran();
        $this->load->view('pendaftaran/list_pendaftaran',$data);
    }   

    function tambah_pendaftaran()
    {
        $data['data_pasien'] = $this->db->get('tbl_pasien');
        $data['d'] = $this->db->get('tbl_dokter');
        $data['p'] = $this->db->get('tbl_poli');
        $data['o'] = $this->db->get('tbl_pasien');
        $this->load->view('pendaftaran/tambah_pendaftaran', $data);
    }

    function proses_tambah_pendaftaran()
    {
        $this->m_utama->simpan_pendaftaran();
        redirect(base_url('pendaftaran/list_pendaftaran'));
    }

    function ubah_pendaftaran($id)
    {
        $data['d'] = $this->db->get('tbl_dokter');
        $data['p'] = $this->db->get('tbl_poli');
        $data['baris'] = $this->m_utama->ambil_data_pendaftaran2($id);
        $this->load->view('pendaftaran/ubah_pendaftaran',$data);
    }

    function proses_ubah_pendaftaran()
    {
        $this->m_utama->ubah_pendaftaran();
        redirect(base_url('pendaftaran/list_pendaftaran'));
    }

    function hapus_pendaftaran($id)
    {
        $this->m_utama->hapus_pendaftaran($id);
        redirect(base_url('pendaftaran/list_pendaftaran'));
    }

    function get_subdokter(){
        //$id = $this->input->post('id');
        $data = $this->m_utama->get_subdokter($id);
        $this->load->view('pendaftaran/tambah_pendaftaran',$data);
    }

    function pdf($kode_antrian){

        $this->load->library('cfpdf');
        $pdf = new FPDF('P','mm',array(105,148));
        $pdf->AddPage();
        
        $pdf->SetFont('Arial','B',20);
        $pdf->Image('assets/images/icon/logo_puskesmas_antrian.png',8.5,10);
        $pdf->Cell(10,30,'',0,1,'C');

        $this->load->model('m_utama');
		$pendaftaran 	= $this->m_utama->ambil_nomor_antrian($kode_antrian);
        $pdf->SetFont('Arial','',10);
        foreach ($pendaftaran as $row){
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(88,6.5,'KODE ANTRIAN',0,1,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(88,6,$row->kode_antrian,0,1,'C');
            $pdf->Cell(10,6,'',0,1);
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(88,6,'TANGGAL PENDAFTARAN',0,1,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(88,6,$row->tanggal_pendaftaran,0,1,'C');
            $pdf->Cell(10,6,'',0,1);
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(88,6,'NAMA PASIEN',0,1,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(88,6,$row->nama_pasien,0,1,'C');
            $pdf->Cell(10,6,'',0,1);
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(88,6,'POLI TUJUAN',0,1,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(88,6,$row->nama_poli,0,1,'C');
            $pdf->Cell(10,6,'',0,1);
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(88,6,'NAMA DOKTER',0,1,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(88,6,$row->nama_dokter,0,1,'C');
        }
        $pdf->Output();
    }
    
    function cari(){
        $id_pasien = $_GET['kode_antrian'];
        $cari = $this->m_utama->cari2($id_pasien)->result();
        echo json_encode($cari);
    }

    function pdf2(){

        $this->load->library('cfpdf');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->Image('assets/images/icon/kop_a4.png',0,0);
		$pdf->SetFont('Arial','B',10);

		$pdf->Cell(10,37,'',0,1);
		$pdf->SetFont('Times','B',24);
		$pdf->Cell(190,7,'LAPORAN DATA PENDAFTARAN',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(35,6,'KODE ANTRIAN',1,0,'C');
        $pdf->Cell(47,6,'TANGGAL PENDAFTARAN',1,0,'C');
        $pdf->Cell(35,6,'NAMA PASIEN',1,0,'C');
        $pdf->Cell(33,6,'POLI TUJUAN',1,0,'C');
        $pdf->Cell(38,6,'NAMA DOKTER',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $laporan_pendaftaran = $this->m_utama->ambil_data_pendaftaran();
        foreach ($laporan_pendaftaran as $row){
            $pdf->Cell(35,6,$row->kode_antrian,1,0,'C');
            $pdf->Cell(47,6,$row->tanggal_pendaftaran,1,0,'C');
            $pdf->Cell(35,6,$row->nama_pasien,1,0,'C');
            $pdf->Cell(33,6,$row->nama_poli,1,0,'C');
            $pdf->Cell(38,6,$row->nama_dokter,1,0,'C');
        }
        $pdf->Output();
    }

    public function export_excel()
    {
        $data = array( 'title' => 'Laporan_Data_Pendaftaran',
        'pendaftaran' => $this->m_utama->listing_pendaftaran());
        $this->load->view('pendaftaran/excel_pendaftaran',$data);
    }
}