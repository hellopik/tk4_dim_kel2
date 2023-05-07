<?php

include "../../utils/database.php";
include "../../class/Barang.php";

if (isset($_POST['store'])) {
    $barang = new Barang($db);

    $barang->setNamaBarang($_POST["NamaBarang"]);
    $barang->setKeterangan($_POST["Keterangan"]);
    $barang->setSatuan($_POST["Satuan"]);
    $barang->setIdPengguna($_POST["IdPengguna"]);

    $barang->create();

    header("Location: ../../view/barang/index.php");
}
