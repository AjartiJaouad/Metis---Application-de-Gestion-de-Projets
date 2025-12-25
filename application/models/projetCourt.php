<?php

namespace App\models;
require_once __DIR__ . '/Projet.php';
class ProjetCourt extends Projet
{
    public function get_duree(): string
    {
        return "Projet court";
    }
}
