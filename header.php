<?php
require_once "conn.php";
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? "W3S" ?></title>

    <link rel="stylesheet" href="style.css">
    <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
</head>

<body>

<header class="header">

    <!-- Logo -->
    <div class="logo">
        <a href="index.php">W3S</a>
    </div>

    <!-- Menu di navigazione -->

    <ul class="nav">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="argomenti.php" class="nav-link">Argomenti</a></li>
        <li class="nav-item"><a href="articoli.php" class="nav-link">Articoli</a></li>
        <li class="nav-item"><a href="esercizi.php" class="nav-link">Esercizi</a></li>
        <li class="nav-item"><a href="login.php" class="btn btn-primary">Login</a></li>
        <li class="nav-item"><a href="register.php" class="btn btn-primary">Registrati</a></li>
</ul>

</header>