<?php

namespace App\models;

require_once __DIR__ . '/../noyau/BaseModel.php';

use App\noyau\BaseModel;

abstract class Projet extends BaseModel
{
    protected string $table = 'projets';

    abstract public function get_duree(): string;
}
