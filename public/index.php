<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../application/Database/Database.php';

require_once __DIR__ . '/../application/noyau/BaseModel.php';
require_once __DIR__ . '/../application/models/Activite.php';
require_once __DIR__ . '/../application/models/Membre.php';
require_once __DIR__ . '/../application/models/Projet.php';
require_once __DIR__ . '/../application/models/ProjetCourt.php';
require_once __DIR__ . '/../application/models/ProjetLong.php';

use app\models\Activite;

$activite = new Activite();
while (true) {
    echo "\n ***{ MENU PRINCIPAL}***\n";
    echo "1. Gestion des membres\n";
    echo "2. Gestion des projets\n";
    echo "3. Gestion des activités\n";
    echo "0. Quitter\n";
    $choix = readline("Votre choix :");
    switch ($choix) {
        case 1:
            echo "Gestion des membres \n";

            break;
        case 2:
            echo "Gestion des Projets\n";

            break;
        case 3:
            echo "Gestion des activites \n";

            break;

        case 0:
            echo " A bien toump\n";
            exit;

            break;

        default:
            echo "choix invalide \n";
            break;
    }
}
