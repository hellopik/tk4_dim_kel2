<?php
include "../../utils/database.php";
include "../../class/Supplier.php";

$supplier = (new Supplier($db))->findById($_GET["id"]);

?>

<?php include "../../templates/header.php" ?>


<div class="card-header">
    <h1 class="fs-3">Edit Supplier</h1>
</div>

<div class="card-body">
    <a href="index.php" class="btn btn-outline-secondary btn-sm mb-3">Kembali</a>


    <?php if ($supplier) : ?>
        <form action="../../controller/supplier/Supplier_Update.php?id=<?= $supplier["IdSupplier"] ?>" method="POST">
            <div class="mb-3">
                <label for="UserName" class="form-label">User Name</label>
                <input type="text" class="form-control" id="UserName" name="UserName" value="<?= $supplier["Username"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="NamaSupplier" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" id="NamaSupplier" name="NamaSupplier" value="<?= $supplier["NamaSupplier"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="NoHP" class="form-label">No HP</label>
                <input type="tel" class="form-control" id="NoHP" name="NoHP" value="<?= $supplier["NoHP"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="AlamatSupplier" class="form-label">Alamat Supplier</label>
                <textarea name="AlamatSupplier" id="AlamatSupplier" class="form-control" required><?= $supplier["AlamatSupplier"] ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="update" value="update">Simpan</button>
        </form>
    <?php else : ?>
        <p class="text-body-secondary">Data tidak ditemukan</p>
    <?php endif ?>
</div>

<?php include "../../templates/footer.php"; ?>