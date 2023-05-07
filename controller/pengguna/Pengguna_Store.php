
<?php

include "../../utils/database.php";
include "../../class/Pengguna.php";

if (isset($_POST['store'])) {
    $pengguna = new Pengguna($db);

    $pengguna->setNamaPengguna($_POST["NamaPengguna"]);
    $pengguna->setPassword($_POST["Password"]);
    $pengguna->setNamaDepan($_POST["NamaDepan"]);
    $pengguna->setNamaBelakang($_POST["NamaBelakang"]);
    $pengguna->setNoHP($_POST["NoHP"]);
    $pengguna->setAlamat($_POST["Alamat"]);
    $pengguna->setIdAkses($_POST["IdAkses"]);

    $pengguna->create();

    header("Location: ../../view/pengguna/index.php");
}
