<?php
    function shouldShowMenuUtamaButton()
    {
        $currentPage = $_SERVER['REQUEST_URI'];
        return $currentPage !== '/index.php';
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas Kelompok 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="py-3">
<?php include "modal.php" ?>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1 px-3">Sistem Aplikasi Jaya</span>
            <div>
            <a class="btn btn-success btn-sm" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal"   >About Us</a>
                <?php if (shouldShowMenuUtamaButton()): ?>
                    <a href="../../index.php" class="btn btn-secondary btn-sm" role="button">Menu Utama</a>
                <?php endif; ?>
            </div>
        </nav>
        <div class="py-5">
            <div class="card">