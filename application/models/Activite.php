<?php
namespace App\Models;

use App\Noyau\BaseModel;

class Activite extends BaseModel
{
    protected string $table = 'activites';
    protected ?int  $id = null ;
    protected int $projet_id ;
    protected string $description ;
    protected string $date_activite ;
}
