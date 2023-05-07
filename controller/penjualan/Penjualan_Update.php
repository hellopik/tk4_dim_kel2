<?php

include "../../utils/database.php";
include "../../class/Penjualan.php";

$id = $_GET["id"];

if (isset($_POST['update'])) {
    $penjualan = new Penjualan($db);

    $penjualan->setIdPenjualan($id);
    $penjualan->setIdBarang($_POST["IdBarang"]);
    $penjualan->setIdPengguna($_POST["IdPengguna"]);
    $penjualan->setIdPelanggan($_POST["IdPelanggan"]);
    $penjualan->setJumlahPenjualan($_POST["JumlahPenjualan"]);
    $penjualan->setHargaJual($_POST["HargaJual"]);

    $penjualan->update();

    header("Location: ../../view/penjualan/index.php");
}