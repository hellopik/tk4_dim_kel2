<?php

include "../../utils/database.php";
include "../../class/Pengguna.php";

if (isset($_GET['id'])) {
    $pengguna = new Pengguna($db);

    $pengguna->delete($_GET['id']);

    header("Location: ../../view/pengguna/index.php");
}
