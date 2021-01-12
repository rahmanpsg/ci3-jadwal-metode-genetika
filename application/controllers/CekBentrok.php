<?php 
/**
* 
*/
class CekBentrok extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_models');
		ini_set("memory_limit","-1");
	}

	function index(){

		// while ($this->Admin_models->query("SELECT COUNT(*) as total FROM tbl_jadwalkuliah GROUP BY id_jam, id_hari, id_ruang ORDER BY total DESC LIMIT 1")[0]['total'] > 1) {
		$penalty = 0;
		
		// do{
			$data_ruang = $this->Admin_models->query("SELECT a.id, a.id_jam, a.id_hari, a.id_ruang, c.sks, a.kelas, c.nama FROM tbl_jadwalkuliah a LEFT JOIN tbl_pengampu b on a.id_pengampu = b.id LEFT JOIN tbl_matakuliah c on b.id_mk = c.id LEFT JOIN tbl_hari d on a.id_hari = d.id GROUP BY a.id_jam, a.id_hari, a.id_ruang ORDER BY d.id, a.id_jam");
			$penalty = 0;
			foreach ($data_ruang as $key => $value) {
				$sks = $value['sks'];
				$id   = $value['id'];
				$id_jam = $value['id_jam'];
				$id_hari = $value['id_hari'];
				$id_ruang = $value['id_ruang'];

				$cek = $this->Admin_models->cekJadwalPinaltyRuang($id_jam, $id_jam + ($sks - 1), $id_hari, $id_ruang);

				// if($cek > 1){
				// 	$ruang = $this->Admin_models->cekRuangBentrok($id_jam, $id_jam + ($sks - 1), $id_hari);
				// 	$array_ruang = array();

				// 	foreach ($ruang as $k => $v) {
				// 		$array_ruang[] = $v['id_ruang'];
				// 	}

				// 	// print_r(array_values($array_ruang));
				// 	echo "<br>";
				// 	$id_ruang = $this->randomRuang($array_ruang);
				// 	// print_r($id_ruang);
				// 	// $this->Admin_models->setUpdate(array('id_ruang'=>$id_ruang),array('id',$id),'tbl_jadwalkuliah');
				// 	echo "<br>";
				// 	// print_r($value);
				// 	echo "<br>";
				// 	$penalty += 1;
				// }
			}		
		// } while(floatval(1 / (1 + $penalty)) != 1);

		// while ($this->Admin_models->query("SELECT COUNT(*) as total FROM tbl_jadwalkuliah a LEFT JOIN tbl_pengampu b ON a.id_pengampu = b.id GROUP BY a.id_jam, a.id_hari, b.id_dosen ORDER BY total DESC LIMIT 1")[0]['total'] > 1) {
		// do{
			$data_dosen = $this->Admin_models->query("SELECT a.id, a.id_jam, a.id_hari, a.id_ruang, b.id_dosen, c.sks, a.kelas, c.nama, e.jenis FROM tbl_jadwalkuliah a LEFT JOIN tbl_pengampu b on a.id_pengampu = b.id LEFT JOIN tbl_matakuliah c on b.id_mk = c.id LEFT JOIN tbl_hari d on a.id_hari = d.id LEFT JOIN tbl_kelas e ON JSON_UNQUOTE(JSON_EXTRACT(b.kelas,'$[0][0]')) = e.id GROUP BY a.id_jam, a.id_hari, b.id_dosen ORDER BY d.id, a.id_jam");
			$penalty = 0;
			foreach ($data_dosen as $key => $value) {
				$sks = $value['sks'];
				$id   = $value['id'];
				$id_jam = $value['id_jam'];
				$id_hari = $value['id_hari'];
				$id_ruang = $value['id_ruang'];
				$id_dosen = $value['id_dosen'];
				$jenis = $value['jenis'];

				$cek = $this->Admin_models->cekJadwalPinaltyDosen($id_jam, $id_jam + ($sks - 1), $id_hari, $id_dosen);

				if($cek > 1){
					$array_jam = array();

					print_r($value);
					echo "<br>";

					// for ($i=0; $i < $sks; $i++) { 
					// 	$array_jam[] = $id_jam + $i;
					// }

					
					// $update = $this->randomJam($id, $sks, $id_hari, $id_ruang, $id_dosen, $jenis);
					// var_dump($update);
					// echo "<br>";
					// print_r($value);
					// echo "<br><br>";
					// $this->Admin_models->setUpdate($update,array('id',$id),'tbl_jadwalkuliah');
					$penalty += 1;
				}

			}
		// } while(floatval(1 / (1 + $penalty)) != 1);
	}

	function randomRuang(array $excluded = []){
		$rs_RuangReguler = $this->db->query("SELECT id FROM tbl_ruang WHERE jenis = 'TEORI'");
        $i               = 0;
        foreach ($rs_RuangReguler->result() as $data) {
            $ruangReguler[$i] = intval($data->id);
            $i++;
        }

        $jumlah_ruang_reguler = count($ruangReguler);

	    do {
	        $number = intval($ruangReguler[mt_rand(0, $jumlah_ruang_reguler - 1)]);
	    } while (array_search($number, $excluded) !== false);

	    return $number;
	}

	function randomJam($id, $sks, $hari, $ruang, $dosen, $jenis){
		 $excluded = [];
		 $kode_jumat = 5;
		 $range_jumat = [10, 11, 12, 13];
		 $range_dhuhur = [11, 12, 13];

		$rs_jam = $this->db->query("SELECT id FROM tbl_jam");
        $i      = 0;
        foreach ($rs_jam->result() as $data) {
            $jam[$i] = intval($data->id);
            $i++;
        }

        $jumlah_jam = count($jam);

        if ($hari == $kode_jumat) //bentrok sholat jumat
        {
        	for ($d=1; $d < $sks; $d++) { 
                array_push($excluded, $range_jumat[0] - $d);
                array_push($excluded, $jumlah_jam - ($d-1));
            }
            $excluded = array_merge($excluded, $range_jumat);
        }else{ //bentrok sholat dhuhur
        	for ($d=1; $d < $sks; $d++) { 
                array_push($excluded, $range_dhuhur[0] - $d);
                array_push($excluded, $jumlah_jam - ($d-1));
            }
            $excluded = array_merge($excluded, $range_dhuhur);
        }

        $jadwal_dosen = $this->Admin_models->query("SELECT a.id_jam, c.sks FROM tbl_jadwalkuliah a LEFT JOIN tbl_pengampu b ON a.id_pengampu = b.id LEFT JOIN tbl_matakuliah c ON b.id_mk = c.id WHERE a.id_hari = '$hari' AND b.id_dosen = '$dosen' AND a.id <> '$id' ORDER BY a.id_jam ASC");

		foreach ($jadwal_dosen as $k => $val) {
			for ($i=0; $i < $val['sks']; $i++) { 
				array_push($excluded,$val['id_jam'] + $i);
			}
		}

		$data_ruang = $this->Admin_models->query("SELECT a.id_jam, c.sks FROM tbl_jadwalkuliah a LEFT JOIN tbl_pengampu b ON a.id_pengampu = b.id LEFT JOIN tbl_matakuliah c ON b.id_mk = c.id WHERE id_hari = '$hari' AND id_ruang = '$ruang'");

		foreach ($data_ruang as $k => $val) {
			for ($i=0; $i < $val['sks']; $i++) { 
				array_push($excluded,$val['id_jam'] + $i);
				// print_r($val['id_jam'] + $i);
			}
		}

        $excluded = array_unique($excluded);
    	sort($excluded);

    	// print_r($excluded);

	    $array = range(1,max($excluded));

	    $missing = array_values(array_diff($array, $excluded));

	    $split = array(0);
	    for ($i=1; $i < count($missing); $i++) { 
	    	if ($missing[$i] - $missing[$i-1] !== 1) {
	    			// print_r($i);
	    			array_push($split,$i);
	    		}
	    }

	    $newArray = [];
	    for ($i=0; $i < count($split); $i++) {

	    	if ($i !== count($split)-1) {
	    		// for ($y=$split[$i]; $y < $split[$i+1]; $y++) { 
	    	 		// array_push($newArray[$i],$missing[$y]);
	    	 		// $newArray[$i][] = $missing[$y];
	    	 	// } 
	    	 	$newArray[$i] = $split[$i+1] - $split[$i];
	    	}else{
	    		// for ($y=$split[$i]; $y < count($missing); $y++) { 
	    	 		// array_push($newArray[$i],$missing[$y]);
	    	 		// $newArray[$i][] = $missing[$y];
	    	 	// } 
	    	 	$newArray[$i] = count($missing) - $split[$i];
	    	}
	    }

	    // $index = -1;
	    // foreach ($missing as $key => $value) {
	    	
	    // }
	    // print_r($newArray);
	    // print_r($missing);

	    if (max($newArray) >= $sks) {
	    	// print_r($excluded);
		     do {
		        $number = intval($jam[mt_rand(0, ($jumlah_jam - 1) - ($sks - 1))]);

		        // cek bentrok ruangan di jam yang baru
		  //       $ruangan = $this->Admin_models->cekRuangBentrok($number, $number + ($sks - 1), $hari);
				// $array_ruang = array();

				// foreach ($ruangan as $k => $v) {
				// 	$array_ruang[] = $v['id_ruang'];
				// }
				// print_r($array_ruang);

		    } while (array_search($number, $excluded) !== false);
	    
	    	return array('id_hari'=>$hari,'id_jam'=>$number);
	    }else{
	    	return $this->randomJam($id, $sks, $this->getHari($jenis), $ruang, $dosen,$jenis);
	    }
	    // print_r($array_ruang);
	    // return $number;
	}

	function getHari($jenis){
		//Fill Array of Hari Variables
        $rs_hari = $this->db->query("SELECT id,kelas FROM tbl_hari");
        $i       = 0;
        foreach ($rs_hari->result() as $data) {
            $hari[$i] = array('id'=>intval($data->id),'kelas'=>$data->kelas);
            $i++;
        }

        // print_r($hari);
        // print_r(array_search('REGULER ', array_column($hari,'kelas')));
        $kelashari = array_column($hari, 'kelas', 'id');

        // print_r($kelashari);
        
    	$kelashariReguler = array_filter($kelashari, function($e){
    		return $e == 'REGULER' || $e == 'REGULER, NONREGULER';
    	});
    
    	$kelashariNonReguler = array_filter($kelashari, function($e){
    		return $e == 'NONREGULER' || $e == 'REGULER, NONREGULER';
    	});

    	if ($jenis == 'REGULER') {
    		return array_rand($kelashariReguler, 1);
    	}else{
    		return array_rand($kelashariNonReguler, 1);
    	}
	}

	// function filterKelasReguler($e) {
 //        if ($e=='REGULER' or $e=='REGULER, NONREGULER') {
 //            return $e;
 //        }
 //    }
 //    function filterKelasNonReguler($e) {
 //        if ($e=='NONREGULER' or $e=='REGULER, NONREGULER') {
 //            return $e;
 //        }
 //    }

	function randomNumber($from, $to, array $excluded = [])
	{
	    $func = function_exists('random_int') ? 'random_int' : 'mt_rand';

	    do {
	        $number = $func($from, $to);
	    } while (in_array($number, $excluded, true));

	    return $number;
	}
}
 ?>