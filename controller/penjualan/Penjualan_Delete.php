<?php

include "../../utils/database.php";
include "../../class/Penjualan.php";

if (isset($_GET['id'])) {
    $penjualan = new Penjualan($db);

    $penjualan->delete($_GET['id']);

    header("Location: ../../view/penjualan/index.php");
}
