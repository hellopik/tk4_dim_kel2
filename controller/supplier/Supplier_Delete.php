<?php

include "../../utils/database.php";
include "../../class/Supplier.php";

if (isset($_GET['id'])) {
    $supplier = new Supplier($db);

    $supplier->delete($_GET['id']);

    header("Location: ../../view/supplier/index.php");
}
