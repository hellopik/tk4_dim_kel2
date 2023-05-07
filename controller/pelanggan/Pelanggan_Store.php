<?php

include "../../utils/database.php";
include "../../class/Pelanggan.php";

if (isset($_POST['store'])) {
    $pelanggan = new Pelanggan($db);

    $pelanggan->setUserName($_POST["UserName"]);
    $pelanggan->setPassword($_POST["Password"]);
    $pelanggan->setNamaPelanggan($_POST["NamaPelanggan"]);
    $pelanggan->setNoHP($_POST["NoHP"]);
    $pelanggan->setAlamatPelanggan($_POST["AlamatPelanggan"]);

    $pelanggan->create();

    header("Location: ../../view/pelanggan/index.php");
}
