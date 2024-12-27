<?php
$title = "Home";
$page = "home";
include_once "layouts/header.php";
?>

<div class="container mt-4">
    <h1 class="text-center">Selamat Datang di Sistem Pendukung Keputusan</h1>
    <p class="text-center">Gunakan sistem ini untuk menentukan guru terbaik dengan metode SMART.</p>
    <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Mulai Perhitungan</h5>
                    <p class="card-text"></p>
                    <a href="./perhitungan/index.php" class="btn btn-primary">Masuk</a>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<?php
include_once "layouts/footer.php";
?>

