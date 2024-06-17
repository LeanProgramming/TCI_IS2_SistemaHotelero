<?php 

namespace App\Models;
use CodeIgniter\Model;

class PisoModel extends Model
{   
    protected $table = "piso";
    protected $primaryKey = 'id_piso';

    protected $returnType = 'array';
    protected $allowedFields = ['nombre_piso'];

    protected $skipValidation = false;

}


?>