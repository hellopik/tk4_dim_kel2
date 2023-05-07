<?php

include "../../utils/database.php";
include "../../class/Pelanggan.php";

$id = $_GET["id"];

if (isset($_POST['update'])) {
    $pelanggan = new Pelanggan($db);

    $pelanggan->setIdPelanggan($id);
    $pelanggan->setUserName($_POST["UserName"]);
    $pelanggan->setNamaPelanggan($_POST["NamaPelanggan"]);
    $pelanggan->setNoHP($_POST["NoHP"]);
    $pelanggan->setAlamatPelanggan($_POST["AlamatPelanggan"]);

    $pelanggan->update();

    header("Location: ../../view/pelanggan/index.php");
}
