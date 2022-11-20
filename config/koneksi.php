<?php 
@session_start();
	Class databaseMysqli{
public $host = "localhost";
private $username = "root";
private $password = "ikanasin";
private $dbName;
private $mysqli;
public function __Construct($db){
    $this->dbName = $db;
    $this->bukaKoneksi();
    }
public function bukaKoneksi(){
    $this->mysqli = new mysqli($this->host,$this->username,$this->password,$this->dbName);
    }

public function tampilData($tabel){
    $result = $this->mysqli->query("SELECT * FROM $tabel") or die ('Tidak Ada Tabel!');
    return $result;
    }

public function tampilData2($view,$tabel){
    $result = $this->mysqli->query("SELECT $view FROM $tabel") or die ('Tidak Ada Tabel!');
    return $result;
    }

public function login($panggil, $tabel, $where){
    $result = $this->mysqli->prepare("SELECT $panggil FROM $tabel WHERE $where") or die ('Tidak Ada Tabel!');
    return $result;
    }
    
public function lihatData($tabel,$field,$where, $cari){
    $result = $this->mysqli->query("SELECT $field as tampil FROM $tabel WHERE $where = '$cari'") or die ('Gagal Lihat!');
    $row = $result->fetch_array();
    return $row['tampil'];
    mysqli_free_result($result);
    }

public function lihatData2($tabel,$field,$where){
    $result = $this->mysqli->query("SELECT $field as tampil FROM $tabel WHERE $where") or die ('Gagal!');
    $row = $result->fetch_array();
    return $row['tampil'];
    mysqli_free_result($result);
    }

public function lihatData3($tabel,$field,$where, $cari){
    $result = $this->mysqli->query("SELECT $field as tampil FROM $tabel WHERE $where like '%$cari%'") or die ('Gagal!');
    $row = $result->fetch_array();
    return $row['tampil'];
    mysqli_free_result($result);
    }

public function insertData($tabel,$field,$isi){
    $result = $this->mysqli->query("INSERT INTO $tabel ($field) VALUES ($isi)") or die ('Gagal Insert!');
    return $result;
    }

public function insertData2($tabel, $isi){
    $result = $this->mysqli->query("INSERT INTO $tabel VALUES ($isi)") or die ('Gagal Insert!');
    return $result;
    }

public function updateData($tabel, $isi, $where, $nilai){
    $result = $this->mysqli->query("update $tabel set $isi where $where ='$nilai'") or die ('Gagal Update!');
    return $result;
    }

public function deleteData($tabel, $where, $nilai){
    $result = $this->mysqli->query("delete from $tabel where $where = '$nilai'") or die ('Gagal Insert!');
    return $result;
    }

public function bebas($isi){
    $result = $this->mysqli->query("$isi") or die ('Tidak Ada Tabel!');
    return $result;
}

public function alert($pesan,$link){
    $result = "<script type='text/javascript'>alert('$pesan');
        window.location.href='$link';</script>";
    return $result;
}

public function hitungrow($tabel){
    $result = $this->mysqli->query("SELECT * FROM $tabel") or die ('Tidak Ada Tabel!');
    $result = $result->num_rows;
    return $result;    
}

public function enscape($isi)
    { //mengamankan login
        $result = $this->mysqli->real_escape_string("$isi");
        return $result;
    }

public function umur($tanggal_lahir,$tglkematian) {
	$birthDate = new DateTime($tanggal_lahir);
	if ($tglkematian == null) {
		$today = new DateTime("today");
	}else{
		$today = new DateTime($tglkematian);
	} 
	// $today = new DateTime("today");
	
	if ($birthDate > $today) { 
	    exit("0 tahun 0 bulan 0 hari");
	}
	$y = $today->diff($birthDate)->y;
	// $m = $today->diff($birthDate)->m;
	// $d = $today->diff($birthDate)->d;
	// return $y." tahun ".$m." bulan ".$d." hari";
	return $y." tahun";
}

}
  // Nama Database
  $db = new databaseMysqli('db_silsilahku');

  $server_set = $_SERVER['HTTP_HOST'];

  @define('WEB_ROOT', "http://silsilahku.belum");
  $url = explode("/",$_SERVER["REQUEST_URI"]);

	$req1   = $url[0];
	$req2   = $url[1];
	@$req3   = $url[2];
	@$req4   = $url[3];
	@$req5   = $url[4];
	@$req6   = $url[5];
	@$req7   = $url[6];
	@$req8   = $url[7];
	@$req9   = $url[8];
	@$req10   = $url[9];
	@$req11   = $url[9];
	@$req12   = $url[10];
	@$req13   = $url[11];


// Pengaturan Tanggal
    function hari_indo($tgl){
        $getHari = conHari(date('D', strtotime($tgl)));

        return $getHari;
    }
    
    function conHari($hari){ 
         switch($hari){
          case 'Sun':
           $getHari = "Minggu";
          break;
          case 'Mon': 
           $getHari = "Senin";
          break;
          case 'Tue':
           $getHari = "Selasa";
          break;
          case 'Wed':
           $getHari = "Rabu";
          break;
          case 'Thu':
           $getHari = "Kamis";
          break;
          case 'Fri':
           $getHari = "Jumat";
          break;
          case 'Sat':
           $getHari = "Sabtu";
          break;
          default:
           $getHari = "Salah"; 
          break;
         }
         
         return $getHari;
        }
    function tgl_indo($tgl){
            $tanggal = substr($tgl,8,2);
            $bulan = getBulan(substr($tgl,5,2));
            $tahun = substr($tgl,0,4);
            return $tanggal.' '.$bulan.' '.$tahun;       
    }   

    function getBulan($bln){
                switch ($bln){
                    case 1: 
                        return "Januari";
                        break;
                    case 2:
                        return "Februari";
                        break;
                    case 3:
                        return "Maret";
                        break;
                    case 4:
                        return "April";
                        break;
                    case 5:
                        return "Mei";
                        break;
                    case 6:
                        return "Juni";
                        break;
                    case 7:
                        return "Juli";
                        break;
                    case 8:
                        return "Agustus";
                        break;
                    case 9:
                        return "September";
                        break;
                    case 10:
                        return "Oktober";
                        break;
                    case 11:
                        return "November";
                        break;
                    case 12:
                        return "Desember";
                        break;
                }
            }
