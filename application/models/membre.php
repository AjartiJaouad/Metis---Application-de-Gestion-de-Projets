<?php

namespace App\Models;

use App\Noyau\BaseModel;
use PDO;
use Exception;

class Membre extends BaseModel
{

    protected string $table = 'membres';


    private ?int $id = null;
    private string $nom;
    private string $email;
    private string $date_inscription;

    public function get_id(): ?int
    {
        return $this->id;
    }

    public function get_nom(): string
    {
        return $this->nom;
    }

    public function set_nom(string $nom)
    {
        $this->nom = trim($nom);
    }
    public function get_email(): string
    {
        return $this->email;
    }
    public function set_email(string  $email)
    {
        $this->email = trim($email);
    }
    public function get_date_inscription(): string
    {
        return $this->date_inscription;
    }
    public function set_date_inscription(string $date)
    {
        return
            $this->date_inscription = $date;
    }
}
