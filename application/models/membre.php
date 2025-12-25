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
    public function set_email(string $email)
    {
        $email = trim($email);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email invalide");
        }

        $sql = "SELECT COUNT(*) FROM {$this->table} WHERE email = :email";
        if ($this->id) {
            $sql .= " AND id != :id";
        }

        $stmt = $this->db->prepare($sql);

        $params = ['email' => $email];
        if ($this->id) {
            $params['id'] = $this->id;
        }

        $stmt->execute($params);

        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Email déjà utilisé");
        }

        $this->email = $email;
    }


    public function get_date_inscription(): string
    {
        return $this->date_inscription;
    }
    public function set_date_inscription(string $date)
    {
     
            $this->date_inscription = $date;
    }
}
