<?php
include "../../utils/database.php";
include "../../class/Penjualan.php";
include "../../class/Pengguna.php";
include "../../class/Barang.php";
include "../../class/Pelanggan.php";

$penjualan = (new Penjualan($db))->findById($_GET["id"]);
$daftarPengguna = (new Pengguna($db))->all();
$daftarBarang = (new Barang($db))->all();
$daftarPelanggan = (new Pelanggan($db))->all();

?>

<?php include "../../templates/header.php" ?>


<div class="card-header">
    <h1 class="fs-3">Edit Penjualan</h1>
</div>

<div class="card-body">
    <a href="index.php" class="btn btn-outline-secondary btn-sm mb-3">Kembali</a>


    <?php if ($penjualan) : ?>
        <form action="../../controller/penjualan/Penjualan_Update.php?id=<?= $penjualan["IdPenjualan"] ?>" method="POST">
            <div class="mb-3">
                <label for="JumlahPenjualan" class="form-label">Jumlah Penjualan</label>
                <input type="number" class="form-control" id="JumlahPenjualan" name="JumlahPenjualan" value="<?= $penjualan["JumlahPenjualan"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="HargaJual" class="form-label">Harga Jual</label>
                <input type="number" class="form-control" id="HargaJual" name="HargaJual" value="<?= $penjualan["HargaJual"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="IdPengguna" class="form-label">Pengguna</label>
                <select class="form-select" id="IdPengguna" name="IdPengguna" required>
                    <?php foreach ($daftarPengguna as $pengguna) : ?>
                        <option value="<?= $pengguna["IdPengguna"] ?>" <?= $pengguna["IdPengguna"] == $penjualan["IdPengguna"] ? "selected" : "" ?>><?= $pengguna["NamaDepan"] . " " . $pengguna["NamaBelakang"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="IdBarang" class="form-label">Barang</label>
                <select class="form-select" id="IdBarang" name="IdBarang" required>
                    <?php foreach ($daftarBarang as $barang) : ?>
                        <option value="<?= $barang["IdBarang"] ?>" <?= $barang["IdBarang"] == $penjualan["IdBarang"] ? "selected" : "" ?>><?= $barang["NamaBarang"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="IdPelanggan" class="form-label">Pelanggan</label>
                <select class="form-control" id="IdPelanggan" name="IdPelanggan" required>
                    <?php foreach ($daftarPelanggan as $pelanggan) : ?>
                        <option value="<?= $pelanggan["IdPelanggan"] ?>" <?= $pelanggan["IdPelanggan"] == $penjualan["IdPelanggan"] ? "selected" : "" ?>><?= $pelanggan["NamaPelanggan"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="update" value="update">Simpan</button>
        </form>
    <?php else : ?>
        <p class="text-body-secondary">Data tidak ditemukan</p>
    <?php endif ?>
</div>

<?php include "../../templates/footer.php"; ?>