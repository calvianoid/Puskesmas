<?php
class Obat extends CI_CONTROLLER
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

    function list_obat()
    {
        $this->load->library('pagination');
        $data['judul'] = "DATA OBAT";
        $data['tabel'] = $query = $this->m_utama->ambil_data_obat();
        $this->load->view('obat/list_obat',$data);
    }   

    function tambah_obat()
    {
        $this->session->set_userdata('row', $this->uri->segment(2));
        $data['kode_obat'] = $this->m_utama->get_kode_obat();
        $data['error'] = ""; 
        $this->load->view('obat/tambah_obat',$data);
    }

    function proses_tambah_obat()
    {
        $this->m_utama->simpan_obat();
        echo "Data Berhasil Disimpan";
        redirect(base_url('obat/list_obat'));
    }

    function ubah_obat($id)
    {
        $data['baris'] = $this->m_utama->ambil_data_obat2($id);
        $this->load->view('obat/ubah_obat',$data);
    }

    function proses_ubah_obat()
    {
        $this->m_utama->ubah_obat();
        echo "Data Berhasil Diubah";
        redirect(base_url('obat/list_obat'));
    }

    function hapus_obat($id)
    {
        $this->m_utama->hapus_obat($id);
        echo "Data Berhasil Dihapus";
        redirect(base_url('obat/list_obat'));
    }

    public function export_excel()
    {
        $data = array( 'title' => 'Laporan_Data_Obat',
        'obat' => $this->m_utama->listing_obat());
        $this->load->view('obat/excel_obat',$data);
    }

    function pdf(){

        $this->load->library('cfpdf');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->Image('assets/images/icon/kop_a4.png',0,0);
		$pdf->SetFont('Arial','B',10);

		$pdf->Cell(10,37,'',0,1);
		$pdf->SetFont('Times','B',24);
		$pdf->Cell(190,7,'LAPORAN DATA OBAT',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,6,'KODE OBAT',1,0,'C');
        $pdf->Cell(35.5,6,'NAMA OBAT',1,0,'C');
        $pdf->Cell(35,6,'JENIS OBAT',1,0,'C');
        $pdf->Cell(30,6,'SATUAN',1,0,'C');
        $pdf->Cell(30,6,'HARGA OBAT',1,0,'C');
        $pdf->Cell(30,6,'STOK OBAT',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $laporan_obat = $this->m_utama->ambil_data_obat();
        foreach ($laporan_obat as $row){
            $pdf->Cell(30,6,$row->kode_obat,1,0,'C');
            $pdf->Cell(35.5,6,$row->nama_obat,1,0,'C');
            $pdf->Cell(35,6,$row->jenis_obat,1,0,'C');
            $pdf->Cell(30,6,$row->satuan,1,0,'C');
            $pdf->Cell(30,6,$row->harga_obat,1,0,'C');
            $pdf->Cell(30,6,$row->jumlah_obat,1,1,'C');
        }
        $pdf->Output();
    }
}