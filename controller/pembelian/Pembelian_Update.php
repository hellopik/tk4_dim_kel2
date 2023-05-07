<?php

include "../../utils/database.php";
include "../../class/Pembelian.php";

$id = $_GET["id"];

if (isset($_POST['update'])) {
    $pembelian = new Pembelian($db);

    $pembelian->setIdPembelian($id);
    $pembelian->setIdBarang($_POST["IdBarang"]);
    $pembelian->setIdPengguna($_POST["IdPengguna"]);
    $pembelian->setIdSupplier($_POST["IdSupplier"]);
    $pembelian->setJumlahPembelian($_POST["JumlahPembelian"]);
    $pembelian->setHargaBeli($_POST["HargaBeli"]);

    $pembelian->update();

    header("Location: ../../view/pembelian/index.php");
}