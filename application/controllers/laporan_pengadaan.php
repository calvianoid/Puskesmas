<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_Pengadaan extends CI_CONTROLLER
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

	public function index()
	{
		$this->load->view('laporan/laporan_pengadaan_obat/form_laporan_pengadaan');
	}

	public function pengadaan_obat($from, $to)
	{
		$this->load->model('m_utama');
		$dt['pengadaan_obat'] 	= $this->m_utama->laporan_pengadaan_obat($from, $to);
		$dt['from']			= date('d F Y', strtotime($from));
		$dt['to']			= date('d F Y', strtotime($to));
		$this->load->view('laporan/laporan_pengadaan_obat/laporan_pengadaan', $dt);
	}

	public function excel($from, $to)
	{
		$this->load->model('m_utama');
		$pengadaan_obat 	= $this->m_utama->laporan_pengadaan_obat($from, $to);
		if($pengadaan_obat->num_rows() > 0)
		{
			$filename = 'Laporan_Pengadaan_Obat_'.$from.'_'.$to;
			header("Content-type: application/x-msdownload");
			header("Content-Disposition: attachment; filename=".$filename.".xlsx");

			echo "
				<h2>Laporan Pengadaan Obat</h2>
				<table border='1' width='100%'>
					<thead>
					<h4>Tanggal ".date('d/m/Y', strtotime($from))." - ".date('d/m/Y', strtotime($to))."</h4>
						<tr align='center'>
							<th>No</th>
							<th>Tanggal</th>
							<th>Total Pengadaan Obat</th>
						</tr>
					</thead>
					<tbody>
			";

			$no = 1;
			$total_pengadaan = 0;
			foreach($pengadaan_obat->result() as $p)
			{
				echo "
					<tr align='center'>
						<td>".$no."</td>
						<td>".date('d F Y', strtotime($p->tgl_transaksi))."</td>
						<td>Rp. ".str_replace(",", ".", number_format($p->total_pengadaan))."</td>
					</tr>
				";

				$total_pengadaan = $total_pengadaan + $p->total_pengadaan;
				$no++;
			}

			echo "
				<tr align='center'>
					<td colspan='2'><b>Total Seluruh Pengadaan Obat</b></td>
					<td><b>Rp. ".str_replace(",", ".", number_format($total_pengadaan))."</b></td>
				</tr>
			</tbody>
			</table>
			";
		}
	}

	public function pdf($from, $to)
	{
		$this->load->library('cfpdf');
					
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->Image('assets/images/icon/kop_a4.png',0,0);
		$pdf->SetFont('Arial','B',10);

		$pdf->Cell(10,37,'',0,1);
		$pdf->SetFont('Times','B',24);
		$pdf->Cell(190,7,'LAPORAN PENGADAAN OBAT',0,1,'C');
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(0, 8, "Tanggal ".date('d/m/Y', strtotime($from))." - ".date('d/m/Y', strtotime($to)), 0, 1, 'L'); 
		$pdf->Cell(15, 7, 'No', 1, 0, 'L'); 
		$pdf->Cell(85, 7, 'Tanggal', 1, 0, 'L');
		$pdf->Cell(85, 7, 'Total Pengadaan Obat', 1, 0, 'L'); 
		$pdf->Ln();

		$this->load->model('m_utama');
		$pengadaan_obat 	= $this->m_utama->laporan_pengadaan_obat($from, $to);

		$no = 1;
		$total_pengadaan = 0;
		foreach($pengadaan_obat->result() as $p)
		{
			$pdf->Cell(15, 7, $no, 1, 0, 'L'); 
			$pdf->Cell(85, 7, date('d F Y', strtotime($p->tgl_transaksi)), 1, 0, 'L');
			$pdf->Cell(85, 7, "Rp. ".str_replace(",", ".", number_format($p->total_pengadaan)), 1, 0, 'L');
			$pdf->Ln();

			$total_pengadaan = $total_pengadaan + $p->total_pengadaan;
			$no++;
		}

		$pdf->Cell(100, 7, 'Total Seluruh Pengadaan Obat', 1, 0, 'L'); 
		$pdf->Cell(85, 7, "Rp. ".str_replace(",", ".", number_format($total_pengadaan)), 1, 0, 'L');
		$pdf->Ln();

		$pdf->Output();
	}
}