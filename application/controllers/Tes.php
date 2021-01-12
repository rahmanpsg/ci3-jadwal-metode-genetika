<?php 
/**
* 
*/
class Tes extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
		$this->load->model('Admin_models');
    }

    function info(){
        phpinfo();
    }

	function index(){

         include_once("Genetik.php");
            
            $jenis_semester = '1';
            $tahun_akademik = '2019-2020';

            $jumlah_populasi = 30;
            
            $crossOver = 0.90;
            $mutasi = 0.30;
            $jumlah_generasi = 50000;

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
            // $response['status'] = false;
            $time1 = microtime(true);
            for($i = 0;$i < $jumlah_generasi;$i++ ){
                $fitness = $genetik->HitungFitness();
                
                $genetik->Seleksi($fitness);
                $genetik->StartCrossOver();
                
                $fitnessAfterMutation = $genetik->Mutasi();
                
                for ($j = 0; $j < count($fitnessAfterMutation); $j++){
                    
                    $serverTime = microtime();  
                    $time2 = microtime(true);
                    $response['waktu'] = round($time2-$time1)."s";
                    $response['fitness'] = number_format($fitnessAfterMutation[$j], 4);
                    // $this->Admin_models->sendMsg($serverTime, json_encode($response));

                    ?>

                    <script>
                        console.log(<?php echo json_encode($response); ?>);
                    </script>

                    <?php


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
                        // ob_end_flush();
                    
                        // $dataJadwal = $this->Admin_models->ambilDataJadwal();

                        // $cek = $this->db->query("SELECT d.id FROM tbl_jadwalkuliah a LEFT JOIN tbl_pengampu b on a.id_pengampu = b.id LEFT JOIN tbl_matakuliah c on b.id_mk = c.id LEFT JOIN tbl_prodi d on c.id_prodi = d.id GROUP BY d.id, c.jenis")->num_rows();

                        // echo json_encode(array('status'=>true,$cek,$dataJadwal));

                        $serverTime = microtime();  
                        $response['status'] = true;
                        // $this->Admin_models->sendMsg($serverTime, json_encode($response));
                        ?>
                        <script>
                            console.log(<?php echo json_encode($response); ?>);
                        </script>
                        <?php
                        exit;
                        
                        $found = true;                          
                    }                           
                    if($found){break;}
                }
                
                if($found){break;}
            }
            
            if(!$found){
                // echo json_encode(array('status'=>false));
                $response['status'] = 'Tidak ditemukan solusi optimal';
                ?>
                <script>
                    console.log(<?php echo json_encode($response); ?>);
                </script>
                <?php
            }
	}
}
 ?>