<?php
include "../../utils/database.php";
include "../../class/Pelanggan.php";

$daftarPelanggan = (new Pelanggan($db))->all();

?>
<?php include "../../templates/header.php" ?>
<div class="card-header">
    <h1 class="fs-3">Daftar Pelanggan</h1>
</div>
<div class="card-body">
    <div class="d-flex justify-content-end">
        <a href="create.php" class="btn btn-primary">+ Pelanggan</a>
    </div>
    <div class="table-responsive">
        <table class="table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Nama Pelanggan</th>
                    <th>NoHP</th>
                    <th>Alamat Pelanggan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($daftarPelanggan as $key => $data) :  ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $data["Username"] ?></td>
                        <td><?= $data["NamaPelanggan"] ?></td>
                        <td><?= $data["NoHP"] ?></td>
                        <td><?= $data["AlamatPelanggan"] ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="edit.php?id=<?= $data["IdPelanggan"] ?>" class="btn btn-info btn-sm me-2">Edit</a>

                                <form action="../../controller/pelanggan/Pelanggan_Delete.php">
                                    <input type="hidden" name="id" value="<?= $data["IdPelanggan"] ?>">
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