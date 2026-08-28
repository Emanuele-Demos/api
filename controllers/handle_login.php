<?php



require_once $_SERVER['DOCUMENT_ROOT']"conn.php";

require_once "models/user.php";



// Controlla che il form sia stato inviato tramite POST

if ($_SERVER["REQUEST_METHOD"] != "POST") {

    header("Location: login.php");

    exit();

}



// Recupera i dati

$email = trim($_POST["email"]);

$password = $_POST["password"];



// Controllo campi vuoti

if (empty($email) || empty($password)) {

    die("Compila tutti i campi.");

}



$result = User::authenticate($email, $password);



if ($result) {

    session_start();

    $_SESSION["user_id"] = $result["id_utente"];

    $_SESSION["nome"] = $result["nome"];

    $_SESSION["cognome"] = $result["cognome"];

    $_SESSION["email"] = $result["email"];



    header("Location: dashboard.php");

    exit();

} else {

    die("Credenziali non valide.");

}

