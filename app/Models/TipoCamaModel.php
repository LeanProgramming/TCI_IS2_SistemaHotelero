<?php
namespace App\Models;
use CodeIgniter\Model;

class TipoCamaModel extends Model
{
    protected $table = "tipo_cama";
    protected $primaryKey = 'id_tipoCama';

    protected $returnType = 'array';
    protected $allowedFields = ['descripcion, precio'];

    protected $skipValidation = false;
}


?>