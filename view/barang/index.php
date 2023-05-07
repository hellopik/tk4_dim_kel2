<?php
include "../../utils/database.php";
include "../../class/Barang.php";

$daftarBarang = (new Barang($db))->all();

?>
<?php include "../../templates/header.php" ?>
<div class="card-header">
    <h1 class="fs-3">Daftar Barang</h1>
</div>
<div class="card-body">
    <div class="d-flex justify-content-end">
        <a href="create.php" class="btn btn-primary">+ Barang</a>
    </div>
    <div class="table-responsive">
        <table class="table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Keterangan</th>
                    <th>Satuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($daftarBarang as $key => $data) :  ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $data["NamaBarang"] ?></td>
                        <td><?= $data["Keterangan"] ?></td>
                        <td><?= $data["Satuan"] ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="edit.php?id=<?= $data["IdBarang"] ?>" class="btn btn-info btn-sm me-2">Edit</a>

                                <form action="../../controller/barang/Barang_Delete.php">
                                    <input type="hidden" name="id" value="<?= $data["IdBarang"] ?>">
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