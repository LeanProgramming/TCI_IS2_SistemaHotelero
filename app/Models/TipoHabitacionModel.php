<?php 

namespace App\Models;
use CodeIgniter\Model;

class TipoHabitacionModel extends Model
{
    protected $table = "tipo_habitacion";
    protected $primaryKey = 'id_tipoHab';

    protected $returnType = 'array';
    protected $allowedFields = ['nombre, precio'];

    protected $skipValidation = false;
}


?>