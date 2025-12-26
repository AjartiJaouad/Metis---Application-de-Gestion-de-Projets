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

    public function modifierActivite(int $id, string $description, string $statut)
    {
        $sql = "UPDATE activites 
            SET description = :description, statut = :statut
            WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'description' => $description,
            'statut'      => $statut,
            'id'          => $id
        ]);
    }

    public function supprimerActivite(int $id)
    {
        $sql = "DELETE FROM activites WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(
            ['id' => $id]
        );
    }

    public function historiqueProjet(
        int $projet_id
    ) {
        $sql = "SELECT *FROM activites where projets_id = :projets_id order by dateActivite DESC  ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(
            [
                'projetss_id' => $projet_id
            ]
        );
        return $stmt->fetchAll();
    }
}
