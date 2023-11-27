<?= $this->extend('layouts/adminTemplate'); ?>

<?= $this->section('content'); ?>

<?php
$session = session();
if ($session->getFlashdata('success')) {
    echo ' <div class="alert alert-primary" role="alert">' . $session->getFlashdata('success') . '</div>';
}
?>

<div class="container mt-5">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Benjolan</th>
                <th scope="col">Demam</th>
                <th scope="col">Keringat</th>
                <th scope="col">Sakit Tenggorokan</th>
                <th scope="col">Pilek</th>
                <th scope="col">Lelah</th>
                <th scope="col">Gatal</th>
                <th scope="col">Sesak</th>
                <th scope="col">Simpulan</th>
                <th scope="col">Nama Pengguna</th>
                <th scope="col">Waktu Pengecekan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gejala as $key => $row) : ?>
                <tr>
                    <th scope="row"><?= $key + 1; ?></th>
                    <td><?= $row['benjolan'] == 1 ? 'Ya' : 'Tidak'; ?></td>
                    <td><?= $row['demam'] == 1 ? 'Ya' : 'Tidak'; ?></td>
                    <td><?= $row['keringat'] == 1 ? 'Ya' : 'Tidak'; ?></td>
                    <td><?= $row['sakitTenggorokan'] == 1 ? 'Ya' : 'Tidak'; ?></td>
                    <td><?= $row['pilek'] == 1 ? 'Ya' : 'Tidak'; ?></td>
                    <td><?= $row['lelah'] == 1 ? 'Ya' : 'Tidak'; ?></td>
                    <td><?= $row['gatal'] == 1 ? 'Ya' : 'Tidak'; ?></td>
                    <td><?= $row['sesak'] == 1 ? 'Ya' : 'Tidak'; ?></td>
                    <td><?= $row['hasil']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['timeCustom']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>






<?= $this->endSection(); ?>