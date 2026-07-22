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
</head>

<body>

<header class="header">

    <!-- Logo -->
    <div class="logo">
        <a href="index.php">W3S</a>
    </div>

    <!-- Menu di navigazione -->
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="argomenti.php">Argomenti</a></li>
            <li><a href="articoli.php">Articoli</a></li>
            <li><a href="esercizi.php">Esercizi</a></li>
        </ul>
    </nav>

    <!-- Pulsanti -->
    <div class="buttons">
        <a href="login.php" class="btn">Login</a>
        <a href="register.php" class="btn btn-primary">Registrati</a>
    </div>

</header>