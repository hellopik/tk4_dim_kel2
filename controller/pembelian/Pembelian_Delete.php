<?php

include "../../utils/database.php";
include "../../class/Pembelian.php";

if (isset($_GET['id'])) {
    $pembelian = new Pembelian($db);

    $pembelian->delete($_GET['id']);

    header("Location: ../../view/pembelian/index.php");
}
