<?php
include "../../utils/database.php";
include "../../class/HakAkses.php";

$daftarHakAses = (new HakAkses($db))->all();

?>

<?php include "../../templates/header.php" ?>


<div class="card-header">
    <h1 class="fs-3">Daftar Hak Akses</h1>
</div>

<div class="card-body">
    <div class="d-flex justify-content-end">
        <a href="create.php" class="btn btn-primary">+ Hak Akses</a>
    </div>

    <div class="table-responsive">
        <table class="table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($daftarHakAses as $key => $data) :  ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $data["NamaAkses"] ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="./edit.php?id=<?= $data["IdAkses"] ?>" class="btn btn-info btn-sm me-2">Edit</a>

                                <form action="../../controller/hakakses/HakAkses_Delete.php">
                                    <input type="hidden" name="id" value="<?= $data["IdAkses"] ?>">
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