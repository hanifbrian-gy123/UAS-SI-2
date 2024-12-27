<?php

$title = "perhitungan";
$page = "perhitungan";
include_once "../layouts/header.php";
?>
<div class="container mt-5">
    <h2 class="text-center mb-4">Halaman Perhitungan</h2>
    <!-- <?php print_r($_POST) ?> -->
    <!-- Input Jumlah Kriteria -->
    <form id="criteriaForm" method="POST">

    <?php if(!isset($_POST['perhitunganStart'])): ?>
        <div class="mb-3">
            <label for="titlePerhitungan" class="form-label">Judul Penilaian</label>
            <input type="text" class="form-control" id="titlePerhitungan" name="titlePerhitungan">
        </div>
        <div class="mb-3">
            <label for="ket" class="form-label">Keterangan</label>
            <textarea class="form-control" id="ket" rows="3" name="ket"></textarea>
        </div>
        <!-- TOMBOL SUBMIT START -->
        <?= isset($_POST['perhitunganStart'])?"":"<button type='submit' class='btn btn-success' name='perhitunganStart'>Create now!</button>" ?>

    <?php else:?>


        <?php 
        if (!isset($_POST['doneinsertTabelPerhitungan'])){
            $id_perhitungan=insertTabelPerhitungan($_POST['titlePerhitungan'],$_POST['ket'],1);
            echo "<input type='hidden' name='doneinsertTabelPerhitungan' value='1'>";
        }
        ?>
        <input type="hidden" name="perhitunganStart" value="1">
        <input type="hidden" name="id_perhitungan" value="<?=$id_perhitungan?>" >

        <div class="">
            <label for="jumlahKriteria" class="form-label">Jumlah Kriteria</label>
        </div>
        <div class="mb-4 row g-3">
            <div class="col-3">
                <input <?= isset($_POST['inputKriteria'])?"disabled value='".$_POST['jumlahKriteria']."'":"placeholder='Masukkan jumlah kriteria'" ?> type="number" id="jumlahKriteria" name="jumlahKriteria" class="form-control mb-3" min="1">
            </div>
            <div class="col-auto">
                <!-- TOMBOL SUBMIT M -->
                <?= isset($_POST['inputKriteria'])?"":"<button type='submit' class='btn btn-success' name='inputKriteria'>Next</button>" ?>
            </div>
        </div>


        <?php if(isset($_POST['inputKriteria'])):
        if (isset($_POST['detailKriteria'])){

            $dataNamaKriteria=$_POST['namaKriteria'];
            $dataBobotKriteria=$_POST['bobotKriteria'];
            $totalBobotK=array_sum($dataBobotKriteria);
            if (!isset($_POST['doneinsertK'])){
                $id_perhitungan=$_POST['id_perhitungan'];
                for ($i=0; $i < count($dataBobotKriteria); $i++) { 
                    insertDataK($i+1,$dataNamaKriteria[$i],$dataBobotKriteria[$i],$id_perhitungan);
                }
                echo "<input type='hidden' name='doneinsertK' value='1'>";
            }
        }
        ?>

            <input type="hidden" name="jumlahKriteria" value="<?=$_POST['jumlahKriteria']?>">
            <input type="hidden" name='inputKriteria' value="1">
            <input type='hidden' name='doneinsertTabelPerhitungan' value='1'>
            <input type="hidden" name="id_perhitungan" value="<?=$_POST['id_perhitungan']?>">
            <input type="hidden" name="perhitunganStart" value="1">
            <!-- Input Detail Kriteria -->
                <div id="detailKriteria">
                    <h5>Detail Kriteria</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kriteria</th>
                                <th>Kode</th>
                                <th>Bobot</th>
                                <?php if(isset($_POST['detailKriteria'])): ?>
                                    <th>BT</th>
                                <?php endif?>
                            </tr>
                        </thead>
                        <tbody id="criteriaTableBody">
                            <?php for ($i=0; $i < $_POST['jumlahKriteria']; $i++) {?> 
                                <tr>
                                    <td>
                                        <?= $i+1 ?>
                                    </td>
                                    <td>
                                        <input type="text" <?="name='namaKriteria[$i]'"?> class="form-control" <?=isset($_POST['namaKriteria'])?"value='".$_POST['namaKriteria'][$i]."' disabled":""; ?> <?="placeholder='Masukkan nama kriteria'"?> >
                                    </td>
                                    <td>
                                        <input disabled readonly type="text" <?="name='IDKriteria[$i]'"?> class="form-control" value="<?='K'.$i+1?>" placeholder="Masukkan kode kriteria">
                                    </td>
                                    <td>
                                        <input type="number" <?="name='bobotKriteria[$i]'"?> class="form-control" <?=isset($_POST['bobotKriteria'])?"value='".$_POST['bobotKriteria'][$i]."' disabled":""; ?> <?="placeholder='Masukkan bobot'"?> >
                                    </td>
                                    <?php if(isset($_POST['detailKriteria'])): ?>
                                        <td>
                                            <input disabled type="number" name="BTKriteria[<?=$i?>]" class="form-control" value="<?=$dataBobotKriteria[$i]/$totalBobotK?>" placeholder="Masukkan bobot">
                                        </td>
                                    <?php endif?>
                                </tr>
                            <?php } ?>
                            <?php if(isset($_POST['detailKriteria'])): ?>
                                <tr>
                                    <th colspan="3">Total</th>
                                    <th>
                                        <input type="number" class="form-control" value="<?=$totalBobotK?>" disabled>
                                    </th>
                                    <th>
                                        <input type="number" class="form-control" value="1" disabled>
                                    </th>
                                </tr>
                            <?php endif?>
                        </tbody>
                    </table>
                </div>
                <?= isset($_POST['detailKriteria'])?"":"<button type='submit' class='btn btn-success' name='detailKriteria'>Next »</button>" ?>
        <?php endif?>

        <?php if(isset($_POST['detailKriteria'])):?>
            <input type="hidden" name='inputKriteria' value="1">
            <input type='hidden' name='doneinsertTabelPerhitungan' value='1'>
            <input type="hidden" name="id_perhitungan" value="<?=$_POST['id_perhitungan']?>">
            <input type="hidden" name="perhitunganStart" value="1">
            <input type="hidden" name="detailKriteria" value="1">
            <input type="hidden" name="jumlahKriteria" value="<?=$_POST['jumlahKriteria']?>">
            <input type='hidden' name='doneinsertK' value='1'>
            <?php
            for ($i=0; $i < $_POST['jumlahKriteria']; $i++) { 
                echo "
                <input type='hidden' name='bobotKriteria[$i]' value='".$_POST['bobotKriteria'][$i]."'>
                <input type='hidden' name='namaKriteria[$i]' value='".$_POST['namaKriteria'][$i]."'>
                ";
            }
            ?>
            <div class="">
                <label for="jumlahAlternatif" class="form-label">Jumlah Alternatif</label>
            </div>
            <div class="mb-4 row g-3">
                <div class="col-3">
                    <input <?= isset($_POST['submitJumlahAlternatif'])?"disabled value='".$_POST['jumlahAlternatif']."'":"placeholder='Masukkan jumlah Alternatif'" ?> type="number" id="jumlahAlternatif" name="jumlahAlternatif" class="form-control mb-3" min="1">
                </div>
                <div class="col-auto">
                    <!-- TOMBOL SUBMIT N -->
                    <?= isset($_POST['submitJumlahAlternatif'])?"":"<button type='submit' class='btn btn-success' name='submitJumlahAlternatif'>Next</button>" ?>
                </div>
            </div>
        <?php endif?>

        <?php if(isset($_POST['submitJumlahAlternatif'])):
            $jumlahAlternatif=$_POST['jumlahAlternatif'];
        ?>
            <input type="hidden" name='inputKriteria' value="1">
            <input type='hidden' name='doneinsertTabelPerhitungan' value='1'>
            <input type="hidden" name="id_perhitungan" value="<?=$_POST['id_perhitungan']?>">
            <input type="hidden" name="perhitunganStart" value="1">
            <input type="hidden" name="detailKriteria" value="1">
            <input type="hidden" name="submitJumlahAlternatif" value="1">
            <input type="hidden" name="jumlahAlternatif" value="<?=$_POST['jumlahAlternatif']?>">
            <div id="penilaianAlternatif">
                <h5>Penilaian Alternatif</h5>
                
                <?php
                        // if (!isset($_POST['doneinsertTabelPerhitungan'])){
                        //     $id_perhitungan=insertTabelPerhitungan($_POST['titlePerhitungan'],$_POST['ket'],1);
                        //     echo "<input type='hidden' name='doneinsertTabelPerhitungan' value='1'>";
                        //
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Alternatif</th>
                            <th>Kode</th>
                            <?php for ($j=0;$j<count($dataBobotKriteria);$j++): ?>
                                <th>K<?= $j+1 ?></th>
                            <?php endfor?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i=0; $i < $jumlahAlternatif; $i++) {?> 
                            <tr>
                                <td>
                                    <?=$i+1?>
                                </td>
                                <td>
                                    <input type="text" <?="name='namaAlternatif[$i]'"?> class="form-control" <?=isset($_POST['namaAlternatif'])?"value='".$_POST['namaAlternatif'][$i]."' disabled":""; ?> <?="placeholder='nama guru'"?> >
                                </td>
                                <td>
                                    <input disabled readonly type="text" <?="name='IDAlternatif[$i]'"?> class="form-control" value="<?='A'.$i+1?>">
                                </td>
                                <?php for ($j=0;$j<count($dataBobotKriteria);$j++):?>
                                    <td>
                                    <input type="number" <?="name='nilaiA[$i][$j]'"?> class="form-control" <?=isset($_POST['nilaiA'])?"value='".$_POST['nilaiA'][$i][$j]."' disabled":""; ?> <?="placeholder='Nilai...'"?> >
                                    </td>
                                <?php endfor?>
                            </tr>
                        <?php } ?>
                        <?php if(isset($_POST['namaAlternatif'])): ?>
                            <tr>
                                <th colspan="3">Cmax</th>
                                    <?php for($i=0;$i<count($dataBobotKriteria);$i++) :$colomMax=max(array_column($_POST['nilaiA'],$i))?>
                                        <th>
                                            <input type="number" class="form-control" value="<?=$colomMax?>" disabled>
                                        </th>
                                    <?php endfor?>
                                <th>
                            </tr>
                            <tr>
                                <th colspan="3">Cmin</th>
                                    <?php for($i=0;$i<count($dataBobotKriteria);$i++) :$colomMin=min(array_column($_POST['nilaiA'],$i))?>
                                        <th>
                                            <input type="number" class="form-control" value="<?=$colomMin?>" disabled>
                                        </th>
                                    <?php endfor?>
                                <th>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
            <?= isset($_POST['penilaianAlternatif'])?"":"<button type='submit' class='btn btn-success' name='penilaianAlternatif'>Next »</button>" ?>
        <?php endif?>
        <?php if(isset($_POST['penilaianAlternatif'])):
            foreach ($_POST['nilaiA'] as $key=>$value){
                $a=(int)$key+1;
                foreach ($value as $j=>$innerValue){
                    $b=(int)$j+1;
                    $enr_id=$a.'#'.$b;
                    insertDetailPerhitungan($enr_id,$innerValue,$_POST['id_perhitungan']);
                }
                insertDataA($a,$_POST['namaAlternatif'][$key],$_POST['id_perhitungan']);
            }
        ?>
        <a href="../ranking.php?id=<?=$_POST['id_perhitungan']?>" class='btn btn-success px-4 py-5' type="button">LIHAT HASIL AKHIR</a>

            <!-- <h5>HASIL AKHIR</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Alternatif</th>
                        <th>Kode</th>
                        <?php for ($j=0;$j<count($dataBobotKriteria);$j++): ?>
                            <th>K<?= $j+1 ?></th>
                        <?php endfor?>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="criteriaTableBody">
                    <?php for ($i=0; $i < $jumlahAlternatif; $i++) {$hasilAkhir=0;?>
                        <tr>
                            <td>
                                <?=$i+1?>
                            </td>
                            <td>
                                <input type="text" <?="name='namaAlternatif[$i]'"?> class="form-control" <?=isset($_POST['namaAlternatif'])?"value='".$_POST['namaAlternatif'][$i]."' disabled":""; ?> <?="placeholder='nama guru'"?> >
                            </td>
                            <td>
                                <input disabled readonly type="text" <?="name='IDAlternatif[$i]'"?> class="form-control" value="<?='A'.$i+1?>">
                            </td>
                            <?php for ($j=0;$j<count($dataBobotKriteria);$j++):
                            $colomMax=max(array_column($_POST['nilaiA'],$j));
                            $colomMin=min(array_column($_POST['nilaiA'],$j));
                            $utility=((int)($_POST['nilaiA'][$i][$j])-$colomMin)/($colomMax-$colomMin);
                            $bt=$dataBobotKriteria[$j]/$totalBobotK;
                            $hasilAkhir+=$utility*$bt;
                            ?>
                                <td>
                                <input type="number" <?="name='nilaiA[$i][$j]'"?> class="form-control" <?=isset($_POST['nilaiA'])?"value='".$utility*$bt."' disabled":""; ?> <?="placeholder='Nilai...'"?> >
                                </td>
                                <?php endfor?>
                            <td>
                                <?= $hasilAkhir ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <h5>Perangkingan Guru</h5>
            <?php
            $dataDetailPerhitungan=getDataDetailPerhitunganByID($_POST['id_perhitungan']);
            foreach ($dataDetailPerhitungan as $key=>$value){
                echo "$key - ";print_r($value);echo "<br>";
            }
            for ($i=0; $i < $jumlahAlternatif; $i++):
            ?>
            <table class="table">
                <thead>
                    <tr><th>#</th><th>Nama Guru</th><th>nilai_akhir</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $i+1 ?></td>

                    </tr>
                    <?php endfor?>
                </tbody>
            </table> -->

        <?php endif?>
    <?php endif?>
        <!-- Submit -->
        <div class="d-grid mt-4">
            <!-- <button type="submit" class="btn btn-primary">Let go</button> -->
        </div>
    </form>
</div>