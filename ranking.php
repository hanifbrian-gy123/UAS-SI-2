<?php 
if (!isset($_GET['id'])){
    header('location:index.php');
}
$title = "Home";
$page = "home";
include_once "layouts/header.php";
$semuaPerhitungan = getAllPerhitungan();

$id_perhitungan=$_GET['id'];
$rowcount = 5;
$bestGuru=($id_perhitungan);
$numsRowAlt=getNumRowsByPerhitunganID($id_perhitungan);
// echo $numsRowAlt

?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Best Guru</h1>
    <?php foreach($semuaPerhitungan as $perhitungan): 
        // var_dump($perhitungan['perhitungan_id']==$id_perhitungan);
        if($perhitungan['perhitungan_id']==$id_perhitungan):
    ?>
    <?php $btkKriteria = getBTByID( $perhitungan['perhitungan_id']); ?>
    <?php $bestAlt = getBestAlt($perhitungan['perhitungan_id'],$btkKriteria)?>
        <h3><?= $perhitungan['title'] ?></h3>
        <h4><?= $perhitungan['keterangan'] ?></h4>
        <table class="table table-bordered">
            <thead>
                <tr class="table-dark">
                    <th scope="col">RANK</th>
                    <th scope="col">Guru Terbaik</th>
                    <th scope="col">Skor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $arrBt=getBTByID($perhitungan['perhitungan_id']);
                $data=getDataDetailPerhitunganByID($perhitungan['perhitungan_id']);
                $guru_dan_lastV=[];
                
                $cmin=[];
                $cmax=[];
                for ($i=1; $i <= count($data[1]); $i++) { 
                    $cmin[]=min(array_column($data,$i));
                    $cmax[]=max(array_column($data,$i));
                }
                foreach ($data as $key=>$value){
                    $nama_guru=getNamaGuruByIDPerhitunganIDA(1,$key);
                    $nilaiA=0;
                    for ($i=1; $i <= count($value); $i++) {
                        $nilaiAperK=(($value[$i]-$cmin[$i-1])/($cmax[$i-1]-$cmin[$i-1]))*$arrBt[$i-1];
                        $nilaiA+=$nilaiAperK;
                    }
                    $guru_dan_lastV[$nama_guru]=$nilaiA;
                }
                arsort($guru_dan_lastV);
                $c=0;
                foreach ($guru_dan_lastV as $guru=>$lastV){$c++;
                    if ($c<=10){
                        echo "<tr class='table-info table-border-primary'><th>$c</th><th>$guru</th><th>$lastV</th></tr>";
                    }else{
                        echo "<tr><td>$c</td><td>$guru</td><td>$lastV</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
        <?php endif?>
    <?php endforeach?>
</div>



<?php
include_once "layouts/footer.php";
?>
