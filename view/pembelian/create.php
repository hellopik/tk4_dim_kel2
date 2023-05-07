<?php

include "../../utils/database.php";
include "../../class/Pengguna.php";
include "../../class/Barang.php";
include "../../class/Supplier.php";

$daftarPengguna = (new Pengguna($db))->all();
$daftarBarang = (new Barang($db))->all();
$daftarSupplier = (new Supplier($db))->all();

?>

<?php include "../../templates/header.php" ?>

<div class="card-header">
    <h1 class="fs-3">Tambah Pembelian</h1>
</div>

<div class="card-body">
    <a href="index.php" class="btn btn-outline-secondary btn-sm mb-3">Kembali</a>

    <form action="../../controller/pembelian/Pembelian_Store.php" method="POST">
        <div class="mb-3">
            <label for="JumlahPembelian" class="form-label">Jumlah Pembelian</label>
            <input type="number" class="form-control" id="JumlahPembelian" name="JumlahPembelian" required>
        </div>
        <div class="mb-3">
            <label for="HargaBeli" class="form-label">Harga Beli</label>
            <input type="number" class="form-control" id="HargaBeli" name="HargaBeli" required>
        </div>
        <div class="mb-3">
            <label for="IdPengguna" class="form-label">Pengguna</label>
            <select class="form-control" id="IdPengguna" name="IdPengguna" required>
                <?php foreach ($daftarPengguna as $pengguna) : ?>
                    <option value="<?= $pengguna["IdPengguna"] ?>"><?= $pengguna["NamaDepan"] ?> <?= $pengguna["NamaBelakang"] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="IdBarang" class="form-label">Barang</label>
            <select class="form-control" id="IdBarang" name="IdBarang" required>
                <?php foreach ($daftarBarang as $barang) : ?>
                    <option value="<?= $barang["IdBarang"] ?>"><?= $barang["NamaBarang"] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="IdSupplier" class="form-label">Supplier</label>
            <select class="form-control" id="IdSupplier" name="IdSupplier" required>
                <?php foreach ($daftarSupplier as $supplier) : ?>
                    <option value="<?= $supplier["IdSupplier"] ?>"><?= $supplier["NamaSupplier"] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <button type="submit" name="store" value="store" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php include "../../templates/footer.php"; ?>