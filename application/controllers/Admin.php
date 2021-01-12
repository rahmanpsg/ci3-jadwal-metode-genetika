<?php 
/**
* 
*/
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->db->query("SET sql_mode = '' ");
		$this->load->model('Admin_models');
	}

	public function cekLogin(){
		$this->load->library('session');

		if (!$this->session->has_userdata('hasLogin')) {
	            redirect(base_url());
        }
	}

	public function index(){
		$this->cekLogin();
		$data['totaldosen'] = $this->Admin_models->ambilTotalData('tbl_dosen');
		$data['totalmk'] = $this->Admin_models->ambilTotalData('tbl_matakuliah');
		$data['totalruang'] = $this->Admin_models->ambilTotalData('tbl_ruang');
		$data['totalprodi'] = $this->Admin_models->ambilTotalData('tbl_prodi');
		$this->load->view('admin/index',$data);
	}

	public function manajemen(){
		if ($this->input->post('manajemen') !== NULL) {
			$form = $this->input->post('form');
			if($this->input->post('manajemen') == 'tambah'){
				$data = $this->input->post('data');

				$keys = array_column($this->input->post('data'),'name');
				$values = array_column($this->input->post('data'),'value');

				$tambah = $this->Admin_models->setTambah('tbl_'.$form,array_combine($keys, $values));

				echo json_encode($tambah);
			}else
			if($this->input->post('manajemen') == 'update'){
				$id = $this->input->post('id');
				$data = $this->input->post('data');

				$keys = array_column($this->input->post('data'),'name');
				$values = array_column($this->input->post('data'),'value');

				$where = array('id'=>$id);
		        $update = $this->Admin_models->setUpdate(array_combine($keys, $values),$where,'tbl_'.$form);

				echo json_encode($update);
			}else
			if ($this->input->post('manajemen') == "hapus") {
				$id = $this->input->post('id');

				$where = array('id'=>$id);
                $hapus = $this->Admin_models->setHapus('tbl_'.$form,$where);

                echo json_encode($hapus);
			}
		}else{
			redirect('admin');
		}
	}

	public function generateJam(){
		$keys = array_column($this->input->post('data'),'name');
		$values = array_column($this->input->post('data'),'value');

		$data = array_combine($keys, $values);

		$jam_mulai = new DateTime($data['jamMulai']);
		$jam_selesai = new DateTime($data['jamSelesai']);
		$jam_sks = 'PT'.$data['jamSKS'].'M';

		if ($jam_mulai < $jam_selesai) {
			$this->db->query("DELETE FROM tbl_jam");

			$i = 1;
			while ($jam_mulai < $jam_selesai) {
				// $array_jam[] = $jam_mulai->add(new DateInterval($jam_sks));
				$jamStart = $jam_mulai->format('H:i');
				$jamEnd = $jam_mulai->add(new DateInterval($jam_sks))->format('H:i');

				$array_jam = array('id' => $i, 'range_jam' => $jamStart.'-'.$jamEnd);

				$tambah = $this->Admin_models->setTambah('tbl_jam',$array_jam);

				$i++;
			}


			if ($tambah) {
				$res = array(true, 'Jam berhasil digenerate');
			}else{
				$res = array(false, 'Jam gagal dibuat');
			}

		}else{
			$res = array(false, 'Jam mulai harus lebih besar dari jam selesai');
		}

		echo json_encode($res);
	}

	public function matakuliah(){
		$this->cekLogin();
		$data['data'] = $this->Admin_models->query('SELECT *, (SELECT nama FROM tbl_prodi WHERE id = id_prodi) as programstudi FROM tbl_matakuliah ORDER BY semester, programstudi');
		$data['dataProdi'] = $this->Admin_models->ambilData('tbl_prodi');
		$this->load->view('admin/matakuliah',$data);
	}

	public function dosen(){
		if ($this->uri->segment(3) == 'datadosen') {
			$this->cekLogin();
			$data['data'] = $this->Admin_models->ambilData('tbl_dosen');
			$this->load->view('admin/datadosen',$data);
		}
		
	}

	public function programstudi(){
		$this->cekLogin();
		$data['data'] = $this->Admin_models->ambilData('tbl_prodi');
		$this->load->view('admin/programstudi',$data);
	}

	public function ruangan(){
		$this->cekLogin();
		$data['data'] = $this->Admin_models->query('SELECT *, (SELECT nama FROM tbl_prodi WHERE id = id_prodi) as programstudi FROM tbl_ruang ORDER BY id_prodi');
		$data['dataProdi'] = $this->Admin_models->ambilData('tbl_prodi');
		$this->load->view('admin/ruangan',$data);	
	}

	public function kelas(){
		$this->cekLogin();
		$data['data'] = $this->Admin_models->query('SELECT *, (SELECT nama FROM tbl_prodi WHERE id = id_prodi) as programstudi FROM tbl_kelas ORDER BY id_prodi ASC, tahun_angkatan ASC, jenis DESC');
		$data['dataProdi'] = $this->Admin_models->ambilData('tbl_prodi');
		$this->load->view('admin/kelas',$data);	
	}

	public function waktu(){
		$this->cekLogin();
		if ($this->uri->segment(3) == 'jam') {
			$data['data'] = $this->Admin_models->ambilData('tbl_jam');
			$this->load->view('admin/jam',$data);
		}else
		if ($this->uri->segment(3) == 'hari') {
			$data['data'] = $this->Admin_models->ambilData('tbl_hari');
			$this->load->view('admin/hari',$data);
		}else{
			redirect('admin');
		}
		
	}

	public function pengampu(){
		if ($this->input->post('manajemen') !== NULL) {
			if ($this->input->post('manajemen') == 'getKelas') {
				$id_mk = $this->input->post('data');

				$data_kelas = $this->Admin_models->query("SELECT *,(SELECT semester FROM tbl_matakuliah WHERE id = '$id_mk') as semester FROM tbl_kelas WHERE tahun_angkatan = (SELECT floor(year(current_timestamp) - ((SELECT semester FROM tbl_matakuliah WHERE id = '$id_mk')/2))) AND id_prodi = (SELECT id_prodi FROM tbl_matakuliah WHERE id = '$id_mk') ORDER BY jenis DESC");

				echo json_encode($data_kelas);
			}
		}else{
			$this->cekLogin();
			$data['data'] = $this->Admin_models->query("SELECT *, (SELECT nama FROM tbl_matakuliah WHERE id = id_mk) as matakuliah, (SELECT concat(nama,', ',title) FROM tbl_dosen WHERE id = id_dosen) as dosen FROM tbl_pengampu");
			$data['data_mk'] = $this->Admin_models->query("SELECT *, (SELECT nama FROM tbl_prodi WHERE id = id_prodi) as programstudi FROM tbl_matakuliah ORDER BY id_prodi, semester");
			$data['data_dosen'] = $this->Admin_models->query('SELECT * FROM tbl_dosen ORDER BY nama');
			$this->load->view('admin/pengampu',$data);
		}
	}

	public function buatjadwal(){
		if ($this->input->post('manajemen') !== NULL) {
			if ($this->input->post('manajemen') == 'getDataFilter') {
				$tbl = $this->input->post('tabel');

				if ($tbl == 'matakuliah') {
					$data = $this->Admin_models->query('SELECT *, (SELECT nama FROM tbl_prodi WHERE id = id_prodi) as programstudi FROM tbl_matakuliah ORDER BY id_prodi, semester');
				}else
				if ($tbl == 'kelas') {
					$data = $this->Admin_models->query('SELECT *, (SELECT nama FROM tbl_prodi WHERE id = id_prodi) as programstudi FROM tbl_kelas ORDER BY id_prodi ASC, tahun_angkatan ASC, jenis DESC');
				}else{
					$data = $this->Admin_models->ambilData('tbl_'.$tbl);
				}
				echo json_encode($data);
			}else
			if($this->input->post('manajemen') == 'hapus-tabel'){
				$hapus = $this->Admin_models->setHapusAllData('tbl_jadwalkuliah');

				echo json_encode($hapus);
			}
		}else{
			$this->cekLogin();

			$data['dataTahunAkademik'] = $this->Admin_models->query("SELECT tahun_akademik FROM tbl_pengampu GROUP BY tahun_akademik");
			$data['dataProgramStudi'] = $this->Admin_models->query("SELECT * FROM tbl_prodi");
			$this->load->view('admin/buatjadwal',$data);
		}
	}

	public function generatejadwal(){
		if ($this->input->get('jenis_semester') !== NULL) {

			set_time_limit(0);

			// header('Access-Control-Allow-Origin: '.base_url());
			// header('Content-Type: text/event-stream');
			// header('Cache-Control: no-cache'); // recommended to prevent caching of event data.
			
			include_once("Genetik.php");
			
			$jenis_semester = $this->input->get('jenis_semester');
			$tahun_akademik = $this->input->get('tahun_akademik');

			$jumlah_populasi = 30;
			
			$crossOver = 0.90;
			$mutasi = 0.30;
			$jumlah_generasi = 5000000;

			$PRAKTIKUM = 'PRAKTIKUM';
		    $TEORI = 'TEORI';
		    $LABORATORIUM = 'LABORATORIUM';

			$genetik = new genetik($jenis_semester,
								   $tahun_akademik,
								   $jumlah_populasi,
								   $crossOver,
								   $mutasi
								   ); 
			$genetik->AmbilData();
			$genetik->Inisialisai();

			$found = false;
			$response['status'] = false;

			for($i = 0;$i < $jumlah_generasi;$i++ ){
				$fitness = $genetik->HitungFitness();
				
				$genetik->Seleksi($fitness);
				$genetik->StartCrossOver();
				
				$fitnessAfterMutation = $genetik->Mutasi();
				
				for ($j = 0; $j < count($fitnessAfterMutation); $j++){
					
					// $serverTime = microtime();	
			 	// 	$response['fitness'] = number_format($fitnessAfterMutation[$j], 4);
					// $this->Admin_models->sendMsg($serverTime, json_encode($response));

					if($fitnessAfterMutation[$j] == 1){								
						$this->db->query("TRUNCATE TABLE tbl_jadwalkuliah");
						// $this->db->query("DELETE a FROM tbl_jadwalkuliah a LEFT JOIN tbl_pengampu b on a.id_pengampu = b.id LEFT JOIN tbl_matakuliah c on b.id_mk = c.id LEFT JOIN tbl_prodi d on c.id_prodi = d.id WHERE d.id = '$jurusan'");
						
						$jadwal_kuliah = array(array());
						$jadwal_kuliah = $genetik->GetIndividu($j);
						
						for($k = 0; $k < count($jadwal_kuliah);$k++){
							
							$id_pengampu = intval($jadwal_kuliah[$k][0]);
							$id_jam = intval($jadwal_kuliah[$k][1]);
							$id_hari = intval($jadwal_kuliah[$k][2]);
							$id_ruang = intval($jadwal_kuliah[$k][3]);
							$kelas = $jadwal_kuliah[$k][4];
							$this->db->query("INSERT INTO tbl_jadwalkuliah(id_pengampu,id_jam,id_hari,id_ruang,kelas) ".
											 "VALUES($id_pengampu,$id_jam,$id_hari,$id_ruang,'$kelas')");
						}

						$penalty = 0;

						$serverTime = microtime();	
						$response['status'] = true;
						// $this->Admin_models->sendMsg($serverTime, json_encode($response));
						echo json_encode($response);
						
						$found = true;							
					}							
					if($found){break;}
				}
				
				if($found){break;}
			}
			
			if(!$found){
				$serverTime = microtime();	
				$response['status'] = 'gagal';
				// $this->Admin_models->sendMsg($serverTime, json_encode($response));
				echo json_encode($response);
			}
	    }else{
	    	redirect('admin');
	    }
	}

	function cekBentrokJadwal(){
		$data_dosen = $this->Admin_models->query("SELECT a.id, a.id_jam, a.id_hari, a.id_ruang, b.id_dosen, c.sks FROM tbl_jadwalkuliah a LEFT JOIN tbl_pengampu b on a.id_pengampu = b.id LEFT JOIN tbl_matakuliah c on b.id_mk = c.id LEFT JOIN tbl_hari d on a.id_hari = d.id GROUP BY a.id_jam, a.id_hari, b.id_dosen ORDER BY d.id, a.id_jam");
		$data_bentrok = array();
		
		foreach ($data_dosen as $key => $value) {
			$sks = $value['sks'];
			$id   = $value['id'];
			$id_jam = $value['id_jam'];
			$id_hari = $value['id_hari'];
			$id_ruang = $value['id_ruang'];
			$id_dosen = $value['id_dosen'];

			$cek = $this->Admin_models->cekJadwalPinaltyDosen($id_jam, $id_jam + ($sks - 1), $id_hari, $id_dosen);


			if(count($cek) > 1){
				$bentrok = [];
				foreach ($cek as $val) {
					$bentrok[] = $val;
				}
				array_push($data_bentrok, $bentrok);					
			}
		}

		$res = [];
		foreach ($data_bentrok as $key => $value) {
			foreach ($value as $val) {
				$jadwal_bentrok = $this->Admin_models->ambilDataJadwal_where($val['id'])[0];
				$jadwal_bentrok['#'] = ($key+1);
				array_push($res,$jadwal_bentrok);
			}
		}
		echo json_encode($res);
	}

	function cekDataJadwal(){
		$jurusan 		= $this->input->post('jurusan');
		$jenis_semester = $this->input->post('jenis_semester');
		$tahun_akademik = $this->input->post('tahun_akademik');

		$rs_data = $this->Admin_models->ambilDataGenerateJadwal($jenis_semester,$tahun_akademik,$jurusan);

		if($rs_data->num_rows() <= 1){
			echo json_encode(false);
		}
	}

	function cekDataJenisJadwal(){
		$data = $this->input->post('data');
		$keys = array_column($this->input->post('data'),'name');
		$values = array_column($this->input->post('data'),'value');

		$input = array_combine($keys, $values);

		$jurusan 		= $this->input->post('jurusan');
		$jenis_semester = $input['jenis_semester'];
		$tahun_akademik = $input['tahun_akademik'];

		$total = 0;
		for ($i=0; $i < count($jurusan); $i++) { 
			$rs_data = $this->Admin_models->ambilJenisGenerateJadwal($jenis_semester,$tahun_akademik,$jurusan[$i]);	

			$res[$i] = array('jurusan'=>$jurusan[$i]);
			// foreach ($rs_data as $key => $value) {
			// 	$res[$i]['jenis'][] = $value['jenis'];
			// }

			// $total += count($res[$i]['jenis']);
		}

		// echo json_encode(array($res, $total));
		echo json_encode(array($res));
	}

	function cekDataTotalJadwal(){
		$data = $this->input->post('data');
		$keys = array_column($this->input->post('data'),'name');
		$values = array_column($this->input->post('data'),'value');

		$input = array_combine($keys, $values);

		$jurusan 		= $this->input->post('jurusan');
		$jenis_semester = $input['jenis_semester'];

		$total = 0;
		$res = [];
		$progress = [];
		for ($i=0; $i < count($jurusan); $i++) { 
			$rs_data = $this->Admin_models->ambilTotalGenerateJadwal($jenis_semester,$jurusan[$i]);	


			foreach ($rs_data as $key => $value) {
				$res[] = array('prodi'=>$jurusan[$i],'total'=>$value['total']);
				$progress[] = (($i == 0) ? 0 : $progress[$i-1] + $res[$i-1]['total']);
				$total += $value['total'];
			}
		}

		$res_progress = array_map(function($val) use($total){
			return round(($val / $total) * 100);
		},$progress);

		echo json_encode(array('prodi'=>$res, 'progress'=>$res_progress, 'total'=>$total));
	}

	function getData(){
		if ($this->input->get('tabel') !== NULL) {
			$tbl = $this->input->get('tabel');
			$kolom = $this->input->get('kolom');
			$where = $this->input->get('where');

			if ($tbl == 'tbl_jam') {
				$kode_jumat = [8,9,10];
				$kode_dhuhur = [9,10];
				$kode_ashar = [14];
				$jam_terakhir = 16;

				$data = $this->Admin_models->query("SELECT g.id, Concat_WS('-', MID(g.range_jam,1,5), (SELECT MID(range_jam,7,5) FROM tbl_jam WHERE id = (SELECT jm.id FROM tbl_jam jm WHERE MID(jm.range_jam,1,5) = MID(g.range_jam,1,5)) + ('$where[sks]' - 1))) as jam_kuliah FROM tbl_jam g WHERE g.id <> '9' AND g.id <> '10' AND g.id <> '14'");
				
				foreach ($data as $key => $value) {
					$res[] = $value;	
				}

				foreach ($data as $key => $value) {
					for ($i=0; $i < $where['sks']; $i++) { 
						if ($where['hari'] == 5) {
							if (($value['id'] == strval($kode_jumat[0] - $i)) || ($value['id'] == strval($kode_ashar[0] - $i)) || ($value['id'] > $jam_terakhir - $i)) {
								unset($res[$key]);
							}
							foreach ($kode_jumat as $val) {
			                    if ($value['id'] == $val) {
			                        unset($res[$key]);
			                    }
			                }
						}else{
							if (($value['id'] == strval($kode_dhuhur[0] - $i)) || ($value['id'] == strval($kode_ashar[0] - $i)) || ($value['id'] > $jam_terakhir - $i)) {
								unset($res[$key]);
							}
						}
					}
				}

				$res = array_values($res);

			}else
			if($tbl == 'tbl_hari'){

				if ($where === NULL) {
					$data = $this->Admin_models->ambilData($tbl);
				}else{
					$data = $this->Admin_models->ambilData_where($tbl,$where);
				}

				if ($kolom !== NULL) {
					foreach ($data as $key => $value) {
						$res[] = array('id'=>$value['id'], 'text'=>$value['nama']);
					}
				}else{
					$res = $data;
				}
			}else
			if($tbl == 'tbl_jadwalkuliah'){
				$res = $this->Admin_models->ambilDataJadwal($tbl);
			}

			echo json_encode($res);
		}else{
			redirect('admin');
		}
	}

	function setJadwalBentrok(){
		if ($this->input->post('manajemen') !== NULL) {
			if ($this->input->post('manajemen') == 'update') {
				$data = $this->input->post('data');

				$sks = $data['sks'];
				$id   = $data['id'];
				$id_jam = $data['id_jam'];
				$id_hari = $data['id_hari'];
				$id_dosen = $data['id_dosen'];

				$cek = $this->Admin_models->cekJadwalPinaltyDosen($id_jam, $id_jam + ($sks - 1), $id_hari, $id_dosen);				

				if (count($cek) > 0) {
					$res = array('status'=>false, 'data'=>'Maaf jadwal yang anda pilih telah digunakan');
				}else{
					$data_update = array('id_jam'=>$id_jam, 'id_hari'=>$id_hari);
					$where = array('id'=>$id);
					$this->Admin_models->setUpdate($data_update, $where, 'tbl_jadwalkuliah');
					$res = array('status'=>true, 'data'=>'Anda berhasil mengubah data jadwal');
				}
				echo json_encode($res);
			}
		}else{
			redirect('admin');	
		}
	}
}
?>