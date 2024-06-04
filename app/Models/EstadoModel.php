<?php
namespace App\Models;
use CodeIgniter\Model;

class EstadoModel extends Model
{
    protected $id_estado;
    protected $nombre;

    protected $table = "estado";
    protected $primaryKey = 'id_estado';

    protected $returnType = 'array';
    protected $allowedFields = ['nombre'];

    protected $skipValidation = false;

}


?>


