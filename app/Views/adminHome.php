<?= $this->extend('layouts/adminTemplate'); ?>

<?= $this->section('content'); ?>

<?php
$session = session();
if ($session->getFlashdata('success')) {
    echo ' <div class="alert alert-primary" role="alert">' . $session->getFlashdata('success') . '</div>';
}
?>

<div>
    <h1 >Selamat Datang di Dashboard Admin</h1>
</div>

<?= $this->endSection(); ?>