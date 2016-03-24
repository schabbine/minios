<?php

namespace Framework\Pdo;

class Identification {

    public function Identification() {
        if ($_POST['mdp'] == 'admin') {
            $_SESSION['admin']['pseudo'] = $_POST['pseudo'];
            $message = 'Bonjour ' . $_POST['pseudo'];
        } else {
            $message = '<div class="erreur">erreur d\'identification</div>';
        }
        return $conn;
    }

}

