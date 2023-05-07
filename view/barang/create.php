<?php

include "../../utils/database.php";
include "../../class/Barang.php";
include "../../class/Pengguna.php";


$daftarBarang = (new Barang($db))->all();
$daftarPengguna = (new Pengguna($db))->all();

?>

<?php include "../../templates/header.php" ?>

<div class="card-header">
    <h1 class="fs-3">Tambah Barang</h1>
</div>

<div class="card-body">
    <a href="index.php" class="btn btn-outline-secondary btn-sm mb-3">Kembali</a>

    <form action="../../controller/barang/Barang_Store.php" method="post">

        <div class="mb-3">
            <label for="NamaBarang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="NamaBarang" name="NamaBarang">
        </div>

        <div class="mb-3">
            <label for="Keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="Keterangan" name="Keterangan">
        </div>

        <div class="mb-3">
            <label for="Satuan" class="form-label">Satuan</label>
            <input type="text" class="form-control" id="Satuan" name="Satuan">
        </div>

        <div class="mb-3">
            <label for="IdPengguna" class="form-label">Pengguna</label>
            <select class="form-select" id="IdPengguna" name="IdPengguna">
                <?php foreach ($daftarPengguna as $data) : ?>
                    <option value="<?= $data['IdPengguna'] ?>"><?= $data['NamaPengguna'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <button type="submit" name="store" value="store" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php include "../../templates/footer.php"; ?>