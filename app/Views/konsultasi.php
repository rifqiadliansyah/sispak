<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<style>
    body {
        padding: 0;
        font-family: 'Source Sans Pro', sans-serif;
        margin: 0;
        overflow-x: hidden;
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 20px;
        padding: 20px;
    }

    h1 {
        color: #008000;
        margin-top: 20px;
        font-family: 'Arial', sans-serif;
        font-weight: bold;
        font-size: 36px;
    }

    p {
        margin-bottom: 30px;
        font-family: 'Calibri', sans-serif;
        font-size: 18px;
        line-height: 1.5;
    }

    .card {
        width: calc(50% - 20px);
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .head-card img {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }

    .body-card {
        padding: 15px;
    }

    .body-card h1 {
        margin: 0;
    }

    .body-card p {
        margin: 8px 0;
    }
</style>

<?php
$session = session();
if ($session->getFlashdata('success')) {
    echo ' <div class="alert alert-primary" role="alert">' . $session->getFlashdata('success') . '</div>';
}
?>

<div class="container">
    <?php
    $session = session();
    if ($session->getFlashdata('success')) {
        echo '<div class="alert alert-primary" role="alert">' . $session->getFlashdata('success') . '</div>';
    }
    ?>

    <h1>Konsultasi Lanjutan</h1>
    <p>Halaman ini ditujukan sebagai rekomendasi RS rujukan bagi anda jika ingin melakukan pengecekan agar mendapatkan informasi lebih akurat dan penanganan lebih lanjut terkait keluhan penyakit yang diderita</p>

    <div class="card">
        <div class="head-card">
            <img src="https://www.rsuripsumoharjo.com/asset/img/slider2.jpg" alt="RS Urip Sumoharjo">
        </div>
        <div class="body-card">
            <h2>Rumah Sakit Urip Sumoharjo</h2>
            <p>Alamat: No.200, Jl. Urip Sumoharjo, Gn. Sulah, Way Halim, Kota Bandar Lampung, Lampung</p>
            <p>Kontak: (021) 123-4567</p>
            <div class="card-buttons">
                <button class="button button-maps" onclick="petunjukMaps('-5.39124010,105.27645200')">Petunjuk Maps</button>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="head-card">
            <img src="https://api.covid19.lampungprov.go.id/img/rs/1585377907284.jpg" alt="RS Abdul Moeloek">
        </div>
        <div class="body-card">
            <h2>Rumah Sakit Abdul Moeloek</h2>
            <p>Alamat: Jl. Dr. Rivai No.6, Penengahan, Kec. Tj. Karang Pusat, Kota Bandar Lampung, Lampung 35112, Indonesia</p>
            <p>Kontak: 0811 7270 537</p>
            <div class="card-buttons">
                <button class="button button-maps" onclick="petunjukMaps('-5.4051911,105.2525514')">Petunjuk Maps</button>
            </div>
        </div>
    </div>
</div>

<script>
    function petunjukMaps(koordinat) {
        window.location.href = 'https://www.google.com/maps/dir/?api=1&destination=' + koordinat;
    }
</script>

<?= $this->endSection(); ?>