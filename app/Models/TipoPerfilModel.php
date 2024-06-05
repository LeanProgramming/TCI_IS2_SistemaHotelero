<?php 

namespace App\Models;
use CodeIgniter\Model;

class TipoPerfilModel extends Model
{
    protected $table = "tipo_perfil";
    protected $primaryKey = 'id_perfil';

    protected $returnType = 'array';
    protected $allowedFields = ['nombre, esBaja'];

    protected $skipValidation = false;
}


?>