<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Genetik extends CI_Controller
{    
    private $REGULER = 'REGULER';
    private $NONREGULER = 'NONREGULER';
    private $TEORI = 'TEORI';
    private $PRAKTIKUM = 'PRAKTIKUM';
    private $LABORATORIUM = 'LABORATORIUM';
    
    private $jurusan;
    private $jenis_semester;
    private $tahun_akademik;
    private $populasi;
    private $crossOver;
    private $mutasi;
    
    private $pengampu = array();
    private $individu = array(array(array()));
    private $sks = array();
    private $dosen = array();
    private $kelas = array();
    
    private $jam = array();
    private $hari = array();
    private $idosen = array();
    private $ikelas = array();
    
    private $waktu_dosen = array(array());
    private $jenis_mk = array(); //reguler or praktikum
    
    private $ruangLaboratorium = array();
    private $ruangReguler = array(array());
    
    private $induk = array();
    
    private $kode_jumat;
    private $range_sholat = array();
    private $is_waktu_dosen_tidak_bersedia_empty;
    
    
    
    function __construct($jenis_semester, $tahun_akademik, $populasi, $crossOver, $mutasi)
    {        
        parent::__construct();        
        $this->load->model('admin_models'); 
        $this->jenis_semester = $jenis_semester;
        $this->tahun_akademik = $tahun_akademik;
        $this->populasi       = intval($populasi);
        $this->crossOver      = $crossOver;
        $this->mutasi         = $mutasi;
        $this->kode_jumat     = 5;
    }
    
    public function AmbilData()
    {
        
        $rs_data = $this->admin_models->ambilDataGenerateJadwal($this->jenis_semester,$this->tahun_akademik);
        
        $i = 0;
        foreach ($rs_data->result() as $data) {
            $kelas = json_decode($data->kelas);
            foreach ($kelas as $key => $value) {
                $this->pengampu[$i]     = intval($data->id);
                $this->sks[$i]          = intval($data->sks);
                $this->dosen[$i]        = intval($data->id_dosen);
                // $this->jenis_mk[$i]     = $data->jenis;
                // $this->jenis_kuliah[$i] = $data->jenis_kuliah;
                $this->prodi[$i]        = $data->id_prodi;
                $this->ikelas[$i]       = intval($value[0]);
                $this->kelas[$i]        = $value[1];
                $this->jenis_kuliah[$i] = $this->admin_models->ambilField_where('tbl_kelas',array('id'=>$value[0]),'jenis')->jenis;
                $i++;
            }
        }

        //var_dump($this->jenis_mk);
        //exit();
        
        //Fill Array of Jam Variables
        $rs_jam = $this->db->query("SELECT id, waktu_sholat FROM tbl_jam");

        foreach ($rs_jam->result() as $data) {
            $this->jam[] = intval($data->id);
        }

        foreach ($rs_jam->result_array() as $value) {
            if ($value['waktu_sholat'] !== '') {
                $waktu_sholat = json_decode($value['waktu_sholat']);

                for($i = 0; $i < count($waktu_sholat); $i++){
                    $this->range_sholat[$waktu_sholat[$i]][] = $value['id'];
                }
            }
        }
        
        //Fill Array of Hari Variables
        $rs_hari = $this->db->query("SELECT id,kelas FROM tbl_hari");

        foreach ($rs_hari->result() as $data) {
            $this->hari[] = array('id'=>intval($data->id),'kelas'=>$data->kelas);
        }

        // print_r($this->hari);
        // print_r(array_search('REGULER ', array_column($this->hari,'kelas')));
        function filterKelasReguler($e) {
            if ($e=='REGULER' or $e=='REGULER, NONREGULER') {
                return $e;
            }
        }
        function filterKelasNonReguler($e) {
            if ($e=='NONREGULER' or $e=='REGULER, NONREGULER') {
                return $e;
            }
        }
        $this->kelashari = array_column($this->hari, 'kelas', 'id');
        $this->kelashariReguler = array_filter($this->kelashari, 'filterKelasReguler');
        $this->kelashariNonReguler = array_filter($this->kelashari, 'filterKelasNonReguler');

        foreach ($this->prodi as $key => $value) {
            $rs_RuangReguler = $this->db->query("SELECT id FROM tbl_ruang WHERE id_prodi = '$value'");
            foreach ($rs_RuangReguler->result() as $data) {
                $this->ruangReguler[$value][] = intval($data->id);
            }
        }
        
        
        
        // $rs_Ruanglaboratorium = $this->db->query("SELECT id, id_prodi FROM tbl_ruang WHERE jenis = '$this->LABORATORIUM' ORDER BY id_prodi");
        // $i = 0;
        // foreach ($rs_Ruanglaboratorium->result() as $data) {
        //     $this->ruangLaboratorium[$data->id_prodi][] = intval($data->id);
        //     $i++;
        // }
    }
    
    
    public function Inisialisai()
    {
        
        $jumlah_pengampu = count($this->pengampu);        
        $jumlah_jam = count($this->jam);
        $jumlah_hari = count($this->hari);
        $data_jam = $this->jam;
        
        for ($i = 0; $i < $this->populasi; $i++) {
            
            for ($j = 0; $j < $jumlah_pengampu; $j++) {
                
                $jumlah_ruang_reguler = count($this->ruangReguler[$this->prodi[$j]]);

                $sks = $this->sks[$j];
                
                $this->individu[$i][$j][0] = $j;

                $this->individu[$i][$j][4] = $this->kelas[$j];
                
                // Penentuan jam secara acak ketika 1 sks 
                // if ($sks == 1) {
                //     $this->individu[$i][$j][1] = mt_rand(0,  $jumlah_jam - 1);
                // }
                
                // // Penentuan jam secara acak ketika 2 sks 
                // if ($sks == 2) {
                //     $this->individu[$i][$j][1] = mt_rand(0, ($jumlah_jam - 1) - 1);
                // }
                
                // // Penentuan jam secara acak ketika 3 sks
                // if ($sks == 3) {
                //     $this->individu[$i][$j][1] = mt_rand(0, ($jumlah_jam - 1) - 2);
                // }
                
                // // Penentuan jam secara acak ketika 4 sks
                // if ($sks == 4) {
                //     $this->individu[$i][$j][1] = mt_rand(0, ($jumlah_jam - 1) - 3);
                // }
                
                
                // if ($this->jenis_mk[$j] === $this->TEORI) {
                    $this->individu[$i][$j][3] = intval($this->ruangReguler[$this->prodi[$j]][mt_rand(0, $jumlah_ruang_reguler - 1)]);
                // } else 
                // if ($this->jenis_mk[$j] === $this->PRAKTIKUM) {
                //     $jumlah_ruang_lab = count($this->ruangLaboratorium[$this->prodi[$j]]);
                //     $this->individu[$i][$j][3] = intval($this->ruangLaboratorium[$this->prodi[$j]][mt_rand(0, $jumlah_ruang_lab - 1)]);   
                // }

                if ($this->jenis_kuliah[$j] === $this->REGULER) {
                    $hari = array_rand($this->kelashariReguler, 1) - 1;
                    $this->individu[$i][$j][2] = $hari;// Penentuan hari secara acak untuk kelas REGULER    
                    $this->individu[$i][$j][1] = array_rand($this->admin_models->filterJamSKS($this->jam, $this->range_sholat, $sks, $hari));// Penentuan Jam
                }else{
                    $this->individu[$i][$j][2] = array_rand($this->kelashariNonReguler, 1) - 1; // Penentuan hari secara acak untuk kelas NONREGULER                     
                    $this->individu[$i][$j][1] = array_rand($this->admin_models->filterJamSKS($this->jam, $this->range_sholat, $sks));// Penentuan Jam
                }
            }
        }
    }
    
    private function CekFitness($indv)
    {
        $penalty = 0;
        
        $hari_jumat = intval($this->kode_jumat);
        // $jumat_0 = intval($this->range_jumat[0]);
        // $jumat_1 = intval($this->range_jumat[1]);
        // $jumat_2 = intval($this->range_jumat[2]);
        
        //var_dump($this->range_jumat);
        //exit();
        
        $jumlah_pengampu = count($this->pengampu);
        
        for ($i = 0; $i < $jumlah_pengampu; $i++)
        {
          
          $sks = intval($this->sks[$i]);
          
          $jam_a = intval($this->individu[$indv][$i][1]);
          $hari_a = intval($this->individu[$indv][$i][2]);
          $ruang_a = intval($this->individu[$indv][$i][3]);
          $dosen_a = intval($this->dosen[$i]);        
          $ikelas_a = intval($this->ikelas[$i]);
          $kelas_a = $this->kelas[$i];
          
          
            for ($j = 0; $j < $jumlah_pengampu; $j++) {
              
                $jam_b = intval($this->individu[$indv][$j][1]);
                $hari_b = intval($this->individu[$indv][$j][2]);
                $ruang_b = intval($this->individu[$indv][$j][3]);
                $dosen_b = intval($this->dosen[$j]);
                $ikelas_b = intval($this->ikelas[$j]);
                $kelas_b = $this->kelas[$j];
                  
                  
                //1.bentrok ruang dan waktu dan 3.bentrok dosen
                
                //ketika pemasaran matakuliah sama, maka langsung ke perulangan berikutnya
                if ($i == $j)
                    continue;
                
                // Bentrok kelas
                if (
                //ketika jam sama
                    $jam_a == $jam_b && 
                //dan hari sama
                    $hari_a == $hari_b && 
                //dan ikelas sama
                    $ikelas_a == $ikelas_b && 
                //dan kelasnya sama
                    $kelas_a == $kelas_b)
                {
                  //maka...
                  $penalty += 1;
                }

                if ($sks >= 2) {
                    if (
                    //ketika jam sama
                      ($jam_a + 1) == $jam_b && 
                    //dan hari sama
                      $hari_a == $hari_b && 
                    //dan ikelas sama
                    $ikelas_a == $ikelas_b && 
                    //dan kelasnya sama
                      $kelas_a == $kelas_b)
                    {
                      //maka...
                      $penalty += 1;
                    }
                }
                
                if ($sks >= 3) {
                    if (
                    //ketika jam sama
                      ($jam_a + 2) == $jam_b && 
                    //dan hari sama
                      $hari_a == $hari_b && 
                    //dan ikelas sama
                    $ikelas_a == $ikelas_b && 
                    //dan kelasnya sama
                      $kelas_a == $kelas_b)
                    {
                      //maka...
                      $penalty += 1;
                    }
                }
                
                if ($sks >= 4) {
                    if (
                    //ketika jam sama
                      ($jam_a + 3) == $jam_b && 
                    //dan hari sama
                      $hari_a == $hari_b && 
                    //dan ikelas sama
                    $ikelas_a == $ikelas_b && 
                    //dan kelasnya sama
                      $kelas_a == $kelas_b)
                    {
                      //maka...
                      $penalty += 1;
                    }
                }                
                //#region Bentrok Ruang dan Waktu
                //Ketika jam,hari dan ruangnya sama, maka penalty + satu
                if ($jam_a == $jam_b &&
                    $hari_a == $hari_b &&
                    $ruang_a == $ruang_b)
                {
                    $penalty += 1;
                }
                
                //Ketika sks  = 2, 
                //hari dan ruang sama, dan 
                //jam kedua sama dengan jam pertama matakuliah yang lain, maka penalty + 1
                if ($sks >= 2)
                {
                    if ($jam_a + 1 == $jam_b &&
                        $hari_a == $hari_b &&
                        $ruang_a == $ruang_b)
                    {
                        $penalty += 1;
                    }
                }
                
                
                //Ketika sks  = 3, 
                //hari dan ruang sama dan 
                //jam ketiga sama dengan jam pertama matakuliah yang lain, maka penalty + 1
                if ($sks >= 3) {
                    if ($jam_a + 2 == $jam_b &&
                        $hari_a == $hari_b &&
                        $ruang_a == $ruang_b)
                    {
                        $penalty += 1;
                    }
                }
                
                //Ketika sks  = 4, 
                //hari dan ruang sama dan 
                //jam ketiga sama dengan jam pertama matakuliah yang lain, maka penalty + 1
                if ($sks >= 4) {
                    if ($jam_a + 3 == $jam_b &&
                        $hari_a == $hari_b &&
                        $ruang_a == $ruang_b)
                    {
                        $penalty += 1;
                    }
                }
                
                //______________________BENTROK DOSEN
                if (
                //ketika jam sama
                    $jam_a == $jam_b && 
                //dan hari sama
                    $hari_a == $hari_b && 
                //dan dosennya sama
                    $dosen_a == $dosen_b)
                {
                  //maka...
                  $penalty += 1;
                }
                
                
                
                if ($sks >= 2) {
                    if (
                    //ketika jam sama
                      ($jam_a + 1) == $jam_b && 
                    //dan hari sama
                      $hari_a == $hari_b && 
                    //dan dosennya sama
                      $dosen_a == $dosen_b)
                    {
                      //maka...
                      $penalty += 1;
                    }
                }
                
                if ($sks >= 3) {
                    if (
                    //ketika jam sama
                      ($jam_a + 2) == $jam_b && 
                    //dan hari sama
                      $hari_a == $hari_b && 
                    //dan dosennya sama
                      $dosen_a == $dosen_b)
                    {
                      //maka...
                      $penalty += 1;
                    }
                }
                
                if ($sks >= 4) {
                    if (
                    //ketika jam sama
                      ($jam_a + 3) == $jam_b && 
                    //dan hari sama
                      $hari_a == $hari_b && 
                    //dan dosennya sama
                      $dosen_a == $dosen_b)
                    {
                      //maka...
                      $penalty += 1;
                    }
                }                
            }
            
            //
            // #region Bentrok sholat Jumat
            if (($hari_a  + 1) == $hari_jumat) //2.bentrok sholat jumat
            {
                
                for ($d=1; $d < $sks; $d++) { 
                    if (($jam_a == ($this->range_sholat['jumat'][0] - $d-1))) {
                        $penalty += 1;
                    }
                    if (($jam_a == ($this->range_sholat['ashar'][0] - $d-1))) {
                        $penalty += 1;
                    }
                }

                foreach ($this->range_sholat['jumat'] as $value) {
                    if ($jam_a == ($value - 1)) {
                        $penalty += 1;
                    }
                }

                foreach ($this->range_sholat['ashar'] as $value) {
                    if ($jam_a == ($value - 1)) {
                        $penalty += 1;
                    }
                }
                // if (($jam_a == ($jumat_0 - 1)) || ($jam_a == ($jumat_1 - 1)) || ($jam_a == ($jumat_2 - 1))){
                //     $penalty += 1;                        
                // }
            }else{ // Bentrok Sholat Dhuhur
                for ($d=1; $d < $sks; $d++) { 
                    if (($jam_a == ($this->range_sholat['dzuhur'][0] - $d-1))) {
                        $penalty += 1;
                    }
                    if (($jam_a == ($this->range_sholat['ashar'][0] - $d-1))) {
                        $penalty += 1;
                    }
                }
                foreach ($this->range_sholat['dzuhur'] as $value) {
                    if ($jam_a == ($value - 1)) {
                        $penalty += 1;
                    }
                }

                foreach ($this->range_sholat['ashar'] as $value) {
                    if ($jam_a == ($value - 1)) {
                        $penalty += 1;
                    }
                }
                // if (($jam_a == ($this->range_dzuhur[0] - 1)) || ($jam_a == ($this->range_dzuhur[1] - 1)) || ($jam_a == ($this->range_dzuhur[2] - 1)))
                // {                
                //     $penalty += 1;
                // }
            }
            //#endregion
        }      
        
        $fitness = floatval(1 / (1 + $penalty));  
        
        return $fitness;        
    }
    
    public function HitungFitness()
    {
        
        for ($indv = 0; $indv < $this->populasi; $indv++)
        {            
            $fitness[$indv] = $this->CekFitness($indv);            
        }
        
        return $fitness;
    }
    
    #endregion
    
    #region Seleksi
    public function Seleksi($fitness)
    {
        $jumlah = 0;
        $rank   = array();
        
        
        for ($i = 0; $i < $this->populasi; $i++)
        {
          //proses ranking berdasarkan nilai fitness
            $rank[$i] = 1;
            for ($j = 0; $j < $this->populasi; $j++)
            {
              //ketika nilai fitness jadwal sekarang lebih dari nilai fitness jadwal yang lain,
              //ranking + 1;
              //if (i == j) continue;
                
                $fitnessA = floatval($fitness[$i]);
                $fitnessB = floatval($fitness[$j]);
                
                if ( $fitnessA > $fitnessB)
                {
                    $rank[$i] += 1;                    
                }
            }
            
            $jumlah += $rank[$i];
        }
        
        $jumlah_rank = count($rank);
        for ($i = 0; $i < $this->populasi; $i++)
        {
            //proses seleksi berdasarkan ranking yang telah dibuat
            //int nexRandom = random.Next(1, jumlah);
            //random = new Random(nexRandom);
            $target = mt_rand(0, $jumlah - 1);           
          
            $cek    = 0;
            for ($j = 0; $j < $jumlah_rank; $j++) {
                $cek += $rank[$j];
                if (intval($cek) >= intval($target)) {
                    $this->induk[$i] = $j;
                    break;
                }
            }
        }
    }
    //#endregion
    
    public function StartCrossOver()
    {
        $individu_baru = array(array(array()));
        $jumlah_pengampu = count($this->pengampu);
        
        for ($i = 0; $i < $this->populasi; $i += 2) //perulangan untuk jadwal yang terpilih
        {
            $b = 0;
            
            $cr = mt_rand(0, mt_getrandmax() - 1) / mt_getrandmax();
            
            //Two point crossover
            if (floatval($cr) < floatval($this->crossOver)) {
                //ketika nilai random kurang dari nilai probabilitas pertukaran
                //maka jadwal mengalami prtukaran
                
                $a = mt_rand(0, $jumlah_pengampu - 2);
                while ($b <= $a) {
                    $b = mt_rand(0, $jumlah_pengampu - 1);
                }
                
                
                //var_dump($this->induk);
                
                
                //penentuan jadwal baru dari awal sampai titik pertama
                for ($j = 0; $j < $a; $j++) {
                    for ($k = 0; $k < 5; $k++) {                        
                        $individu_baru[$i][$j][$k]     = $this->individu[$this->induk[$i]][$j][$k];
                        $individu_baru[$i + 1][$j][$k] = $this->individu[$this->induk[$i + 1]][$j][$k];
                    }
                }
                
                //Penentuan jadwal baru dai titik pertama sampai titik kedua
                for ($j = $a; $j < $b; $j++) {
                    for ($k = 0; $k < 5; $k++) {
                        $individu_baru[$i][$j][$k]     = $this->individu[$this->induk[$i + 1]][$j][$k];
                        $individu_baru[$i + 1][$j][$k] = $this->individu[$this->induk[$i]][$j][$k];
                    }
                }
                
                //penentuan jadwal baru dari titik kedua sampai akhir
                for ($j = $b; $j < $jumlah_pengampu; $j++) {
                    for ($k = 0; $k < 5; $k++) {
                        $individu_baru[$i][$j][$k]     = $this->individu[$this->induk[$i]][$j][$k];
                        $individu_baru[$i + 1][$j][$k] = $this->individu[$this->induk[$i + 1]][$j][$k];
                    }
                }
            } else { //Ketika nilai random lebih dari nilai probabilitas pertukaran, maka jadwal baru sama dengan jadwal terpilih
                for ($j = 0; $j < $jumlah_pengampu; $j++) {
                    for ($k = 0; $k < 5; $k++) {
                        $individu_baru[$i][$j][$k]     = $this->individu[$this->induk[$i]][$j][$k];
                        $individu_baru[$i + 1][$j][$k] = $this->individu[$this->induk[$i + 1]][$j][$k];
                    }
                }
            }
        }
        
        $jumlah_pengampu = count($this->pengampu);
        
        for ($i = 0; $i < $this->populasi; $i += 2) {
          for ($j = 0; $j < $jumlah_pengampu ; $j++) {
            for ($k = 0; $k < 5; $k++) {
                $this->individu[$i][$j][$k] = $individu_baru[$i][$j][$k];
                $this->individu[$i + 1][$j][$k] = $individu_baru[$i + 1][$j][$k];
            }
          }
        }
    }
    
    public function Mutasi()
    {
        $fitness = array();
        //proses perandoman atau penggantian komponen untuk tiap jadwal baru
        $r       = mt_rand(0, mt_getrandmax() - 1) / mt_getrandmax();
        $jumlah_pengampu = count($this->pengampu);
        $jumlah_jam = count($this->jam);
        $jumlah_hari = count($this->hari);
        
        for ($i = 0; $i < $this->populasi; $i++) {
            //Ketika nilai random kurang dari nilai probalitas Mutasi, 
            //maka terjadi penggantian komponen
            
            if ($r < $this->mutasi) {
                //Penentuan pada matakuliah dan kelas yang mana yang akan dirandomkan atau diganti
                $krom = mt_rand(0, $jumlah_pengampu - 1);

                $jumlah_ruang_reguler = count($this->ruangReguler[$this->prodi[$krom]]);
                
                $j = intval($this->sks[$krom]);

                $this->individu[$i][$krom][4] = $this->kelas[$krom];
                
                switch ($j) {
                    case 1:
                        $this->individu[$i][$krom][1] = mt_rand(0, $jumlah_jam - 1);
                        break;
                    case 2:
                        $this->individu[$i][$krom][1] = mt_rand(0, ($jumlah_jam - 1) - 1);
                        break;
                    case 3:
                        $this->individu[$i][$krom][1] = mt_rand(0, ($jumlah_jam - 1) - 2);
                        break;
                    case 4:
                        $this->individu[$i][$krom][1] = mt_rand(0, ($jumlah_jam - 1) - 3);
                        break;
                }
                //Proses penggantian hari
                if ($this->jenis_kuliah[$krom] === $this->REGULER) {
                    $hari = array_rand($this->kelashariReguler, 1) - 1;
                    $this->individu[$i][$krom][2] = $hari; // Penentuan hari secara acak untuk kelas REGULER    
                    $this->individu[$i][$krom][1] = array_rand($this->admin_models->filterJamSKS($this->jam, $this->range_sholat, $j, $hari));// Penentuan Jam
                }else{
                    $this->individu[$i][$krom][2] = array_rand($this->kelashariNonReguler, 1) - 1; // Penentuan hari secara acak untuk kelas NONREGULER    
                    $this->individu[$i][$krom][1] = array_rand($this->admin_models->filterJamSKS($this->jam, $this->range_sholat, $j));// Penentuan Jam
                }
                
                //proses penggantian ruang               
                // if ($this->jenis_mk[$krom] === $this->TEORI) {
                    // $this->individu[$i][$krom][3] = $this->ruangReguler[mt_rand(0, $jumlah_ruang_reguler - 1)];
                    $this->individu[$i][$krom][3] = intval($this->ruangReguler[$this->prodi[$krom]][mt_rand(0, $jumlah_ruang_reguler - 1)]);
                // } else 
                // if($this->jenis_mk[$krom] === $this->PRAKTIKUM){
                //     $jumlah_ruang_lab = count($this->ruangLaboratorium[$this->prodi[$j]]);
                //     $this->individu[$i][$krom][3] = intval($this->ruangLaboratorium[$this->prodi[$j]][mt_rand(0, $jumlah_ruang_lab - 1)]);   
                // }
                
                
            }
            
            $fitness[$i] = $this->CekFitness($i);
        }
        return $fitness;
    }
    
    
    public function GetIndividu($indv)
    {
        //return individu;
        
        $individu_solusi = array(array());
        
        for ($j = 0; $j < count($this->pengampu); $j++)
        {
            $individu_solusi[$j][0] = intval($this->pengampu[$this->individu[$indv][$j][0]]);
            $individu_solusi[$j][1] = intval($this->jam[$this->individu[$indv][$j][1]]);
            $individu_solusi[$j][2] = intval($this->hari[$this->individu[$indv][$j][2]]['id']);                        
            $individu_solusi[$j][3] = intval($this->individu[$indv][$j][3]);            
            $individu_solusi[$j][4] = $this->individu[$indv][$j][4];
        }
        
        return $individu_solusi;
    }
    
    
}