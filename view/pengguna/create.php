<?php

include "../../utils/database.php";
include "../../class/HakAkses.php";

$daftarHakAkses = (new HakAkses($db))->all();

?>

<?php include "../../templates/header.php" ?>

<div class="card-header">
    <h1 class="fs-3">Tambah Pengguna</h1>
</div>

<div class="card-body">
    <a href="index.php" class="btn btn-outline-secondary btn-sm mb-3">Kembali</a>

    <form action="../../controller/pengguna/Pengguna_Store.php" method="post">

        <div class="mb-3">
            <label for="NamaPengguna" class="form-label">Nama Pengguna</label>
            <input type="text" class="form-control" id="NamaPengguna" name="NamaPengguna">
        </div>

        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="Password" name="Password">
        </div>

        <div class="mb-3">
            <label for="NamaDepan" class="form-label">Nama Depan</label>
            <input type="text" class="form-control" id="NamaDepan" name="NamaDepan">
        </div>

        <div class="mb-3">
            <label for="NamaBelakang" class="form-label">Nama Belakang</label>
            <input type="text" class="form-control" id="NamaBelakang" name="NamaBelakang">
        </div>

        <div class="mb-3">
            <label for="NoHP" class="form-label">No HP</label>
            <input type="text" class="form-control" id="NoHP" name="NoHP">
        </div>

        <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="Alamat" name="Alamat">
        </div>

        <div class="mb-3">
            <label for="IdAkses" class="form-label">Hak Akses</label>
            <select class="form-select" id="IdAkses" name="IdAkses">
                <?php foreach ($daftarHakAkses as $data) : ?>
                    <option value="<?= $data['IdAkses'] ?>"><?= $data['NamaAkses'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <button type="submit" name="store" value="store" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php include "../../templates/footer.php"; ?>