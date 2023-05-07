<?php

include "../../utils/database.php";
include "../../class/HakAkses.php";

if (isset($_GET['id'])) {
    $hakAkses = new HakAkses($db);

    $hakAkses->delete($_GET['id']);

    header("Location: ../../view/hakakses/index.php");
}
