<?php
include "../../utils/database.php";
include "../../class/Supplier.php";

$daftarSupplier = (new Supplier($db))->all();

?>
<?php include "../../templates/header.php" ?>
<div class="card-header">
    <h1 class="fs-3">Daftar Supplier</h1>
</div>
<div class="card-body">
    <div class="d-flex justify-content-end">
        <a href="create.php" class="btn btn-primary">+ Supplier</a>
    </div>
    <div class="table-responsive">
        <table class="table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Nama Supplier</th>
                    <th>NoHP</th>
                    <th>Alamat Supplier</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($daftarSupplier as $key => $data) :  ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $data["Username"] ?></td>
                        <td><?= $data["NamaSupplier"] ?></td>
                        <td><?= $data["NoHP"] ?></td>
                        <td><?= $data["AlamatSupplier"] ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="edit.php?id=<?= $data["IdSupplier"] ?>" class="btn btn-info btn-sm me-2">Edit</a>

                                <form action="../../controller/supplier/Supplier_Delete.php">
                                    <input type="hidden" name="id" value="<?= $data["IdSupplier"] ?>">
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