<?php
include "../../utils/database.php";
include "../../class/Pengguna.php";
include "../../class/HakAkses.php";

$pengguna = (new Pengguna($db))->findById($_GET["id"]);
$daftarHakAkses = (new HakAkses($db))->all();

?>

<?php include "../../templates/header.php" ?>


<div class="card-header">
    <h1 class="fs-3">Edit Pengguna</h1>
</div>

<div class="card-body">
    <a href="index.php" class="btn btn-outline-secondary btn-sm mb-3">Kembali</a>


    <?php if ($pengguna) : ?>
        <form action="../../controller/pengguna/Pengguna_Update.php?id=<?= $pengguna["IdPengguna"] ?>" method="post">

            <div class="mb-3">
                <label for="NamaPengguna" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="NamaPengguna" name="NamaPengguna" value="<?= $pengguna["NamaPengguna"] ?>">
            </div>
            <div class="mb-3">
                <label for="NamaDepan" class="form-label">Nama Depan</label>
                <input type="text" class="form-control" id="NamaDepan" name="NamaDepan" value="<?= $pengguna["NamaDepan"] ?>">
            </div>
            <div class="mb-3">
                <label for="NamaBelakang" class="form-label">Nama Belakang</label>
                <input type="text" class="form-control" id="NamaBelakang" name="NamaBelakang" value="<?= $pengguna["NamaBelakang"] ?>">
            </div>
            <div class="mb-3">
                <label for="NoHP" class="form-label">Nomor HP</label>
                <input type="tel" class="form-control" id="NoHP" name="NoHP" value="<?= $pengguna["NoHP"] ?>">
            </div>
            <div class="mb-3">
                <label for="Alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="Alamat" name="Alamat"><?= $pengguna["Alamat"] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="IdAkses" class="form-label">ID Akses</label>
                <select class="form-control" id="IdAkses" name="IdAkses">
                    <?php foreach ($daftarHakAkses as $data) : ?>
                        <option value="<?= $data['IdAkses'] ?>" <?php if ($pengguna["IdAkses"] == $data['IdAkses']) echo "selected" ?>><?= $data['NamaAkses'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>


            <button type="submit" name="update" value="update" class="btn btn-primary">Simpan</button>
        </form>
    <?php else : ?>
        <p class="text-body-secondary">Data tidak ditemukan</p>
    <?php endif ?>
</div>

<?php include "../../templates/footer.php"; ?>