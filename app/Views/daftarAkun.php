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
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Role</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach ($akun as $row): ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['role']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?= $this->endSection(); ?>