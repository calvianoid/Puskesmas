<?php
class Resep extends CI_CONTROLLER
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

    function list_resep()
    {
        $this->load->library('pagination');
        $data['judul'] = "DATA RESEP OBAT";
        $data['tabel'] = $query = $this->m_utama->ambil_data_resep();
        $this->load->view('resep/list_resep',$data);
    }   

    function tambah_resep()
    {
        $data['antrian'] = $this->db->get('tbl_pendaftaran');
        $this->load->view('resep/tambah_resep',$data);
    }

    function proses_tambah_resep()
    {
        $this->m_utama->simpan_resep();
        redirect(base_url('resep/list_resep'));
    }

    function ubah_resep($id)
    {
        $data['baris'] = $this->m_utama->ambil_data_resep2($id);
        $this->load->view('resep/ubah_resep',$data);
    }

    function proses_ubah_resep()
    {
        $this->m_utama->ubah_resep();
        redirect(base_url('resep/list_resep'));
    }

    function hapus_resep($id)
    {
        $this->m_utama->hapus_resep($id);
        redirect(base_url('resep/list_resep'));
    }

    function cari(){
        $kode_antrian = $_GET['kode_antrian'];
        $cari = $this->m_utama->cari1($kode_antrian)->result();
        echo json_encode($cari);
    }

    function pdf($kode_antrian){

        $this->load->library('cfpdf');
        $pdf = new FPDF('P','mm',array(105,148));
        $pdf->AddPage();
        
        $pdf->SetFont('Arial','B',20);
        $pdf->Image('assets/images/icon/logo_puskesmas_antrian.png',8.5,10);
        $pdf->Cell(10,30,'',0,1,'C');

        $this->load->model('m_utama');
		$resep 	= $this->m_utama->ambil_nomor_antrian2($kode_antrian);
        $pdf->SetFont('Arial','',10);
        foreach ($resep as $row){
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(88,6.5,'KODE ANTRIAN',0,1,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(88,6,$row->kode_antrian,0,1,'C');
            $pdf->Cell(10,6,'',0,1);
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(88,6,'NAMA PASIEN',0,1,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(88,6,$row->nama_pasien,0,1,'C');
            $pdf->Cell(10,6,'',0,1);
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(88,6,'RESEP',0,1,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(88,6,$row->resep,0,1,'C');

        }
        $pdf->Output();
    }
    
}