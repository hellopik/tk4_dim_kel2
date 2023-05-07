<?php
include "../../utils/database.php";
include "../../class/Barang.php";
include "../../class/Pembelian.php";
include "../../class/Penjualan.php";

$daftarBarangCogs = (new Barang($db))->getCogs();

?>
<?php include "../../templates/header.php" ?>
<div class="card-header">
    <h1 class="fs-3">Pemaketan Linear Function</h1>
</div>
<div class="card-body">
    <form method="post">
        <div class="row">
            <div class="mb-3 col">
                <label for="barang1" class="form-label">Barang 1</label>
                <select class="form-select" id="barang1" name="barang1">
                    <?php foreach ($daftarBarangCogs as $data) : ?>
                        <option value="<?= $data['IdBarang'] ?>"><?= $data['NamaBarang'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3 col    ">
                <label for="barang2" class="form-label">Barang 2</label>
                <select class="form-select" id="barang2" name="barang2">
                    <?php foreach ($daftarBarangCogs as $data) : ?>
                        <option value="<?= $data['IdBarang'] ?>"><?= $data['NamaBarang'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <button type="submit" name="store" value="store" class="btn btn-primary">Kalkulasi</button>
    </form>
    <?php include '../../controller/pemaketan/Pemaketan_calculate.php'; ?>    
</div>
<?php include "../../templates/footer.php"; ?>