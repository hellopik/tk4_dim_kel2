<?php

include "../../utils/database.php";
include "../../class/Barang.php";

if (isset($_POST['update'])) {
    $barang = new Barang($db);

    $barang->setIdBarang($_GET["id"]);
    $barang->setNamaBarang($_POST["NamaBarang"]);
    $barang->setKeterangan($_POST["Keterangan"]);
    $barang->setSatuan($_POST["Satuan"]);
    $barang->setIdPengguna($_POST["IdPengguna"]);

    $barang->update();

    header("Location: ../../view/barang/index.php");
}
