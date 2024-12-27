<?php 
include_once "config.php";
function insertTabelPerhitungan($title,$ket,$user_id){
  $query=
  "INSERT INTO perhitungan
  (perhitungan_id, title, keterangan, user_id, created_at) VALUES 
  (null,'$title','$ket','$user_id',null)
  ";
  $res=DB->query($query);
  return DB->insert_id;
}

function insertDataK($kriteria_id,$nama_kriteria,$bobot,$perhitungan_id){
  $query=
  "INSERT INTO kriteria
  (kriteria_id, nama_kriteria, bobot, perhitungan_id) VALUES 
  ('$kriteria_id','$nama_kriteria','$bobot','$perhitungan_id')
  ";
  return DB->query($query);
}

function insertDataA($id_alternatif,$nama_alternatif,$id_perhitungan){
  $query=
  "INSERT INTO alternatif(alternatif_id, nama_alternatif, perhitungan_id) VALUES ('$id_alternatif','$nama_alternatif','$id_perhitungan')";
  return DB->query($query);
}

function insertDetailPerhitungan($enr_id,$innerValue,$id_perhitungan){
  $query=
  "INSERT INTO detail_perhitungan
(enroll_id, nilai_akhir, perhitungan_id) VALUES
('$enr_id','$innerValue','$id_perhitungan');
  ";
  return DB->query($query);
}


function getNamaGuruByIDPerhitunganIDA($id_perhitungan,$id_alternatif){
  $query=
  "SELECT nama_alternatif from alternatif where perhitungan_id=$id_perhitungan AND alternatif_id=$id_alternatif;
  ";
  $query=DB->query($query);
  return $query->fetch_assoc()['nama_alternatif'];
}

function getDataDetailPerhitunganByID($id_perhitungan){
  $query=
  "SELECT * from detail_perhitungan where perhitungan_id=$id_perhitungan;
  ";
  $query=DB->query($query);
  $res=[];
  // $c_row=0;
  while ($row=$query->fetch_assoc()) {
    $enroll_id_arr=explode('#',$row['enroll_id']);
    $a=$enroll_id_arr[0];
    $k=$enroll_id_arr[1];
    // $nama_guru=getNamaGuruByIDPerhitunganIDA($id_perhitungan,$a);
    $res[$a][$k]=$row['nilai_akhir'];
    // $c_row++;
  }
  ksort($res);
  return $res;
}

function getBTByID($perhitungan_id){
  $query=
  "SELECT bobot FROM kriteria where perhitungan_id='$perhitungan_id' order by kriteria_id
  ";
  $query=DB->query($query);
  $res=[];
  while ($row=$query->fetch_assoc()) {
      $res[]=$row['bobot'];
  }
  $total=array_sum($res);
  // print_r($res);
  $ress=[];
  for ($i=0; $i < count($res); $i++) { 
      $ress[]=$res[$i]/$total;
  }
  return $ress;
}


// Fungsi untuk menyiapkan dan menjalankan query
function executeQuery($query, $params = []) {
  $stmt = mysqli_prepare(DB, $query);
  if ($params) {
      $types = str_repeat("s", count($params));
      mysqli_stmt_bind_param($stmt, $types, ...$params);
  }
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  return $result;
}

//------------------------------- Start User ------------------------------------------

function getAllenroll($id) {
  $query = "SELECT * FROM detail_perhitungan WHERE perhitungan_id = ?";
  $result = executeQuery($query, [$id]);
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getMaxKrit($id, $kritId) {
  $allenroll = getAllenroll($id);
  $hasil = 0;
  foreach ($allenroll as $pk) {
      $ak = explode('#', $pk['enroll_id']);
      if ($ak[1] == $kritId) {
          if ($pk['nilai_akhir'] > $hasil) {
              $hasil = $pk['nilai_akhir'];
          }
      }
  }
  return $hasil;
}

function getMinKrit($id, $kritId) {
  $allenroll = getAllenroll($id);
  $hasil = getMaxKrit($id, $kritId);
  foreach ($allenroll as $pk) {
      $ak = explode('#', $pk['enroll_id']);
      if ($ak[1] == $kritId) {
          if ($pk['nilai_akhir'] < $hasil) {
              $hasil = $pk['nilai_akhir'];
          }
      }
  }
  return $hasil;
}

function getOneUtil($id, $row_enroll) {
  $ak = explode('#', $row_enroll['enroll_id']);
  $max = getMaxKrit($id, $ak[1]);
  $min = getMinKrit($id, $ak[1]);
  $util = ($row_enroll['nilai_akhir'] - $min) / ($max - $min);
  return $util;
}

function getAllNilaiAkhir($id, $btkKriteria) {
  $value = [];
  $allenroll = getAllenroll($id);
  $temp = 0;
  foreach ($allenroll as $row_enroll) {
      $util = getOneUtil($id, $row_enroll);
      $norm = $btkKriteria[$temp];
      $value[] = $util * $norm;
      if ($temp == count($btkKriteria) - 1) {
          $temp = 0;
      } else {
          $temp++;
      }
  }
  return $value;
}

function getAllPerhitungan() {
  $query = "SELECT * FROM perhitungan";
  $result = executeQuery($query);
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function countAlt($id) {
  $query = "SELECT * FROM alternatif WHERE perhitungan_id = ?";
  $result = executeQuery($query, [$id]);
  return mysqli_num_rows($result);
}

function countKrit($id) {
  $query = "SELECT * FROM kriteria WHERE perhitungan_id = ?";
  $result = executeQuery($query, [$id]);
  return mysqli_num_rows($result);
}

function getOneAlternatif($alt_id, $perhitungan_id) {
  $query = "SELECT * FROM alternatif WHERE alternatif_id = ? AND perhitungan_id = ?";
  $result = executeQuery($query, [$alt_id, $perhitungan_id]);
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getBestAlt($id, $btkKriteria) {
  $array = getAllNilaiAkhir($id, $btkKriteria);
  $list = [];
  $indeks = 0;

  // Hitung jumlah alternatif
  $jumlahAlt = countAlt($id);
  $jumlahKrit = countKrit($id);

  for ($i = 0; $i < $jumlahAlt; $i++) {
      $data = [];
      $jml = 0;
      for ($j = 0; $j <= $jumlahKrit; $j++) {
          if ($j == $jumlahKrit) {
              $data[] = $jml;
          } else {
              $jml += $array[$indeks];
              $data[] = $array[$indeks];
              $indeks++;
          }
      }
      $list[] = $data;
  }

  $idArray = [];
  for ($i = 0; $i < $jumlahAlt; $i++) {
      $idArray[] = $i + 1;
  }

  // Ambil elemen terakhir dari setiap sub-array di $list
  $last_values = array_map(function($arr) {
      return end($arr);
  }, $list);

  // Pastikan ukuran $last_values, $list, dan $idArray konsisten
  if (count($last_values) === count($list) && count($list) === count($idArray)) {
      // Urutkan array berdasarkan elemen terakhir secara descending
      array_multisort($last_values, SORT_DESC, $list, $idArray);
  } else {
      throw new Exception("Array sizes are inconsistent.");
  }

  return [$list, $idArray];
}

function getNumRowsByPerhitunganID($id_perhitungan){
  $query=
  "SELECT * FROM alternatif where perhitungan_id=$id_perhitungan";
  return DB->query($query)->num_rows;
}

?>