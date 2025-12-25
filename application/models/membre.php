<?php
namespace App\Models;

use App\Noyau\BaseModel;
use PDO;
use Exception;
class Membre extends BaseModel
{
    protected string $table = 'membres';
    private ? int $id = null ;
    private string $nom;
    private string $email ;
    private string $data_inscription ;
}
