<?php
include "../../utils/database.php";
include "../../class/Barang.php";
include "../../class/Pengguna.php";

$barang = (new Barang($db))->findById($_GET["id"]);
$daftarPengguna = (new Pengguna($db))->all();

?>

<?php include "../../templates/header.php" ?>


<div class="card-header">
    <h1 class="fs-3">Edit Barang</h1>
</div>

<div class="card-body">
    <a href="index.php" class="btn btn-outline-secondary btn-sm mb-3">Kembali</a>


    <?php if ($barang) : ?>
        <form action="../../controller/barang/Barang_Update.php?id=<?= $barang["IdBarang"] ?>" method="post">

            <div class="mb-3">
                <label for="NamaBarang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" value="<?= $barang["NamaBarang"] ?>">
            </div>
            <div class="mb-3">
                <label for="Keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="Keterangan" name="Keterangan" value="<?= $barang["Keterangan"] ?>">
            </div>
            <div class="mb-3">
                <label for="Satuan" class="form-label">Satuan</label>
                <input type="text" class="form-control" id="Satuan" name="Satuan" value="<?= $barang["Satuan"] ?>">
            </div>
            <div class="mb-3">
                <label for="IdPengguna" class="form-label">Pengguna</label>
                <select class="form-control" id="IdPengguna" name="IdPengguna">
                    <?php foreach ($daftarPengguna as $data) : ?>
                        <option value="<?= $data['IdPengguna'] ?>" <?php if ($barang["IdPengguna"] == $data['IdPengguna']) echo "selected" ?>><?= $data['NamaPengguna'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>


            <button type="submit" name="update" value="update" class="btn btn-primary">Simpan</button>
        </form>
    <?php else : ?>
        <p class="text-body-secondary">Data tidak ditemukan</p>
    <?php endif ?>
</div>

<?php include "../../templates/footer.php"; ?>