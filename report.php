<?php 

require_once('database.php');

// $id_perhitungan = $_GET['id'] ?? 1 ;
$semuaPerhitungan = getAllPerhitungan();


$title = "Home";
$page = "home";
include_once "layouts/header.php";

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judul Perhitungan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Report</h1>
        <?php foreach($semuaPerhitungan as $perhitungan):echo"<br><br><hr><hr>" ?>
        <?php $btkKriteria = getBTByID( $perhitungan['perhitungan_id']);
                $data=getDataDetailPerhitunganByID($perhitungan['perhitungan_id']);
                $guru_dan_lastV=[];
                $cmin=[];
                $cmax=[];
                for ($i=1; $i <= count($data[1]); $i++) { 
                    $cmin[]=min(array_column($data,$i));
                    $cmax[]=max(array_column($data,$i));
                }
                $allNilaiAkhir = getAllNilaiAkhir($perhitungan['perhitungan_id'],$btkKriteria); ?>
        <?php $bestAlt = getBestAlt($perhitungan['perhitungan_id'],$btkKriteria); ?>
            <h3><?= $perhitungan['title'] ?></h3>
            <h4><?= $perhitungan['keterangan'] ?></h4>
            <a href="ranking.php?id=<?=$perhitungan['perhitungan_id'];?>" class="btn btn-primary" type="button">Lihat Hasil</a>
            <table class="table table-bordered">
                <?php 
                $total=0;
                ?>
                <thead>
                    <tr>
                        <th scope="col">Nama Guru</th>
                        <?php for ($i=0;$i<count($data[1]);$i++):?>
                            <th scope="col">K<?= $i+1 ?></th>
                        <?php endfor?>
                        <th scope="col">Nilai_akhir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key=>$value):
                        $nama_guru=getNamaGuruByIDPerhitunganIDA($perhitungan['perhitungan_id'],$key);
                        $nilaiA=0;
                        ?>
                        <tr>
                        <td><?= $nama_guru ?></td>
                        <?php for ($i=1;$i<=count($value);$i++): 
                            $nilaiAperK=(($value[$i]-$cmin[$i-1])/($cmax[$i-1]-$cmin[$i-1]))*$btkKriteria[$i-1];
                            $nilaiA+=$nilaiAperK;
                            ?>
                            <td><?= round($nilaiA,4) ?></td>
                        <?php endfor?>
                        <td><?= $nilaiA ?></td>
                        </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        <?php endforeach ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include_once "layouts/footer.php";
?>
