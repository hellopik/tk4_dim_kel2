<?php
include "../../utils/database.php";
include "../../class/Pembelian.php";

$daftarPembelian = (new Pembelian($db))->all();

?>
<?php include "../../templates/header.php" ?>
<div class="card-header">
    <h1 class="fs-3">Daftar Pembelian</h1>
</div>
<div class="card-body">
    <div class="d-flex justify-content-end">
        <a href="create.php" class="btn btn-primary">+ Pembelian</a>
    </div>
    <div class="table-responsive">
        <table class="table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Jumlah Pembelian</th>
                    <th>Harga Beli</th>
                    <th>ID Pengguna</th>
                    <th>ID Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($daftarPembelian as $key => $data) :  ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $data["JumlahPembelian"] ?></td>
                        <td><?= $data["HargaBeli"] ?></td>
                        <td><?= $data["IdPengguna"] ?></td>
                        <td><?= $data["IdBarang"] ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="edit.php?id=<?= $data["IdPembelian"] ?>" class="btn btn-info btn-sm me-2">Edit</a>

                                <form action="../../controller/pembelian/Pembelian_Delete.php">
                                    <input type="hidden" name="id" value="<?= $data["IdPembelian"] ?>">
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