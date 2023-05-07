<?php

include "../../utils/database.php";
include "../../class/Supplier.php";

$id = $_GET["id"];

if (isset($_POST['update'])) {
    $supplier = new Supplier($db);

    $supplier->setIdSupplier($id);
    $supplier->setUserName($_POST["UserName"]);
    $supplier->setNamaSupplier($_POST["NamaSupplier"]);
    $supplier->setNoHP($_POST["NoHP"]);
    $supplier->setAlamatSupplier($_POST["AlamatSupplier"]);

    $supplier->update();

    header("Location: ../../view/supplier/index.php");
}
