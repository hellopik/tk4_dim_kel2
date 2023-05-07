<?php

include "../../utils/database.php";
include "../../class/Pengguna.php";

if (isset($_POST['update'])) {
    $pengguna = new Pengguna($db);

    $pengguna->setIdPengguna($_GET["id"]);
    $pengguna->setNamaPengguna($_POST["NamaPengguna"]);
    $pengguna->setNamaDepan($_POST["NamaDepan"]);
    $pengguna->setNamaBelakang($_POST["NamaBelakang"]);
    $pengguna->setNoHP($_POST["NoHP"]);
    $pengguna->setAlamat($_POST["Alamat"]);
    $pengguna->setIdAkses($_POST["IdAkses"]);

    $pengguna->update();

    header("Location: ../../view/pengguna/index.php");
}
