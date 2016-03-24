<?php

$conn = new Connexion;
$connBDD = new ConnexionBDD;

class FrontController {

    public $page = 'Connexion';

    public function __construct() {
        session_start();
        define("RACINE_SITE", "/lokisalle/");
        define("RACINE_SERVEUR", $_SERVER['DOCUMENT_ROOT']);
        $msg = "";
    }

}

