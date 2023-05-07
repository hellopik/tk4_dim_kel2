<?php
include "../../utils/database.php";
include "../../class/HakAkses.php";

$hakAkses = (new HakAkses($db))->findById($_GET["id"]);

?>

<?php include "../../templates/header.php" ?>


<div class="card-header">
    <h1 class="fs-3">Edit Hak Akses</h1>
</div>

<div class="card-body">
    <a href="index.php" class="btn btn-outline-secondary btn-sm mb-3">Kembali</a>

    <?php if ($hakAkses) : ?>
        <form action="../../controller/hakakses/HakAkses_Update.php?id=<?= $hakAkses["IdAkses"] ?>" method="post">

            <div class="mb-3">
                <label for="NamaAkses" class="form-label">Nama Akses</label>
                <input type="text" class="form-control" id="NamaAkses" name="NamaAkses" value="<?= $hakAkses["NamaAkses"] ?>">
            </div>
            <div class="mb-3">
                <label for="Keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="Keterangan" name="Keterangan" value="<?= $hakAkses["Keterangan"] ?>">
            </div>


            <button type="submit" name="update" value="update" class="btn btn-primary">Simpan</button>
        </form>
    <?php else : ?>
        <p class="text-body-secondary">Data tidak ditemukan</p>
    <?php endif ?>
</div>

<?php include "../../templates/footer.php"; ?>