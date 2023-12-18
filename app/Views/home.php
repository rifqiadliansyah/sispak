<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<?php
$session = session();
if ($session->getFlashdata('success')) {
    echo ' <div class="alert alert-primary" role="alert">' . $session->getFlashdata('success') . '</div>';
}
?>

<div class="card">
    <div class="card-header text-center" style="background-color: #f8f9fa; color: #008000; padding: 10px; font-family: 'Helvetica', sans-serif; font-size: 24px; font-weight: bold;">
        Sistem Pakar Deteksi Kanker/Infeksi Kelenjar Getah Bening
    </div>
    <div class="card-body">
        <div>
            <p>
                Silakan lakukan pemeriksaan apakah Anda mengidap kanker atau infeksi kelenjar getah bening
                dengan menjawab pertanyaan-pertanyaan berikut!
            </p>
        </div>
        <form action="/cekHasil" method="POST" style="margin-left: 20px;margin-top: 30px;">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">1) Apakah Ada Benjolan Terasa Nyeri?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="benjolan" id="benjolan1" value="1">
                    <label class="form-check-label" for="benjolan1">
                        Ya
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="benjolan" id="benjolan2" checked value="0">
                    <label class="form-check-label" for="benjolan2">
                        Tidak
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">2) Apakah Ada Demam?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="demam" id="demam1" value="1">
                    <label class="form-check-label" for="demam1">
                        Ya
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="demam" id="demam2" checked value="0">
                    <label class="form-check-label" for="demam2">
                        Tidak
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">3) Apakah Ada Berkeringat Di Malam Hari?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="keringat" id="keringat1" value="1">
                    <label class="form-check-label" for="keringat1">
                        Ya
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="keringat" id="keringat2" checked value="0">
                    <label class="form-check-label" for="keringat2">
                        Tidak
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">4) Apakah anda Sakit Tenggorokan?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sakitTenggorokan" id="sakitTenggorokan1" value="1">
                    <label class="form-check-label" for="sakitTenggorokan1">
                        Ya
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sakitTenggorokan" id="sakitTenggorokan2" checked value="0">
                    <label class="form-check-label" for="sakitTenggorokan2">
                        Tidak
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">5) Apakah anda Pilek?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pilek" id="pilek1" value="1">
                    <label class="form-check-label" for="pilek1">
                        Ya
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pilek" id="pilek2" checked value="0">
                    <label class="form-check-label" for="pilek2">
                        Tidak
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">6) Apakah anda selalu merasa kelelahan?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="lelah" id="lelah1" value="1">
                    <label class="form-check-label" for="lelah1">
                        Ya
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="lelah" id="lelah2" checked value="0">
                    <label class="form-check-label" for="lelah2">
                        Tidak
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">7) Apakah kulit anda gatal?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gatal" id="gatal1" value="1">
                    <label class="form-check-label" for="gatal1">
                        Ya
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gatal" id="gatal2" checked value="0">
                    <label class="form-check-label" for="gatal2">
                        Tidak
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">8) Apakah anda Sesak?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sesak" id="sesak1" value="1">
                    <label class="form-check-label" for="sesak1">
                        Ya
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sesak" id="sesak2" checked value="0">
                    <label class="form-check-label" for="sesak2">
                        Tidak
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">9) Apakah berat badan anda turun tanpa alasan jelas?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="penurunanBerat" id="penurunanBerat1" value="1">
                    <label class="form-check-label" for="penurunanBerat1">
                        Ya
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="penurunanBerat" id="penurunanBerat2" checked value="0">
                    <label class="form-check-label" for="penurunanBerat2">
                        Tidak
                    </label>
                </div>
            </div>
            <div class="mt-5">
                <p>
                    Tekan submit untuk melihat hasil!
                </p>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="card-footer text-light text-center bg-success">
        Ilmu Komputer Universitas Lampung
    </div>
</div>


<?= $this->endSection(); ?>