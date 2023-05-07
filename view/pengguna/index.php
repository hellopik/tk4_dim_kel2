<?php
include "../../utils/database.php";
include "../../class/Pengguna.php";

$daftarPengguna = (new Pengguna($db))->all();

?>
<?php include "../../templates/header.php" ?>
<div class="card-header">
    <h1 class="fs-3">Daftar Pengguna</h1>
</div>
<div class="card-body">
    <div class="d-flex justify-content-end">
        <a href="create.php" class="btn btn-primary">+ Pengguna</a>
    </div>
    <div class="table-responsive">
        <table class="table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pengguna</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($daftarPengguna as $key => $data) :  ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $data["NamaPengguna"] ?></td>
                        <td><?= $data["NamaDepan"] ?></td>
                        <td><?= $data["NamaBelakang"] ?></td>
                        <td><?= $data["NoHP"] ?></td>
                        <td><?= $data["Alamat"] ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="./edit.php?id=<?= $data["IdPengguna"] ?>" class="btn btn-info btn-sm me-2">Edit</a>

                                <form action="../../controller/pengguna/Pengguna_Delete.php">
                                    <input type="hidden" name="id" value="<?= $data["IdPengguna"] ?>">
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