<?php

require_once "conn.php";
require_once "models/user.php";

// Controlla che il form sia stato inviato tramite POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: register.php");
    exit();
}

// Recupera i dati del form
$nome = trim($_POST["nome"]);
$cognome = trim($_POST["cognome"]);
$email = trim($_POST["email"]);
$telefono = trim($_POST["telefono"]);
$password = $_POST["password"];
$conferma_password = $_POST["conferma_password"];

// Controllo campi vuoti
if (
    empty($nome) ||
    empty($cognome) ||
    empty($email) ||
    empty($telefono) ||
    empty($password) ||
    empty($conferma_password)
) {
    die("Tutti i campi sono obbligatori.");
}

// Controllo password
if ($password !== $conferma_password) {
    die("Le password non coincidono.");
}

// Controllo se l'email esiste già
$sql = "SELECT id_utente FROM utenti WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    die("Questa email è già registrata.");
}

$stmt->close();

// Crea l'hash della password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Inserimento utente
$user = new User($nome, $cognome, $email, $telefono, $password_hash);
$result = $user->register();

if ($result) {
    session_start();
    //messaggio di successo
    $_SESSION["register_success"] = "Registrazione effettuata con successo.";
    header("Location: login.php");
    exit();
} else {
    session_start();
    //messaggio di errore
    $_SESSION["register_error"] = "Errore durante la registrazione.";
    header("Location: register.php");
    exit();
}