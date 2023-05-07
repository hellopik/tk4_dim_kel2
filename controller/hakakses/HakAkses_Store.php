<?php

include "../../utils/database.php";
include "../../class/HakAkses.php";

if (isset($_POST['store'])) {
    $hakAkses = new HakAkses($db);

    $hakAkses->setNamaAkses($_POST["NamaAkses"]);
    $hakAkses->setKeterangan($_POST["Keterangan"]);

    $hakAkses->create();

    header("Location: ../../view/hakakses/index.php");
}
