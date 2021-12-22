<?php
class Pasien extends CI_CONTROLLER
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

    function list_pasien()
    {
        $this->load->library('pagination');
        $data['judul'] = "DATA PASIEN";
        $data['tabel'] = $query = $this->m_utama->ambil_data_pasien();
        $this->load->view('pasien/list_pasien',$data);
    }   
    

    function tambah_pasien()
    {
        $this->session->set_userdata('row', $this->uri->segment(7));
        $data['id_pasien'] = $this->m_utama->get_id_pasien();
        $data['error'] = "";    
        $this->load->model('m_utama');  
        $this->load->view('pasien/tambah_pasien', $data);
    }

    function proses_tambah_pasien()
    {
        $this->m_utama->simpan_pasien();
        echo "Data Berhasil Disimpan";
        redirect(base_url('pasien/list_pasien'));
    }

    function ubah_pasien($id)
    {
        $data['baris'] = $this->m_utama->ambil_data_pasien2($id);
        $this->load->view('pasien/ubah_pasien',$data);
    }

    function proses_ubah_pasien()
    {
        $this->m_utama->ubah_pasien();
        echo "Data Berhasil Diubah";
        redirect(base_url('pasien/list_pasien'));
    }

    function hapus_pasien($id)
    {
        $this->m_utama->hapus_pasien($id);
        echo "Data Berhasil Dihapus";
        redirect(base_url('pasien/list_pasien'));
    }

    public function export_excel()
    {
        $data = array( 'title' => 'Laporan_Data_Pasien',
        'pasien' => $this->m_utama->listing_pasien());
        $this->load->view('pasien/excel_pasien',$data);
    }

    function pdf($id_pasien){

        $this->load->library('cfpdf');
        $pdf = new FPDF('L','mm',array(105,148));
        $pdf->AddPage();
        
        $pdf->SetFont('Arial','B',20);
        $pdf->Image('assets/images/icon/logo_puskesmas_antrian.png',29,-2);
        $pdf->Cell(10,18,'',0,1,'C');
        $this->load->model('m_utama');
		$pendaftaran 	= $this->m_utama->ambil_data_pasien2($id_pasien);
        $pdf->SetFont('Arial','',10);
        foreach ($pendaftaran as $row){
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(85,0,'ID PASIEN',0,1,'C');
            $pdf->Cell(10,4,'',0,1);
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(85,6,$row->id_pasien,0,1,'C');            
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(180,-20,'NAMA PASIEN',0,1,'C');
            $pdf->Cell(10,15,'',0,1);
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(180,4,$row->nama_pasien,0,1,'C');
            $pdf->Cell(10,6,'',0,1);

            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(85,0,'JENIS KELAMIN',0,1,'C');
            $pdf->Cell(10,4,'',0,1);
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(85,6,$row->jk,0,1,'C');            
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(180,-20,'TEMPAT LAHIR',0,1,'C');
            $pdf->Cell(10,15,'',0,1);
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(180,4,$row->tempat_lahir,0,1,'C');
            $pdf->Cell(10,6,'',0,1);

            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(85,0,'TANGGAL LAHIR',0,1,'C');
            $pdf->Cell(10,4,'',0,1);
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(85,6,$row->tanggal_lahir,0,1,'C');            
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(180,-20,'NO. TELP',0,1,'C');
            $pdf->Cell(10,15,'',0,1);
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(180,4,$row->no_telp,0,1,'C');
            $pdf->Cell(10,6,'',0,1);

            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(129,0,'ALAMAT',0,1,'C');
            $pdf->Cell(10,4,'',0,1);
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(129,6,$row->alamat,0,1,'C');            
        }
        $pdf->Output();
    }

    function pdf2(){

        $this->load->library('cfpdf');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->Image('assets/images/icon/kop_a4.png',0,0);
		$pdf->SetFont('Arial','B',10);
        
		$pdf->Cell(10,37,'',0,1);
		$pdf->SetFont('Times','B',24);
		$pdf->Cell(190,7,'LAPORAN DATA PASIEN',0,1,'C');
		$pdf->Cell(10,7,'',0,1);
        
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(24,6,'ID PASIEN',1,0,'C');
        $pdf->Cell(26.5,6,'NAMA PASIEN',1,0,'C');
        $pdf->Cell(30,6,'JENIS KELAMIN',1,0,'C');
        $pdf->Cell(32,6,'TTL',1,0,'C');
        $pdf->Cell(47,6,'ALAMAT',1,0,'C');
        $pdf->Cell(28,6,'NO. TELP',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $laporan_pasien = $this->m_utama->ambil_data_pasien();
        foreach ($laporan_pasien as $row){
            $pdf->Cell(24,6,$row->id_pasien,1,0,'C');
            $pdf->Cell(26.5,6,$row->nama_pasien,1,0,'C');
            $pdf->Cell(30,6,$row->jk,1,0,'C');
            $pdf->Cell(32,6,$row->tempat_lahir.", ".$row->tanggal_lahir,1,0,'C');
            $pdf->Cell(47,6,$row->alamat,1,0,'C');
            $pdf->Cell(28,6,$row->no_telp,1,1,'C');
        }
        $pdf->Output();
    }
}