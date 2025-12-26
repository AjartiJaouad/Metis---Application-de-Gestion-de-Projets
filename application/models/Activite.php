<?php

namespace App\Models;

use App\Noyau\BaseModel;

class Activite extends BaseModel
{
    protected string $table = 'activites';

    protected ?int $id = null;
    protected int $projet_id;
    protected string $description;
    protected string $date_activite;
    protected string $statut;

    public function ajouterActivite(int $projet_id, string $description, string $statut)
    {
        $sql = "INSERT INTO activites (description, dateActivite, statut, projets_id)
                VALUES (:description, :dateActivite, :statut, :projets_id)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'description'  => $description,
            'dateActivite' => date('Y-m-d'),
            'statut'       => $statut,
            'projets_id'   => $projet_id
        ]);
    }
}
