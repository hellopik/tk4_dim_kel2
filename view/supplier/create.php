<?php include "../../templates/header.php" ?>

<div class="card-header">
    <h1 class="fs-3">Tambah Supplier</h1>
</div>

<div class="card-body">
    <a href="index.php" class="btn btn-outline-secondary btn-sm mb-3">Kembali</a>

    <form action="../../controller/supplier/Supplier_Store.php" method="POST">
        <div class="mb-3">
            <label for="UserName" class="form-label">User Name</label>
            <input type="text" class="form-control" id="UserName" name="UserName" required>
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="Password" name="Password" required>
        </div>
        <div class="mb-3">
            <label for="NamaSupplier" class="form-label">Nama Supplier</label>
            <input type="text" class="form-control" id="NamaSupplier" name="NamaSupplier" required>
        </div>
        <div class="mb-3">
            <label for="NoHP" class="form-label">No HP</label>
            <input type="tel" class="form-control" id="NoHP" name="NoHP" required>
        </div>
        <div class="mb-3">
            <label for="AlamatSupplier" class="form-label">Alamat Supplier</label>
            <textarea name="AlamatSupplier" id="AlamatSupplier" class="form-control" required></textarea>
        </div>


        <button type="submit" name="store" value="store" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php include "../../templates/footer.php"; ?>