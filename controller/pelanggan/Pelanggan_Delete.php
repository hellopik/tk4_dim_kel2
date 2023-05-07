<?php

include "../../utils/database.php";
include "../../class/Pelanggan.php";

if (isset($_GET['id'])) {
    $pelanggan = new Pelanggan($db);

    $pelanggan->delete($_GET['id']);

    header("Location: ../../view/pelanggan/index.php");
}
