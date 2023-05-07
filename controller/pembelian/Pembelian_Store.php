<?php

include "../../utils/database.php";
include "../../class/Pembelian.php";


if (isset($_POST['store'])) {
    $pembelian = new Pembelian($db);

    $pembelian->setJumlahPembelian($_POST["JumlahPembelian"]);
    $pembelian->setHargaBeli($_POST["HargaBeli"]);
    $pembelian->setIdPengguna($_POST["IdPengguna"]);
    $pembelian->setIdBarang($_POST["IdBarang"]);
    $pembelian->setIdSupplier($_POST["IdSupplier"]);

    $pembelian->create();

    header("Location: ../../view/pembelian/index.php");
}