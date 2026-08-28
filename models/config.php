<?php
require_once __DIR__ . '/../conn.php';

// questa classe è di config per la gestione degli errori e componenti utili attraverso la variabile session
class Config {
    public $chiave; 
    public $messaggio;
    public $redirect; 

    public static function __construct($chiave, $messaggio, $redirect){
        $this->chiave = $chiave;
        $this->messaggio = $messaggio;
        $this->redirect = $redirect;

    }

    // La sintassi $_SESSION[$chiave] è corretta 
    // (assicurarsi solo che session_start() sia stato chiamato prima di usarla)
    public function createAllert($chiave, $messaggio, $redirect){
        session_start();
        $_SESSION[$chiave] = $messaggio;
        header("Location: $redirect");
        exit();
    }

}