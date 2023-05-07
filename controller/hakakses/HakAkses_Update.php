<?php

include "../../utils/database.php";
include "../../class/HakAkses.php";

if (isset($_POST['update'])) {
    $hakAkses = new HakAkses($db);

    $hakAkses->setIdAkses($_GET["id"]);
    $hakAkses->setNamaAkses($_POST["NamaAkses"]);
    $hakAkses->setKeterangan($_POST["Keterangan"]);

    $hakAkses->update();

    header("Location: ../../view/hakakses/index.php");
}
