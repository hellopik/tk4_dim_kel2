<?php
include "../../utils/database.php";
include "../../class/Pelanggan.php";

$pelanggan = (new Pelanggan($db))->findById($_GET["id"]);

?>

<?php include "../../templates/header.php" ?>


<div class="card-header">
    <h1 class="fs-3">Edit Pelanggan</h1>
</div>

<div class="card-body">
    <a href="index.php" class="btn btn-outline-secondary btn-sm mb-3">Kembali</a>


    <?php if ($pelanggan) : ?>
        <form action="../../controller/pelanggan/Pelanggan_Update.php?id=<?= $pelanggan["IdPelanggan"] ?>" method="POST">
            <div class="mb-3">
                <label for="UserName" class="form-label">User Name</label>
                <input type="text" class="form-control" id="UserName" name="UserName" value="<?= $pelanggan["Username"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="NamaPelanggan" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="NamaPelanggan" name="NamaPelanggan" value="<?= $pelanggan["NamaPelanggan"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="NoHP" class="form-label">No HP</label>
                <input type="tel" class="form-control" id="NoHP" name="NoHP" value="<?= $pelanggan["NoHP"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="AlamatPelanggan" class="form-label">Alamat Pelanggan</label>
                <textarea name="AlamatPelanggan" id="AlamatPelanggan" class="form-control" required><?= $pelanggan["AlamatPelanggan"] ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="update" value="update">Simpan</button>
        </form>
    <?php else : ?>
        <p class="text-body-secondary">Data tidak ditemukan</p>
    <?php endif ?>
</div>

<?php include "../../templates/footer.php"; ?>