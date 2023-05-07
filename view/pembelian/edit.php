<?php
include "../../utils/database.php";
include "../../class/Pembelian.php";
include "../../class/Pengguna.php";
include "../../class/Barang.php";
include "../../class/Supplier.php";

$pembelian = (new Pembelian($db))->findById($_GET["id"]);
$daftarPengguna = (new Pengguna($db))->all();
$daftarBarang = (new Barang($db))->all();
$daftarSupplier = (new Supplier($db))->all();

?>

<?php include "../../templates/header.php" ?>


<div class="card-header">
    <h1 class="fs-3">Edit Pembelian</h1>
</div>

<div class="card-body">
    <a href="index.php" class="btn btn-outline-secondary btn-sm mb-3">Kembali</a>


    <?php if ($pembelian) : ?>
        <form action="../../controller/pembelian/Pembelian_Update.php?id=<?= $pembelian["IdPembelian"] ?>" method="POST">
            <div class="mb-3">
                <label for="JumlahPembelian" class="form-label">Jumlah Pembelian</label>
                <input type="number" class="form-control" id="JumlahPembelian" name="JumlahPembelian" value="<?= $pembelian["JumlahPembelian"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="HargaBeli" class="form-label">Harga Beli</label>
                <input type="number" class="form-control" id="HargaBeli" name="HargaBeli" value="<?= $pembelian["HargaBeli"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="IdPengguna" class="form-label">Pengguna</label>
                <select class="form-select" id="IdPengguna" name="IdPengguna" required>
                    <?php foreach ($daftarPengguna as $pengguna) : ?>
                        <option value="<?= $pengguna["IdPengguna"] ?>" <?= $pengguna["IdPengguna"] == $pembelian["IdPengguna"] ? "selected" : "" ?>><?= $pengguna["NamaDepan"] . " " . $pengguna["NamaBelakang"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="IdBarang" class="form-label">Barang</label>
                <select class="form-select" id="IdBarang" name="IdBarang" required>
                    <?php foreach ($daftarBarang as $barang) : ?>
                        <option value="<?= $barang["IdBarang"] ?>" <?= $barang["IdBarang"] == $pembelian["IdBarang"] ? "selected" : "" ?>><?= $barang["NamaBarang"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="IdSupplier" class="form-label">Supplier</label>
                <select class="form-control" id="IdSupplier" name="IdSupplier" required>
                    <?php foreach ($daftarSupplier as $supplier) : ?>
                        <option value="<?= $supplier["IdSupplier"] ?>" <?= $supplier["IdSupplier"] == $pembelian["IdSupplier"] ? "selected" : "" ?>><?= $supplier["NamaSupplier"] ?></option>
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