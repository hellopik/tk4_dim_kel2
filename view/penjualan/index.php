<?php
include "../../utils/database.php";
include "../../class/Penjualan.php";

$daftarPenjualan = (new Penjualan($db))->all();

?>
<?php include "../../templates/header.php" ?>
<div class="card-header">
    <h1 class="fs-3">Daftar Penjualan</h1>
</div>
<div class="card-body">
    <div class="d-flex justify-content-end">
        <a href="create.php" class="btn btn-primary">+ Penjualan</a>
    </div>
    <div class="table-responsive">
        <table class="table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Jumlah Penjualan</th>
                    <th>Harga Jual</th>
                    <th>ID Pengguna</th>
                    <th>ID Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($daftarPenjualan as $key => $data) :  ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $data["JumlahPenjualan"] ?></td>
                        <td><?= $data["HargaJual"] ?></td>
                        <td><?= $data["IdPengguna"] ?></td>
                        <td><?= $data["IdBarang"] ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="edit.php?id=<?= $data["IdPenjualan"] ?>" class="btn btn-info btn-sm me-2">Edit</a>

                                <form action="../../controller/penjualan/Penjualan_Delete.php">
                                    <input type="hidden" name="id" value="<?= $data["IdPenjualan"] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "../../templates/footer.php"; ?>