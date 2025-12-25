<?php

require_once __DIR__ . '/../application/Database/Database.php';

$db = \App\Database\Database::getInstance()->getConnection();

if ($db) {
    echo "Connexion a la base samarch";
} else {
    echo "Échec de la connexion a labas";
}
