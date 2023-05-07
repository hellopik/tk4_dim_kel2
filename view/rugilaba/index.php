<?php
include "../../utils/database.php";
include "../../class/Barang.php";
include "../../class/Pembelian.php";
include "../../class/Penjualan.php";

$daftarBarang = (new Barang($db))->all();

$total = [];
foreach ($daftarBarang as $key => $barang) {
    $total[$key] = [
        (new Penjualan($db))->totalHargaPenjualan($barang["IdBarang"]),
        (new Pembelian($db))->totalHargaPembelian($barang["IdBarang"])
    ];
}


?>
<?php include "../../templates/header.php" ?>
<div class="card-header">
    <h1 class="fs-3">Rugi Laba</h1>
</div>
<div class="card-body">

    <div class="table-responsive">
        <table class="table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Hasil</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($daftarBarang as $key => $data) :  ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $data["NamaBarang"] ?></td>
                        <td><?= $total[$key][0] ?></td>
                        <td><?= $total[$key][1] ?></td>
                        <td><?= $total[$key][0] - $total[$key][1] ?></td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "../../templates/footer.php"; ?>