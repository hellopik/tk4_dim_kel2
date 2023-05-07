<?php

include "../../utils/database.php";
include "../../class/Barang.php";

if (isset($_GET['id'])) {
    $barang = new Barang($db);

    $barang->delete($_GET['id']);

    header("Location: ../../view/barang/index.php");
}
