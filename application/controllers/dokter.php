<?php
class Dokter extends CI_CONTROLLER
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

    function list_dokter()
    {
        $this->load->library('pagination');
        $data['judul'] = "DATA DOKTER";
        $data['tabel'] = $query = $this->m_utama->ambil_data_dokter();
        $this->load->view('dokter/list_dokter',$data);
    }   

    function tambah_dokter()
    {
        $this->session->set_userdata('row', $this->uri->segment(2));
        $data['kode_dokter'] = $this->m_utama->get_kode_dokter();
        $data['error'] = "";

        $data['p'] = $this->db->get('tbl_poli');
        $this->load->view('dokter/tambah_dokter',$data);
    }

    function proses_tambah_dokter()
    {
        $this->m_utama->simpan_dokter();
        redirect(base_url('dokter/list_dokter'));
    }

    function ubah_dokter($id)
    {
        $data['p'] = $this->db->get('tbl_poli');
        $data['baris'] = $this->m_utama->ambil_data_dokter2($id);
        $this->load->view('dokter/ubah_dokter',$data);
    }

    function proses_ubah_dokter()
    {
        $this->m_utama->ubah_dokter();
        redirect(base_url('dokter/list_dokter'));
    }

    function hapus_dokter($id)
    {
        $this->m_utama->hapus_dokter($id);
        redirect(base_url('dokter/list_dokter'));
    }

    public function export_excel()
    {
        $data = array( 'title' => 'Laporan_Data_Dokter',
        'dokter' => $this->m_utama->listing_dokter());
        $this->load->view('dokter/excel_dokter',$data);
    }

    function pdf(){

        $this->load->library('cfpdf');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->Image('assets/images/icon/kop_a4.png',0,0);
		$pdf->SetFont('Arial','B',10);

        $pdf->Cell(10,37,'',0,1);
		$pdf->SetFont('Times','B',24);
		$pdf->Cell(190,7,'LAPORAN DATA DOKTER',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,6,'KODE DOKTER',1,0,'C');
        $pdf->Cell(30.5,6,'NAMA DOKTER',1,0,'C');
        $pdf->Cell(30,6,'JENIS KELAMIN',1,0,'C');
        $pdf->Cell(30,6,'TAMPAT LAHIR',1,0,'C');
        $pdf->Cell(31,6,'TANGGAL LAHIR',1,0,'C');
        $pdf->Cell(23,6,'ALAMAT',1,0,'C');
        $pdf->Cell(20,6,'ID POLI',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $laporan_obat = $this->m_utama->ambil_data_dokter();
        foreach ($laporan_obat as $row){
            $pdf->Cell(30,6,$row->kode_dokter,1,0,'C');
            $pdf->Cell(30.5,6,$row->nama_dokter,1,0,'C');
            $pdf->Cell(30,6,$row->jenis_kelamin,1,0,'C');
            $pdf->Cell(30,6,$row->tempat_lahir,1,0,'C');
            $pdf->Cell(31,6,$row->tgl_lahir,1,0,'C');
            $pdf->Cell(23,6,$row->alamat,1,0,'C');
            $pdf->Cell(20,6,$row->id_poli,1,1,'C');
        }
        $pdf->Output();
    }
}