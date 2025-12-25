<?php
namespace App\Noyau;

use App\Database\Database;
use PDO;

class BaseModel
{
    protected string $table;
    protected array $attributes = [];
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function sauvegarder(): bool
    {
        if (isset($this->attributes['id'])) {
            $set = [];
            foreach ($this->attributes as $key => $value) {
                if ($key !== 'id') $set[] = "$key = :$key";
            }
            $sql = "UPDATE {$this->table} SET " . implode(', ', $set) . " WHERE id = :id";
        } else {
            $cols = implode(',', array_keys($this->attributes));
            $placeholders = ':' . implode(', :', array_keys($this->attributes));
            $sql = "INSERT INTO {$this->table} ($cols) VALUES ($placeholders)";
        }

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($this->attributes);
    }

    public function supprimer(): bool
    {
        if (!isset($this->attributes['id'])) return false;
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $this->attributes['id']]);
    }

    public function trouverParId(int $id): ?array
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function __get($name)
    {
        return $this->attributes[$name] ?? null;
    }
}
