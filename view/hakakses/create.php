<?php include "../../templates/header.php" ?>


<div class="card-header">
    <h1 class="fs-3">Tambah Hak Akses</h1>
</div>

<div class="card-body">
    <a href="index.php" class="btn btn-outline-secondary btn-sm mb-3">Kembali</a>

    <form action="../../controller/hakakses/HakAkses_Store.php" method="post">

        <div class="mb-3">
            <label for="NamaAkses" class="form-label">Nama Akses</label>
            <input type="text" class="form-control" id="NamaAkses" name="NamaAkses">
        </div>
        <div class="mb-3">
            <label for="Keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="Keterangan" name="Keterangan">
        </div>


        <button type="submit" name="store" value="store" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php include "../../templates/footer.php"; ?>