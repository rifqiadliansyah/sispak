<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<?php
$session = session();
if ($session->getFlashdata('success')) {
    echo ' <div class="alert alert-primary" role="alert">' . $session->getFlashdata('success') . '</div>';
}
?>

<h2>Anda tidak memiliki akses</h2>

<?= $this->endSection(); ?>