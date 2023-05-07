<?php

include "../../utils/database.php";
include "../../class/Supplier.php";

if (isset($_POST['store'])) {
    $supplier = new Supplier($db);

    $supplier->setUserName($_POST["UserName"]);
    $supplier->setPassword($_POST["Password"]);
    $supplier->setNamaSupplier($_POST["NamaSupplier"]);
    $supplier->setNoHP($_POST["NoHP"]);
    $supplier->setAlamatSupplier($_POST["AlamatSupplier"]);

    $supplier->create();

    header("Location: ../../view/supplier/index.php");
}
