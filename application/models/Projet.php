<?php

namespace App\Models;

use App\Noyau\BaseModel;

abstract class Projet extends BaseModel
{
    protected string $table = 'projets';

    protected ?int $id = null;
    protected string $titre;
    protected string $description;

    // Methode abstraite polymorphisme
    abstract public function get_duree(): string;
}
