<?php 
/**
* 
*/
class Cetak extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('Admin_models');
	}

	public function index(){
		$pdf = new FPDF('l','mm','LEGAL');

		$field = $this->input->get('field');
		$filter = $this->input->get('filter');

		$dataJadwal = $this->Admin_models->query("SELECT b.tahun_akademik, c.semester FROM tbl_jadwalkuliah a LEFT JOIN tbl_pengampu b on a.id_pengampu = b.id LEFT JOIN tbl_matakuliah c ON b.id_mk = c.id LIMIT 1");
		foreach ($dataJadwal as $key => $value) {
			if ($value['semester'] % 2 == 0) {
				$semester = "GENAP";
			}else{
				$semester = "GANJIL";
			}
			$tahun_akademik = $value['tahun_akademik'];
		}
        
    	$pdf->AddPage();
    	$pdf->SetFont('Times','B',14);
    		$pdf->Image(base_url('assets/img/logo/umpar.jpg'),70,7,25);
    		$pdf->SetFont('Times','',18);
	        $pdf->Cell(330,5,'DAFTAR JADWAL KULIAH FAKULTAS TEKNIK',0,1,'C');
	        $pdf->Cell(330,9,'SEMESTER '.$semester,0,1,'C');
	        $pdf->Cell(330,9,'TAHUN AJARAN '.$tahun_akademik,0,1,'C');
			$pdf->SetFont('Times','I',12);
	        $pdf->cell(330,14,'Alamat : Jln. Jend. Ahmad Yani KM. 6 Kampus 2 Umpar',0,1,'C');
	        $pdf->SetDrawColor(150,150,150);
			$pdf->SetLineWidth(1);
			$pdf->Line(20,36,350-20,36);
			$pdf->SetLineWidth(0);
			$pdf->Line(20,37,350-20,37);
	        $pdf->Ln(1);

	        $pdf->SetFont('Times','B',12);
	        $pdf->cell(2);
	        $pdf->Cell(10,11,'NO',1,0,'C');
	        $pdf->Cell(25,11,'HARI',1,0,'C');
	        $pdf->cell(25,11,'JAM',1,0,'C');
	        $pdf->cell(63,11,'MATAKULIAH',1,0,'C');
	        $pdf->Cell(15,11,'SKS',1,0,'C');
	        $pdf->Cell(27,11,'SEMESTER',1,0,'C');
	        $pdf->Cell(20,11,'KELAS',1,0,'C');
	        $pdf->Cell(60,11,'DOSEN',1,0,'C');
	        $pdf->Cell(40,11,'RUANGAN',1,0,'C');
	        $pdf->Cell(45,11,'PROGRAM STUDI',1,1,'C');

	        $pdf->SetFont('Times','',12);

	        $data = $this->Admin_models->ambilDataJadwal();

	        $no = 1;
	        foreach ($data as $key => $value) {
	        	if ($field !== '' && $filter !== '') {
	        		if ($value[$field] == $filter) {
			        	$pdf->cell(2);
			        	$pdf->Cell(10,11,$no++,1,0,'C');
				        $pdf->Cell(25,11,$value['hari'],1,0,'J');
				        $pdf->cell(25,11,$value['jam_kuliah'],1,0,'C');
				        $pdf->cell(63,11,$value['nama_mk'],1,0,'J');
				        $pdf->Cell(15,11,$value['sks'],1,0,'C');
				        $pdf->Cell(27,11,$value['semester'],1,0,'C');
				        $pdf->Cell(20,11,$value['kelas'],1,0,'C');
				        $pdf->Cell(60,11,$value['dosen'],1,0,'J');
				        $pdf->Cell(40,11,$value['ruang'],1,0,'J');
				        $pdf->Cell(45,11,$value['programstudi'],1,1,'J');
				    }
	        	}
	        	else{
			    	$pdf->cell(2);
		        	$pdf->Cell(10,11,$no++,1,0,'C');
			        $pdf->Cell(25,11,$value['hari'],1,0,'J');
			        $pdf->cell(25,11,$value['jam_kuliah'],1,0,'C');
			        $pdf->cell(63,11,$value['nama_mk'],1,0,'J');
			        $pdf->Cell(15,11,$value['sks'],1,0,'C');
			        $pdf->Cell(27,11,$value['semester'],1,0,'C');
			        $pdf->Cell(20,11,$value['kelas'],1,0,'C');
			        $pdf->Cell(60,11,$value['dosen'],1,0,'J');
			        $pdf->Cell(40,11,$value['ruang'],1,0,'J');
			        $pdf->Cell(45,11,$value['programstudi'],1,1,'J');
			    }
	        }
        
        $pdf->output();

	}
}
?>