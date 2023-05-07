<?php

include "../../utils/database.php";
include "../../class/Penjualan.php";


if (isset($_POST['store'])) {
    $penjualan = new Penjualan($db);

    $penjualan->setJumlahPenjualan($_POST["JumlahPenjualan"]);
    $penjualan->setHargaJual($_POST["HargaJual"]);
    $penjualan->setIdPengguna($_POST["IdPengguna"]);
    $penjualan->setIdBarang($_POST["IdBarang"]);
    $penjualan->setIdPelanggan($_POST["IdPelanggan"]);

    $penjualan->create();

    header("Location: ../../view/penjualan/index.php");
}